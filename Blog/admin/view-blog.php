<?php
require_once '../vendor/autoload.php';
use App\classes\Categories;

    $id=$_GET['id'];
    $show=new Categories();
    $BlogValues=$show->LargeShowBlog($id);
    $AllValues=mysqli_fetch_assoc($BlogValues);

?>

<?php include 'includes/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class=""thead-dark"">
                        <th>Full Blog Details</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="thead-dark">SERIAL</th>
                                <td><?php echo $AllValues['id']; ?></td>

                            </tr>
                            <tr>
                                <th class="thead-dark">Category ID</th>
                                <td><?php echo $AllValues['category_id']; ?></td>

                            </tr>
                            <tr>
                                <th class="thead-dark">Blog Title</th>
                                <td><?php echo $AllValues['blog_title']; ?></td>

                            </tr>
                            <tr>
                                <th class="thead-dark">Short Description</th>
                                <td><?php echo $AllValues['short_description']; ?></td>

                            </tr>
                            <tr>
                                <th class="thead-dark">Long Description</th>
                                <td><?php echo $AllValues['long_description']; ?></td>

                            </tr>
                            <tr>
                                <th class="thead-dark">Image</th>
                                <td><img src="<?php echo $AllValues['blog_image'];?>" align="center" height="500px" width="500px"></td>

                            </tr>
                            <tr>
                                <th class="thead-dark">Publication Status</th>
                                <td><?php echo $AllValues['publication_status']==0 ? 'Published':'Unpublished' ?></td>

                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'?>
