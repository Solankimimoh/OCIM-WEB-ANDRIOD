<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OICM</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h1 class="display-2 text-light text-uppercase">ADMIN</h1>
                </div>
                <div class="login-form">
                    <div class="form-group">
                        <label>Email address</label>
                        <input id="email" type="email" required class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" required class="form-control" placeholder="Password" name="password">
                    </div>
                    <button id="loginbtn" type="submit" name="sbmt" class="btn btn-success btn-flat m-b-30 m-t-30">Log in</button>

                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>




    <script>
        $(document).ready(function() {

            var adminData = localStorage.getItem("adminID");

            if (adminData != null) {
                window.location.href = "home.php";
            }


            $('#logout').on('click', function(e) {
                alert("Logout Success");
                e.preventDefault();
                firebase.auth().signOut();
                localStorage.clear();
                window.location.href = "index.php";
            });

            $("#loginbtn").click(function() {

                var adminID = localStorage.setItem("adminID", 0);


                var email = $("#email").val();
                var password = $("#password").val();

                if (email == "admin@gmail.com" && password == "admin@123") {
                    alert("Login Success");
                    window.location.href = "home.php";
                } else {
                    alert("Invalid Email or Password");
                }

            });
        });

    </script>
</body>

</html>
