<?php
include_once './src/config/config.php';
include_once './src/models/model.php';

session_start();

class controll{

    private $model;
    private $config;
    
    function __construct(){
        $this->config = new config();
        $this->model = new model($this->config);
    }

    public function loginPage(){
        include_once 'src/views/signinPage.php';
    }

    public function registerPage(){
        include_once 'src/views/registerPage.php';
    }

    public function insertAccountControll(){
        session_unset();
        if($_POST['submit_Signup']){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $upassword = $_POST['upassword'];
            $cpassword = $_POST['cpassword'];
            $email = $_POST['email'];
            $urole = "user";

            if(!empty($firstname)){
                if(preg_match('/^[a-zA-Z]+$/', $firstname)){
                    if(strlen($firstname) >= 5 && strlen($firstname) <= 20){

                        if(!empty($lastname)){
                            if(preg_match('/^[a-zA-Z]+$/', $lastname)){
                                if(strlen($lastname) >= 5 && strlen($lastname) <= 20){


                                    if(!empty($username)){
                                        if(preg_match('/^[a-zA-Z0-9]+$/', $username)){
                                            if(strlen($username) >= 5 && strlen($username) <= 20){
                                                

                                                if(!empty($upassword)){
                                                    if(preg_match('/^[a-zA-Z0-9]+$/', $upassword)){
                                                        if(strlen($upassword) >= 5 && strlen($upassword) <= 50){


                                                            if(!empty($email)){
                                                                if(filter_var($email,FILTER_VALIDATE_EMAIL)){

                                                                    if(!isset($_SESSION['error'])){
                                                                        $status = $this->model->register($firstname,$lastname,$username,$upassword,$email,$urole);
                                                                        if($status){

                                                                        }else {
                                                                            $_SESSION['error'] = "เกิดข้อผิดพลาดในการ สมัครสมาชิกของคุณโปรลองอีกครั้ง";
                                                                            include_once './src/views/registerPage.php';
                                                                        }
                                                                        
                                                                    }else {
                                                                        
                                                                        $_SESSION['error'] = "เกิดข้อผิดพลาดในการ สมัครสมาชิกของคุณโปรลองอีกครั้ง";
                                                                        include_once './src/views/registerPage.php';
                                                                    }
                                                                }else {
                                                                    
                                                                    $_SESSION['error'] = "กรุณากรอก email ให้ถูกต้อง";
                                                                    include_once './src/views/registerPage.php';
                                                                }
                                                            }else {
                                                                
                                                                $_SESSION['error'] = "กรุณากรอก email ของคุณ";
                                                                include_once './src/views/registerPage.php';
                                                            }
                                                            

                                                        }else {
                                                            
                                                            $_SESSION['error'] = "password ของคุณต้องมีตัวอักษรระหว่าง 5 - 50";
                                                            include_once './src/views/registerPage.php';
                                                        }
                                                    }else {
                                                        
                                                        $_SESSION['error'] = "กรุณากรอก password ให้ถูกต้อง";
                                                        include_once './src/views/registerPage.php';
                                                    }
                                                }else {
                                                    $_SESSION['error'] = "กรุณากรอก password ของคุณ";
                                                    include_once './src/views/registerPage.php';
                                                }


                                            }else {
                                                
                                                $_SESSION['error'] = "username ของคุณต้องมีตัวอักษรอยู่ระหว่าง 5 - 20";
                                                include_once './src/views/registerPage.php';
                                            }
                                        }else {
                                            
                                            $_SESSION['error'] = "กรุณากรอก username ให้ถูกต้อง";
                                            include_once './src/views/registerPage.php';
                                        }
                                    }else {
                                        
                                        $_SESSION['error'] = "กรุณากรอก username ของคุณ";
                                        include_once './src/views/registerPage.php';
                                    }


                                    
                                }else {
                                    
                                    $_SESSION['error'] = "lastname ของคุณต้องมีตัวอักษรอยู่ระหว่าง 5 - 20";
                                    include_once './src/views/registerPage.php';
                                }
                            }else {
                                
                                $_SESSION['error'] = "กรุณากรอก lastname ให้ถูกต้อง";
                                include_once './src/views/registerPage.php';
                            }
                        }else {
                            
                            $_SESSION['error'] = "กรุณากรอก lastname ของคุณ";
                            include_once './src/views/registerPage.php';
                        }


                    }else {
                        
                        $_SESSION['error'] = "firstname ของคุณต้องมีตัวอักษรอยู่ระหว่าง 5 - 20";
                        include_once './src/views/registerPage.php';
                    }
                }else {
                    
                    $_SESSION['error'] = "กรุณากรอก firstname ให้ถูกต้อง";
                    include_once './src/views/registerPage.php';
                }
            }else {
                
                $_SESSION['error'] = "กรุณากรอก firstname ของคุณ";
                include_once './src/views/registerPage.php';
            }
            

        }else {
            echo "Please";
        }


    }

    public function uploadImage(){
        $targetDir = './src/public/images/';

        if(isset($_POST['submit'])){
            if(!empty($_FILES['file']['name'])){
                $fileName = basename($_FILES['file']['name']);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
                $fileSize = $_FILES['file']['size'];
                    
                $allowType = array("jpg","png","gif","jpeg");   
                if(in_array($fileType,$allowType)){
                    if($fileSize < 5242880){
                        if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFilePath)){
                            $_SESSION['success'] = "You image has been uploaded.";
                            
                        }else {
                            $_SESSION['error'] = "Have an error about uploading please try again!";
                        }
                    }else {
                        $_SESSION['error'] = "You image must not exceed 5 mb!";
                    }
                }else {
                    $_SESSION['error'] = "Please select : JPG , PNG , JPEG , GIF !";
                }
            }else {
                $_SESSION['error'] = "Please select you image before submited!";
            }
        }else {
            header('localhost: ./src/index.php');
        }
    }

    public function mvcHandler(){
        $route = isset($_GET['route']) ? $_GET['route'] : NULL ;
        switch($route){
            case"loginPage":
                $this->loginPage();
            break;

            case"sign_up":
                $this->insertAccountControll();
            break;

            default:
                $this->registerPage();
            break;
        }

    }

}

?>