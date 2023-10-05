<?php
require 'deneme.php';
$ekle=new book($pdo);
//insert
if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST["button1"])){
      $title=$_POST['title1'];
      $author=$_POST['author1'];
      $isbn=$_POST['isbn1'];
      $published=$_POST['published1'];
      $price=$_POST['price1']; 
      $kontrol=new book($pdo);
      $num2=$kontrol->isbn($isbn);
      if($num2 !=null){
       echo "eror  the isbn  number already exists";
        }     
     else{
        $ekle->insert($title,$author,$isbn,$published,$price);
        header('location:http://localhost/project-php/home.view.php');
    }   
}

  
      
 // delete
 if(isset($_POST["button3"])){
 $id=$_POST['id'];
 $sil=new book($pdo);
 $sil->delete($id);
 echo "silme işleminiz tamamlandı";
 header('location:http://localhost/project-php/home.view.php');

 }
 //update
 if(isset($_POST["button2"])){
   $title=$_POST['title'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $published=$_POST['published'];
    $price=$_POST['price'];
    $id=$_POST['id'];
    $kontrol=new book($pdo);
   $num2=$kontrol->isbn($isbn);
      if($num2 !=null){
       echo "eror  the isbn  number already exists"."</br>";
        }
    $update=new book($pdo);
  if($title !=null && $author !=null && $isbn!=null && $id !=null){
 $update->update($title,$author,$isbn,$published,$price,$id);
 echo "kayıt güncelleme işleminiz gerçekleşti";
 header('location:http://localhost/project-php/home.view.php');
  }
  else{
   echo "alanlar boş geçirilemez";
  }
}
  // search
  if(isset($_POST["button4"])){
   $text=$_POST['arama'];
   $search=new book($pdo);
  $ac=$search->search($text);
  if($text !=null){
  echo"<pre>";
  var_dump($ac);
  echo "<pre>";
  }
  else{
   echo "boş alanları doldurunuz";
  }
}
// detail
 if(isset($_POST["button5"])){
$id=$_POST['id'];
$select=new book($pdo);
$resualt=$select->find($id);
   echo "<pre>";
   var_dump($resualt);
   echo "</pre>";

 }
}