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

    <link rel="apple-touch-icon" href="images/favicon.png">
    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">


    <link href="assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/charts/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">


    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }

    </style>

</head>

<body>


    <!-- Left Panel -->
    <?php include("include/menu.php");
    ?>
    <!-- /#left-panel -->
    <!-- Left Panel -->



    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include("include/header.php");
        ?>
        <!-- /header -->
        <!-- Header-->

        <div class="container-fluid py-5 px-5">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center p-3">
                    <div class="card w-50 m-3">
                        <div class="card-header">Add Doctor</div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <input type="text" id="name" name="name" placeholder="Doctor Name" class="form-control" wtx-context="B8D5EC82-DD46-472D-80CC-F674E2B3787D">
                            </div>
                            <div class="form-group">
                                <input type="text" id="email" name="email" placeholder="Doctor Email" class="form-control" wtx-context="B8D5EC82-DD46-472D-80CC-F674E2B3787D">
                            </div>
                            <div class="form-group">
                                <input type="text" id="password" name="password" placeholder="Doctor password" class="form-control" wtx-context="B8D5EC82-DD46-472D-80CC-F674E2B3787D">
                            </div>
                            <div class="form-group">
                                <input type="text" id="mobile" name="mobile" placeholder="mobile" class="form-control" wtx-context="BC25A36C-76E5-48DC-87CA-902542E2955B">
                            </div>
                            <div class="form-group">
                                <input type="text" id="address" name="address" placeholder="address" class="form-control" wtx-context="BC25A36C-76E5-48DC-87CA-902542E2955B">
                            </div>
                            <div class="form-group">
                                <input type="text" id="license" name="license" placeholder="license" class="form-control" wtx-context="BC25A36C-76E5-48DC-87CA-902542E2955B">
                            </div>
                            <div class="form-group">
                                <input type="text" id="education" name="education" placeholder="education" class="form-control" wtx-context="BC25A36C-76E5-48DC-87CA-902542E2955B">
                            </div>
                            <div class="form-group">
                                <input type="text" id="types" name="types" placeholder="types" class="form-control" wtx-context="BC25A36C-76E5-48DC-87CA-902542E2955B">
                            </div>
                            <div class="form-group">
                                <input type="file" id="photo" name="file" class="form-control" wtx-context="BC25A36C-76E5-48DC-87CA-902542E2955B">
                            </div>
                            <div class="form-actions form-group">
                                <button id="sbmt" type="submit" class="btn btn-secondary btn-sm" name="sbmt">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <?php include("include/footer.php");
        ?>

    </div><!-- /#right-panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>

    <script src="assets/js/plugins.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>


    <!--Chartist Chart-->
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/chartist/chartist-plugin-legend.js"></script>


    <script src="assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.spline.js"></script>


    <script src="assets/weather/js/jquery.simpleWeather.min.js"></script>
    <script src="assets/weather/js/weather-init.js"></script>


    <script src="assets/js/lib/moment/moment.js"></script>
    <script src="assets/calendar/fullcalendar.min.js"></script>
    <script src="assets/calendar/fullcalendar-init.js"></script>




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
            e.preventDefault();
            firebase.auth().signOut();
            localStorage.clear();
            window.location.href = "index.php";
        });

    </script>
    <script>
        $(document).ready(function() {
            var hospitalUser;
            var hospitaluid;
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // User is signed in.
                    var hospitalUID = localStorage.getItem("hospital");



                    $("#sbmt").click(function() {
                        var dbRef = firebase.database();
                        var contactsRef = dbRef.ref('doctor');
                        var data = {
                            email: $('#email').val(), //get the email from Form
                            password: $('#password').val() //get the pass from Form
                        };


                        var imgfile = document.querySelector('#photo').files[0];
                        var imgname = (+new Date()) + '-' + imgfile.name;
                        var storageRef = firebase.storage().ref(imgname);
                        var uploadTask = storageRef.put(imgfile);

                        uploadTask.on('state_changed', function(snapshot) {
                            var progress =
                                (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                            var uploader = document.getElementById('uploader');
                            switch (snapshot.state) {
                                case firebase.storage.TaskState.PAUSED:
                                    console.log('Upload is paused');
                                    break;
                                case firebase.storage.TaskState.RUNNING:
                                    console.log('Upload is running');
                                    break;
                            }
                        }, function(error) {
                            console.log(error);
                        }, function() {

                            // get the uploaded image url back 
                            uploadTask.snapshot.ref.getDownloadURL().then(
                                function(downloadURL) {

                                    // You get your url from here 
                                    console.log('File available at', downloadURL);

                                    // print the image url  
                                    console.log(downloadURL);


                                    firebase
                                        .auth()
                                        .createUserWithEmailAndPassword(data.email, data.password)
                                        .then(function(user) {

                                            //                                console.log("Successfully created user account with uid:", firebase
                                            //                                    .auth().currentUser.uid);

                                            console.log(hospitaluid);
                                            console.log(user.user.uid);

                                            contactsRef
                                                .child(user.user.uid).set({
                                                    name: $('#name').val(),
                                                    email: $('#email').val(),
                                                    password: $('#password').val(),
                                                    mobile: $('#mobile').val(),
                                                    address: $('#address').val(),
                                                    license: $('#license').val(),
                                                    education: $('#education').val(),
                                                    types: $('#types').val(),
                                                    verify: false,
                                                    hospitalUID: hospitalUID,
                                                    photoUrl: downloadURL
                                                });

                                            alert("Doctor Added Successfully");
                                            window.location.href = "viewdoctor.php";
                                        })
                                        .catch(function(error) {
                                            alert("Error" + error);
                                            console.log("Error creating user:", error);
                                        });

                                });
                        });









                    });
                } else {
                    // No user is signed in.
                    // window.location.replace("index.html");
                    // alert("not signin");
                }
            });
        });

    </script>

</body>

</html>
