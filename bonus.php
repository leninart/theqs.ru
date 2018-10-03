<?php 
	require "db.php";
?>
 <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
 <link rel="stylesheet" href="style.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">
<?php if( isset($_SESSION['logged_user']) ) : ?>
	<p>Королева, <?php echo $_SESSION['logged_user'] -> login; ?> !</p>
	<p><a href="logout.php" style="background: white;">Выйти</a></p>

<!-- 

План: 
	Если идентификатор не зарегистрирован, значит выдаст поле для регистрации,
	А если зарегистрирован, то форму для выбора услуги и цены

 -->

 <!-- Если не админ, то выводим ему инфу -->
 	<?php 	$admin = 'alinasidr'; ?>
 	<?php if (($_SESSION['logged_user'] -> login) != $admin) : ?>
		<div class="mycard" align="center">			
			<div>
			<p>Ваши бонусы <?php echo $_SESSION['logged_user'] -> bonus; ?> bonus!</p>
			</div>
			<div class="mycard2">
			<p>Номер карты <?php echo $_SESSION['logged_user'] -> card_id;
			 $card_id=$_SESSION['logged_user'] -> card_id ?></p>
			 </div>
		</div>
			 <div class="qrcode">
			<iframe  width="153px" frameborder="0" scrolling="no" seamless src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://theqs.ru/bonus.php?card_id=<?php echo $card_id ?>"></iframe>
			
		</div>
 <!-- Если админ, то выводим рабочую панель -->
	<?php else : ?>
		<p><a href="http://theqs.ru/adminpanel.php" style="background: white;">Перейти в кабинет</a></p>


		<?php $user = R::findOne('users', 'card_id = ?', array($_GET['card_id']));
			if( $user)
			{
					echo "<br>Имя клиента: ";
					echo $user->name;
					echo "<br>Баллов у клиента: ";
					echo $user->bonus;
					$card_id=$_GET['card_id'];
					echo ('<br>Номер карты: '.$card_id.'<br>');
					echo ('<iframe width="153px" frameborder="0" scrolling="no" seamless src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://theqs.ru/bonus.php?card_id='.$card_id.'"></iframe>');
			}
			else { echo ("<form action='signup_card.php' method='POST'>
				
				<p>Карта не зарегистрирована!</p>
				<p><button type='submit' name='signup_card'>Зарегистрировать карту</button></p>

				</form>"); $_SESSION['card_id'] = $_GET['card_id'];}
		?>

				<form action="bonuse.php" method="GET">
				<a href=""></a>
				<p>
					<p><strong>Card:</strong></p>
					<input type="number" name="card_id" value="<?php echo $_GET['card_id'];
					 ;?>">
				</p>

				<p>
					<p><strong>Price:</strong></p>
					<input type="number" name="price" value="">
				</p>

				<p>
					<label>
						<input type="radio" checked name="dva" value="addbonus" />Зачисление
					</label><br>
					<label>
						<input type="radio" name="dva" value="salebonus" />Списание
					</label><br>
					<label>
						<input type="radio" name="dva" value="win" />Подарок(Введите в price баллы)
					</label><br>
					<label>
						<input type="radio" name="dva" value="info" />Просмотр
					</label><br>
				</p>

				<!--<p><select name="hero">
    <option value="s1">Чебурашка</option>
    <option value="s2" selected>Крокодил Гена</option>
    <option value="s3">Шапокляк</option>
    <option value="s3" label="Лариса">Крыса Лариса</option>
   </select> -->


			    <p>
					<button type="submit" name="">OK</button>
				</p>

				</form>


			<?php endif; ?>


<?php else : ?>
	<a href="/login.php">Авторизоваться</a><br>
	<a href="/signup.php">Зарегистрироваться</a><br>
	<a href="/online.php">Записаться на прием</a>
	
<?php endif; ?>	
