
<?php
    error_reporting(0);
    session_start();
    include_once "../../includes/Lucid.class.php";
    require_once  "../Common.class.php";
    class Details extends Lucid{
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

        public function AddBookmark(){
            $this->user = $_SESSION['user_id'];
            
            if(!$this->user){
                $this->response['status'] = 3;
                $this->response["message"] = "You must be logged in to bookmark a page";
            }
            else{
                $this->request['user_id'] = $this->user;
                $this->checker = Parent::GetData("SELECT * FROM user_bookmarks WHERE product_id = ? AND user_id = ?", $this->request);
                
                if(COUNT($this->checker) == 0){
                    $this->response['data'] = Parent::InsertData("user_bookmarks",$this->request);
                    $this->response['status'] = 1;
                    $this->response['message'] = "Bookmark Added";
                    $this->response['checker'] = $this->checker;
                }
                else{
                    $this->response['status'] = 2;
                    $this->response['message'] = "Bookmark Removed";
                    Parent::RunQuery("DELETE FROM user_bookmarks WHERE product_id = ".$this->request['product_id']." AND user_id = ".$this->user);
                }
            }
            
        }

        public function GetProdData(){
            $this->imageSql = "SELECT * FROM files WHERE product_id = ?";
            
            $this->sql = "  SELECT  products.id AS product_id,
                                    building_type.name AS building_type_name,
                                    building_status.name AS building_status_name,
                                    condition.name AS condition_name,
                                    transaction_type.name AS transaction_type_name,
                                    designs.name AS design_name,
                                    products.*,
                                    users.username,
                                    users.phone,
                                    users.gender,
                                    users.profile_pic,
                                    users.show_perm,
                                    users.surname
                            FROM    products 
                            LEFT JOIN files     ON products.id = files.product_id
                            LEFT JOIN designs ON products.designs = designs.id AND designs.actived = 1
                            LEFT JOIN users     ON products.user_id = users.id AND users.actived = 1
                            LEFT JOIN building_type ON products.building_type = building_type.id AND building_type.actived = 1
                            LEFT JOIN building_status ON products.building_status = building_type.id AND building_type.actived = 1
                            LEFT JOIN transaction_type ON products.transaction_type = transaction_type.id AND transaction_type.actived = 1
                            LEFT JOIN `condition` ON products.condition_id = `condition`.id
                            WHERE    products.actived = 1 AND products.id = ?
                            GROUP BY products.id
                            ORDER BY products.id DESC ";
                    
            $this->response = Parent::GetData($this->sql, $this->request);

            for ($i=0; $i < COUNT($this->response); $i++) {
                $this->response[$i]['images'] = Parent::GetData($this->imageSql, [$this->response[$i]['product_id']]);
            }

            $this->response['facilities'] = $this->GetFacilities($this->response[0]);

            $this->response['bookmark'] = $this->CheckBookmark();
        }

        public function CheckBookmark(){
            $this->sql = "SELECT * FROM user_bookmarks WHERE user_id = ? AND product_id = ?";
            $this->bookmark = Parent::GetData($this->sql, [$_SESSION['user_id'], $this->request['id']]);
            return COUNT($this->bookmark);
        }

        public function GetFacilities($res = []){
            $this->on       = 'border border-success rounded-pill text-success px-2 py-1 mx-1 d-inline-block my-2';
            $this->off      = 'border border- rounded-pill text- px-2 py-1 mx-1 d-inline-block my-2';
            $this->inline   = 'border border-secondary rounded-pill text-muted px-2 py-1 mx-1 d-inline-block my-2';
            
            $res['bedroom'] > 0 ? $res['bedroomC'] = $this->on : $res['bedroomC'] = $this->off;
            $res['ceiling_height'] > 0 ? $res['ceiling_heightC'] = $this->on : $res['ceiling_heightC'] = $this->off;
            $res['balcony'] > 0 ? $res['balconyC'] = $this->on : $res['balconyC'] = $this->off;
            $res['veranda'] > 0 ? $res['verandaC'] = $this->on : $res['verandaC'] = $this->off;
            $res['loggia']  > 0 ? $res['loggiaC']  = $this->on : $res['loggiaC']  = $this->off;
            $res['veranda'] > 0 ? $res['verandaC'] = $this->on : $res['verandaC'] = $this->off;
            $res['bathroom'] > 0 ? $res['bathroomC'] = $this->on : $res['bathroomC'] = $this->off;
            $res['heating'] > 0 ? $res['heatingC'] = $this->on : $res['heatingC'] = $this->off;
            $res['parking'] > 0 ? $res['parkingC'] = $this->on : $res['parkingC'] = $this->off;
            $res['storeroom'] > 0 ? $res['storeroomC'] = $this->on : $res['storeroomC'] = $this->off;
            $res['hot_water'] > 0 ? $res['hot_waterC'] = $this->on : $res['hot_waterC'] = $this->off;
            $res['gas'] > 0 ? $res['gasC'] = $this->on : $res['gasC'] = $this->off;
            $res['internet'] > 0 ? $res['internetC'] = $this->on : $res['internetC'] = $this->off;
            $res['fireplace'] > 0 ? $res['fireplaceC'] = $this->on : $res['fireplaceC'] = $this->off;
            $res['furniture'] > 0 ? $res['furnitureC'] = $this->on : $res['furnitureC'] = $this->off;
            $res['passenger_elevator'] > 0 ? $res['passenger_elevatorC'] = $this->on : $res['passenger_elevatorC'] = $this->off;
            $res['service_elevator'] > 0 ? $res['service_elevatorC'] = $this->on : $res['service_elevatorC'] = $this->off;
            $res['telephone'] > 0 ? $res['telephoneC'] = $this->on : $res['telephoneC'] = $this->off;
            $res['television'] > 0 ? $res['televisionC'] = $this->on : $res['televisionC'] = $this->off;
            $res['air_conditioner'] > 0 ? $res['air_conditionerC'] = $this->on : $res['air_conditionerC'] = $this->off;
            
            if($res['designs'] == 0){
                $res['designsC'] = $this->inline;
                $res['design_name'] = '<s>Design</s>';
            }
            else{
                $res['designsC'] = $this->on;
            }

            if($res['condition_id'] == 0){
                $res['conditionC'] = $this->inline;
                $res['condition_name'] = '<s>Condition</s>';
            }
            else{
                $res['conditionC'] = $this->on;
            }

            $this->html = '
                    <h5 class="d-block">facilities</h5>
                    <span class=" '.$res['conditionC'].'      "> '.$res['condition_name'].' </span>
                    <span class=" '.$res['designsC'].'           ">'.$res['design_name'].'</span>
                    <span class=" '.$res['ceiling_heightC']. '   ">Ceiling height '.$res['ceiling_height']. ' M</span>
                    <span class=" '.$res['bedroomC']. '         ">Bedroom '.$res['bedroom'].'</span>
                    <span class=" '.$this->on . '               ">Adapted to PSN</span>
                    <span class=" '.$res['balconyC'].'          ">Balcony</span>
                    <span class=" '.$res['verandaC']. '         ">Veranda</span>
                    <span class=" '.$res['loggiaC']. '          ">Loggia</span>
                    <span class=" '.$res['bathroomC']. '        ">Bathrooms '.$res['bathroom'].'</span>
                    <span class=" '.$res['heatingC']. '         ">Heating</span>
                    <span class=" '.$res['parkingC']. '         ">Parking</span>
                    <span class=" '.$res['storeroomC']. '       ">Storeroom</span>
                    <span class=" '.$res['hot_waterC']. '       ">Hot water</span>
                    <span class=" '.$res['gasC']. '              ">Gas</span>
                    <span class=" '.$res['internetC']. '         ">Internet</span>
                    <span class=" '.$res['fireplaceC']. '        ">Fireplace</span>
                    <span class=" '.$res['furnitureC']. '        ">Furniture</span>
                    <span class=" '.$res['passenger_elevatorC'].'">Passenger elevator</span>
                    <span class=" '.$res['service_elevatorC']. ' ">Service elevator</span>
                    <span class=" '.$res['telephoneC']. '        ">Telephone</span>
                    <span class=" '.$res['televisionC']. '       ">Television</span>
                    <span class=" '.$res['air_conditionerC']. '  ">Air conditioner</span>
            ';
            return $this->html;
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
    $details    = new Details();

    if(method_exists($details , $method)){
        $details->$method();
        $details->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
