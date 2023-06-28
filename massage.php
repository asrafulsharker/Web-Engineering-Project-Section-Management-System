<?php
    require("connection.php");

    session_start();
    if(!isset($_SESSION['adminloginid']))
    {
        header("location: admin_login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PC-C</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="./assets/css/main1.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
    <!-- =======================================================

  ======================================================== -->
</head>




<body class="bg-light">


    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="q">contact@pcc.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+880 1628560659</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>

            </div>
        </div>
    </section>

    
    <!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">

                <h1>PC-C<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <form action="" method="POST">
                        <button class="logoutbtn" name="logout">Logout</button>
                    </form>
            </button>                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    <div class="container bg-dark text-light p-3 rounded my-4">
        <div class="d-flex align-items-center justify-content-between px-3">
            <h2><a class="text-white text-decoration-none" href="index.php">Message Portal</a></h2>
            <!-- Button trigger modal -->
           
        </div>

    </div>

    <div class="container mt-5 p-0">
        <table class="table table-hover text-center">
            <thead class="bg-dark text-light">
                <tr>
                    <th width="10%" scope="col" class="rounded-start">Sr. No</th>
                    <th width="15%" scope="col">Name</th>
                    <th width="10%" scope="col">Email</th>
                    <th width="15%" scope="col">Subject</th>
                    <th width="50%" scope="col">Message</th>
                </tr>
            </thead>
            <tbody class="bg-white">

                <?php
                $query="SELECT * FROM `contact`";
                $result=mysqli_query($con,$query);
                $i=1;
                $fetch_src=FETCH_SRC;

                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo<<<message
                        <tr class="align-middle">
                            <th scope="row">$i</th>
                            <td>$fetch[c_name]</td>
                            <td>$fetch[c_email]</td>
                            <td>$fetch[c_subject]</td>
                            <td>$fetch[Message]</td>
                        </tr>
                        message;
                    $i++;
                }
            ?>

            </tbody>
        </table>
    </div>

    


 


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>PC-C</span>
                    </a>
                    <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p> -->
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        Daffodil Smart City <br>
                        Ashulia<br>
                        Savar <br><br>
                        <strong>Phone:</strong> +880 1628560659<br>
                        <strong>Email:</strong> info@pcc.com<br>
                    </p>

                </div>

            </div>
        </div>

        

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>PCC-C</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                Designed by <a href="https://nawbjani.com/">Nawbhani</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <?php
        if(isset($_POST['logout']))
        {
            session_destroy();
            header('location: admin_login.php');
        }
    ?>
    
    <?php
        if(isset($_GET['edit']) && $_GET['edit']>0)
        {
            $query="SELECT * FROM `teacher` WHERE `id`='$_GET[edit]'";
            $result=mysqli_query($con,$query);
            $fetch=mysqli_fetch_assoc($result);
            echo"
            <script>
            var editteacher = new bootstrap.Modal(document.getElementById('editteacher'), {
                keyboard: false
              });
              document.querySelector('#editname').value=`$fetch[t_name]`;
              document.querySelector('#editemail').value=`$fetch[t_email]`;
              document.querySelector('#editdept').value=`$fetch[t_dept]`;
              document.querySelector('#editphone').value=`$fetch[t_phone]`;
              document.querySelector('#editt_c_name').value=`$fetch[t_c_name]`;
              document.querySelector('#editimg').src=`$fetch_src$fetch[t_image]`;
              document.querySelector('#editpid').value=`$_GET[edit]`;
                editteacher.show();


                
            </script>
            ";
        }

    ?>



    <!-- js  -->

    

    <script>
    function confirm_rem(id) {
        if (confirm("Are you sure, you want to delete this item?")) {
            window.location.href = "t_crud.php?rem=" + id;
        }
    }
    </script>



    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>