<?php

class DashboardController {
    public function index() {
        require_once "./views/dashboard.php";
    }
    public function login(){
       
        require_once './views/login.php';
    }
    public function logout(){
       
        require_once './views/logout.php';
    } public function register(){
       
        require_once './views/register.php';
    }
    public function forgot_password(){
       
        require_once './views/forgot_password.php';
    }
    public function edit_profile(){
       
        require_once './views/edit_profile.php';
    }
    public function reset_password(){
       
        require_once './views/reset_password.php';
    }
}

