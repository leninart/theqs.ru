<?php require "db.php";
    $data = $_POST;
    if( isset($data['do_login']) )
    {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']) );
        if( $user )
        {
            //Логин найден
            if ( password_verify( $data['password'], $user->password) )
            { 
                if($user->activation == 1)
                {
                //Логинимся
                $_SESSION['logged_user'] = $user;
                    switch ($_SESSION['logged_user']->access) {
                        case 'user':
                        	header('Location: http://p363353.for-test-only.ru/backoffice/lk.php');
                            break;
                        case 'admin':
                            header('Location: http://p363353.for-test-only.ru/dasusers/lk.php');
                            break;
                        case 'admin':
                            header('Location: http://p363353.for-test-only.ru/dasusers/lk.php');
                            break;
                    
                        default:
                            echo "<a class='hello' href='logout.php'>Выйти</a>";
                            break;
                    }
                } else echo 'Вы не подтвердили свой email. Пройдите по ссылке из письма. Или запросите <form action="/reactivation.php"><button type="submit">новое письмо активации</button></form>';
                
            } else
            {
                $errors[] = 'Пароль не верный!';
            }
        } else
        {
            $errors[] = 'Данный логин не найден!';
        }

        if( ! empty($errors) )
        {
            echo '<div>'.array_shift($errors).'</div><hr>';
        } 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Вход - Criptonomik</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Criptonomik" name="description" />
        <meta content="Criptonomik" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="backoffice/assets/images/favicon.ico">

        <!-- App css -->
        <link href="backoffice/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="backoffice/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="backoffice/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="backoffice/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="backoffice/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="backoffice/assets/images/logo_dark.png" alt="" height="18"></span>
                                            </a>
                                        </h2>
                                        <h6 class="text-uppercase text-center font-bold mt-4">Вход</h6>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" method="POST" action="/login.php">
											<div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="login">Логин</label>
                                                    <input class="form-control" type="login" id="login" name="login" value="<?php echo @$data['login']; ?>" required="" placeholder="Введите ваш логин">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <a href="page-recoverpw.php" class="text-muted pull-right"><small>Забыли свой пароль?</small></a>
                                                    <label for="password">Пароль</label>
                                                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="Введите ваш пароль">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Запомнить
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-block btn-gradient waves-effect waves-light" name="do_login" type="submit">Войти</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">У вас нет аккаунта? <a href="page-register.html" class="text-dark m-l-5"><b>Регистрация</b></a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>