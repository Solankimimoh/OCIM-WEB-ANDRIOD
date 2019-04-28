<!DOCTYPE html>
<html>

<head>
    <title>Online Infirmary, Consultation & Medication</title>
    <link rel="shortcut icon" type="image/png" href="images/clinic.png">
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //for-mobile-apps -->

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/numscroller-1.0.js"></script>
    <!-- //js -->
    <style>
        .ads_Checkbox {
            margin: 15px;
        }

    </style>
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });

    </script>
    <!-- start-smoth-scrolling -->

    <!--start-date-piker-->
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker,#datepicker1").datepicker();
        });

    </script>
    <!--/End-date-piker-->
    <script src="js/responsiveslides.min.js"></script>

    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>
    <!--//end-animate-->
</head>

<body>

    <?php
        include_once('header_top.php');
    ?>
    <?php
        include_once('header_menu.php');
    ?>
    <?php
        include_once('header_banner.php');
    ?>
    <!-- //banner -->
    <!-- content -->

    <!-- //content -->
    <!-- capabilities -->
    <div class="capacity">
        <div class="container">
            <h3>Capabilities</h3>
            <div class="col-md-3 capabil_grid1 wow fadeInDownBig animated animated text-center" data-wow-delay="0.4s">
                <div class="capil_text">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='5700' data-delay='.5' data-increment="100">5700</div>
                    <p>Happy Patients</p>
                </div>
            </div>
            <div class="col-md-3 capabil_grid2 wow fadeInUpBig animated animated text-center" data-wow-delay="0.4s">
                <div class="capil_text">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1700' data-delay='.5' data-increment="5">1700</div>
                    <p>Hospitals</p>
                </div>
            </div>
            <div class="col-md-3 capabil_grid3 wow fadeInDownBig animated animated text-center" data-wow-delay="0.4s">
                <div class="capil_text">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='2000' data-delay='.5' data-increment="100">2000</div>
                    <p>Pharmacies</p>
                </div>
            </div>
            <div class="col-md-3 capabil_grid4 wow fadeInUpBig animated animated text-center" data-wow-delay="0.4s">
                <div class="capil_text">
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1000' data-delay='.5' data-increment="100">1000</div>
                    <p>Laboratories</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>



    <?php
        include_once('footer.php');
    ?>
    <!-- //contact -->

    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

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

            var categoryData;
            $("input[type='radio']").on('change', function() {
                var selectedValue = $("input[name='category']:checked").val();
                if (selectedValue) {
                    categoryData = selectedValue;
                }
            });

            $("#regibtn").click(function() {
                var dbRef = firebase.database();
                var contactsRef = dbRef.ref('hospital');
                var data = {
                    email: $('#email1').val(), //get the email from Form
                    password: $('#password1').val() //get the pass from Form
                };

                var imgfile = document.querySelector('#photo').files[0];
                var imgname = (+new Date()) + '-' + imgfile.name;
                var storageRef = firebase.storage().ref(imgname);
                var uploadTask = storageRef.put(imgfile);

                var final = '';
                $('.ads_Checkbox:checked').each(function() {
                    var values = $(this).val();
                    final += values + ',';
                });
                var newStr = final.substring(0, final.length - 1);
                console.log(newStr);

                var final1 = '';
                $('.medicincheckbox:checked').each(function() {
                    var values = $(this).val();
                    final1 += values + ',';
                });
                var newStr1 = final1.substring(0, final1.length - 1);
                console.log(newStr1);

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
                                    console.log("Successfully created user account with uid:", firebase
                                        .auth().currentUser.uid);



                                    contactsRef.child(firebase.auth().currentUser.uid).set({
                                        email: $('#email1').val(),
                                        name: $('#name').val(),
                                        licence: $('#licence').val(),
                                        category: categoryData,
                                        caretype: newStr,
                                        medicine: newStr1,
                                        bed: $('#bed').val(),
                                        password: $('#password1').val(),
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
                                        verify: false,
                                        photoUrl: downloadURL
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


            });
        });

    </script>




    <script>
        var hospitalUID = localStorage.getItem("hospital");

        if (hospitalUID != null) {
            window.location.href = "home.php";
        }

        $(document).ready(function() {
            $("#loginbtn").click(function() {
                var data = {
                    email: $('#email').val(), //get the email from Form
                    password: $('#password').val() //get the pass from Form
                };

                var auth = null;
                firebase
                    .auth()
                    .signInWithEmailAndPassword(data.email, data.password)
                    .then(function(user) {
                        console.log("Authenticated successfully with payload:", user);
                        auth = user;

                        //                        console.log(auth.user.uid);

                        var ref = firebase.database().ref().child("hospital").child(auth.user.uid).child("verify");

                        ref.once('value', function(snapshot) {

                            var verifystatus = snapshot.val();

                            if (!verifystatus) {
                                alert("You are not verified");
                            } else {

                                localStorage.setItem("hospital", auth.user.uid);

                                window.location.href = "home.php";
                            }

                        });

                    })
                    .catch(function(error) {
                        alert("Login Failed!", error);
                        console.log("Login Failed!", error);
                    });
            });
        });

    </script>

</body>

</html>
