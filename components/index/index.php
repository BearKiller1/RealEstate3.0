
<?php
    error_reporting(0);
    include_once "../../includes/Lucid.class.php";
    require_once  "../Common.class.php";

    class Index extends Lucid{
        public $response;
        public $request;

        /**
         * This constructor Sets up response request and connection
         */
        public function __construct(){
            $this->common = new Common();
            
            $this->response = array();
            $this->request  = $_REQUEST["data"];
            Parent::__construct();
        }

        public function GetLastProducts(){
            global $method;
            $this->imageSql = "SELECT * FROM files WHERE product_id = ?";
            
            $this->sql = "SELECT  products.id AS product_id,
                            products.*,
                            users.username,
                            users.phone
                    FROM    products 
                    LEFT JOIN files     ON products.id = files.product_id
                    LEFT JOIN users     ON products.user_id = users.id AND users.actived = 1
                    LEFT JOIN `condition` ON products.condition_id = `condition`.id
                    WHERE    products.actived = 1 AND uploaded = 1
                    GROUP BY products.id
                    ORDER BY products.id DESC 
                    LIMIT 4";
                    
            $this->response = Parent::GetData($this->sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                $this->response[$i]['images'] = Parent::GetData($this->imageSql, [$this->response[$i]['product_id']]);
            }
            $method = '';
            $this->response['page'] = $this->common->CreateProductHTML($this->response, COUNT($this->response) - 1, 3);
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

    $method = $_REQUEST["method"];
    $index  = new Index();

    if(method_exists($index , $method)){
        $index->$method();
        $index->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
