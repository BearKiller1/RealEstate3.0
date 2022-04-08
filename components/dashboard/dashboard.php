
<?php
    session_start();
    include_once "../../includes/Lucid.class.php";
    require_once  "../Common.class.php";

    class Dashboard extends Lucid{
        public $response;
        public $request;

        /**
         * This constructor Sets up response request and connection
         */
        public function __construct(){
            $this->user = $_SESSION['user_id'];
            $this->common   = new Common();

            $this->response = array();
            $this->request  = $_REQUEST["data"];
            Parent::__construct();
        }

        public function GetUserInfo(){

            if($this->user > 0){
                $this->response = Parent::GetData("SELECT * FROM users WHERE id = ?", array($this->user));
            }
            else{
                $this->response['error'] = 'User not found';
            }
        }

        public function EditPassword(){
            Parent::RunQuery("UPDATE users SET password = '".$this->request['password']."' WHERE id = ".$this->user);
        }

        public function EditPhoto(){
            global $conn;

            $pfp        = $_REQUEST['image'];
            $user_id    = $_SESSION['user_id'];
            
            $conn->query("UPDATE users SET profile_pic = '$pfp[0]' WHERE id = '$user_id'");
        }

        public function GetMyProduct(){
            global $method;
            $this->imageSql = "SELECT * FROM files WHERE product_id = ?";
            
            $this->sql = "  SELECT  products.id AS product_id,
                                    products.*,
                                    users.username,
                                    users.phone
                            FROM    products 
                            LEFT JOIN files     ON products.id = files.product_id
                            LEFT JOIN users     ON products.user_id = users.id AND users.actived = 1
                            LEFT JOIN `condition` ON products.condition_id = `condition`.id
                            WHERE    products.actived = 1 AND products.user_id = '".$this->user."'
                            GROUP BY products.id
                            ORDER BY products.id DESC ";
                    
            $this->response = Parent::GetData($this->sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                $this->response[$i]['images'] = Parent::GetData($this->imageSql, [$this->response[$i]['product_id']]);
            }
            $method = '';
            $this->response['count'] = COUNT($this->response);
            if($this->response['count'] == 0){
                $this->response['error'] = 'No products found';
            }
            else{
                $this->response['page'] = $this->common->CreateProductHTML($this->response, COUNT($this->response) - 1);
            }
        }

        public function GetMyBookmarks(){
            global $method;
            $this->imageSql = "SELECT * FROM files WHERE product_id = ?";
            
            $this->bookmarks = Parent::GetData("SELECT * FROM user_bookmarks WHERE user_id = ".$this->user, []);
            for($i=0; $i < COUNT($this->bookmarks); $i++){
                if($i+1 == COUNT($this->bookmarks)){
                    $this->ids .= $this->bookmarks[$i]['product_id'];
                }
                else{
                    $this->ids .= $this->bookmarks[$i]['product_id'].',';
                }
            }
            
            $this->sql = "  SELECT  products.id AS product_id,
                                    products.*,
                                    users.username,
                                    users.phone
                            FROM    products 
                            LEFT JOIN files     ON products.id = files.product_id
                            LEFT JOIN users     ON products.user_id = users.id AND users.actived = 1
                            LEFT JOIN `condition` ON products.condition_id = `condition`.id
                            WHERE    products.actived = 1 AND products.user_id = '".$this->user."' AND products.id IN (".$this->ids.")
                            GROUP BY products.id
                            ORDER BY products.id DESC ";
                    
            $this->response = Parent::GetData($this->sql, []);
            
            for ($i=0; $i < COUNT($this->response); $i++) {
                $this->response[$i]['images'] = Parent::GetData($this->imageSql, [$this->response[$i]['product_id']]);
            }
            $method = '';
            $this->response['count'] = COUNT($this->response);

            if($this->response['count'] == 0){
                $this->response['error'] = 'No products found';
            }
            else{
                $this->response['page'] = $this->common->CreateProductHTML($this->response, COUNT($this->response) - 1);
            }
        }
        
        public function logout(){
            unset($_SESSION['user_id']);
            session_destroy();
        }

        public function EditUserInfo(){
            Parent::RunQuery("  UPDATE users 
                                SET username    = '".$this->request['username'] ."', 
                                    phone       = '".$this->request['phone']    ."',
                                    email       = '".$this->request['email']    ."',
                                    surname     = '".$this->request['last_name']."',
                                    gender      = '".$this->request['gender']   ."',
                                    show_perm   = '".$this->request['show_perm']."'
                                WHERE id   = ".$this->user);
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
    $dashboard    = new Dashboard();

    if(method_exists($dashboard , $method)){
        $dashboard->$method();
        $dashboard->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>