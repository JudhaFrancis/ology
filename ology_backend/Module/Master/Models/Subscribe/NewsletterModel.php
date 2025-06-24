<?php

namespace App\Models\Subscribe;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
    private $appConstant;
    private $imageColum;
    public function __construct()
    {
        helper('Core\Helpers\File');
        $this->appConstant = new \Config\AppConstant();
    }
    protected $table      = 'newsletter';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Subscribe\Newsletter';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['email_id', 'mail_status','mail_send','name','send_on','created_at','is_activen'];
    protected $useTimestamps = false;
    protected $allowCallbacks = true;

}
