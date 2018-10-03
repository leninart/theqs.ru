<?php
	require "db.php";

		$data = $_POST;
		if(isset($data['do_login']))
		{
			$errors = array();
/* Проверяем по телефону */

			$tel = R::findOne('users', 'tel = ?', array($data['tel']));
			if( $tel)
			{
				//логин существует
				if ( password_verify($data['password'], $tel->password))
				{
					//Все хорошо! Логиним пользователя.
					$_SESSION['logged_user'] = $tel;
					if ( $data['tel'] != '89277570651'){
						header('Location: http://theqs.ru/lk.php');
					}
					else{header('Location: http://theqs.ru/adminpanel.php');}					

				} else 
				{	
					if($tel['activated'] > 0 ){$errors[] = 'Пароль не верен!'; }
					else echo("<a href='http://theqs.ru/signup.php'>Активируйте ваш аккаунт через Регистрацию</a>");			
				}

			}
			else {$errors[] = 'Пользователь не найден';}
				/* Проверяем по телефону конец */

			} else 
			{
				//когда только открыл страницу
			}
			


			//здесь логинимся
			//if ( trim($data['login']) == '')  //trim удаляет пробелы
			//{
			//	$errors[] = 'Введите логин!';
			//}
			//if ( $data['password'] == '') 
			//{
			//	$errors[] = 'Введите пароль!';
			//}  

			if ( ! empty($errors) )
			{
				echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
			}
		
	?>

<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">

<body>

	<div class="login-wrap">
		<div class="login-html">
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Войти</label>
			<!-- DELETE!!! -->
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><a href="/signup.php">Регистрация</a></label>
			<!-- /DELETE!!! -->
			<div class="login-form">
				<div class="sign-in-htm">
					<form action="login.php" method="POST">
						<div class="group">
							<label for="user" class="label">Телефон</label>
						

<!-- Проверяем телефон на корректность через jquery.inputmask.js -->
							<input id="user" type="tel" class="input" name="tel" value="<?php echo @$data['tel']; ?>" 
						 pattern="8[0-9]{3}[0-9]{3}[0-9]{4}"  TITLE="Например 89171400798">
							
							<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
							<script type="text/javascript" src="/js/jquery.inputmask.js"></script>
							<script type="text/javascript">
							$(document).ready(function() {
								$("#user").inputmask("+7(999)999-99-99");//ìàñêà
							});
							</script> -->


						</div>
						<div class="group">
							<label for="pass" class="label">Пароль</label>
							<input id="pass" type="password" class="input" data-type="password" name="password" value="<?php echo @$data['password']; ?>">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Запомнить меня</label>
						</div>
						<div class="group">
							<input type="submit" class="button" name="do_login" value="Войти">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot">Забыли пароль?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>