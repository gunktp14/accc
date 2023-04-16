<?php

class model{
    private $dns;
    private $dbUser;
    private $dbPass;
    public $condb;

    function __construct(object $conf){
        $this->dns = $conf->dns;
        $this->dbUser = $conf->dbUser;
        $this->dbPass = $conf->dbPass;
        $this->connect();
    }

    public function connect(){
        try{
            $this->condb = new PDO($this->dns,$this->dbUser,$this->dbPass);
        }catch(PDOException $err){
            echo "<br>Have an error about : " . $err->getMessage();
            echo "<br>Have error in line : ". $err->getLine();
        }
    }

    public function register($firstname,$lastname,$username,$upassword,$email,$urole){
        $sql = "INSERT INTO `user_tb` (`id` , `firstname` , `lastname` , `username` , `upassword` ,`email` ,`urole`)
        VALUES ('',:firstname,:lastname,:username,:upassword,:email,:urole)";
        $query = $this->condb->prepare($sql);
        $query->bindParam(":firstname",$firstname);
        $query->bindParam(":lastname",$lastname);
        $query->bindParam(":username",$username);
        $query->bindParam(":upassword",$upassword);
        $query->bindParam(":email",$email);
        $query->bindParam(":urole",$urole);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }

        
    }

}

?>