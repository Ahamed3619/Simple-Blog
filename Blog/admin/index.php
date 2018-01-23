<?php
//Here form action=" " so I need to write the php up I mean here
    session_start();
    if (isset($_SESSION['id'])){
        header('Location:Dashboard.php');
    }
    require_once '../vendor/autoload.php'; /*Loading The autoload ../ for one step back of the folder*/

    use App\classes\Login;   /*Which namespace & Class I am using*/

    $message=''; // Here Just use the Login.php file variable empty so that no error shown
    if (isset($_POST['btn'])){
        $login = new Login(); //Object Create of the Login Class
        $message=$login->AdminLoginCheck($_POST); // Passing value in The parameter of the Login class
    }
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <title>Admin Panel</title>
    </head>
    <body>
        <div class="container" style="margin-top: 150px">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-danger"> <?php echo $message;?></h4><br>
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="btn" class="btn btn-primary btn-block">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.bundle.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>