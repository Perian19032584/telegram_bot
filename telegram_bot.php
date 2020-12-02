<?
$r = file_get_contents("https://api.ethermine.org/miner/909f6A321E3C912E7Ed589Ff3f975deD43422c6F/workers");
	$result = json_decode($r, 1);
					
		$one_server = $result['data'][0]["reportedHashrate"];
		$two_server = $result['data'][1]["reportedHashrate"];
	unset($result);

function message_to_telegram($text,$id) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . '691891749:AAHPfkKiz5CdqIpwfqzHaN5eR2OyaSAzZXM' . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => $id,
                'text' => $text,
            ),
        )
    );
    $aaa=curl_exec($ch);
	curl_close($ch);
	$data=json_decode($aaa,true);
	return $data['ok'];
}

	$data =  date("H")+3;
	if($data>9 && $data<22){
		if($one_server == 0){
			//message_to_telegram('Сервер №103, был отключен..', '744798781');
			message_to_telegram('Сервер №103, был отключен..', '669409728');//Мой id
		}
		if($two_server == 0){
			message_to_telegram('Сервер №107, был отключен..', '669409728');//Мой id
			//message_to_telegram('Сервер №107, был отключен..', '744798781 ');
		}

		
	}
?>