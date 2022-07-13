<?php
session_start();
if (isset($_SESSION['Email'])) {
    header("location:user_login.php");
    die();
}
//connect to database
// $db = mysqli_connect("localhost", "root", "", "jjhcoetzee15");
require './server/config.php';
if ($conn) {
    if (isset($_POST['login_btn'])) {
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = md5($password); //Remember we hashed password before storing last time
        $sql = "SELECT * FROM register WHERE  Email='$Email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            if (mysqli_num_rows($result) >= 1) {
                while ($row1 = mysqli_fetch_array($result)) {
                    $_SESSION['Email'] = $Email;
                    $_SESSION['FirstName'] = $row1['FirstName'];
                    $_SESSION['LastName'] = $row1['LastName'];
                    // $_SESSION['Phone'] = $row1['Phone'];
                    // $_SESSION['c_id'] = $row1['id'];
                    // $_SESSION['farm_size'] = $row1['Farm_Size'];
                    // $_SESSION['Farm_Name'] = $row1['Farm_Name'];
                };

                $_SESSION['message'] = "You are now Loggged In";
                session_start();
                header("location:user_login.php");
            } else {
                $_SESSION['message'] = "Email and Password combination incorrect";
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="login_style mx-auto d-flex align-items-center justify-content-center position-realtive">

        <div class="container-fluid">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-6 sign_half_side d-flex align-items-center justify-content-center flex-column">
                    <h2 class="text-white">DONT HAVE AN ACCOUNT?</h2>
                    <a href="./register.php" class="btn change_log_page mt-4 mb-5">SIGN UP NOW</a>
                </div>
                <div class="col-lg-6 form_half_side    d-flex align-items-center justify-content-center">

                    <div class="container">


                        <!-- <img src="./assets/images/login_des.webp" class="img-fluid position-absolute" alt=""> -->
                        <br>

                        <main class="main-content row">
                            <div class="col-md-12 text-center">
                                <h2 class="login_heading mb-3 mt-5 mt-md-0">LOG IN</h2>
                                <h3 class="login_under_heading mb-5">Sign Into Your Account</h3>
                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
                                    unset($_SESSION['message']);
                                }
                                ?>
                                <form method="post" action="  index.php">
                                    <div class="form-group">
                                        <!-- <label class="form-label" for="email">Email: </label> -->
                                        <input type="email" placeholder="Email" name="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label class="form-label" for="password">password: </label> -->
                                        <input type="password" placeholder="Password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="login_btn" class="Log_In_btn mt-4">
                                    </div>
                                    <p class="dont_acount">Don't have an account?<a href="register.php"> Register here</a></p>
                                </form>
                            </div>

                        </main>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>

</html>