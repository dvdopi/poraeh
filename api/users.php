<?php
class user {
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products

function getUser($request) {

    $emp = json_decode($request);

    try {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        
       $stmt = $this->conn->prepare( $sql );
       $stmt->bindParam("email", $emp->email);
       $stmt->execute();
       $emp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
       echo json_encode($emp);

    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function addUser($request) {
  
    $emp = json_decode($request);
    $amt =100;
      

    $sql = "INSERT INTO users (first_name, last_name, email, mobile, amount ) VALUES (:fname, :lname, :email, :mobile, :amount)";

    try {
        $stmt =  $this->conn->prepare($sql);
        $stmt->bindParam("fname", $emp->fname);
        $stmt->bindParam("lname", $emp->lname);
        $stmt->bindParam("email", $emp->myemail);
        $stmt->bindParam("mobile", $emp->mobile);
        $stmt->bindParam("amount", $amt);
        $stmt->execute();
        $emp->id =  $this->conn->lastInsertId();
        $db = null;
        echo json_encode('data successfully added to db');
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

public function Login($request) {
    $success = false;
    $emp = json_decode($request);
    
    try{

       $sql = "SELECT * FROM users WHERE email = :email AND mobile = :mobile LIMIT 1";
        
       $stmt = $this->conn->prepare( $sql );
       $stmt->bindParam("email", $emp->email);
       $stmt->bindParam("mobile", $emp->mobile);
       $stmt->execute();

       $valid = $stmt->fetchColumn();
       $db = null;

       if( $valid ) {
    //    $success = true;
    //    session_start();


    //    session_regenerate_id();
    //    $_SESSION['user'] =$emp->email;
    //    session_write_close();
       echo ('Login');
       exit();

       }else{
           echo 'Login failed';
       }

    }catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function sendSms(){
    
    return '123456';

}

function verify($request){
    $emp = json_decode($request);
    
  $code= $emp->code;

   if($code === '123456'){

    echo ('verified');
    

   }else{
    echo 'Invalid Code given';
   }
}



} 

?>