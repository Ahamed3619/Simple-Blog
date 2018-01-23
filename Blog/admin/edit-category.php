<?php
require_once '../vendor/autoload.php';
use App\classes\Categories;

//getting value from manage category.php

$id=$_GET['id'];//Here 'id' come from manage-category.php
$categories=new Categories();
$QueryResult=$categories->BlogValuesById($id);
$categoryValue=mysqli_fetch_assoc($QueryResult);


$message='';
if (isset($_POST['btn'])){
    $categories =new Categories();
    $message=$categories->UpdateValues($_POST,$id);
}

?>


<?php include 'includes/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <h4 class="text-success"><?php echo $message?></h4>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" class="form-control" value="<?php echo $categoryValue['category_name'];?>" id="inputEmail3" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="category_description">
                                    <?php echo $categoryValue['category_description'];?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" value="0"  name="publication_status"<?php echo ($categoryValue['publication_status'] == 0) ? 'checked="checked"' : ''; ?>>Published
                                <input type="radio" value="1"  name="publication_status"<?php echo ($categoryValue['publication_status'] == 1) ? 'checked="checked"' : ''; ?> >Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Update Category Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'?>
