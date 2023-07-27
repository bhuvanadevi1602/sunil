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
if(isset($_POST['reset_password']))
{
    $email=$_POST['email'];
    
    $sql="select * from admin where email='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
    {
        $to=$row['email'];
        $subject="Reset Password Link";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: info@webserve.co.in\r\n";
        $message = 'Click this link <a href="https://udhaarsudhaar.co.in/sunil/update-password.php?email='.$row['email'].'">Link</a> to Reset your password. <br>';
        $message .='Regards,<br>';
        $message .='Sunil Traders';
        
        if(mail($to,$subject,$message,$headers))
        {
            echo "<script type='text/javascript'>

                     $(document).ready(function() {
                              Swal.fire({
                                  title: 'Good job!',
                                  text: 'Reset link send to your mail!',
                                  icon: 'success',
                                  button: 'Dashboard!',
                                    })
                                });

                            </script>
                            ";
        }
       
    }
    else
    {
        echo "<script type='text/javascript'>
    
                         $(document).ready(function() {
                                  Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'This mail id doesn\'t exist ..please give correct mail id!',
                                      
                                  });
                                });
    
                    </script>
                    ";
    }
}
?>
    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Reset Password For Sunil Trader's</h4>   
                                    <p class="text-muted  mb-0">Enter your Email and instructions will be sent to you!</p>  
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form class="my-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="text" class="form-control" id="userEmail" name="email" placeholder="Enter Email Address">                               
                                    </div><!--end form-group--> 

                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="reset_password">Reset <i class="fas fa-sign-in-alt ms-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                                <!--<div class="text-center text-muted">-->
                                <!--    <p class="mb-1">Remember It ?  <a href="auth-register.html" class="text-primary ms-2">Sign in here</a></p>-->
                                <!--</div>-->
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                &copy; <script>
                                    document.write(new Date().getFullYear())
                                </script> Webserve                                           
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>

</html>