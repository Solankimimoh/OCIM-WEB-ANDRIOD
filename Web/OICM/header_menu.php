        <div class="header-bottom ">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo grid">
                            <div class="grid__item color-3">
                                <h1><a class="link link--nukun" href="index.php"><i></i>INFI<span>R</span>MARY</a></h1>
                            </div>
                        </div>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="menu menu--horatio">
                            <ul class="nav navbar-nav menu__list">
                                <li class="menu__item <?php if (stripos($_SERVER['REQUEST_URI'],'index.php') !== false) {echo "menu__item--current";} ?>"><a href="index.php" class="menu__link">Home</a></li> 
                                <li class="menu__item <?php if (stripos($_SERVER['REQUEST_URI'],'hospital.php') !== false) {echo "menu__item--current";} ?>"><a href="hospital.php" class="menu__link">Hospitals</a></li> 
                                <li class="menu__item <?php if (stripos($_SERVER['REQUEST_URI'],'pharmacy.php') !== false) {echo "menu__item--current";} ?>"><a href="pharmacy.php" class="menu__link">Pharmacy</a></li>
                                <li class="menu__item <?php if (stripos($_SERVER['REQUEST_URI'],'laboratory.php') !== false) {echo "menu__item--current";} ?>"><a href="laboratory.php" class="menu__link">Laboratory</a></li>
                                <li class="menu__item <?php if (stripos($_SERVER['REQUEST_URI'],'contact.php') !== false) {echo "menu__item--current";} ?>"><a href="contact.php" class="menu__link">Contact</a></li>
                                <li class="menu__item <?php if (stripos($_SERVER['REQUEST_URI'],'about.php') !== false) {echo "menu__item--current";} ?>"><a href="about.php" class="menu__link">About</a></li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
