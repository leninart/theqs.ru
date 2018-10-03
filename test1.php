<?
function getNameNumber($ima, $tel){
	echo ("<h4>Ну привет, ".$ima."</h4>");
	echo ("<h4>Я позвоню тебе на номер ".$tel."</h4>");
	echo ("Можно? <form action='test1.php'><button type='submit'>Да!</button></form>");
}
getNameNumber($_POST['name'],$_POST['phone']);
function alert($action){
	echo "Спасибки!";
}

?>