<!DOCTYPE html>
<html>
<head>
<title>Infirmary a Medical Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Infirmary Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
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

<!-- content -->
    <div class="content">
	<div class="container">
            <div id="book" class="col-md-8 content_middle">
                <h3>Patient Registration</h3>
                <form method="post" novalidate="true">
                        <div class="form-group row">                            
                                <label class="col-sm-3 col-form-label">Patient Name:</label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="First name" required>
                                </div>                            
                                <div class="col-sm-3">
                                    <input type="text" id="validationDefault02" placeholder="Last name" value="Otto" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                        <div class="form-group row">                            
                                <label class="col-sm-3 col-form-label">Gender:</label>
                                <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <div class="form-check form-check-inline col-sm-3">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Transgender</label>
                                </div>
                        </div>
                        <div class="form-group row">                            
                                <label class="col-sm-3 col-form-label">Phone:</label>
                                <div class="col-sm-5">
                                    <input type="text" required="">
                                </div>                            
                        </div>
                        <div class="form-group row">                            
                                <label class="col-sm-3 col-form-label">Date of Birth:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="date" id="datepicker" required="">
                                </div>                            
                        </div>
                        <div class="form-group row">                            
                                <label class="col-sm-3 col-form-label">Patient's Address:</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="First name" required>
                                </div>   
                        </div>
                        <div class="form-group row"> 
                            <div class="col-sm-3"></div>
                                <div class="col-sm-4">
                                    <input type="text" id="validationDefault02" placeholder="Last name" value="Otto" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                                <div class="col-sm-4">
                                    <input type="text" id="validationDefault02" placeholder="Last name" value="Otto" required>
                                </div>
                                <div class="col-sm-5">
                                    <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
					<option value="null">Country</option>
					<option value="null">Health Care</option> 
					<option value="null">Body Checkup</option>					
					<option value="null">Out Patient</option>
					<option value="null">Surgery</option>											
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">                            
                                <label class="col-sm-3 col-form-label">Other Information:</label>
                               
                                <div class="col-sm-4">
                                    <input type="text" placeholder="Blood Type" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Organ Donor" required>
                                </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-sm-3"></div>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="Weight" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Height" required>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Verification:</label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="CaptchaCode" required>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="" required>
                                </div>
                        </div>
                        <div class="row text-center">
                             <input type="submit" value="REGISTER">
                        </div>  
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>

