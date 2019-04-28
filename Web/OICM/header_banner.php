        <!-- banner -->
        <div class="banner">
            <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                     // Slideshow 4
                    $("#slider3").responsiveSlides({
                                            auto: true,
                                            pager: true,
                                            nav: false,
                                            speed: 500,
                                            namespace: "callbacks",
                                            before: function () {$('.events').append("<li>before event fired.</li>");},
                                            after: function () {$('.events').append("<li>after event fired.</li>");}
                                                                    });
                            });
            </script>
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="banner1">
                            <div class="container">
                                <div class="banner-info">
                                    
                                    <a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a>
                                </div>
                            </div>
                        </div>
                    </li> 
                    <li>
                        <div class="banner1">
                            <div class="container">
                                <div class="banner-info2 text-center">
                                    
                                    <a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner1">
                            <div class="container">
                                <div class="banner-info">
                                    
                                    <a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a>
                                </div>
                            </div>
                        </div>
                    </li>   
                    <li>
                        <div class="banner1">
                            <div class="container">
                                <div class="banner-info2 text-center">
                                    
                                    <a href="#book" class="hvr-outline-out button2 scroll">Book an appointment</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //banner -->
        <!-- content -->
