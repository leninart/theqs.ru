<?php 
	require "db.php";
?>

<?php

	$user = R::findOne('users', 'card_id = ?', array($_GET['card_id']));

	
	$card_id = $_GET['card_id'];
	$old_bonuse = $user->bonus;
	$skidka = $old_bonuse*0.2;
	$bonus = $old_bonuse;
	echo (" Старый баланс ".$old_bonuse)." бонусов ";


		if ($_GET['dva'] == 'addbonus')
				{
					$add_bonus = $_GET['price']*0.05;
					$bonus = ( $add_bonus + $old_bonuse);

					echo ("Клиенту зачислено ".$add_bonus." баллов");
				}
		
		if ($_GET['dva'] == 'salebonus')
				{	
					if($user['activated'] > 0 )
					{
						$newprice = $_GET['price'] - $skidka;
						$newbonuse = $newprice*0.05;
						$bonus = $old_bonuse - $skidka + $newbonuse;


						echo ("Списано ".$skidka." баллов<br>Цена услуги теперь ".$newprice);
					}
					else {
						if($user==''){
							echo ('UNREGISTERed!');
						}
						else echo ('Клиент '.$user['name'].' не активирован!<br>Пусть дует регистрироваться!');}
				}
		if ($_GET['dva'] == 'win') /* Зачисляем подарок */
				{ 
					$add_bonus = $_GET['price'];
					$bonus = ( $add_bonus + $user->bonus);
					echo('Клиенту зачислено: '.$_GET['price'].' баллов.');

		}
		if ($_GET['dva'] == 'info') /* Карточка клиента */
					{ 
						$user = R::findOne('users', 'card_id = ?', array($_GET['card_id']));
							if( $user){
								echo "<p>Имя клиента: ";
								echo $user->name;
								echo "</p><p>Баллов у клиента: ";
								echo $user->bonus;
								echo ('</p><p>Номер карты: '.$card_id.'</p>');
								echo ('<p><iframe width="153px" frameborder="0" scrolling="no" seamless src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://theqs.ru/bonus.php?card_id='.$card_id.'"></iframe></p>');
								$bonus = $user->bonus;
					}
			else { echo ("<form action='signup_card.php' method='POST'>
				
				<p>Карта не зарегистрирована!</p>
				<p><button type='submit' name='signup_card'>Зарегистрировать карту</button></p>

				</form>"); $_SESSION['card_id'] = $_GET['card_id'];}

		}


	R::exec( "UPDATE users SET 

					bonus = '$bonus'

					 WHERE card_id = '$card_id' " );
?> 

<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">