<?php
require 'deneme.php';
$users=new book($pdo);
// create an account
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST['button1'])){
    $name=$_POST['isim'];
    $username=$_POST['kullanci'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];
}  
 if($name !=null && $username !=null && $pass!=null && $email !=null){
$users->insertUser($name,$username,$pass,$email);
echo "hesabınız başarıyla oluşturulmuştur";
header('location:http://localhost/project-php/login.view.php');
 }
else{
    echo 'alanlar boş bırakılmaz';   
}
}

