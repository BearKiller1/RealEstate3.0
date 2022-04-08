
<?php
    
    include_once "../../includes/Lucid.class.php
    require_once  "../Common.class.php";";

    class Contact extends Lucid{
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
    $contact    = new Contact();

    if(method_exists($contact , $method)){
        $contact->$method();
        $contact->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
