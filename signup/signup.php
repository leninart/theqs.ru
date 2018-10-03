<?php 
		require "db.php";

		$data = $_POST;
		if(isset($data['do_signup']))
		{
			//здесь регистрируем
			$errors = array();
			if ( trim($data['card_id']) == '')  //trim удаляет пробелы
			
			{
				$errors[] = 'Введите номер карты!';
			}
			if ( R::count('users', "card_id = ?", array($data['card_id'])) < 1) 
			{
				$errors[] = 'Этой карты не существует';
			}
			 

			$client = R::findOne('users', 'card_id = ?', array($data['card_id']));
			if($client['activated'] > 0 )
			{
 			$errors[] = 'This card activated!!!';
			}
			if ( R::count('users', "l = ?", array($data['email'])) > 0) 
			{
				$errors[] = 'Этот email занят';
			}
			if ( trim($data['login']) == '')  //trim удаляет пробелы
			
			{
				$errors[] = 'Введите логин!';
			}			

			if ( $data['password'] == '') 
			{
				$errors[] = 'Введите пароль!';
			}
			if ( $data['password_2'] != $data['password'] ) 
			{
				$errors[] = 'Повторный пароль введен неверно!';
			}
			if ( R::count('users', "login = ?", array($data['login'])) > 0) 
			{
				$errors[] = 'Этот логин занят';
			}
			
			$subbean = R::dispense('users');

			if (empty($errors))
			{
				//Все хорошо, регистрируемся
				$card_id = $data['card_id'];
				$login = $data['login'];
				$email = $data['email'];
				$password = password_hash($data['password'], PASSWORD_DEFAULT);
				if (isset($data['do_signup'])){
					$bonus_reg = $client['bonus']; /* Баллы за активацию или регистрацию */
				R::exec( "UPDATE users SET 
					login = '$login',
					email = '$email',
					password = '$password',
					bonus = '$bonus_reg',
					activated = 1
					 WHERE card_id = '$card_id' " );}
				//$user->bonus = 0; +50
				//сделать подробнее проверку телефона т.к в сафаот и ослике инпутовская проверка не работает и забивается всякий шлак
				
				
				echo '<div style = "color: green;">Вы успешно зарегистрированы!</div><hr>
				<a href="/index.html">На главную</a>';
			} else
			{
				echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
			}
		}

	?>

<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">

<body>

			<p id="myBtn">Еще нет бонусной карты?</p>
					<div id="myModal" class="modal">
						<div class="modal-content">
							<span id="closes" class="close">&times;</span>
							<form action="">
							<p>Введите номер телефона:</p>
							<input type="number" name="contact"><br><br>
							<button type="submit">Получить</button>
							</form>
						</div>
					</div>
					<script type="text/javascript">
						var modal = document.getElementById('myModal');
						var btn = document.getElementById("myBtn");
						var span = document.getElementsByClassName("close")[0];

						btn.onclick = function() {
							modal.style.display = "block";
						}
						closes.onclick = function() {
							modal.style.display = "none";
						}

						window.onclick = function(event){
							if (event.target == modal) {
								modal.style.display = "none";
							}
						}
					</script>


	<form action="signup.php" method="POST">

	<div class="login-wrap">
	<div class="login-html">
		
		<!-- DELETE!!! -->
		<input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab"><a href="/login.php">Войти</a></label>
		<!-- /DELETE!!! -->
		<input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Регистрация</label>
		
		
		<div class="login-form">
			

			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Номер вашей карты</label>
					<input id="user" type="number" class="input" name="card_id" value="<?php echo @$data['card_id']; ?>">
				</div>
				<div class="group">
					<label for="user" class="label">Ваше имя</label>
					<input id="user" type="text" class="input" name="login" value="<?php echo @$data['login']; ?>">
				</div>
				<div class="group">
					<label for="pass" class="label">Пароль</label>
					<input id="pass" type="password" class="input" data-type="password" name="password" value="<?php echo @$data['password']; ?>">
				</div>
				<div class="group">
					<label for="pass" class="label">Повторите пароль</label>
					<input id="pass" type="password" class="input" data-type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Зарегистрироваться" name="do_signup">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">

					
				</div>
			</div>
			
		</div>
	</div>
</div>



</body>