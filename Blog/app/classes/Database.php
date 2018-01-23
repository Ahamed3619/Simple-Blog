<?php


namespace App\classes;


class Database
{
 public function DatabaseConnection(){
     $hostname="localhost";
     $username="root";
     $password='';
     $dbName="blog";
     $link=mysqli_connect($hostname,$username,$password,$dbName);
     return $link;


 }
}