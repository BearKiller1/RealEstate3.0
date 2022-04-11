
<?php
    error_reporting(0);
    include_once "../../../includes/Lucid.class.php";
    session_start();
    class Register extends Lucid{
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

        public function Register(){

            $this->request['password'] = md5($this->request['password']);
             
            $this->response = Parent::GetData("SELECT * FROM users WHERE email = ?", $this->request['email']);

            if(!empty($this->response)){
                $result['data'] = "Email already exists";
                $result['status'] = 3;
            }else{
                $this->response['id'] = Parent::InsertData("users", $this->request, true);
                $this->response['data'] = "Register Successful";
                $this->response['status'] = 1;
                // Save User to session
                
                $_SESSION['user_id']  = $this->response['id'];
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
    $register    = new Register();

    if(method_exists($register , $method)){
        $register->$method();
        $register->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
