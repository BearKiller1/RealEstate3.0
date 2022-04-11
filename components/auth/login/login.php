
<?php
    session_start();
    include_once "../../../includes/Lucid.class.php";
    error_reporting(0);
    class Login extends Lucid{
        public $response;
        public $request;

        /**
         * This constructor Sets up response request and connection
         */
        public function __construct(){
            $this->response = array();
            $this->request  = $_REQUEST["data"];
            Parent::__construct();
        }

        public function Login(){

            $this->request['password'] = md5($this->request['password']);

            $sql = "SELECT * 
                    FROM `users` 
                    WHERE `email` = ? AND `password` = ?";

            $this->response = Parent::GetData($sql, $this->request);
            if(COUNT($this->response) > 0){
                $_SESSION['user_id'] = $this->response[0]['id'];
                $this->response['status'] = 1;
            }
            else{
                $this->response['status'] = 0;
            }
        }

        /**
         * This function returnt the response of this php file
         */
        public function GetResult(){
            echo json_encode($this->response);
        }

        public function __destruct(){
        }
    }

    $method     = $_REQUEST["method"];
    $login    = new Login();

    if(method_exists($login , $method)){
        $login->$method();
        $login->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
