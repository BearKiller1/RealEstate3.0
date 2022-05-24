
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
            $this->sql = "  SELECT      *,
                                        products.id AS 'product_id',
                                        transaction_type.`id` AS 'transaction_type_id',
                                        transaction_type.`name` AS transaction_type_name,
                                        transaction_type.`geo_name` AS transaction_type_geo_name,
                                        building_type.`id` AS 'building_type_id',
                                        building_type.`name` AS building_type_name,
                                        building_type.`geo_name` AS building_type_geo_name,
                                        building_status.`id` AS 'building_status_id',
                                        building_status.`name` AS building_status_name,
                                        building_status.`geo_name` AS building_status_geo_name,
                                        city.`id` AS 'city_id',
                                        city.`name` AS city_name,
                                        city.`geo_name` AS city_geo_name,
                                        districts.`id` AS 'district_id',
                                        districts.`name` AS district_name,
                                        districts.`geo_name` AS district_geo_name,
                                        child_districts.`id` AS 'child_district_id',
                                        child_districts.`name` AS child_district,
                                        child_districts.`geo_name` AS child_district_geo_name,
                                        `condition`.`id` AS 'condition_id',
                                        `condition`.`name` AS condition_name,
                                        `condition`.`geo_name` AS condition_geo_name,
                                        designs.`id` AS 'designs_id',
                                        designs.`name` AS designs_name,
                                        designs.`geo_name` AS designs_geo_name
                            FROM products 
                            LEFT JOIN transaction_type ON products.transaction_type = transaction_type.id
                            LEFT JOIN building_type ON products.building_type = building_type.id
                            LEFT JOIN building_status ON products.building_status = building_status.id
                            LEFT JOIN city ON products.city_id = city.id
                            LEFT JOIN districts ON products.district_id = districts.id
                            LEFT JOIN districts AS child_districts ON products.sub_district_id = child_districts.id
                            LEFT JOIN `condition` ON products.condition_id = `condition`.id
                            LEFT JOIN designs ON products.designs = designs.id
                            WHERE products.id = ?";

            $this->response['data'] = Parent::GetData($this->sql, [$this->prod_id])[0];
            $this->img_sql = "SELECT * FROM files WHERE product_id = ?";
            $this->response['images'] = Parent::GetData($this->img_sql, [$this->prod_id]);
        }

        public function EditProduct(){
            $this->user = $_SESSION['user_id'];
            $this->request['user_id'] = $this->user;
            $this->request['datetime'] = date('Y-m-d H:i:s');
            $this->prod_id = $this->request['id'];
            
            $this->images = $_REQUEST["image"];

            if($this->user > 0){
                if($this->prod_id > 0){
                    $this->sql = "SELECT uploaded FROM products WHERE id = ?";
                    $this->request['uploaded'] = Parent::GetData($this->sql, [$this->prod_id])[0]['uploaded'];
                    
                    Parent::RunQuery("DELETE FROM products WHERE id = '".$this->prod_id."'");
                    Parent::InsertData('products',$this->request, true);
                    Parent::RunQuery("DELETE FROM files WHERE product_id = '".$this->prod_id."'");
                    for ($i=0; $i < COUNT($this->images['path']); $i++) {
                        $this->files['product_id'] = $this->prod_id;
                        $this->files['path'] = $this->images['path'][$i];
                        $this->response['files'] = Parent::InsertData('files',$this->files, false);
                    }
                    $this->response['success'] = 1;
                }
                else{
                    $this->response['success'] =2;
                }
            }
            else{
                $this->response['success'] = $this->user ;
            }
            
            /**
             * @TODO I have to loop the request and update them one by one using array keys to set the column name in database 
             */
            // for ($i=0; $i < COUNT($this->request); $i++) { 
            //     // request[$i]['name']." = '".$this->request[$i]['value']."' WHERE id = '".$this->prod_id."'";
            //     $this->response['result'][$i] = array(
            //                                     array('name' => $this->request[$i]),
            //                                     array('value' => array_keys($this->request)[$i])
            //                                 );
            // }

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
