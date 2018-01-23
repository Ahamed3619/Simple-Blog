<?php
require_once '../vendor/autoload.php';
use App\classes\Categories;

//getting value from manage category.php

$categories=new Categories();
$queryResult=$categories->getAllPublishedCategory();

$id=$_GET['id'];//Here 'id' come from manage-category.php

$QueryResult1=$categories->BloggingValuesById($id);
$blogValue=mysqli_fetch_assoc($QueryResult1);


$message='';
if (isset($_POST['btn'])){
    $categories =new Categories();
    $message=$categories->UpdateBlog($_POST,$id);
}

?>


<?php include 'includes/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" name="editBlog" enctype="multipart/form-data">
                        <h1 class="text-success"><?php echo $message;?></h1>
                        <!--
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option  value=" ">-----Select Blog Category------</option>
                                    <?//php while ($myPublish=mysqli_fetch_assoc($queryResult)){ ?>
                                        <option  value="<?php //echo $blogValue['category_id'];?>"><?php //echo $myPublish['category_name'];?></option>
                                    <?php//} ?>
                                </select>
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control" id="inputEmail3" value="<?php echo $blogValue['blog_title'];?>" placeholder="Blog Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                    <textarea class="form-control" name="short_description">
                                        <?php echo $blogValue['short_description'];?>
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                    <textarea class="form-control textarea" name="long_description" rows="15">
                                        <?php echo $blogValue['long_description'];?>
                                    </textarea>
                            </div>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Image Upload</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*">
                                <img src="<?php //echo $blogValue['blog_image'];?>" height="100" width="100">
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" value="0" name="publication_status"<?php echo ($blogValue['publication_status'] == 0) ? 'checked="checked"' : ''; ?> >Published
                                <input type="radio" value="1" name="publication_status"<?php echo ($blogValue['publication_status'] == 1) ? 'checked="checked"' : ''; ?> >Unpublished
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Update Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.forms['editBlog'].elements('category_id').value='<?php echo $blogValue['category_id'];?>';
</script>

<?php include 'includes/footer.php'?>
