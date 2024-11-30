<?php 

class BanNerController
{
    public $ban;
    
    public function __construct(){
        $this->ban = new Banner();
    }
    
    public function banner() {
        $ban=$this->ban->all();
        // var_dump($product);die;
            require_once './views/home.php';
            
        }
}