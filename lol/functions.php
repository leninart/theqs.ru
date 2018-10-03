<?php 

function getActivationLinkFromTable($login)
{
	$result_set = R::findOne('users', 'login = ?', array($login['login']) );
		if( $result_set )
		{ return $result_set->activation; }
	else echo("Не найден пользователь<br>");
}

function checkActivationLink($login, $key){
	$real_key = getActivationLinkFromTable($login);
	return $real_key === $login['key'];
}

function getActivationLink($login)
 				{
 					$secret = 'secret';
 					return md5($secret.$data['login']);
 				}

function activateUser($login)
	{
	$result_set = R::findOne('users', 'login = ?', array($login['login']) );
	
	$result_set->activation = '1';
    R::store( $result_set );
	}
function getAvatarLink(){
	$result_avatar = R::findOne('users', 'login = ?', array($_SESSION['logged_user']->login) );
		if( $result_avatar )
		{ return($result_avatar->avatar); }
	else echo("Не найдено изображение<br>");
}

?>
