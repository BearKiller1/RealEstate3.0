
<?php
    include_once "../../includes/Lucid.class.php";
    error_reporting(0);
    class Examples extends Lucid{
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

        public function AddData(){
            $this->response = parent::InsertData("users", $this->request);
        }
        
        public function GetUsers(){
            $sql = "SELECT * FROM users WHERE id = ? AND name = ? AND email = 'dachi@' ";
            $this->response['data'] = Parent::GetData($sql, $this->request);
        }
        
        public function SetQuery(){
            $sql = "SELECT * FROM users WHERE id = 27";
            $this->response = parent::RunQuery($sql);
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
    $examples    = new Examples();

    if(method_exists($examples , $method)){
        $examples->$method();
        $examples->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
