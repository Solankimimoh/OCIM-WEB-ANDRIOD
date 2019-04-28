<!DOCTYPE html>

<!-- header -->
<div class="header wow zoomIn">
    <div class="container">
        <div class="header_left" data-wow-duration="2s" data-wow-delay="0.5s">
            <ul>
                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+123 456 7890</li>
                <li><a href="mailto:info@oicm.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info@oicm.com</a></li>
            </ul>
        </div>
        <div class="header_right">
            <div class="login">
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Signup</a></li>
                    <li>
                        <div class="search-bar">
                            <div class="search">
                                <a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a>
                            </div>
                            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                            <div id="small-dialog" class="mfp-hide">
                                <div class="search-top">
                                    <div class="login_pop">
                                        <form action="#" method="post">
                                            <input type="submit" value="">
                                            <input type="text" name="Type something..." value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('.popup-with-zoom-anim').magnificPopup({
                                            type: 'inline',
                                            fixedContentPos: false,
                                            fixedBgPos: true,
                                            overflowY: 'auto',
                                            closeBtnInside: true,
                                            preloader: false,
                                            midClick: true,
                                            removalDelay: 300,
                                            mainClass: 'my-mfp-zoom-in'
                                        });
                                    });

                                </script>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->

<!-- login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width:550px" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login-right">
                        <h3>Sign in with your account</h3>
                        <div class="sign-in">
                            <h4>Email :</h4>
                            <input id="email" type="email" name="email" placeholder="Email ID" required="">
                        </div>
                        <div class="sign-in">
                            <h4>Password :</h4>
                            <input id="password" type="password" name="password" placeholder="Password" required="">
                        </div>

                        <div class="sign-in">
                            <button id="loginbtn" type="submit" name="sbmt" class="btn btn-success btn-flat m-b-30 m-t-30">Log in</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->

<!-- login -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width:85%" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login-bottom">
                        <h3 align="center" style="text-transform:uppercase">Sign up for free</h3>

                        <div class="row login-form">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Hospital Name</label>
                                    <input id="name" type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Licence</label>
                                    <input id="licence" type="text" class="form-control" placeholder="licence" name="licence">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <div id="categorygroup">

                                        <input id="category" type="radio" placeholder="Category" name="category" value="Government"> Government
                                        <input id="category" type="radio" placeholder="Category" name="category" value="Private"> Private
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                 
                                    <label style="padding:8px 0">Care Type</label>
                                    <div>
                                        <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Hospital">Hospital <br />
                                        <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Dispensary">Dispensary <br />
                                        <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Community Health Center">Community Health Center <br />
                                        <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Nursing Home Center">Nursing Home Center <br />
                                        <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Medical Colleg">Medical Colleg <br />
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <br />
                                <br />
                                <div class="form-group">
                                    <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Primary Health center">Primary Health center <br />
                                    <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Clinic">Clinic <br />
                                    <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Others">Others <br />
                                    <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Poly Clinic">Poly Clinic <br />
                                    <input class="ads_Checkbox" id="caretype" type="checkbox" placeholder="caretype" name="caretype[]" value="Sub Center">Sub Center
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>System of Medicine</label>
                                    <br />
                                    <input class="medicincheckbox" id="medicine" name="medicine[]" type="checkbox" value="Allopathic">Allopathic <br />
                                    <input class="medicincheckbox" id="medicine" name="medicine[]" type="checkbox" value="Homeopathic">Homeopathic <br />
                                    <input class="medicincheckbox" id="medicine" name="medicine[]" type="checkbox" value="Ayurvedic">Ayurvedic <br />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <br />
                                <div class="form-group">
                                    <input class="medicincheckbox" id="medicine" name="medicine[]" type="checkbox" value="Naturopathic">Naturopathic <br />
                                    <input class="medicincheckbox" id="medicine" name="medicine[]" type="checkbox" value="General">General
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Number Of Bed</label>
                                    <input id="bed" type="text" class="form-control" placeholder="bed" name="bed">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email1" type="email" class="form-control" placeholder="email" name="email">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password1" type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea rows="5" id="address" type="text" class="form-control" placeholder="Address" name="address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input id="mobile" type="text" class="form-control" placeholder="Mobile" name="mobile">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>emergencynumber</label>
                                    <input id="emergencynumber" type="text" class="form-control" placeholder="emergencynumber" name="emergencynumber">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>ambulancephone</label>
                                    <input id="ambulancephone" type="text" class="form-control" placeholder="ambulancephone" name="ambulancephone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>tollfree</label>
                                    <input id="tollfree" type="text" class="form-control" placeholder="tollfree" name="tollfree">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>helpline</label>
                                    <input id="helpline" type="text" class="form-control" placeholder="helpline" name="helpline">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>faxnumber</label>
                                    <input id="faxnumber" type="text" class="form-control" placeholder="faxnumber" name="faxnumber">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>services</label>
                                <input id="services" type="text" class="form-control" placeholder="services" name="services">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>website</label>
                                    <input id="website" type="text" class="form-control" placeholder="website" name="website">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>time</label>
                                    <input id="time" type="time" class="form-control" placeholder="time" name="time">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Image Choose</label>
                                    <input id="photo" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" name="sbmt" id="regibtn" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
