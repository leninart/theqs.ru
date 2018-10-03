<?php require "db.php"; ?>

<?php 
		echo $_POST['login'];
		$reactivate = R::findOne('users', 'login = ?', array($_SESSION['login']) );	
		if (isset($reactivate)){echo "Yes";}
		else echo "no";
		$token = $reactivate->activation;
		echo $token;


?>