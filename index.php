<?php
require 'deneme.php';
$decimal=new book($pdo);
      $num1=$decimal->decimal(50.8);
      if($num1 !=null){
        echo "decimal";
        }else{
         echo "decimal bir sayı giriniz";
        }
