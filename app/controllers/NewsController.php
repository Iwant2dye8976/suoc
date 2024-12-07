<?php
require_once APP_ROOT."/app/services/NewsService.php";
    class NewsController {
        public function index(){
            $ns = new NewsService();
            $news = $ns->getAllNews();
            $categories = $ns->getAllCategories();
            include APP_ROOT."/app/views/home/index.php";
        }

        public function detail(){
            if(isset($_GET['id'])){
                $ns = new NewsService();
                $detail = $ns->getById($_GET['id']);
                include APP_ROOT."/app/views/news/detail.php";
            }
        }

        public function category(){
            if(isset($_GET['category_id'])){
                $ns = new NewsService();
                $categories = $ns->getAllCategories();
                $news = $ns->getByCategory($_GET['category_id']);
                include APP_ROOT."/app/views/home/index.php";
            }
        }
    }
?>