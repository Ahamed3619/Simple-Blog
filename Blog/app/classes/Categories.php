<?php


namespace App\classes;

use App\classes\Database;

class Categories
{
 public  function CategoriesAdd($data){
     $name=$data['category_name'];
     $description=$data['category_description'];
     $publication=$data['publication_status'];


     $sql= "INSERT INTO categories(category_name,category_description,publication_status) VALUES ('$name','$description','$publication')";

     if (mysqli_query(Database::DatabaseConnection(),$sql)) {
         $message="Save Successful";
         return $message;
     }
     else{
         die('Query Problem'.mysqli_error(Database::DatabaseConnection()));
     }
 }

 public function ShowCategories(){

     $sql="SELECT * FROM categories";
     if (mysqli_query(Database::DatabaseConnection(),$sql)){
         $BlogValues=mysqli_query(Database::DatabaseConnection(),$sql);
         return $BlogValues;
     }
     else{
         die("Query Problem".mysqli_error(Database::DatabaseConnection())); //In php :: it means Scope Resolution
     }
 }

 public function BlogValuesById($id){
     $sql="SELECT * FROM categories WHERE id='$id'";
     if (mysqli_query(Database::DatabaseConnection(), $sql)){
        $QueryResult= mysqli_query(Database::DatabaseConnection(), $sql);
        return $QueryResult;
     }
     else{
         die("Query problem".mysqli_error(Database::DatabaseConnection()));
     }
 }
 public function UpdateValues($data,$id){

     $sql="UPDATE categories SET category_name='$data[category_name]',category_description='$data[category_description]',publication_status='$data[publication_status]' WHERE id='$id'";
     if (mysqli_query(Database::DatabaseConnection(),$sql)){
            header('Location:manage-category.php');
     }
     else{
         die("Query Problem".mysqli_error(Database::DatabaseConnection));
     }
 }
    public function DeleteValues($id){

        $sql=" DELETE FROM categories WHERE id='$id'";
        if (mysqli_query(Database::DatabaseConnection(),$sql)){
          $message="Deleted";
          return $message;
        }
        else{
            die("Query Problem".mysqli_error(Database::DatabaseConnection));
        }
    }



    //For Blog




    public  function BlogAdd($data){
        $id=$data['category_id'];
        $blog_title=$data['blog_title'];
        $short_description=$data['short_description'];
        $long_description=$data['long_description'];
        $publication=$data['publication_status'];


        if (isset($_POST['btn'])){
            $fileName=$_FILES['blog_image']['name']; //Taking the image name where 'image_upload' is the name of the input file
            $directory="../assets/image/"; // In which folder I am going to put the image
            $imageUrl=$directory.$fileName; //Total url of the file
            $fileSize=$_FILES['blog_image']['size'];
            $fileType= pathinfo($_FILES['blog_image']['name'],PATHINFO_EXTENSION);
            $check=getimagesize($_FILES['blog_image']['tmp_name']);

            if ($check){
                if (file_exists($imageUrl)){
                    die("File Already Exist");
                }
                else{

                    if($fileSize>50000000000){
                        die("File Size is Large. Use Within 10 kb");
                    }
                    else{
                        if ($fileType!='jpg' && $fileType!='png'){
                            die(" Select only jpg & png File");
                        }
                        else{
                            move_uploaded_file($_FILES['blog_image']['tmp_name'],$imageUrl);


                            $sql= "INSERT INTO blog_write(category_id,blog_title,short_description,long_description,blog_image,publication_status) VALUES ('$id','$blog_title','$short_description','$long_description','$imageUrl','$publication')";

                            if (mysqli_query(Database::DatabaseConnection(),$sql)) {
                                $message_one="Save Successful";
                                return $message_one;
                            }
                            else{
                                die('Query Problem'.mysqli_error(Database::DatabaseConnection()));
                            }

                        }
                    }
                }
            }
            else{
                die("Please select an image");
            }

        }

    }
    public function UpdateBlog($data,$id){

        $sql="UPDATE blog_write SET blog_title='$data[blog_title]',short_description='$data[short_description]',long_description='$data[long_description]',publication_status='$data[publication_status]' WHERE id='$id'";
        if (mysqli_query(Database::DatabaseConnection(),$sql)){
            header('Location:manage-blog.php');
        }
        else{
            die("Query Problem".mysqli_error(Database::DatabaseConnection));
        }
    }
    public function DeleteBlog($id){

        $sql=" DELETE FROM blog_write WHERE id='$id'";
        if (mysqli_query(Database::DatabaseConnection(),$sql)){
            $message="Deleted";
            return $message;
        }
        else{
            die("Query Problem".mysqli_error(Database::DatabaseConnection));
        }
    }
//small blog view
    public function ShowBlog(){

        $sql="SELECT b.*, c.category_name FROM blog_write as b, categories as c WHERE b.category_id=c.id"; //categories table & blog write table data nea category_name er jonno
        if (mysqli_query(Database::DatabaseConnection(),$sql)){
            $BlogValues=mysqli_query(Database::DatabaseConnection(),$sql);
            return $BlogValues;
        }

        else{
            die("Query Problem".mysqli_error(Database::DatabaseConnection())); //In php :: it means Scope Resolution
        }
    }
 //one page blog view
    public function LargeShowBlog($id){

        $sql="SELECT * FROM blog_write WHERE id='$id'";//categories table & blog write table data nea category_name er jonno
        if (mysqli_query(Database::DatabaseConnection(),$sql)){
            $BlogValues=mysqli_query(Database::DatabaseConnection(),$sql);
            return $BlogValues;
        }

        else{
            die("Query Problem".mysqli_error(Database::DatabaseConnection())); //In php :: it means Scope Resolution
        }
    }


//for edit blog
    public function BloggingValuesById($id){
        $sql="SELECT * FROM blog_write WHERE id='$id'";
        if (mysqli_query(Database::DatabaseConnection(), $sql)){
            $QueryResult1= mysqli_query(Database::DatabaseConnection(), $sql);
            return $QueryResult1;
        }
        else{
            die("Query problem".mysqli_error(Database::DatabaseConnection()));
        }
    }
//category nam prokash
    public function getAllPublishedCategory(){
        $sql="SELECT * FROM categories WHERE publication_status=0 ";
        if (mysqli_query(Database::DatabaseConnection(),$sql)){

            $queryResult=mysqli_query(Database::DatabaseConnection(),$sql);
            return $queryResult;

        }
        else{
            die("Query problem".mysqli_error(Database::DatabaseConnection()));
        }

    }
}