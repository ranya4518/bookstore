<?php
require 'DBconnection/connection.php';
$pdo=DB::connect();
class book{
protected $pdo;
private $id, $title,$author,$isbn,$published,$price;
public $name,$username,$password,$email;
public function __construct($pdo)
{
$this->pdo=$pdo;
}

// select function
public function getAll()
{
$sql="select *from books";
$stat=$this->pdo->prepare($sql);
$task=[];
while($i=$stat->fetch(PDO::FETCH_ASSOC)){
    $task[]=$i;
   }

}
// insert function
public function insert($title,$author,$isbn,$published,$price)
{
$sql="insert into books(title,author,isbn,published_date,price)
values('$title','$author','$isbn','$published','$price')";
$ekle=$this->pdo->prepare($sql);
if($ekle->execute());
}

//delete function
public function delete($id)
{
$sql="delete from books where id=$id";
$sil=$this->pdo->prepare($sql);
$sil->execute();
}

// update function
public function update($title,$author,$isbn,$published,$price,$id){
$sql="update books set title='$title',author='$author',isbn='$isbn',published_date='$published',price='$price'
 where id='$id'";
$update=$this->pdo->prepare($sql);
$update->execute();

}

// details with id
public function find($id){
$sql="select * from books where id=$id ";
$bul=$this->pdo->prepare($sql);
$bul->execute();
return $bul->fetchALL(PDO::FETCH_OBJ);
}
// search with title or author or isbn
public function search($text){
$sql="select * from books where title like '%$text%'
 or author like '%$text%' or isbn like '$text'";
$arama=$this->pdo->prepare($sql);
$arama->execute();
return $arama->fetchALL(PDO::FETCH_ASSOC);
}

// insert new user
public function insertUser($name,$username,$pass,$email){
    $sql="insert into user(name,userName,password,email)
    values('$name','$username','$pass','$email')";
    $user=$this->pdo->prepare($sql);
    $user->execute();
}
// select user (kontrol)
public function selectUser($name,$pass){
$sql="select * from user where userName='$name'
&& password='$pass' ";
$resualt=$this->pdo->prepare($sql);
$resualt->execute();
return $resualt->fetchAll(PDO::FETCH_OBJ);
}
// is decimal
public function decimal($price){
    if(is_float($price)){
        return true;
    }
  else{
    return false;
  }
}
// getter
public function getvalue($title){
      return $this->title;
}

// setter
 public function setvalue($title){
    $this->title=$title;
 }
// 
public function isbn($isbn){
    $sql="select isbn from books where isbn=$isbn";
    $ab=$this->pdo->prepare($sql);
    $ab->execute();
    return $ab->fetchAll(PDO::FETCH_OBJ);
}



}