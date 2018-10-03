<?php
 $data = $_POST;
if( isset($data['do_sms']) )
{
 $url = "https://semysms.net/api/3/sms.php"; //Адрес url для отправки СМС
 $phone = $data['phone']; // Номер телефона
 $msg = $data['text'];  // Сообщение
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
}
?>

<form action="/a.php" method="POST">
    <p>
        <p><strong>Введите номер телефона в формате 89277632598:</strong></p>
        <input type="phone" name="phone" value="<?php echo @$data['phone']; ?>">
    </p>
    <p>
        <p><strong>Сообшение:</strong></p>
        <input type="text" name="text" maxlength="20">
    </p>
    <p>
        <button type="submit" name="do_sms">Отправить</button>
    </p>
</form>