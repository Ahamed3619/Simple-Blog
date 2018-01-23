<?php


namespace App\classes;

use App\classes\Database;

class Application
{

    function getAllPublishedBlog(){

    $sql="SELECT * FROM blog_write WHERE publication_status=0";

    if (mysqli_query(Database::DatabaseConnection(),$sql)){

        $queryResult=mysqli_query(Database::DatabaseConnection(),$sql);
        return $queryResult;

    }
    else{
        die("Query problem".mysqli_error(Database::DatabaseConnection(),$sql));
    }


}

}