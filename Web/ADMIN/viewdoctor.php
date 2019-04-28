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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Doctor</strong>
                        </div>
                        <div class="card-body">
                            <table id="doctortable" class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Doctor Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Licence</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Types</th>
                                        <th scope="col">Education</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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


            var hospitalUID = localStorage.getItem("hospital");

            var ref = firebase.database().ref().child("doctor").child(hospitalUID);

            var mytable = document.getElementById("doctortable");
            ref.once('value', function(snapshot) {
                snapshot.forEach(function(childSnapshot) {

                    var childKey = childSnapshot.key;
                    var childData = childSnapshot.val();
                    var length = mytable.rows.length;
                    mytable.insertRow(length).outerHTML = `<td>${childData.name}</td>
<td>${childData.email}</td><td>${childData.license}</td><td>${childData.mobile}</td><td>${childData.password}</td><td>${childData.types}</td><td>${childData.education}</td>`;

                });
            });


        });

    </script>

</body>

</html>
