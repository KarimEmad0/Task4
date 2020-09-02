<?php
require_once('config.php');
session_start();
$_SESSION["check email"]=" ";
$firstname=$lastname=$email=$birthday=$address=$phone=" ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {    // to start from this page and load this page

if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['address'])&&isset($_POST['phone']) )
  {
   //i can handle every input and put condition if there is problem with text or if its empty by php but i did it by html i put required
    $name=test_input($_POST['name']);
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);
    $address=test_input($_POST['address']);
    $phone=test_input($_POST['phone']);
    try{                                            // for checking if there is error for email
    $query="select * from user where email=:email";
    $stmtselect=$db->prepare($query);
    $stmtselect->execute(array('email'=>$_POST['email']));
    $c=$stmtselect->rowCount();
    if($c>0){
         $_SESSION["error"]="THIS EMAIL IS ALREADY EXIST PLEASE ENTER NEW EMAIL"; // to make error at index page and allert the user
        header('location:index.php?$name=$name');
    }
    $stmt = $db->prepare("insert into user (name,email,password,phone_number,address) values(:name,:email,:password,:phonenumber,:address)");
    $success = $stmt->execute(array(
      ":name"=>$name,
      ":email"=>$email,
      ":password"=>$password,
      ":phonenumber"=>$phone,
      ":address"=>$address
    ));

    if($success){
       $_SESSION["register_success"]="Thank you for successful registration";
      $_SESSION["email"]=$_POST["email"];
    header('location:second page.php');
    }
    else{ throw new Exception("THERE IS Errors while saving data");}
    exit;
    }
    catch(Exception $e) {

    echo 'Message: ' .$e->getMessage();
  }
  }
}


function test_input($data) {    // to remove any charachter and slashes for input that i get
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
