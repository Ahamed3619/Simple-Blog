<?php

$link=mysqli_connect('localhost','root','','blog');

 if (isset($_POST['btn'])){
     $fileName=$_FILES['image_upload']['name']; //Taking the image name where 'image_upload' is the name of the input file
     $directory="images/"; // In which folder I am going to put the image
     $imageUrl=$directory.$fileName; //Total url of the file
     $fileSize=$_FILES['image_upload']['size'];
     $fileType= pathinfo($_FILES['image_upload']['name'],PATHINFO_EXTENSION);
     $check=getimagesize($_FILES['image_upload']['tmp_name']);

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
                    move_uploaded_file($_FILES['image_upload']['tmp_name'],$imageUrl);
                    $sql="INSERT INTO image(image_upload)VALUES ('$imageUrl')";
                    if (mysqli_query($link,$sql)){
                        echo "Success";
                    }
                    else{
                        die("Query Problem".mysqli_error($link));
                    }

                }
            }
        }
     }
     else{
         die("Please select an image");
     }

 }
?>

<form action="" method="POST" enctype="multipart/form-data"><!--here enctype="multipart/form-data" using for any file data upload-->

    <table>
        <tr>
            <th>Select Image</th>
            <td><input type="file" name="image_upload" accept="image/*"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Submit"></td>
        </tr>

    </table>

</form>

<hr>
<?php
 $sql="SELECT * FROM image";
 $queryResult=mysqli_query($link,$sql);
?>
<table>
    <?php while ($myImage=mysqli_fetch_assoc($queryResult)){?>
    <tr>
        <td><img src="<?php echo $myImage['image_upload'];?>" align="center" height="900px" width="700px"></td>
    </tr>
    <?php } ?>
</table>