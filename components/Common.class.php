
<?php
    error_reporting(0);
    include_once "../includes/Lucid.class.php";
    session_start();
    class Common extends Lucid{

        /**
         * This constructor Sets up response request and connection
         */
        public function __construct(){
            $this->langID = $_SESSION['lang_id'];
            $this->response = array();
            $this->request  = $_REQUEST["data"];
            Parent::__construct();
        }

        public function CreateProductHTML($res = [], $count = 0, $incomming = 3){
            $images = '';
            $data   = '';
            $indicator = '';
            $counter = 0;
            if($count == 0){
                $counter = COUNT($res);
            }
            else{
                $counter = $count;
            }
            for ($i=0; $i < $counter; $i++) { 
                
                if($res[$i]['uploaded'] == 0 && $incomming == 2){
                    $uploaded = '
                        <div style="
                                width: 100%;
                                height: 4vh;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid black;
                                margin-top: 2vh;">
                            <span class="label label-danger">Not Uploaded</span> 
                        </div>
                        <div class="col-md-12" style="display:flex; margin-top:25px">
                            <div class="col-md-6">
                                <button class="btn btn-success btn-block" onclick="EditProduct('.$res[$i]['product_id'].')">Edit</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-block" onclick="DeleteProduct('.$res[$i]['product_id'].')">Delete</button>
                            </div>
                        </div>
                        ';
                }
                else if($res[$i]['uploaded'] == 1 && $incomming == 2){
                    $uploaded = '
                        <div style="
                                width: 100%;
                                height: 4vh;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border: 1px solid black;
                                margin-top: 2vh;">
                            <span class="label label-danger">Uploaded</span>
                        </div>
                        <div class="col-md-12" style="display:flex; margin-top:25px">
                            <div class="col-md-6">
                                <button class="btn btn-success btn-block" onclick="EditProduct('.$res[$i]['product_id'].')">Edit</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger btn-block" onclick="DeleteProduct('.$res[$i]['product_id'].')">Delete</button>
                            </div>
                        </div>
                        ';
                }

                if($incomming == 1){
                    $buttons = '<div class="col-md-12" style="display:flex; margin-top:25px">
                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-block" onclick="AcceptProduct('.$res[$i]['product_id'].')">Accept</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-block" onclick="RejectProduct('.$res[$i]['product_id'].')">Reject</button>
                                    </div>
                                </div>';
                }
                $active = "active";
                for ($j=0; $j < COUNT($res[$i]['images']); $j++) { 
    
                    $images .=   '  <div class="carousel-item ' . $active . ' ">
                                        <img class="d-block w-100 rounded" style="height: 250px;" src=" ' .$res[$i]['images'][$j]['path']. ' " alt="">
                                    </div>';
                    $indicator .= '
                            <li class="'.$active.'" data-target="#mycarousel'.$i.'" data-slide-to="'.$j.'"></li>
                    ';
                    $active = '';
                }
                $data .= '
                    <div class="mx-auto col-lg-3 col-md-4 col-sm-6 col-9 mb-5 mt-3 px-3">
                        <div class="card border shadow-sm">
            
                            <div class="card-img-top img-thumbnail">
                            <div class="carousel slide" data-ride="carousel" id="mycarousel'.$i.'">
                                <ol class="carousel-indicators">
                                '.$indicator.'
                                </ol>
                                <div class="carousel-inner">'.
                                    $images
                                .'</div>
                                <a href="#mycarousel'.$i.'" role="button" data-slide="prev" class="carousel-control-prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a href="#mycarousel'.$i.'" role="button" data-slide="next" class="carousel-control-next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>
                            </div>
            
                            <div class="card-body details_roaming" id="' .$res[$i]['product_id']. '" ondblclick="Details('.$res[$i]['product_id'].')">
                                <div class="card-title">
                                    <p class="font-weight-bold">'.$res[$i]["title"].'</p>
                                </div>
                                <div class="card-subtitle mt-4">
                                    <div class="d-block">
                                    <img src="assets/images/house size.png" class="mr-1" style="height: 30px;" alt=""><span class="font-weight-bold">'.$res[$i]['size'].'</span>
                                    <div class="input-group rounded-pill d-inline mx-3">
                                        <a href="#d'.$i.'" class="bg-primary text-white px-1 rounded-circle d-none" onclick="document.getElementById(`price'.$i.'`).innerText/=3.11; document.getElementById(`price'.$i.'`).innerText=Math.round(document.getElementById(`price'.$i.'`).innerText); document.getElementById(`sign'.$i.'`).innerText=`$`; document.getElementById(`d'.$i.'`).className=`bg-primary text-white px-1 rounded-circle d-none`; document.getElementById(`l'.$i.'`).className=`bg-primary text-white px-1 rounded-circle d-inline`" id="d'.$i.'" style="font-size: 12.5px;" role="button">$</a>
                                        <a href="#l'.$i.'" class="bg-primary text-white px-1 rounded-circle" onclick="document.getElementById(`price'.$i.'`).innerText*=3.11; document.getElementById(`price'.$i.'`).innerText=Math.round(document.getElementById(`price'.$i.'`).innerText); document.getElementById(`sign'.$i.'`).innerText=`₾`; document.getElementById(`l'.$i.'`).className=`bg-primary text-white px-1 rounded-circle d-none`; document.getElementById(`d'.$i.'`).className=`bg-primary text-white px-1 rounded-circle d-inline`" id="l'.$i.'" style="font-size: 12.5px;" role="button">₾</a>
                                    </div>
                                    <h5 id="price'.$i.'" class="d-inline">'.$res[$i]['price'].'</h5><span id="sign'.$i.'" class="h5">$</span>
                                    </div>
                                    <div class="d-block my-3">
                                        <img src="assets/images/stairs2.png" class="mr-1" style="height: 20px;" alt=""><span>Floor '.$res[$i]['floor'].'</span>   
                                        <i class="fas fa-door-closed p-1"></i><span>Room '.$res[$i]['number_of_rooms'].'</span>
                                        <i class="fas fa-bed p-1"></i><span>Br '.$res[$i]['bedroom'].'</span>
                                    </div>
                                    <div class="block my-3">
                                        <i class="d-inline fas fa-map-marker-alt p-1 text-danger" style="font-size: 25px;"></i>
                                        <p class="d-inline ">' .$res[$i]['address']. '</p>
                                    </div>
                                    <div class="d-block mt-3"><i class="far fa-clock p-1"></i><p class="d-inline">' .$res[$i]['datetime']. '</p></div>
                                </div>
                                <div>
                                    
                                </div>
                                '.$buttons.'
                                '.$uploaded.'
                            </div>
                        </div>
                    </div>';
                    $images = '';
                    $indicator = '';
                }
            return $data;
        }

        public function SetPages($res){
            $data = '';
            $empty = " '' ";
            for ($i=1; $i < $res + 1; $i++) { 
                $data .= '<li class="page-item"><a class="page-link" href="#" onclick="GetProduct('.$empty.','.$i.')" >'.$i.'</a></li>';
            }
            return $data;
        }

        public function TransactionType(){
            $sql = "SELECT * FROM transaction_type WHERE actived = 1";
            $this->response = Parent::GetData($sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                if($this->langID == 1){
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['geo_name'].'"></option>';
                }else{
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['name'].'"></option>';
                }
            }
        }

        public function BuildingType(){
            $sql = "SELECT * FROM building_type WHERE actived = 1";
            $this->response = Parent::GetData($sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) { 
                if($this->langID == 1){
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['geo_name'].'"></option>';
                }else{
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['name'].'"></option>';
                }
            }
        }

        public function City(){
            $sql = "SELECT * FROM city WHERE actived = 1";
            $this->response = Parent::GetData($sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                if($this->langID == 1){
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['geo_name'].'"></option>';
                }else{
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['name'].'"></option>';
                }
            }
        }

        public function BuildingStatus(){
            $sql = "SELECT * FROM building_status WHERE actived = 1";
            $this->response = Parent::GetData($sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                if($this->langID == 1){
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['geo_name'].'"></option>';
                }else{
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['name'].'"></option>';
                }
            }
        }

        public function District(){
            $sql = "SELECT * FROM districts WHERE parent_id = 0 AND actived = 1";
            $this->response = Parent::GetData($sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                if($this->langID == 1){
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['geo_name'].'"></option>';
                }else{
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['name'].'"></option>';
                }
            }
        }

        public function ChildDistrict(){
            
            $sql = "SELECT * FROM districts WHERE parent_id = " .$this->request['id']. " AND actived = 1";
            $this->response = Parent::GetData($sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                if($this->langID == 1){
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['geo_name'].'"></option>';
                }else{
                    $this->response['page'] .= '<option data_id=" '.$this->response[$i]['id'].' " value="'.$this->response[$i]['name'].'"></option>';
                }
            }
        }

        public function SaveLanguage(){
            $_SESSION['lang_id'] = $this->request['id'];
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

    $method = @$_REQUEST["method"];
    $common = new Common();

    if(method_exists($common , $method)){
        $common->$method();
        $common->GetResult();
    }

?>
