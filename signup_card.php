<?php 
	require "db.php";
?>

<?php if( isset($_SESSION['logged_user']) ) : ?>
	Hello, <?php echo $_SESSION['logged_user'] -> login; ?> !<br>
<a href="logout.php">Выйти</a>
<!-- 

План: 
	Если идентификатор не зарегистрирован, значит выдаст поле для регистрации,
	А если зарегистрирован, то форму для выбора услуги и цены

 -->

 <!-- Если не админ, то выводим ему инфу -->
	<?php 	$admin = 'alinasidr'; ?>
 	<?php if (($_SESSION['logged_user'] -> login) != $admin) : ?>

		<p>You have a <?php echo $_SESSION['logged_user'] -> bonus; ?> bonus!</p>
 <!-- Если админ, то выводим рабочую панель -->
	<?php else : ?>
<!-- =========================================== -->

	<?php $data = $_POST;
		if(isset($data['do_signup']))
		{
			//здесь регистрируем
			$errors = array();
			/* if ( trim($data['login']) == '')  //trim удаляет пробелы
			{
				$errors[] = 'Введите логин!';
			}
			 if ( trim($data['email']) == '') 
			{
				$errors[] = 'Введите email!';
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
			if ( R::count('users', "email = ?", array($data['email'])) > 0) 
			{
				$errors[] = 'Этот email занят';
			} */
			if ( R::count('users', "card_id = ?", array($data['card_id'])) > 0) 
			{
				$errors[] = 'Эта карта уже используется';
			}
			if ( R::count('users', "tel = ?", array($data['tel'])) > 0) 
			{
				$errors[] = 'Этот телефон уже используется';
			}

			if (empty($errors))
			{
				
				//Все хорошо, регистрируемся
				$user = R::dispense('users');
				//$user->login = $data['login'];
				//$user->email = $data['email'];
				$user->bonus = $data['bonuses'];
				$user->tel = $data['tel'];
				$user->activated = 0;
				$user->name = $data['name'];
				$user->card_id = $data['card_id'];
				$user->surname = '';
 				$user->firstname = '';
 				$user->patronymic = '';
 				$user->vk = '';
 				$user->facebook = '';
 				$user->odnoklassniki = '';
 				$user->telegram = '';
 				$user->viber = '';
 				$user->watsup = '';
 				$user->skype = '';
 				$user->avatar = '';
 				$user->join_date = date("F j, Y, g:i a");
 				$user->activation = '';
				//сделать подробнее проверку телефона т.к в сафаот и ослике инпутовская проверка не работает и забивается всякий шлак
				//$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
				R::store($user); 
				unset($_SESSION['card_id']);
				echo '<div style = "color: green;">Вы успешно зарегистрированы!</div><hr>
				<a href="http://theqs.ru/adminpanel.php">На главную</a>';
/* Отправляем SMS клиенту */
	
	 $url = "https://semysms.net/api/3/sms.php"; //Адрес url для отправки СМС
	 $phone = $data['tel']; // Номер телефона
	 $msg = $data['name']."! Ваша бонусная карта ".$data['card_id']." активируйте ее на theqs.ru" ;  // Сообщение
	 $device = '71904';  // Код вашего устройства
	 $token = '18f825b6746b65202aa60a9a7c4f8881';  // Ваш токен (секретный)

	 $data = array(
	        "phone" => $phone,
	        "msg" => $msg,
	        "device" => $device,
	        "token" => $token
	    );

	    $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
	    $output = curl_exec($curl);
	    curl_close($curl);

	    echo $output;
	
/* end Отправляем SMS Клиенту */
			} else
			{
				echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
			}
		}

	?>

<link rel="stylesheet" href="style-modal.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">
<form action="http://theqs.ru/adminpanel.php">
<button action="http://theqs.ru/adminpanel.php" type="submit" class="submit">В Админку</button>
</form>

	<form action="signup_card.php" class="contact_form" name="contact_form" method="POST">

		<?php $_SESSION['card_id'] = $_POST['card_id']; ?>
		<ul>
	        <li>
	             <h2>Регистрация новой карты</h2>
	             <span class="required_notification">* Обязательные поля</span>
	        </li>
			 <li>
	            <label for="name">Номер Карты:</label>
	            <input type="number" name="card_id" value="<?php echo $_SESSION['card_id']; ?>" placeholder="00-000-000" maxlength="8" required />
	        </li>

	        <li>
	            <label for="name">Имя клиента:</label>
	            <input type="text" name="name" value="<?php echo @$data['name']; ?>" placeholder="Маша Иванова"  />
			</li>
	        <li>
	            <label for="email">Телефон:</label>
	            <input type="tel" id="phonenumber" name="tel" placeholder="89171400798" pattern="8[0-9]{3}[0-9]{3}[0-9]{4}" value="<?php echo @$data['tel']; ?>"  />
	            <span class="form_hint">Введите в формате 89171400798</span>
	        </li>
			<li>
	            <label for="name">Бонус за регистрацию:</label>
	            <input type="number" name="bonuses" value="50" required />
	        </li>
	        <li>
        		<button class="submit" type="submit" name="do_signup">Подтвердить</button>
        	</li>


		</ul>
</form>

<!-- =========================================== -->

			<?php endif; ?>

<?php else : ?>
	<a href="/login.php">Авторизоваться</a><br>
	<a href="/signup.php">Зарегистрироваться</a>
<?php endif; ?>	