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
    <title>Job Portal</title>
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
                    <h1 class="display-5 text-light">STUDENT REGISTER</h1>
                </div>
                <div class="login-form">
                    <div class="form-group">
                        <label>Hospital Name</label>
                        <input id="name" type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Licence</label>
                        <input id="licence" type="text" class="form-control" placeholder="licence" name="licence">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input id="category" type="text" class="form-control" placeholder="Category" name="category">
                    </div>
                    <div class="form-group">
                        <label>Care Type</label>
                        <input id="caretype" type="text" class="form-control" placeholder="caretype" name="caretype">
                    </div>
                    <div class="form-group">
                        <label>Medicine Type</label>
                        <input id="medicine" type="text" class="form-control" placeholder="medicine" name="medicine">
                    </div>
                    <div class="form-group">
                        <label>Number Of Bed</label>
                        <input id="bed" type="text" class="form-control" placeholder="bed" name="bed">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" placeholder="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input id="address" type="text" class="form-control" placeholder="Address" name="address">
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input id="mobile" type="text" class="form-control" placeholder="Mobile" name="mobile">
                    </div>
                    <div class="form-group">
                        <label>emergencynumber</label>
                        <input id="emergencynumber" type="text" class="form-control" placeholder="emergencynumber" name="emergencynumber">
                    </div>
                    <div class="form-group">
                        <label>ambulancephone</label>
                        <input id="ambulancephone" type="text" class="form-control" placeholder="ambulancephone" name="ambulancephone">
                    </div>
                    <div class="form-group">
                        <label>tollfree</label>
                        <input id="tollfree" type="text" class="form-control" placeholder="tollfree" name="tollfree">
                    </div>
                    <div class="form-group">
                        <label>helpline</label>
                        <input id="helpline" type="text" class="form-control" placeholder="helpline" name="helpline">
                    </div>
                    <div class="form-group">
                        <label>faxnumber</label>
                        <input id="faxnumber" type="text" class="form-control" placeholder="faxnumber" name="faxnumber">
                    </div>
                    <div class="form-group">
                        <label>website</label>
                        <input id="website" type="text" class="form-control" placeholder="website" name="website">
                    </div>
                    <div class="form-group">
                        <label>time</label>
                        <input id="time" type="time" class="form-control" placeholder="time" name="time">
                    </div>
                    <div class="form-group">
                        <label>services</label>
                        <input id="services" type="text" class="form-control" placeholder="services" name="services">
                    </div>

                    <button type="submit" name="sbmt" id="regibtn" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>



    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyAq9aWUhS6kYjuNgHBh84rwxZ1AlNxrLi4",
            authDomain: "oicm-536ab.firebaseapp.com",
            databaseURL: "https://oicm-536ab.firebaseio.com",
            projectId: "oicm-536ab",
            storageBucket: "oicm-536ab.appspot.com",
            messagingSenderId: "75014604320"
        };
        firebase.initializeApp(config);

    </script>
    <script>
        var hospitalUID = localStorage.getItem("hospital");

        if (hospitalUID == null) {
            window.location.href = "index.php";
        }

        $('#logout').on('click', function(e) {
            alert("sdsad");
            e.preventDefault();
            firebase.auth().signOut();
            localStorage.clear();
            window.location.href = "index.php";
        });

    </script>
    <script>
        $(document).ready(function() {

            $("#regibtn").click(function() {
                var dbRef = firebase.database();
                var contactsRef = dbRef.ref('hospital');
                var data = {
                    email: $('#email').val(), //get the email from Form
                    password: $('#password').val() //get the pass from Form
                };

                firebase
                    .auth()
                    .createUserWithEmailAndPassword(data.email, data.password)
                    .then(function(user) {
                        console.log("Successfully created user account with uid:", firebase
                            .auth().currentUser.uid);

                        contactsRef.child(firebase.auth().currentUser.uid).set({
                            email: $('#email').val(),
                            name: $('#name').val(),
                            licence: $('#licence').val(),
                            category: $('#category').val(),
                            caretype: $('#caretype').val(),
                            medicine: $('#medicine').val(),
                            bed: $('#bed').val(),
                            password: $('#password').val(),
                            address: $('#address').val(),
                            mobile: $('#mobile').val(),
                            emergencynumber: $('#emergencynumber').val(),
                            ambulancephone: $('#ambulancephone').val(),
                            tollfree: $('#tollfree').val(),
                            helpline: $('#helpline').val(),
                            faxnumber: $('#faxnumber').val(),
                            website: $('#website').val(),
                            time: $('#time').val(),
                            services: $('#services').val(),
                            verify: false
                        });
                        alert("Registration Successfully");

                        window.location.href = "index.php";

                    })
                    .catch(function(error) {
                        alert("Error" + error);
                        console.log("Error creating user:", error);
                    });
            });
        });

    </script>
</body>

</html>
