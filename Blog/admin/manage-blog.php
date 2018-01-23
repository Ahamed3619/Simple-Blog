<?php
require_once '../vendor/autoload.php';
use App\classes\Categories;
$message='';
if (isset($_GET['delete'])){
    $id=$_GET['id'];
    $show=new Categories();
    $message=$show->DeleteBlog($id);
}

$show=new Categories();
$BlogValues=$show->ShowBlog();

?>

<?php include 'includes/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <h1 class=""text-danger"><?php echo $message;?></h1>
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">SL.</th>
                            <th scope="col">Cat.Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">S.Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($manageBlog=mysqli_fetch_assoc($BlogValues)){?>
                            <tr>
                                <th scope="row"><?php echo $manageBlog['id']; ?></th>
                                <td><?php echo $manageBlog['category_name'];?></td>
                                <td><?php echo $manageBlog['blog_title'];?></td><!--contenteditable="true" for edit able html-->
                                <td><?php echo $manageBlog['short_description'];?></td>
                                <td><?php echo $manageBlog['publication_status']==0 ? 'Published':'Unpublished' ?></td>
                                <td>
                                    <a href="view-blog.php?id=<?php echo $manageBlog['id']?>">view||</a>
                                    <a href="edit-blog.php?id=<?php echo $manageBlog['id']?>">Edit||</a> <!-- ? sign for get method a=b where a index b value-->
                                    <a href="manage-blog.php?delete=true&id=<?php echo $manageBlog['id']?>" onclick="return confirm('Are You sure to delete?');">Delete</a>
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
