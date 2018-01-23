<?php
require_once '../vendor/autoload.php';
use App\classes\Categories;
$categories =new Categories();

$queryResult=$categories->getAllPublishedCategory();



$message_one='';
if (isset($_POST['btn'])){
    $categories =new Categories();
    $message_one=$categories->BlogAdd($_POST);
}

?>

<?php include 'includes/header.php'?>




    <div class="container">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <h1 class="text-success"><?php echo $message_one;?></h1>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
                                        <option  value="category-one" selected>-----Select Blog Category------</option>
                                        <?php while ($myPublish=mysqli_fetch_assoc($queryResult)){ ?>
                                        <option  value="<?php echo $myPublish['id'];?>"><?php echo $myPublish['category_name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="blog_title" class="form-control" id="inputEmail3" placeholder="Blog Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="short_description">

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control textarea" name="long_description" rows="15">

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Image Upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="blog_image" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" value="0" name="publication_status">Published
                                    <input type="radio" value="1" name="publication_status">Unpublished
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Add Blog</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'includes/footer.php'?>
