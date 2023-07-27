<?php
include('include/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="utf-8" />
    <title> | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    App favicon
    <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <meta charset="utf-8" />
            <title>Unikit - Admin & Dashboard Template</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="" name="author" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/favicon.ico">

       

     <!-- App css -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">
    
<?php
if(isset($_POST['update_password']))
{
    $email=$_POST['email'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    
    if($new_password==$confirm_password)
    {
        $sql="select * from admin where email='$email'";
        $result=mysqli_query($conn,$sql);
        $rec=mysqli_fetch_assoc($result);
        $id=$rec['id'];
        if($result)
        {
            $sql="update admin set password='$new_password' where id=$id";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "<script type='text/javascript'>

                     $(document).ready(function() {
                              Swal.fire({
                                  title: 'Good job!',
                                  text: 'Your new passowrd updated!',
                                  icon: 'success',
                                  button: 'Dashboard!',
                                    }).then(function(){
                                      window.location.href='auth-login.php';
                                    });
                                });

                            </script>
                            ";
            }
            else
            {
                echo "<script type='text/javascript'>

                     $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Password has not updated..please try again!',

                                })
                            });

                </script>
                ";
            }
        }
    }
    else
    {
        echo "<script type='text/javascript'>

                     $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'new password and confirm password doesn\'t match!',

                                })
                            });

                </script>
                ";
    }
}


?>
   <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Update Password</h4>   
                                        <!--<p class="text-muted  mb-0">Sign in to continue to Unikit.</p>  -->
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form class="my-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">            
                                        <div class="form-group mb-2">
                                            <input type="hidden" class="form-control"  name="email" value="<?php echo $_GET['email']; ?>">
                                            <label class="form-label" for="new_password">New Password</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder=" New password">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                            <label class="form-label" for="confirm_password">Confirm Password</label>                                            
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">                            
                                        </div><!--end form-group--> 
            
                                      
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit" name="update_password">Update Password <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    <!--<div class="m-3 text-center text-muted">-->
                                    <!--    <p class="mb-0">Don't have an account ?  <a href="auth-register.html" class="text-primary ms-2">Free Resister</a></p>-->
                                    <!--</div>-->
                                    <!--<hr class="hr-dashed mt-4">-->
                                    <!--<div class="text-center mt-n5">-->
                                    <!--    <h6 class="card-bg px-3 my-4 d-inline-block">Or Login With</h6>-->
                                    <!--</div>-->
                                    <!--<div class="d-flex justify-content-center mb-1">-->
                                    <!--    <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-primary rounded-circle me-2">-->
                                    <!--        <i class="fab fa-facebook align-self-center"></i>-->
                                    <!--    </a>-->
                                    <!--    <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-info rounded-circle me-2">-->
                                    <!--        <i class="fab fa-twitter align-self-center"></i>-->
                                    <!--    </a>-->
                                    <!--    <a href="" class="d-flex justify-content-center align-items-center thumb-sm bg-soft-danger rounded-circle">-->
                                    <!--        <i class="fab fa-google align-self-center"></i>-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>

</html>