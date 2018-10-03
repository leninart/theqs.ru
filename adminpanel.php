<?php 
	require "db.php";
?>
 <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
 <link rel="stylesheet" href="adminstyle.css">
<meta name="viewport" content="width-device-width, initial-scale = 1,0">
<?php if( isset($_SESSION['logged_user']) ) : ?>
	<!-- 

План: 
	Если идентификатор не зарегистрирован, значит выдаст поле для регистрации,
	А если зарегистрирован, то форму для выбора услуги и цены

 -->

 <!-- Если не админ, то выводим ему инфу -->
 	<?php 	$admin = 'alinasidr'; ?>
 	<?php if (($_SESSION['logged_user'] -> login) != $admin) : ?>

		<p>You have a <?php echo $_SESSION['logged_user'] -> bonus; ?> bonus!</p>
		<p>You card id <?php echo $_SESSION['logged_user'] -> card_id; ?></p>
 <!-- Если админ, то выводим рабочую панель -->
	<?php else : ?>
<!-- Панель админки -->

	<div class="adminpanel">
		<div class="info">
			<p class="hello">Hello, <?php echo $_SESSION['logged_user'] -> login; ?> !</p>
			<a class="hello" href="logout.php">Выйти</a>		
		</div>

		<div class="panel">
			<!-- Панель админки -->
	<?php

		$query1 = R::findAll( 'users' );
		    // а можно и так  $query = R::getAll( 'SELECT * FROM jobs' );
		    ?>
		    <!-- Созаем каркас таблицы -->
		    <a href="javascript:(function(){var%20w=window,ws=w.getSelection,d=document,ds=d.getSelection,r=[],i=0,n,s=''+(ws?ws():(ds?ds():d.selection.createRange().text));for(;i<s.length;i++){n=s.charCodeAt(i);n=n==0x401?0xA8:(n==0x451?0xB8:(n>=0x410&&n<=0x44F?n-0x350:n));if(n<=0xFF)r.push(n);}s=escape(String.fromCharCode.apply(null,r));s=(s?'d='+s:'t=l&l='+location);s=s.replace(/\+/g,encodeURIComponent('+'));w.open('http://qrcoder.ru?'+s,'_blank')})();">Create qr</a>
		    
		    	<a href="bonus.php">Работа с картами</a><br><br>

		    	<form action='signup_card.php' method='POST'>
				
					<p>

						<input type="number" name="card_id" value="" placeholder="Введите номер карты">
						

						<button type='submit' name='signup_card'>Зарегистрировать карту</button><br><br>
					
					</p>

				</form>
				
		<table border="1" align="center">
		    <tr>
		    </tr>
		    <tr>
		        <th> ID </th>
		        <th> name </th>
		        <th> activated </th>
		        <th> email </th>
		        <th> telephone </th>
		        <th> bonus </th>
		        <th> login </th>
		    </tr>
			<!-- /Созаем каркас таблицы -->
			<!-- Выводим значения в таблицу -->
		    <?php
		        foreach($query1 as $item):
		    ?>

		
			<form action="adminpanel.php">
				<tr class="table_line">
		            <td name="<?=$item['card_id']?>"><?=$item['card_id']?></td>
		            <td><?=$item['name']?></td>
		            <td><?=$item['activated']?></td>
		            <td><?=$item['email']?></td>
		            <td><?=$item['tel']?></td>
		            <td><?=$item['bonus']?></td>
		            <td><?=$item['login']?></td>
		        </tr>
		        <?php
		        endforeach;
		        ?>
		    </form>
		       <!-- /Выводим значения в таблицу -->
		</div>
	</div>



	<?php endif; ?>



<?php else : ?>
	<a href="/login.php">Авторизоваться</a><br>
	<a href="/signup.php">Зарегистрироваться</a><br>
	<a href="/online.php">Записаться на прием</a>

	
<?php endif; ?>	
