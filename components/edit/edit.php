
<?php
    
    include_once "../../includes/Lucid.class.php";
    require_once  "../Common.class.php";
    session_start();
    class Edit extends Lucid{
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

        public function GetProductInfo(){
            $this->prod_id = $this->request['id'];
            $this->sql = "  SELECT *,
                                        transaction_type.`name` AS transaction_type_name,
                                        building_type.`name` AS building_type_name,
                                        building_status.`name` AS building_status_name,
                                        city.`name` AS city_name,
                                        districts.`name` AS district_name,
                                        child_districts.`name` AS child_district,
                                        `condition`.`name` AS condition_name,
                                        designs.`name` AS designs_name
                            FROM products 
                            LEFT JOIN transaction_type ON products.transaction_type = transaction_type.id
                            LEFT JOIN building_type ON products.building_type = building_type.id
                            LEFT JOIN building_status ON products.building_status = building_status.id
                            LEFT JOIN city ON products.city_id = city.id
                            LEFT JOIN districts ON products.district_id = districts.id
                            LEFT JOIN districts AS child_districts ON products.sub_district_id = child_districts.id
                            LEFT JOIN `condition` ON products.condition_id = `condition`.id
                            LEFT JOIN designs ON products.designs = designs.id
                            WHERE products.id = 114";

            $this->response['data'] = Parent::GetData($this->sql, [])[0];
            $this->img_sql = "SELECT * FROM files WHERE product_id = ?";
            $this->response['images'] = Parent::GetData($this->img_sql, [$this->prod_id]);
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
    $edit    = new Edit();

    if(method_exists($edit , $method)){
        $edit->$method();
        $edit->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
