<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="icon"  type="image/x-icon"  href="assets/images/fav.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Font-awsome-->
    <script src="https://kit.fontawesome.com/279a4e675c.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="LangSwitch.js"></script>
    <!-- MD5 -->
    <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="messageBox">

    </div>
    <div id="navigation">
        <nav class="navbar navbar-expand-md border container-fluid shadow-sm ">
            <a href="#" class="navbar-brand" Router('index')>
                <img style="width: 120px;" src="assets/images/logo1.png" alt="" onclick="Router('index')">
            </a>
            <button class="navbar-toggler border" data-toggle="collapse" data-target="#mynav">
                <i class="fas fa-bars text-primary"></i>
            </button>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a href="#" id="navBuy" class="nav-link text-dark" onclick="searchHome(1)">Buy</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" id="navMortgage" class="nav-link text-dark"onclick="searchHome(2)">Mortgage</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" id="navRent" class="nav-link text-dark"onclick="searchHome(3)">Rent</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" id="navDrent" class="nav-link text-dark"onclick="searchHome(4)">Daily Rent</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" id="contactl" class="nav-link text-dark" onclick="Router('contact')">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <div class="mx-1 dropdown d-inline-block">
                    <a href="#" class="nav-link dropdown-toggle text-dark" data-toggle="dropdown">
                        <img id="Langbtn" style="width: 38px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Square_Flag_of_the_United_Kingdom.svg/1200px-Square_Flag_of_the_United_Kingdom.svg.png" alt="" class="rounded-circle img-thumbnail">
                    </a>
                    <div class="dropdown-menu">
                        <a id="LangEn" onclick="EngName()" href="#" role="button" class="dropdown-item"><img style="width: 38px;" id="English" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Square_Flag_of_the_United_Kingdom.svg/1200px-Square_Flag_of_the_United_Kingdom.svg.png" alt="" class="rounded-circle img-thumbnail mr-3"><span>English</span></a>
                        <div class="dropdown-divider"></div>
                        <a id="LangKa" onclick="GeoName()" href="#" role="button" class="dropdown-item"><img style="width: 38px;" id="Georgian" src="https://cdn.countryflags.com/thumbs/georgia/flag-button-square-250.png" class="rounded-circle img-thumbnail mr-3"><span>Georgian</span></a>
                    </div>
                </div>
                <button class="menu_buttons btn btn-outline-primary rounded-pill text-center mx-1" id="menuaddprod" onclick="Router('upload')">
                    <i class="fas fa-plus-square"><span class="mx-2" id="navAdd">Add</span></i>
                </button>
                
                <button class="menu_buttons btn btn-outline-primary rounded-pill text-center mx-2" id="menulogin" onclick="Router('login','auth')">
                    <a href="#"><i class="fas fa-sign-in-alt"><span class="mx-2">Log in</span></i></a>
                </button>

                <button class="menu_buttons btn btn-outline-primary rounded-pill text-center mx-2" id="menudashboard" onclick="Router('dashboard')">
                    <a href="#"><i class="fas fa-user-circle"><span id="Dashboard" class="mx-2">Dashboard</span></i></a>
                </button>
            </div>
        </nav>
    </div>

    <div id="content"></div>

    <div id="footer">
        <footer class="bg-secondary text-white py-2">
            <div class="container mt-3" style="max-width: 1280px!important;">
                <div class="row">
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 ml-3 ml-md-0">
                        <h5 id="announcements" class="ml-3">Announcements</h5>
                        <ul class="list-unstyled ml-3">
                        <li>
                            <a id="rent-tbilisi" class="text-white" href="#" onclick="searchHome(3, 1)">Rent a flat in tbilisi</a>
                        </li>
                        <li>
                            <a id="rent-ortachala" class="text-white" href="#" onclick="searchHome(3, 1, '', 46)">Rent a apartments in Ortachala </a>
                        </li>
                        <li>
                            <a id="rent-varketili" class="text-white" href="#" onclick="searchHome(3, 1, '', 94)">Rent a apartments in Varketili</a>
                        </li>
                        <li>
                            <a id="rent-gldani" class="text-white" href="#" onclick="searchHome(3, 1, 1)">Rent a apartments in Gldani</a>
                        </li>
                        <li>
                            <a id="rent-isani" class="text-white" href="#" onclick="searchHome(3, 1, 4)">Rent a apartments in Isani</a>
                        </li>
                        <li>
                            <a id="rent-didube" class="text-white" href="#" onclick="searchHome(3, 1, 2)">Rent a apartments in Didube</a>
                        </li>
                        <li>
                            <a id="rent-dighomi" class="text-white" href="#" onclick="searchHome(3, 1, '', 85)">Rent a apartments in Didi Dighomi</a>
                        </li>
                        </ul>
                    </div>

                    <div class="d-none d-lg-block col-lg-3">
                        <h5 id="newly-built">Newly built</h5>
                        <ul class="list-unstyled">
                        <li>
                            <a id="uctbilisi" class="text-white" href="#" onclick="searchHome('', 1, '', '',2)">Under construction apartments for sale in Tbilisi</a>
                        </li>
                        <li>
                            <a id="ucsaburtalo" class="text-white" href="#" onclick="searchHome('', 1, '', 84, 2)">Under construction apartments for sale on Saburtalo</a>
                        </li>
                        <li>
                            <a id="ucdighomi" class="text-white" href="#" onclick="searchHome(1, 1, '', 85, 2)">Under construction apartments for sale in Big Dighomi</a>
                        </li>
                        <li>
                            <a id="sale-gldani" class="text-white" href="#" onclick="searchHome(1, 1, 1, '', 1, 1)">Apartments for sale in Gldani</a>
                        </li>
                        <li>
                            <a id="sale-isani" class="text-white" href="#" onclick="searchHome(1, '', 4, '', '', 1)">Apartments for sale in Isani</a>
                        </li>
                        <li>
                            <a id="psale-tbilisi" class="text-white" href="#" onclick="searchHome(1, 1)">Tbilisi property for sale</a>
                        </li>
                        <li>
                            <a id="sale-temqa" class="text-white" href="#" onclick="searchHome(1, '', '', 67, 1)">apartment for sale on Temqa</a>
                        </li>
                        </ul>
                    </div>

                    <div class="d-none d-md-block col-md-4 col-lg-3">
                        <h5 id="under-construction">Under construction</h5>
                        <ul class="list-unstyled">
                        <li>
                            <a id="rent-batumi" class="text-white" href="#">Apartments for rent in Batumi</a>
                        </li>
                        <li>
                            <a id="rent-kobuleti" class="text-white" href="#">Apartments for rent in Kobuleti</a>
                        </li>
                        <li>
                            <a id="rent-kutaisi" class="text-white" href="#">Apartments for rent in Kutaisi</a>
                        </li>
                        <li>
                            <a id="hsale-saguramo" class="text-white" href="#">Houses for sale in Saguramo</a>
                        </li>
                        <li>
                            <a id="hsale-bakuriani" class="text-white" href="#">Houses for sale in Bakuriani</a>
                        </li>
                        <li>
                            <a id="lsale-georgia" class="text-white" href="#">land in georgia for sale</a>
                        </li>
                        <li>
                            <a id="hcsale-tbilisi" class="text-white" href="#">Houses and Cottages for sale in Tbilisi</a>
                        </li>
                        </ul>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
                        <h1 class="display-3">
                        <a href="#" class="text-white">
                            <img style="width: 200px;" src="assets/images/logo1.png" alt="">
                        </a>
                        </h1>
                        <h2 class="text-white mb-5">...</h2>
                        <a class="text-white" href="#"><i class="fab fa-instagram fa-lg"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-facebook fa-lg mx-1"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-telegram fa-lg"></i></a>
                        <hr>
                        <div class="d-flex justify-content-center mt-5"><p id="createdby" class="text-light position-absolute" style="bottom: 0px;">Created by Ashkan811 &copy;</p></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

<div class="loader" id="loader"></div>
<div class="blackhole" id="blackhole"></div>

</html>