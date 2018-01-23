<?php
    require_once '../vendor/autoload.php';
    use App\classes\Categories;

    $message='';
    if (isset($_POST['btn'])){
        $categories =new Categories();
        $message=$categories->CategoriesAdd($_POST);
    }

?>


<?php include 'includes/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <h4 class="text-success"><?php echo $message;?></h4>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" class="form-control" id="inputEmail3" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="category_description">

                                </textarea>
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
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Save Category Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'?>
