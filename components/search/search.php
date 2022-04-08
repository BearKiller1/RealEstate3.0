
<?php
    
    include_once "../../includes/Lucid.class.php";

    class Search extends Lucid{
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
    $search    = new Search();

    if(method_exists($search , $method)){
        $search->$method();
        $search->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
