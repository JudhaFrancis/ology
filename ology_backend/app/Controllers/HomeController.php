<?php

namespace Core\Controllers;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->initializeFunction();

    }
    public function index()
    {
        return view('include/header')
            . view('pages/home')
            . view('include/footer');
    }
    public function about()
    {
        return view('include/header')
            . view('pages/about')
            . view('include/footer');
    }
    
    public function workshop()
    {
        return view('include/header')
            . view('pages/workshop')
            . view('include/footer');
    }
    public function contact()
    {
        return view('include/header')
            . view('pages/contact')
            . view('include/footer');
    }
    public function common_login()
    {
        return view('include/header')
            . view('pages/common-login')
            . view('include/footer');
    }
    public function admin_dashboard()
    {
        return view('include/header')
            . view('pages/admin-dashboard')
            . view('include/footer');
    }
    public function admin_login()
    {
        return view('include/header')
        . view('pages/admin_login')
        . view('include/footer');
    }
    public function calendar()
    {
        return view('include/header')
        . view('pages/calendar')
        . view('include/footer');
    }
    public function career()
    {
        return view('include/header')
        . view('pages/career')
        . view('include/footer');
    }
    public function dashboard()
    {
        return view('include/header')
        . view('pages/dashboard')
        . view('include/footer');
    }
    public function girlskeepusgoing()
    {
        return view('include/header')
        . view('pages/girlskeepusgoing')
        . view('include/footer');
    }
    public function notice_board()
    {
        return view('include/header')
        . view('pages/notice-board')
        . view('include/footer');
    }
    public function ourstory()
    {
        return view('include/header')
        . view('pages/ourstory')
        . view('include/footer');
    }
    public function payment()
    {
        return view('include/header')
        . view('pages/payment')
        . view('include/footer');
    }
    public function signin()
    {
        return view('include/header')
        . view('pages/signin')
        . view('include/footer');
    }
    public function signup()
    {
        return view('include/header')
        . view('pages/ourstory')
        . view('include/footer');
    }
    public function terms_condition()
    {
        return view('include/header')
        . view('pages/terms_condition')
        . view('include/footer');
    }
    public function user_dashboard()
    {
        return view('include/header')
        . view('pages/user-dashboard')
        . view('include/footer');
    }
    public function login_view()
    {
        return view('include/header')
        . view('pages/login_view')
        . view('include/footer');
    }
    public function success()
    {
        return view('include/header')
            . view('pages/success')
            . view('include/footer');
    }
    public function event()
    {
        return view('include/header')
            . view('pages/event')
            . view('include/footer');
    }
    public function logout()
    {

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        session_destroy();
        return view('include/header')
            . view('pages/home')
            . view('include/footer');
    }
}
