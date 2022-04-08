<?php
    include "../../router.php";
    $data = array();
    $method     = $_REQUEST["method"];

    if($method == "CreateComponent"){
        $pagename   = $_REQUEST["name"];
        $group      = $_REQUEST['group'];

        if($group != ''){
            $path = "../".$group;
        }
        else{
            $path = '../'.$pagename;
        }

        if($group != "" && file_exists($path ."/". $pagename)){
            $data =  "Components Already Exists group";
        }
        else if(file_exists($path) && $group == ""){
            $data =  "Components Already Exists";
        }
        else{
            if($group != ""){
                if(!file_exists($path)){
                    mkdir($path);
                }
                mkdir($path ."/". $pagename);
                $path = $path ."/". $pagename;

                $html   = fopen($path ."/". $pagename. ".html"  ,   "w");
                $css    = fopen($path ."/". $pagename. ".css"   ,   "w");
                $js     = fopen($path ."/". $pagename. ".js"    ,   "w");
                $php    = fopen($path ."/". $pagename. ".php"   ,   "w");
            }
            else{
                mkdir($path);
                $html   = fopen($path."/".$pagename. ".html"  ,   "w");
                $css    = fopen($path."/".$pagename. ".css"   ,   "w");
                $js     = fopen($path."/".$pagename. ".js"    ,   "w");
                $php    = fopen($path."/".$pagename. ".php"   ,   "w");
            }

            fwrite($html, 
            '<section style="text-align: center;">
                <h1>'.$pagename.' Works!</h1>
            </section>');
            CreatePHPClass($php,$pagename);
            $data =  "Component Created";
        }
    }
    echo json_encode($data);


function CreatePHPClass($php,$pagename){
    $class_name = $pagename;
    $class_name[0] = strtoupper($class_name[0]);

    $group      = $_REQUEST['group'];

    if($group != ''){
        $requires = '
    include_once "../../../includes/Lucid.class.php";
    require_once  "../Common.class.php";';
    }
    else{
        $requires = '
    include_once "../../includes/Lucid.class.php";
    require_once  "../Common.class.php";';
    }
$class_string = '
<?php
    ' .$requires. '
    session_start();
    class ' .$class_name. ' extends Lucid{
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
    $' .$pagename. '    = new ' .$class_name. '();

    if(method_exists($' .$pagename. ' , $method)){
        $' .$pagename. '->$method();
        $' .$pagename. '->GetResult();
    }
    else{
        echo "Method Not Found";
    }

?>
';
    fwrite($php, $class_string);
}
?>

<!-- Make table of the page where u save component name visual name and routing togller -->