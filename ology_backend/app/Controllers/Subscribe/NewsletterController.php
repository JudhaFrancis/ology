<?php

namespace Core\Controllers\Subscribe;

use App\Domain\Subscribe\Newsletter;
use Core\Controllers\BaseController;
use Core\Controllers\DMLController;
use App\Infrastructure\Persistence\Subscribe\SQLNewsletterRepository;
use Core\Models\Utility\UtilityModel;
use Core\Libraries\EmailConetentGenerator;
use App\Libraries\Email;
use Config\Services;

class NewsletterController extends BaseController
{
    use DMLController;
    private $Newsletter_Repo;
    private $email;

    public function __construct()
    {
        helper('Core\Helpers\Utility');
        $this->initializeFunction();
        $this->Newsletter_Repo = new SQLNewsletterRepository();
        $this->email            = new EmailConetentGenerator;
    }

    public function newsletter()
    {
        $req = $this->request->getPost();
        $subscribeReqData = $this->Newsletter_Repo->findAllByWhere(['email_id' => $req['email_id']]);
        if (!empty($subscribeReqData)) {
            $data['validation'] = "Email Id Already Exists";
            return view('include/header') . view('pages/home', $data) . view('include/footer');
        }   
        $file_path = 'https://iaoi.in/uploads/news_letter.pdf';
        $saveData = $this->Newsletter_Repo->insert($req);
        if($saveData){
            $email = $this->email->genContentSentEmail(6,$req,$file_path);
        }
if($email){
        return view('include/header') . view('pages/home') . view('include/footer');
    }
}


    public function unsubscribe($id)
    {
        $subscribers = $this->Newsletter_Repo->findById($id);
        if (!$subscribers) {
            return $this->message(400, null, 'subscribers not found');
        }

        $unsubscribe = $this->Newsletter_Repo->updateById($id, ['is_active' => 0]);
        if ($unsubscribe) {
            return $this->message(200, $unsubscribe, 'Unsubscribe Successfully');
        } else {
            return $this->message(500, null, 'Failed to Unsubscribe');
        }
    }

    public function newssend()
    {
        $message = "Welcome to the Ologygirls monthly newsletter! 
    <br>
    We're excited to share with you the latest updates, inspiring stories, and upcoming events. Our mission is to empower girls everywhere to realize their full potential, and we couldn't do it without your support.";

        $subscribers = $this->Newsletter_Repo->findAll();

        $dailyLimit = 10;
        $batchSize = 2;
        $batchCount = 0;

        $sentEmails = [];
        $failedEmails = [];
        $sendDates = [];

        $currentDate = date('Y-m-d');
        $sentTodayCount = 0;

        foreach ($subscribers as $subscriber) {
            if (
                isset($subscriber['mail_status']) && $subscriber['mail_status'] == 0 &&
                isset($subscriber['send_on']) && date('Y-m-d', strtotime($subscriber['send_on'])) == $currentDate
            ) {
                $sentTodayCount++;
            }
        }

        $subscribersToSend = array_filter($subscribers, function ($subscriber) use ($currentDate) {
            return !(
                isset($subscriber['mail_status']) && $subscriber['mail_status'] == 0 &&
                isset($subscriber['send_on']) && date('Y-m-d', strtotime($subscriber['send_on'])) == $currentDate
            );
        });

        foreach ($subscribersToSend as $emailData) {
            if ($sentTodayCount >= $dailyLimit) {
                break;
            }

            $email_id = $emailData['email_id'] ?? 'email not available';
            $mailcontent = [
                'message' => $message,
                'name' => $emailData['name']
            ];

            if ($email_id !== 'email not available') {
                $emailSent = $this->email->mapWithContent(1, $mailcontent, true, [$email_id]);

                if ($emailSent) {
                    $currentDateTime = date('Y-m-d H:i:s');
                    $this->Newsletter_Repo->updateById($emailData['id'], [
                        'mail_status' => 1,
                        'mail_send' => 1,
                        'send_on' => $currentDateTime
                    ]);
                    $sentEmails[] = $email_id;
                    $sendDates[] = $currentDateTime;
                    $sentTodayCount++;
                } else {
                    $failedEmails[] = $email_id . ' (Failed to send)';
                }
            } else {
                $failedEmails[] = $email_id;
            }

            $batchCount++;

            if ($batchCount % $batchSize == 0) {
                sleep(1);
            }
        }

        if (!empty($sendDates)) {
            $sameDate = true;
            foreach ($sendDates as $sendDate) {
                if (date('Y-m-d', strtotime($sendDate)) !== $currentDate) {
                    $sameDate = false;
                    break;
                }
            }

            if ($sameDate) {
                foreach ($subscribers as $emailData) {
                    $this->Newsletter_Repo->updateById($emailData['id'], ['mail_send' => 0]);
                }
            }
        }


        if (!empty($sentEmails) || !empty($failedEmails)) {
            return $this->message(200, array_merge($sentEmails, $failedEmails), 'Success');
        } else {
            return $this->message(400, $failedEmails, 'Failed');
        }
    }
}
