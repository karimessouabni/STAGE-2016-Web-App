<?php
session_start();
require_once 'admin.php';


$user_home = new Admin();

if (!$user_home->estConnecte()) {
    header("Location: accueil.php");
}

$stmt = $user_home->getConnexion()->prepare("SELECT * FROM tbl_users WHERE userID=:uid");

$stmt->execute(array(":uid" => $_SESSION['actuelAdmin']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Profile de <?php echo $row['userName']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" contenu="IE=edge">
    <meta name="viewport" contenu="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

    <link href="../css/home.css" rel="stylesheet" type="text/css">

    <script src="http://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    <script src="../js/jquery.bootstrap-autohidingnavbar.js"></script>


    <style>

        body {
            position: relative;
            overflow-x: hidden;
        }

        body,
        html {
            height: 100%;
        }

        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
            background-color: transparent;
        }

        /*-------------------------------*/
        /*           Wrappers            */
        /*-------------------------------*/

        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-left: 220px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            left: 220px;
            width: 0;
            height: 100%;
            margin-left: -220px;
            overflow-y: auto;
            overflow-x: hidden;
            background: #1a1a1a;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #sidebar-wrapper::-webkit-scrollbar {
            display: none;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 220px;
        }

        #page-content-wrapper {
            width: 100%;
            padding-top: 0px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: -220px;
        }

        /*-------------------------------*/
        /*     Sidebar nav styles        */
        /*-------------------------------*/

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 220px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            position: relative;
            line-height: 20px;
            display: inline-block;
            width: 100%;
        }

        .sidebar-nav li:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 3px;
            background-color: #1c1c1c;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .sidebar-nav li:first-child a {
            color: #fff;
            background-color: #1a1a1a;
        }

        .sidebar-nav li:nth-child(2):before {
            background-color: #47464b;
        }

        .sidebar-nav li:nth-child(3):before {
            background-color: #79aefe;
        }

        .sidebar-nav li:nth-child(4):before {
            background-color: #314190;
        }

        .sidebar-nav li:nth-child(5):before {
            background-color: #279636;
        }

        .sidebar-nav li:nth-child(6):before {
            background-color: #7d5d81;
        }

        .sidebar-nav li:nth-child(7):before {
            background-color: #ead24c;
        }

        .sidebar-nav li:nth-child(8):before {
            background-color: #2d2366;
        }

        .sidebar-nav li:nth-child(9):before {
            background-color: #35acdf;
        }

        .sidebar-nav li:hover:before,
        .sidebar-nav li.open:hover:before {
            width: 100%;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .sidebar-nav li a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 15px 10px 30px;
        }

        .sidebar-nav li a:hover,
        .sidebar-nav li a:active,
        .sidebar-nav li a:focus,
        .sidebar-nav li.open a:hover,
        .sidebar-nav li.open a:active,
        .sidebar-nav li.open a:focus {
            color: #fff;
            text-decoration: none;
            background-color: transparent;
        }

        .sidebar-nav > .sidebar-brand {
            height: 65px;
            font-size: 20px;
            line-height: 44px;
        }

        .sidebar-nav .dropdown-menu {
            position: relative;
            width: 100%;
            padding: 0;
            margin: 0;
            border-radius: 0;
            border: none;
            background-color: #222;
            box-shadow: none;
        }

        /*-------------------------------*/
        /*       Hamburger-Cross         */
        /*-------------------------------*/

        .hamburger {
            position: fixed;
            top: 20px;
            z-index: 999;
            display: block;
            width: 32px;
            height: 32px;
            margin-left: 15px;
            background: transparent;
            border: none;
        }

        .hamburger:hover,
        .hamburger:focus,
        .hamburger:active {
            outline: none;
        }

        .hamburger.is-closed:before {
            content: '';
            display: block;
            width: 100px;
            font-size: 14px;
            color: #fff;
            line-height: 32px;
            text-align: center;
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover:before {
            opacity: 1;
            display: block;
            -webkit-transform: translate3d(-100px, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed .hamb-top,
        .hamburger.is-closed .hamb-middle,
        .hamburger.is-closed .hamb-bottom,
        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-middle,
        .hamburger.is-open .hamb-bottom {
            position: absolute;
            left: 0;
            height: 4px;
            width: 100%;
        }

        .hamburger.is-closed .hamb-top,
        .hamburger.is-closed .hamb-middle,
        .hamburger.is-closed .hamb-bottom {
            background-color: #1a1a1a;
        }

        .hamburger.is-closed .hamb-top {
            top: 5px;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed .hamb-middle {
            top: 50%;
            margin-top: -2px;
        }

        .hamburger.is-closed .hamb-bottom {
            bottom: 5px;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover .hamb-top {
            top: 0;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover .hamb-bottom {
            bottom: 0;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-middle,
        .hamburger.is-open .hamb-bottom {
            background-color: #1a1a1a;
        }

        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-bottom {
            top: 50%;
            margin-top: -2px;
        }

        .hamburger.is-open .hamb-top {
            -webkit-transform: rotate(45deg);
            -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
        }

        .hamburger.is-open .hamb-middle {
            display: none;
        }

        .hamburger.is-open .hamb-bottom {
            -webkit-transform: rotate(-45deg);
            -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
        }

        .hamburger.is-open:before {
            content: '';
            display: block;
            width: 100px;
            font-size: 14px;
            color: #fff;
            line-height: 32px;
            text-align: center;
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-open:hover:before {
            opacity: 1;
            display: block;
            -webkit-transform: translate3d(-100px, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        /*-------------------------------*/
        /*            Overlay            */
        /*-------------------------------*/

        .overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(250, 250, 250, .8);
            z-index: 1;
        }</style>
    <script type="text/javascript">
        $(document).ready(function () {
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;

            trigger.click(function () {
                hamburger_cross();
            });

            function hamburger_cross() {

                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function () {
                $('#wrapper').toggleClass('toggled');
            });
        });

    </script>

    <script>


        function load_home() {
            $('#containerDSIC').load('allProjects.php');
        }

        function load_menu1() {
            window.location.replace('home.php');
        }

        function load_menu2() {
            $('#containerDSIC').load('addProjet.php');
        }


    </script>


    <!--    ADDEDD TEST -->
    <style>

        body {
            position: relative;
            overflow-x: hidden;
        }

        body,
        html {
            height: 100%;
        }

        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus {
            background-color: transparent;
        }

        /*-------------------------------*/
        /*           Wrappers            */
        /*-------------------------------*/

        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-left: 220px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            left: 220px;
            width: 0;
            height: 100%;
            margin-left: -220px;
            overflow-y: auto;
            overflow-x: hidden;
            background: #1a1a1a;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #sidebar-wrapper::-webkit-scrollbar {
            display: none;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 220px;
        }

        #page-content-wrapper {
            width: 100%;
            padding-top: 0px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: -220px;
        }

        /*-------------------------------*/
        /*     Sidebar nav styles        */
        /*-------------------------------*/

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 220px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            position: relative;
            line-height: 20px;
            display: inline-block;
            width: 100%;
        }

        .sidebar-nav li:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 3px;
            background-color: #1c1c1c;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .sidebar-nav li:first-child a {
            color: #fff;
            background-color: #1a1a1a;
        }

        .sidebar-nav li:nth-child(2):before {
            background-color: #47464b;
        }

        .sidebar-nav li:nth-child(3):before {
            background-color: #5f5d64;
        }

        .sidebar-nav li:nth-child(4):before {
            background-color: #7a7780;
        }

        .sidebar-nav li:nth-child(5):before {
            background-color: #9f9ba7;
        }

        .sidebar-nav li:nth-child(6):before {
            background-color: #c9c4d3;
        }

        .sidebar-nav li:nth-child(7):before {
            background-color: #ebe5f7;
        }

        .sidebar-nav li:nth-child(8):before {
            background-color: #ebe5f7;
        }

        .sidebar-nav li:nth-child(9):before {
            background-color: #f3f6ff;
        }

        .sidebar-nav li:hover:before,
        .sidebar-nav li.open:hover:before {
            width: 100%;
            -webkit-transition: width .2s ease-in;
            -moz-transition: width .2s ease-in;
            -ms-transition: width .2s ease-in;
            transition: width .2s ease-in;

        }

        .sidebar-nav li a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 10px 15px 10px 30px;
        }

        .sidebar-nav li a:hover,
        .sidebar-nav li a:active,
        .sidebar-nav li a:focus,
        .sidebar-nav li.open a:hover,
        .sidebar-nav li.open a:active,
        .sidebar-nav li.open a:focus {
            color: #fff;
            text-decoration: none;
            background-color: transparent;
        }

        .sidebar-nav > .sidebar-brand {
            height: 65px;
            font-size: 20px;
            line-height: 44px;
        }

        .sidebar-nav .dropdown-menu {
            position: relative;
            width: 100%;
            padding: 0;
            margin: 0;
            border-radius: 0;
            border: none;
            background-color: #222;
            box-shadow: none;
        }

        /*-------------------------------*/
        /*       Hamburger-Cross         */
        /*-------------------------------*/

        .hamburger {
            position: fixed;
            top: 20px;
            z-index: 999;
            display: block;
            width: 32px;
            height: 32px;
            margin-left: 15px;
            background: transparent;
            border: none;
        }

        .hamburger:hover,
        .hamburger:focus,
        .hamburger:active {
            outline: none;
        }

        .hamburger.is-closed:before {
            content: '';
            display: block;
            width: 100px;
            font-size: 14px;
            color: #fff;
            line-height: 32px;
            text-align: center;
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover:before {
            opacity: 1;
            display: block;
            -webkit-transform: translate3d(-100px, 0, 0);
            -webkit-transition: all .35s ease-in-out;

        }

        .hamburger.is-closed .hamb-top,
        .hamburger.is-closed .hamb-middle,
        .hamburger.is-closed .hamb-bottom,
        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-middle,
        .hamburger.is-open .hamb-bottom {
            position: absolute;
            left: 0;
            height: 4px;
            width: 100%;
        }

        .hamburger.is-closed .hamb-top,
        .hamburger.is-closed .hamb-middle,
        .hamburger.is-closed .hamb-bottom {
            background-color: #1a1a1a;
        }

        .hamburger.is-closed .hamb-top {
            top: 5px;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed .hamb-middle {
            top: 50%;
            margin-top: -2px;
        }

        .hamburger.is-closed .hamb-bottom {
            bottom: 5px;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover .hamb-top {
            top: 0;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-closed:hover .hamb-bottom {
            bottom: 0;
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-middle,
        .hamburger.is-open .hamb-bottom {
            background-color: #1a1a1a;
        }

        .hamburger.is-open .hamb-top,
        .hamburger.is-open .hamb-bottom {
            top: 50%;
            margin-top: -2px;
        }

        .hamburger.is-open .hamb-top {
            -webkit-transform: rotate(45deg);
            -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
        }

        .hamburger.is-open .hamb-middle {
            display: none;
        }

        .hamburger.is-open .hamb-bottom {
            -webkit-transform: rotate(-45deg);
            -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
        }

        .hamburger.is-open:before {
            content: '';
            display: block;
            width: 100px;
            font-size: 14px;
            color: #fff;
            line-height: 32px;
            text-align: center;
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        .hamburger.is-open:hover:before {
            opacity: 1;
            display: block;
            -webkit-transform: translate3d(-100px, 0, 0);
            -webkit-transition: all .35s ease-in-out;
        }

        /*-------------------------------*/
        /*            Overlay            */
        /*-------------------------------*/

        .overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(250, 250, 250, .8);
            z-index: 1;
        }

        .hamburger.is-closed.k {

            /*margin-top: 30px !important;*/
        }
    </style>

    <!--    TEST -->

</head>

<body>

<!-- Side Menu a gauche -->


<!-- Side Menu -->


<div id="wrapper">


    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    DSIC
                </a>
            </li>
            <li>
                <a href="#" onclick="load_home()">Suivie</a>
            </li>
            <li>
                <a href="#">Statistiques</a>
            </li>
            <li>
                <a href="#">Localisation</a>
            </li>
            <li>
                <a href="#">A propos</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>


        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
    <div id="page-content-wrapper">

        <button type="button" data-toggle="offcanvas" class="hamburger is-closed">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="navbar navbar-default menuebar" role="navigation">
            <div class="container">


                <div class="navbar-collapse collapse">


                    <ul class="nav navbar-nav">

                        <li><a href="#" onclick="load_menu1()">Accueil</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Une autre action</a></li>
                                <li><a href="#">Autre chose a faire</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Navigation header</li>
                                <li><a href="#">lien vers qq chose</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" id="dropM" class="dropdown-toggle" data-toggle="dropdown"><img
                                    class="imgprofile"
                                    src="https://instagramstatic-a.akamaihd.net/h1/images/ico/favicon-192.png/b407fa101800.png"><b
                                    class="glyphicon glyphicon-chevron-down"></b>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action </a></li>
                                <li><a href="#">Cliquer pour une autre action</a></li>
                                <li><a href="#">Reglages</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Reglages</li>
                                <li><a href="#">Modifier la photo du profile</a></li>
                                <li><a href="deconnexion.php" href="#">Deconnexion </a></li>
                                <li class="divider"></li>
                                <li><a href="#">Aide</a></li>
                                <li><a href="#">Signaler un probleme</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-10 col-lg-offset-1" id="containerDSIC">


            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>Préfecture de Meknès</h1>
                    <p>La préfecture de Meknès est une subdivision à dominante urbaine de la région marocaine de
                        Fès-Meknès. Elle englobe depuis 2003 les anciennes préfectures de Meknès-El Menzeh et d'Al
                        Ismaïlia. Le chef-lieu de la préfecture est la ville de Meknès </p>
                    <p>La Région de Fès-Meknès (en amazighe : Tamnaḍt n Fas Amknas ⵜⴰⵎⵏⴰⴹⵜ ⵏ ⴼⴰⵙ ⴰⵎⴽⵏⴰⵙ, en arabe : فاس
                        مكناس) est une des douze nouvelles régions du Maroc instituées par le découpage territorial de
                        20151. Depuis septembre 2015, son président est Mohand Laenser.</p>
                    <p>La région de Fès-Meknès inclut l'ancienne région de Fès-Boulemane avec la moitié nord de celle de
                        Meknès-Tafilalet, savoir la préfecture de Meknès et les provinces d’Hajeb, Ifrane et Midelt.</p>
                    <p>Le climat est généralement continental avec des influences méditerranéennes sur la zone de
                        Fès-Meknès. La province d'Ifrane jouit d'un climat océanique dégradé comparable à celui de la
                        région parisienne. Les neiges sont abondantes dans une grande partie de cette région. Hormis la
                        province de Midelt, cette région reçoit une moyenne très élevée de précipitations par an.</p>
                    <p>Le tourisme dans la région est essentiellement un tourisme culturel dû au patrimoine historique,
                        architectural de renommée internationale. Grâce à la présence de plusieurs sources minérales et
                        stations thermales, notamment celles de Moulay Yaâcoub et Sidi Harazem, la destination est
                        considérée comme une destination de choix pour les amateurs du tourisme de repos et de cure.
                        Ajoutons également le tourisme de montagne qui occupe une place importante dans la région, et ce
                        grâce à l’existence d'atouts importants et diversifiés particulièrement: la diversité naturelle,
                        la multiplicité des sites, la présence des sources, des lacs, des forêts et des cascades.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>


<div class='notifications bottom-right'></div>


<script>
    $("div.navbar-fixed-top").autoHidingNavbar();
</script>

</body>

</html>
