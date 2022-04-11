<?php
    error_reporting(0);
    session_start();
    include "Lucid.class.php";
    /**
     * @todo Add page in database
     */
    class Router extends Lucid{

        public function __construct(){
            $this->user     = $_SESSION['user_id'];
            
            $this->response = array();
            $this->request  = $_REQUEST['data'];
            $this->page;
        }

        /**
         * @todo If we have user id in session dont let him go to the login page
         * @todo If we dont have user id in session and hewants to go to the dashboard dont let him to do so
         */
        public function GetPage(){
            

            $this->page = $this->request['page'];
            
            if($this->request['group']){
                $this->group = $this->request['group'];
                if(file_exists("../components/".$this->group."/".$this->page."/".$this->page.".html"))
                    $this->response['page'] = file_get_contents("../components/".$this->group."/".$this->page."/".$this->page.".html");
                else
                    $this->response['page'] = file_get_contents("../components/error.html");
            }
            else{
                if(file_exists("../components/".$this->page."/".$this->page.".html"))
                    $this->response['page'] = file_get_contents("../components/".$this->page."/".$this->page.".html");
                else
                    $this->response['page'] = file_get_contents("../components/error.html");
            }

            $this->response['page'] .= $this->GetPageUrl();

            if($this->user > 0)
                $this->response['permission'] = 1;
            else
                $this->response['permission'] = 0;
        }

        public function GetPageUrl(){

            if($this->request['group'])
                $path = "components/".$this->group."/".$this->page."/".$this->page;
            else
                $path = "components/".$this->page."/".$this->page;

            $url = '<div class="url">
                        <script src="'.$path.'.js"></script>
                        <link rel="stylesheet" href="'.$path.'.css">
                    </div>';
            return $url;
        }

        public function GetResult(){
            echo json_encode($this->response);
        }

    }

    $method = $_REQUEST["method"];
    $router = new Router();

    if(method_exists($router , $method)){
        $router->$method();
        $router->GetResult();
    }
    else{
        echo "Method Not Found";
    }
?>