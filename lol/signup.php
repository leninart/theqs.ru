<?php require "db.php"; 
require "functions.php"; ?> <!--Подключаемся к базе-->
<!-- Обработчик формы ввода -->
<?php
				
	$data = $_POST;
 	if (isset($data['do_signup'])) { //Проверяет существует ли ячейка do_signup
 		$errors = array(); //Создаем массив errors() в который мы помещаем все ошибки при проверке
 		if( trim($data['login']) == ''){
 			$errors[] = 'Введите логин';
 		}
 		if( trim($data['email']) == ''){
 			$errors[] = 'Введите email';
 		}
 		if( $data['password'] == ''){
 			$errors[] = 'Введите пароль';
 		}
 		if( $data['password'] != $data['password_2']){
 			$errors[] = 'Пароли не совпадают';
 		}
 		//Проверка на занятость
 		if( R::count('users', 'login = ?', array($data['login']) ) > 0 )
 		{
 			$errors[] = 'Этот логин занят';
 		}
 		if( R::count('users', 'email = ?', array($data['email']) ) > 0 )
 		{
 			$errors[] = 'Этот email занят';
 		}


 		if(empty($errors)){
 			//Если ошибок нет -> регистрируем
 			$user = R::dispense('users');
 			$user->login = $data['login'];
 			$user->email = $data['email'];
 			$user->access = 'user';
 			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
 			$user->surname = '';
 			$user->firstname = '';
 			$user->patronymic = '';
 			$user->phone = '';
 			$user->vk = '';
 			$user->facebook = '';
 			$user->odnoklassniki = '';
 			$user->telegram = '';
 			$user->viber = '';
 			$user->watsup = '';
 			$user->skype = '';
 			$user->avatar = '';
 			$user->join_date = date("F j, Y, g:i a");
 			$user->activation = GetActivationLink($login);
 			// Отправляем проверочное письмо
 			$login = $data['login'];

 			$activation = getActivationLink($login);
 				mail("oborona.sound@gmail.com", "Новый пользователь ".$data['login'], $data['login']); //Оповещение админу
 				mail($data['email'], "Регистрация в системе cashblack", "Пройдите по ссылке, чтобы активировать свою учетную запись и начать работать

 					http://p363353.for-test-only.ru/act.php?login=$login&key=$activation

 					Если вы не регистрировались на данном ресурсе, то удалите письмо и не переходите по ссылке.");
 			//Отправляем проверочное письмо end
 			R::store($user);
 			echo "<div>Вы успешно зарегистрированы<br>Проверьте свой почтовый ящик, чтобы подтвердить свою учетную запись</div><hr>";
} else {
 			echo "<div id='errors'>".array_shift($errors)."</div><hr>";
 		}
 	}
?>
<!-- Обработчик формы ввода  end-->

<form action="/signup.php" method="POST">
	<p>
		<p><strong>Логин:</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>
	<p>
		<p><strong>Ваш EMAIL:</strong></p>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>" >
	</p>
	<p>
		<p><strong>Пароль:</strong></p>
		<input type="password" name="password">
	</p>
	<p>
		<p><strong>Повторите пароль:</strong></p>
		<input type="password" name="password_2">
	</p>
	<p>
		<button type="submit" name="do_signup">Зарегистрироваться</button>
	</p>
</form>
