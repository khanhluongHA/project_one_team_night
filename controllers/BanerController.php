<?php

class BannerController
{
    public $banner;

    public function __construct(){
        $this->banner = new Banner();
    }

    public function banner(){
        $banner = $this->banner->getAll();
        require_once './views/home.php';
    }
}
