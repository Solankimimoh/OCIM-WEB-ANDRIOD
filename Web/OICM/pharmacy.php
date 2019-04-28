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
        addEventListener("load", function() 
        { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <!-- //for-mobile-apps -->
    
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/numscroller-1.0.js"></script>
    <!-- //js -->
    
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
	jQuery(document).ready(function($) {
            $(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
            $('ul li a').click(function(){
                $('li a').removeClass("menu__item--current");
                $(this).addClass("menu__item--current");
            });
	});
    </script>
    <!-- start-smoth-scrolling -->

    <!--start-date-piker-->
    <script src="js/jquery-ui.js"></script>
    <script>
	$(function() {
        	$( "#datepicker,#datepicker1" ).datepicker();
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
<!-- header -->
</body>
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
            <h3>Pharmacy Static content</h3>
            
            <div class="clearfix"></div>
	</div>
    </div>
    <!-- //capabilities -->
    <!-- contact -->
    <?php
        include_once('footer.php');
    ?>
    <!-- //contact --> 
    
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>

