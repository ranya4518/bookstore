<?php
$pdo = new PDO('mysql:host=localhost;dbname=bookstore', 'root','');
$sql="select * from books";
$stat=$pdo->query($sql);
$task=[];
while($i=$stat->fetch(PDO::FETCH_ASSOC)){
    $task[]=$i;
}

?>

<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>bookstore</title>
    <style type="text/css">
        @import url(CSS/interface.css);
    </style>
 </head> 
 <body>
  <div id="top">
  <h1>Books Library</h1>
  <form id="form4" action="home.php" method="post">
  <input type="submit" value="search" name="button4" />
  <input type="text"  value="" name="arama" />
</form>
  </div>
  <div id="kapsayan">
  <div id="sol">
  </div>
  <div id="icerik">
    <table border="1px" cellspacing="2" width="650" height="300">
     <tr class="style">
        <h1><th>id</th><th>Title</th><th>author</th>
        <th>isbn</th><th>published_date</th><th>price</th></h1>
      </tr>
      <?php foreach($task as $i){?>
     <tr>
      <td><?=$i['id'] ?></td>
      <td><?=$i['title'] ?></td>
      <td><?=$i['author'] ?></td>
      <td><?=$i['isbn'] ?></td>
      <td><?=$i['published_date'] ?></td>
      <td><?=$i['price'] ?></td>
     </tr>
     <?php };?>
     </table>
     <br /><br />
  </div>
<div id="bar">
<div id="insert">
<form id="form1" action="home.php" method="post" >
<fieldset>
<legend>İnsert new Book</legend>
<table>
<tr>
<td>title :</td>
<td><input type="text"name="title1" /></td>
</tr>
<tr>
<td>Author :</td>
<td><input type="text"name="author1" /></td>
</tr>
<tr>
<td>İsbn :</td>
<td><input type="text"name="isbn1" /></td>
</tr>
<tr>
<td>published date :</td>
<td><input type="text"name="published1" /></td>
</tr>
<tr>
<td>Price :</td>
<td>
  <input type="text"name="price1" />
</td>
</tr>
</table>
<br />
<input type="submit" value="insert" name="button1" />
</fieldset>
</form>
</div> 
<div id="update">
<form id="form2" action="home.php" method="post" >
<fieldset>
<legend>Update Book</legend>
<table>
<tr>
<td>id :</td>
<td><input type="text"name="id"  /></td>
</tr>
<tr>
<td>title :</td>
<td><input type="text"name="title" /></td>
</tr>
<tr>
<td>Author :</td>
<td><input type="text"name="author" /></td>
</tr>
<tr>
<td>İsbn :</td>
<td><input type="text"name="isbn" /></td>
</tr>
<tr>
<td>published date :</td>
<td><input type="text"name="published" /></td>
</tr>
<tr>
<td>Price :</td>
<td><input type="text"name="price" /></td>
</tr>
</table>
<input type="submit" value="update" name="button2" />
</fieldset>
</form>
</div>
<div id="delete">
<form id="form3" action="home.php" method="post" >
<fieldset>
<legend>Delete and Details</legend>
<table>
<tr>
<td>id:</td>
<td><input type="text"name="id" />
</td>
</tr>
</table>
<input type="submit" value="Delete" name="button3" />
<input type="submit" value="Detail" name="button5" />
   </fieldset>
</form>
   </div>
</div>
   </div>
</div>
</body>  
</html>