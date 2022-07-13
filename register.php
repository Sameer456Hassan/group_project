<?php
// session_start();
//connect to database
// $db = mysqli_connect("localhost", "root", "", "jjhcoetzee15");
require './server/config.php';
if (isset($_POST['register_btn'])) {

    $Email = mysqli_real_escape_string($conn, $_POST['email']);

    $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);

    $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);

    $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);

    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    $Area_Interest = mysqli_real_escape_string($conn, $_POST['Area_Interest']);

    $Previous_Degree = mysqli_real_escape_string($conn, $_POST['Previous_Degree']);

    $Previous_GPA = mysqli_real_escape_string($conn, $_POST['Previous_GPA']);

    $Recommended_City = mysqli_real_escape_string($conn, $_POST['Recommended_City']);

    $query = "SELECT Email FROM register WHERE Email = '$Email'";

    $result = mysqli_query($conn, $query);
    if ($result) {

        if (mysqli_num_rows($result) > 0) {

            $_SESSION['message'] = "Email already exists";
        } else {

            if ($password == $password2) {
                //Create User
                $pass = md5($password); //hash password before storing for security purposes
                $sql = "INSERT INTO register (Email, Password, Phone, FirstName, LastName, Gender, Area_Interest, Previous_Degree, Previous_GPA, Recommended_City) VALUES('$Email','$pass','$Phone','$FirstName','$LastName','$Gender', '$Area_Interest', '$Previous_Degree', '$Previous_GPA', '$Recommended_City')";
                mysqli_query($conn, $sql);
                $_SESSION['message'] = "You are now logged in";
                header("location:index.php");  //redirect home page
            } else {
                $_SESSION['message'] = "Password do not match";
            }
        }
    }
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

    <style>
        .content {
            min-height: 600px;
        }

        .step_form {
            position: relative;
            width: 600px;
            min-height: 110vh;
            margin: 30px auto;
        }

        .content .content__box {
            position: absolute;
            width: 100%;
            min-height: 100%;
            right: 2000px;
            /* padding: 50px 50px; */
            /* text-align: center; */
            top: 0;
            background-color: transparent;
            box-shadow: none;
        }

        .step_form .form-label {
            /* color: white; */
            font-size: 20px;
        }

        .content .content__box.visible__no-animation {
            right: 0;
        }

        .content .content__box.slide-in {
            animation: slide-in 500ms ease-in-out forwards;
        }

        .content .content__box.slide-out {
            animation: slide-out 500ms ease-in-out forwards;
        }

        @keyframes slide-in {
            0% {
                left: 800px;
                opacity: 0;
            }

            100% {
                left: 0;
                opacity: 1;
            }
        }

        @keyframes slide-out {
            0% {
                right: 0;
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                right: 800px;
                opacity: 0;
            }
        }
    </style>

</head>

<body>
    <div class="login_style mx-auto d-flex align-items-center justify-content-center position-realtive">

        <div class="container-fluid">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-md-6 sign_half_side d-flex align-items-center justify-content-center flex-column">
                    <h2>ALREADY HAVE AN ACCOUNT?</h2>
                    <a href="./index.php" class="btn change_log_page mt-4">LOG IN NOW</a>
                </div>
                <div class="col-md-6 form_half_side    d-flex align-items-center justify-content-center">

                    <div class="container">
                        <!-- <img src="./assets/images/login_des.webp" class="img-fluid position-absolute" alt=""> -->

                        <br>


                        <main class="main-content row">

                            <div class="col-md-12">
                                <h2 class="login_heading mb-3 mt-5 mt-md-0">REGISTRATION</h2>
                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<div id=''>" . $_SESSION['message'] . "</div>";
                                    unset($_SESSION['message']);
                                }
                                ?>
                                <form method="post" action="register.php" class="content" id="form">
                                    <div class=" content__box visible__no-animation step-1 card">
                                        <div class="body my-5 pt-5 pt-md-0 row">
                                            <div class="form-group col-12">
                                                <label class="form-label" for="email">Email: </label>
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="form-label" for="FirstName">First Name: </label>
                                                <input type="text" name="FirstName" class="form-control" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="form-label" for="LastName">Last Name: </label>
                                                <input type="text" name="LastName" class="form-control" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="Phone">Phone: </label>
                                                <input type="number" name="Phone" class="form-control" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="Gender">Gender: </label>
                                                <select name="Gender" class="form-control" required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="Password">Password: </label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="Password2">Password again: </label>
                                                <input type="Password" name="password2" class="form-control" required>
                                            </div>
                                            <div class="ml-3">
                                                <button id="button-1" class="Log_In_btn">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content__box step-2 card">
                                        <div class="body my-5 pt-5 pt-md-0">
                                            <div class="form-group col-12">
                                                <label class="form-label" for="email">Your Area of Interest (optional) </label>
                                                <input type="text" name="Area_Interest" class="form-control">
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="email">Previous Degree (optional)</label>
                                                <input type="number" name="Previous_Degree" class="form-control">
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="email">Previous GPA / Grade (optional) </label>
                                                <input type="text" name="Previous_GPA" class="form-control">
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label" for="email">Recommended City (optional)</label>
                                                <input type="text" name="Recommended_City" class="form-control">
                                            </div>
                                        </div>
                                        <div>
                                            <button id="button-2" type="submit" name="register_btn" class="Log_In_btn">Submit</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                    </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            $('#button-1').click(function(e) {
                e.preventDefault()
            })
        })

        const button1 = document.querySelector('#button-1');
        const button2 = document.querySelector('#button-2');

        // const indicator = document.querySelectorAll('.indicator');

        let step = 1;

        function handleSubmit(event) {
            let stepClass = `.step-${step}`;
            // console.log(stepClass);
            let stepElm = document.querySelector(stepClass);
            // console.log(stepElm);
            stepElm.classList.remove('visible__no-animation');
            stepElm.classList.add('slide-out');
            // console.log(indicator[step - 1])
            // indicator[step - 1].classList.remove('active');
            setTimeout(() => {
                    step += 1;
                    if (step > 2) {
                        step = 1;
                    }
                    // console.log(step);
                    // indicator[step - 1].classList.add('active');
                    stepClass = `.step-${step}`;
                    console.log(stepClass)
                    stepElm = document.querySelector(stepClass);
                    stepElm.classList.remove('slide-out');
                    stepElm.classList.add('slide-in');
                },
                100)
        }

        button1.addEventListener('click', handleSubmit);
        button2.addEventListener('click', handleSubmit);
    </script>

    <?php

    $qry = "SELECT * FROM breed";
    $result = $conn->query($qry) or die($conn->error);
    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }


    while ($row = $result->fetch_assoc()) {
        if ($result == true) {
    ?>
            <script>
                document.querySelector('#breed_options').innerHTML = document.querySelector('#breed_options').innerHTML + "<option><?php echo $row['breedName'] ?></option>"
            </script>
    <?php
        } else {
            echo 'error';
        }
    }
    ?>

</body>

</html>