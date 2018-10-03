<?php require "../db.php";
require "../functions.php"; ?> <!--Подключаемся к базе-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Главная - Criptonomik</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Criptonomik" name="description" />
        <meta content="Criptonomik" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="assets/images/logo.png" alt="" height="16">
                        </span>
                        <i>
                            <img src="assets/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        <li class="dropdown notification-list hide-phone">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                               <i class="mdi mdi-earth"></i> English  <i class="mdi mdi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Spanish
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Italian
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    French
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Russian
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?php echo($_SESSION['logged_user']->login); ?> <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <!--h6 class="text-overflow m-0">Добро пожаловать !</h6-->
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>Мой аккаунт</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Настройки</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>FAQ</span>
                                </a>

                                <!-- item-->
                                <!--a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-lock"></i> <span>Lock Screen</span>
                                </a-->

                                <!-- item-->
                                <a href="../logout.php" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Выход</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <!--li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li-->
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <!--li class="menu-title">Navigation</li-->
                            <li>
                                <a href="index.html">
                                    <i class="mdi mdi-home"></i> <span> Главная </span>
                                </a>
                            </li>
							<li>
								<a href="/backoffice/balances.php"><i class="fi-briefcase"></i> <span> Инвестировать </span></a>
							</li>
							<li>
                                <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span> Тарифы </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="icons-materialdesign.html">Старт</a></li>
                                    <li><a href="icons-dripicons.html">Профессионал</a></li>
                                    <li><a href="icons-fontawesome.html">ViP</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="javascript: void(0);"><i class="mdi mdi-account-multiple"></i><span> Партнерам</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="chart-flot.html">Возможности</a></li>
                                    <li><a href="chart-morris.html">Моя карьера</a></li>
                                    <li><a href="chart-chartjs.html">Моя Структура</a></li>
                                    <li><a href="chart-sparkline.html">Мой куратор</a></li>
                                </ul>
                            </li>
							<li>
                                <a href="javascript: void(0);"><i class="mdi mdi-auto-fix"></i><span> Инструменты </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
									<li><a href="icons-materialdesign.html">Калькулятор доходов</a></li>
                                    <li><a href="/backoffice/calendar.php">Календарь инвестора</a></li>   
                                </ul>
                            </li>
							<li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Статистика </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="ui-typography.html">Моя статистика</a></li>
                                    <li><a href="ui-cards.html">Статистика структуры</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="mdi mdi-settings"></i> </span> <span class="menu-arrow"></span><span> Настройки </span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/backoffice/account.php">Аккаунт</a></li>
                                    <li><a href="form-advanced.html">Безопасность</a></li>
                                    <li><a href="form-validation.html">Мои реквизиты</a></li>
                                    <li><a href="form-pickers.html">Верификация</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="../logout.php"><i class="mdi mdi-exit-to-app"></i> <span> Выход </span> </a>                        
                            </li>                     
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Личный кабинет партнера</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Cryptonomik</a></li>
                                        <li class="breadcrumb-item active">Личный кабинет партнера</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
						 <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-box float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Актив-бонус</h6>
                                    <h4 class="mb-3" data-plugin="counterup">1,587</h4>
                                    <span class="badge badge-primary"> +11% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-layers float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Пассив-бонус</h6>
                                    <h4 class="mb-3">$<span data-plugin="counterup">46,782</span></h4>
                                    <span class="badge badge-primary"> -29% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-tag float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Статус-бонус</h6>
                                    <h4 class="mb-3">$<span data-plugin="counterup">15.9</span></h4>
                                    <span class="badge badge-primary"> 0% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-briefcase float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Инвест-бонус</h6>
                                    <h4 class="mb-3" data-plugin="counterup">1,890</h4>
                                    <span class="badge badge-primary"> +89% </span> <span class="text-muted ml-2 vertical-middle">Last year</span>
                                </div>
                            </div>
                        </div>
<!-- Inline Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Балансы мультикошелька</b></h4>
									<div class="col-sm-12">
									
									<button type="button" class="btn btn-custom btn-rounded waves-light waves-effect w-md">USD</button>
									<button type="button" class="btn btn-custom btn-rounded waves-light waves-effect w-md">BTC</button>
									<button type="button" class="btn btn-custom btn-rounded waves-light waves-effect w-md">ETH</button>
									<button type="button" class="btn btn-custom btn-rounded waves-light waves-effect w-md">CN</button>
									</div>
                                </div>
                            </div>
                        </div>
						
                        <!-- end row -->
						<div class="card-box">
                                    <h4 class="m-t-0 header-title">Кейсы</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        
                                    </p>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            
                                            <th>Валюта</th>
                                            <th>Кейсы</th>
                                            <th>Монеты</th>
											<th>Сумма (USD)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">USD</th>
                                            <td>0шт.</td>
                                            <td>$0</td>
                                            <td>0 USD</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">BTC</th>
                                            <td>0шт.</td>
                                            <td>0 BTC</td>
                                            <td>0 USD</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">ETH</th>
                                            <td>0шт.</td>
                                            <td>oETH</td>
                                            <td>0 USD</td>
                                        </tr>
										<tr>
                                            <th scope="row">CN</th>
                                            <td>0шт.</td>
                                            <td>0CN</td>
                                            <td>0 USD</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
								


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 - 2018 © Cryptonomik.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!-- Chart JS -->
        <script src="../plugins/chart.js/chart.bundle.js"></script>

        <!-- init dashboard -->
        <script src="assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>