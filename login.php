<?php
require 'deneme.php';
// sing in
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST['button'])){
$name=$_POST['user1'];
$pass=$_POST['pass1'];
$ab=new book($pdo);
$ac= $ab->selectUser($name,$pass);
if($ac!=null){
 header('location:http://localhost/project-php/home.view.php'); 
}
else{
    header('location:http://localhost/project-php/user.view.php');
    }
  }
  if(isset($_POST['button2'])){
    header('location:http://localhost/project-php/user.view.php');
  }
}


