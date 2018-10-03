<?
/* Отправляем SMS клиенту */

	 $url = "https://semysms.net/api/3/sms.php"; //Адрес url для отправки СМС
	 $phone = "89171400798"; // Номер телефона
	 $msg = "Зарегистрируйте меня ".$_POST['contact'].",".$_POST['contactname']." !" ;  // Сообщение
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
?>
<h1>Добро пожаловать, <?php echo($_POST['contactname']);?>! Мы скоро свяжемся с вами!</h1>