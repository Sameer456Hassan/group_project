<?php
session_start();
if (isset($_SESSION['Email']) && ($_SESSION["FirstName"]) && ($_SESSION["LastName"])) {
    // echo "Welcome User:  <h3>" . $_SESSION["Email"] . "</h3>";
    // session_start();
} else {
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutureQuery</title>
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">

    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<section class="message_button d-flex align-items-center justify-content-center">
    <i class="fa fa-comment"></i>
</section>
    <div class=" nav_styling">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand" href="#">
                <h1>Future<span>Query</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-3 active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-3 active">
                        <a class="nav-link" href="#">Queries</a>
                    </li>
                    <li class="nav-item ">
                        <div class="nav-link notify"><i class="fa fa-bell mr-2"></i> Notifications</div>
                        <div class="notifications d-none">
                            <h3>no notifications</h3>
                            <hr>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <div class="nav-link loging"><i class="fa fa-user mr-2"></i><?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName'] ?></div>
                        <a href="./logout.php"
                         class="logout_button btn d-none">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <main>
        <section class="hero">
            <div class="container">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-12">
                        <h2>Start Your Beautiful & Bright Future From Here</h2>
                        <button class="btn btn-theme mt-3 px-4 py-2">Learn More</button>
                    </div>
                    <div class="col-md-4 col-12">

                    </div>
                </div>
            </div>
        </section>

        <section class="choices">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-3 col-12 d-flex align-items-center justify-content-center flex-column choice-cards choice-cards1">
                        <h2 class="text-white">Lifelong Learning</h2>
                        <h3>Graduate Education <i class="fa fa-arrow-right"></i></h3>
                    </a>
                    <a class="col-md-3 col-12 d-flex align-items-center justify-content-center flex-column choice-cards choice-cards2">
                        <h2 class="text-white">Graduation</h2>
                        <h3>Graduate Education <i class="fa fa-arrow-right"></i></h3>
                    </a>
                    <a class="col-md-3 col-12 d-flex align-items-center justify-content-center flex-column choice-cards choice-cards3">
                        <h2 class="text-white">High School</h2>
                        <h3>Graduate Education <i class="fa fa-arrow-right"></i></h3>
                    </a>
                    <a class="col-md-3 col-12 d-flex align-items-center justify-content-center flex-column choice-cards choice-cards4">
                        <h2 class="text-white">Lifelong Learning</h2>
                        <h3>Graduate Education <i class="fa fa-arrow-right"></i></h3>
                    </a>
                </div>
            </div>
        </section>

        <section class="course">
            <div class="container">
                <div class="row">
                    <h2 class="col-12 mb-5">Course Categories</h2>
                    <div class="col-md-4 mt-5">
                        <div class="course_card course_card1 d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-bar mr-5"></i>
                            <div>
                                <h3>Bussiness</h3>
                                <p>Business Trends changing with latest courses are available with us.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="course_card course_card2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-invoice-dollar mr-5"></i>
                            <div>
                                <h3>Account</h3>
                                <p>Accounting need to be perfect. Come and join with us with best resources.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="course_card course_card3 d-flex align-items-center justify-content-center">
                            <i class="fa fa-flask mr-5"></i>
                            <div>
                                <h3>SCIENCE & TECHNOLOGY</h3>
                                <p>Latest technologies online courses are available with new courses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="course_card course_card4 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-medical mr-5"></i>
                            <div>
                                <h3>HEALTH & PSYCHOLOGY</h3>
                                <p>Learn about the Health & Psychology with the complete presentation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="course_card course_card5 d-flex align-items-center justify-content-center">
                            <i class="fa fa-glass-cheers mr-5"></i>
                            <div>
                                <h3>FOOD & DRINKING</h3>
                                <p>Business Trends changing with latest courses are available with us.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5">
                        <div class="course_card course_card6 d-flex align-items-center justify-content-center">
                            <i class="fa fa-film mr-5"></i>
                            <div>
                                <h3>CREATIVE ARTS & MEDIA</h3>
                                <p>Come and explore your creative arts and media by going further.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="extra">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 col-12">
                        <h2>Welcome to the Varsity Online Registration Portal.</h2>
                        <button class="btn btn-theme2">
                            CheckOut Opportunities
                        </button>
                    </div>
                    <div class="col-md-6 col-12"></div>
                </div>
            </div>
        </section>

        <section class="unis">
            <div class="container">
                <div class="row">
                    <h2 class="col-12 mb-5">Universities</h2>
                    <div class="col-md-4 col-12 mt-5">
                        <div class="uni_Card">
                            <img src="./assets/images/calpic.jpg" alt="" class="img-fluid">
                            <div class="d-flex justify-content-center align-items-start flex-column text_Area">
                                <h3>California Institute Of Technology</h3>
                                <button class="btn btn-theme mt-3">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mt-5">
                        <div class="uni_Card">
                            <img src="./assets/images/stanfordpic.jpg" alt="" class="img-fluid">
                            <div class="d-flex justify-content-center align-items-start flex-column text_Area">
                                <h3>Stanford University</h3>
                                <button class="btn btn-theme mt-3">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mt-5">
                        <div class="uni_Card">
                            <img src="./assets/images/harvardpic.jpg" alt="" class="img-fluid">
                            <div class="d-flex justify-content-center align-items-start flex-column text_Area">
                                <h3>Harvard University</h3>
                                <button class="btn btn-theme mt-3">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mt-5">
                        <div class="uni_Card">
                            <img src="./assets/images/nedpic.jpg" alt="" class="img-fluid">
                            <div class="d-flex justify-content-center align-items-start flex-column text_Area">
                                <h3>NED University Of Engineering And Technology</h3>
                                <button class="btn btn-theme mt-3">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mt-5">
                        <div class="uni_Card">
                            <img src="./assets/images/karachipic.jpg" alt="" class="img-fluid">
                            <div class="d-flex justify-content-center align-items-start flex-column text_Area">
                                <h3>Karachi University</h3>
                                <button class="btn btn-theme mt-3">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mt-5">
                        <div class="uni_Card">
                            <img src="./assets/images/oxfordpic.jpg" alt="" class="img-fluid">
                            <div class="d-flex justify-content-center align-items-start flex-column text_Area">
                                <h3>Oxford University</h3>
                                <button class="btn btn-theme mt-3">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <footer class="footer d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-12">
                    <h2>Future<span>Query</span></h2>
                </div>
                <div class="col-md-6 col-12">
                   <p>Copyright ⓒ 2022 || All Rights Reserved</p> 
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.loging').click(function(){
                $('.logout_button').toggleClass('d-none')
            })

            $('.notify').click(function(){
                $('.notifications').toggleClass('d-none')
            })
        })
    </script>
</body>

</html>