<?php


namespace App\classes;

use App\classes\Database; //Using The Database.php class. establish the database connection

class Login
{
    public function  AdminLoginCheck($data){
       /* echo "<pre>";
        print_r($data); //It was just Simple print of the user input from admin folder index.php*/

        $email=$data['email']; // Here taking the values in 2 variable that passing from the admin folder index.php
        $password=md5($data['password']);
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'"; //Matching db Data & User data & put in a variable

        if (mysqli_query(Database::DatabaseConnection(),$sql)){ //Establishing the database connection & Checking the value
            $queryResult = mysqli_query(Database::DatabaseConnection(),$sql); //Full row of db put in a variable
            $user = mysqli_fetch_assoc($queryResult); // Now User information in the variable user

            /*echo'<pre>';
            print_r($user);*/ //It Was a simple print of the User Values\

            if ($user){
                session_start(); //session start
                $_SESSION['id']=$user['id']; //All database element in $user here I am storing database id & name in session memory
                $_SESSION['name']=$user['name'];
                header('Location:Dashboard.php');
            }
            else{
                $message="Enter Valid Email & Password";
                return $message;
            }
        }
        else{
            die('Query Problem'.mysqli_error(Database::DatabaseConnection()));
        }
    }
    public function AdminLogOut(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location:index.php');
    }
}