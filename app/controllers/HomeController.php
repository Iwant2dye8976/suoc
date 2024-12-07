<?php
require_once APP_ROOT.'/app/services/NewsService.php';
    class HomeController {
        public function index(){
            $ns = new NewsService();
            $news = $ns->getAllNews();
            $categories = $ns->getAllCategories();
            include APP_ROOT."/app/views/home/index.php";
        }
    }
?>