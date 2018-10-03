<?php 
	require "db.php";
	require "functions.php";
?>
<link rel="stylesheet" href="style-modal.css">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
 <link rel="stylesheet" href="style.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">

<?php if( isset($_SESSION['logged_user']) ) {?>
	

 	<?php if (isset($_SESSION['logged_user']))?>
		<div class="mycard" >			

		<form action="lk.php" class="contact_form" name="contact_form" method="POST">

		<?php $_SESSION['card_id'] = $_POST['card_id']; ?>
		<ul>
	        <li>
	             <h2>Карта клиента</h2>
	             <span class="required_notification">* Обязательные поля</span>
	        </li>
			 <li>
	            <label for="name">Номер Карты:</label>
	            <input type="number" name="card_id" value="<?php echo $_SESSION['logged_user'] -> card_id;?>" disabled />
	        </li>

	        <li>
	            <label for="name">Имя:</label>
	            <input type="text" name="name" value="<?php echo $_SESSION['logged_user'] -> name; ?>" placeholder="Маша Иванова" required />
			</li>
	        <li>
	            <label for="email">Телефон:</label>
	            <input type="tel" id="phonenumber" name="tel" placeholder="89171400798" pattern="8[0-9]{3}[0-9]{3}[0-9]{4}" value="<?php echo $_SESSION['logged_user'] -> tel; ?>"  required/>
	        
	        </li>
			<li>
	            <label for="name">Бонусы:</label>
	            <input type="number" name="bonuses" value="<?php echo $_SESSION['logged_user'] -> bonus?>" disabled/>
	        </li>
	        <li>
        		<button class="submit" type="submit" name="do_signup">Подтвердить</button>
        	</li>


		</ul>

			 <div class="qrcode">
			<iframe  width="153px" frameborder="0" scrolling="no" seamless src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://theqs.ru/bonus.php?card_id=<?php echo $card_id ?>"></iframe>
			
		</div>
</form>
<form action="logout.php" style="float: left; margin: 10px;">
<button action="logout.php" type="submit" class="submit">Выйти</button>
</form>
<?php if ($_SESSION['logged_user']->login == 'alinasidr') print_r('<form action="http://theqs.ru/adminpanel.php" style="float: left; margin: 10px;">
<button action="http://theqs.ru/adminpanel.php" type="submit" class="submit">В Админку</button>
</form>')?>

	
<?php } 
else print_r('<form action="http://theqs.ru/signup.php" style="float: left; margin: 20% 40%;">
<button action="http://theqs.ru/signup.php" type="submit" class="submit">Зарегистрироваться</button>
</form>')?>
