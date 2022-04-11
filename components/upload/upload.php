
<?php
    error_reporting(0);
    session_start();
    include_once "../../includes/Lucid.class.php";

    class Upload extends Lucid{
        /**
         * This constructor Sets up response request and connection
         */
        public function __construct(){
            $this->user     = $_SESSION['user_id'];
            $this->response = array();
            $this->request  = $_REQUEST["data"];
            Parent::__construct();
        }

        public function UploadProduct(){
            $this->request['user_id'] = $this->user;
            $this->request['datetime'] = date('Y-m-d H:i:s');

            $this->images = $_REQUEST["image"];

            if($this->user > 0){
                $this->prod_id = Parent::InsertData('products',$this->request, true);
                if($this->prod_id > 0){
                    for ($i=0; $i < COUNT($this->images['path']); $i++) {
                        $this->files['product_id'] = $this->prod_id;
                        $this->files['path'] = $this->images['path'][$i];
                        $this->response['files'] = Parent::InsertData('files',$this->files, false);
                    }
                    $this->response['success'] = 1;
                }
                else{
                    $this->response['success'] = 0;
                }
            }
            else{
                $this->response['success'] = 0;
            }
            
        }

        public function DeleteFile(){
            if(file_exists('../../'.$this->request['src'])){
                unlink('../../'.$this->request['src']);
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
    $upload    = new Upload();

    if(method_exists($upload , $method)){
        $upload->$method();
        $upload->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
