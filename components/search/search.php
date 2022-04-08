
<?php
    
    include_once "../../includes/Lucid.class.php";
    require_once  "../Common.class.php";

    class Search extends Lucid{
        public $response;
        public $request;

        /**
         * This constructor Sets up response request and connection
         */
        public function __construct(){
            $this->common = new Common();

            $this->response = array();
            $this->request  = $_REQUEST["data"];
            $this->priceFilter;
            $this->areaFilter;
            $this->titleFilter;
            Parent::__construct();
        }

        public function GetProduct(){
            $this->FilterBuilder();

            $this->imageSql = "SELECT * FROM files WHERE product_id = ?";

            $this->sql = "  SELECT  products.id AS product_id,
                                    products.*,
                                    users.username,
                                    users.phone 
                            FROM products 
                            LEFT JOIN files     ON products.id = files.product_id
                            LEFT JOIN users     ON products.user_id = users.id AND users.actived = 1
                            LEFT JOIN `condition` ON products.condition_id = `condition`.id
                            WHERE products.actived = 1 
                            ".$this->priceFilter." 
                            ".$this->areaFilter." 
                            ".$this->titleFilter." 
                            ".$this->transactionFilter." 
                            ".$this->buildingFilter."
                            ".$this->building_statusFilter."
                            ".$this->districtFilter ."
                            ".$this->child_districtFilter."
                            GROUP BY products.id
                            ".$this->request['sorting'];

            $this->response = Parent::GetData($this->sql, []);

            for ($i=0; $i < COUNT($this->response); $i++) {
                $this->response[$i]['images'] = Parent::GetData($this->imageSql, [$this->response[$i]['product_id']]);
            }
            $method = '';
            $this->response['page'] = $this->common->CreateProductHTML($this->response);
        }

        public function FilterBuilder(){
            
            $this->min = $this->request['min_price'];
            $this->max = $this->request['max_price'];

            if($this->min != ''){
                $this->priceFilter = " AND price >= ".$this->min;
            }
            if($this->max != ''){
                $this->priceFilter .= " AND price <= ".$this->max;
            }

            $this->min = $this->request['min_area'];
            $this->max = $this->request['max_area'];
            
            if($this->min != ''){
                $this->areaFilter = " AND area >= ".$this->min;
            }
            if($this->max != ''){
                $this->areaFilter .= " AND area <= ".$this->max;
            }

            $title = $this->request['title'];

            if($title != ''){
                $this->titleFilter = " 
                    AND title LIKE '%".$title."%' OR title LIKE '% ".$title." ' OR title LIKE '".$title."%'
                OR  description_en LIKE '%".$title."%' OR description_en LIKE '% ".$title." ' OR description_en LIKE '".$title."%'
                OR  address LIKE '%".$title."%' OR address LIKE '% ".$title." ' OR address LIKE '".$title."%'
                OR  description LIKE '%".$title."%' OR description LIKE '% ".$title." ' OR description LIKE '".$title."%'    
                ";
            }

            $this->transaction = $this->request['transaction'];
            $this->building_type = $this->request['building_type'];
            $this->building_status = $this->request['building_status'];
            $this->district = $this->request['district'];
            $this->child_district = $this->request['child_district'];

            if($this->transaction  != 0 && $this->transaction != ''){
                $this->transactionFilter = " AND transaction_type = ".$this->transaction;
            }
            if($this->building_type  != 0 && $this->building_type != ''){
                $this->buildingFilter = " AND building_type = ".$this->building_type;
            }
            if($this->building_status != 0 && $this->building_status != ''){
                $this->building_statusFilter = " AND building_status_id = ".$this->building_status;
            }
            if($this->district != 0 && $this->district != ''){
                $this->districtFilter = " AND district_id = ".$this->district;
            }
            if($this->child_district != 0 && $this->child_district != ''){
                $this->child_districtFilter = " AND type_id = ".$this->child_district;
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
    $search    = new Search();

    if(method_exists($search , $method)){
        $search->$method();
        $search->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
