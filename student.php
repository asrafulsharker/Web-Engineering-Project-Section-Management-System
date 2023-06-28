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
            <h2><a class="text-white text-decoration-none" href="index.php">Student Panel</a></h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstudent">
                <i class="bi bi-plus-lg"></i> Add Student
            </button>
        </div>

    </div>

    <div class="container mt-5 p-0">
        <table class="table table-hover text-center">
            <thead class="bg-dark text-light">
                <tr>
                    <th width="10%" scope="col" class="rounded-start">Sr. No</th>
                    <th width="15%" scope="col">Image</th>
                    <th width="10%" scope="col">Name</th>
                    <th width="15%" scope="col">Student ID</th>
                    <th width="10%" scope="col">Email</th>
                    <th width="10%" scope="col">Phone</th>
                    <th width="20%" scope="col" class="rounded-end">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">

            <?php
                $query="SELECT * FROM `student`";
                $result=mysqli_query($con,$query);
                $i=1;
                $fetch_src=FETCH_SRC;

                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo<<<student
                        <tr class="align-middle">
                            <th scope="row">$i</th>
                            <td><img src="$fetch_src$fetch[image]" width="150px"></td>
                            <td>$fetch[name]</td>
                            <td>$fetch[s_id]</td>
                            <td>$fetch[email]</td>
                            <td>$fetch[phone]</td>
                            <td>
                                <a href="?edit=$fetch[id]" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                <button onClick="confirm_rem($fetch[id])" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    student;
                    $i++;
                }
            ?>

            </tbody>
        </table>
    </div>

    <!-- add Modal -->
    <div class="modal fade" id="addstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="crud.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Add Student</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Student ID</span>
                            <input type="text" class="form-control" name="s_id" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Phone</span>
                            <input type="number" class="form-control" name="phone" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Image</label>
                            <input type="file" class="form-control" name="image" accept=".jpg, .png, .svg" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="addstudent">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="editstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="crud.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Edit Student</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" id="editname" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="email" class="form-control" name="email" id="editemail" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Student ID</span>
                            <input type="text" class="form-control" name="s_id" id="editsid" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Phone</span>
                            <input type="number" class="form-control" name="phone" id="editphone" required>
                        </div>
                        <img src="" id="editimg" width="100%" class="mb-3"><br>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Image</label>
                            <input type="file" class="form-control" name="image" accept=".jpg, .png, .svg, .jpeg">
                        </div>
                        <input type="hidden" name="editpid" id="editpid">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="editstudent">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



   



    <!-- js  -->

    

   

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
            $query="SELECT * FROM `student` WHERE `id`='$_GET[edit]'";
            $result=mysqli_query($con,$query);
            $fetch=mysqli_fetch_assoc($result);
            echo"
            <script>
            var editstudent = new bootstrap.Modal(document.getElementById('editstudent'), {
                keyboard: false
              });
              document.querySelector('#editname').value=`$fetch[name]`;
              document.querySelector('#editemail').value=`$fetch[email]`;
              document.querySelector('#editsid').value=`$fetch[s_id]`;
              document.querySelector('#editphone').value=`$fetch[phone]`;
              document.querySelector('#editimg').src=`$fetch_src$fetch[image]`;
              document.querySelector('#editpid').value=`$_GET[edit]`;
                editstudent.show();


                
            </script>
            ";
        }

    ?>


    <script>
    function confirm_rem(id) {
        if (confirm("Are you sure, you want to delete this item?")) {
            window.location.href = "crud.php?rem=" + id;
        }
    }

    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>