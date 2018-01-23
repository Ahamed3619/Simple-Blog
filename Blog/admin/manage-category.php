<?php
require_once '../vendor/autoload.php';
 use App\classes\Categories;
$message='';
 if (isset($_GET['delete'])){
     $id=$_GET['id'];
     $show=new Categories();
     $message=$show->DeleteValues($id);
 }

 $show=new Categories();
 $BlogValues=$show->ShowCategories();

?>

<?php include 'includes/header.php'?>

    <div class="container">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <h1 class=""text-danger"><?php echo $message;?></h1>
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Serial No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($manageCategory=mysqli_fetch_assoc($BlogValues)){?>
                            <tr>
                                <th scope="row"><?php echo $manageCategory['id']; ?></th>
                                <td><?php echo $manageCategory['category_name'];?></td>
                                <td><?php echo $manageCategory['category_description'];?></td> <!--contenteditable="true" for edit able html-->
                                <td><?php echo $manageCategory['publication_status']; ?></td>
                                <td>
                                    <a href="edit-category.php?id=<?php echo $manageCategory['id']?>">Edit</a> <!-- ? sign for get method a=b where a index b value-->
                                    <a href="manage-category.php?delete=true&id=<?php echo $manageCategory['id']?>" onclick="return confirm('Are You sure to delete?');">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'?>
