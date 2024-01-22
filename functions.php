<?php

	$file_counter = "counter.txt";
	if (file_exists($file_counter)) 
	{
		$fp = fopen($file_counter, "r");
		$counter = fread($fp, filesize($file_counter));
		fclose($fp);
	} 
	else 
	{
	$counter = 0;
	}
		$counter++;
		$fp = fopen($file_counter, "w");
		fwrite($fp, $counter);
		fclose($fp); 
				
	if(isset($_POST["send"]))
	{
		$name = $_POST["name"];
		$family = $_POST["family"];
		$cabinet = $_POST["cabinet"];
		$phone = $_POST["phone"];
		$textarea = $_POST["textarea"];
		$fileTmpPath = $_FILES['photo']['tmp_name'];
		$fileName = $_FILES['photo']['name'];
		$fileSize = $_FILES['photo']['size'];
		$fileType = $_FILES['photo']['type'];
		$fileNameCmps = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));
		
		
		
		$uploaddir = '/var/www/uploads/';
		$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
		move_uploaded_file($_FILES['photo']['tmp_name'], "../upload/".$_FILES['photo']['name']); 
		$target = "../upload/".$_FILES['photo']['name'];
		
		
		if (!empty($_FILES["photo"]["name"]))
		{
			$arr = array(
			  'Заявка №' => $counter,
			  'Фамилия пользователя: ' => $family,
			  'Имя пользователя: ' => $name,
			  'Кабинет: ' => $cabinet,
			  'Телефон: ' => $phone,
			  'Проблема:' => $textarea,
			  'Фото: ' => "фото заявки №".$counter
			);	
		}
		else
		{
			$arr = array(
			  'Заявка №' => $counter,
			  'Фамилия пользователя: ' => $family,
			  'Имя пользователя: ' => $name,
			  'Кабинет: ' => $cabinet,
			  'Телефон: ' => $phone,
			  'Проблема:' => $textarea,
			  'Фото: ' => "пользователь не приложил фотографию к заявке"
			);
		}
	}
	
	$txt = "";
	foreach($arr as $key => $value) 
	{
	  $txt .= "<b>".$key."</b> ".$value."%0A";
	};
	
	$fd = fopen("backup_request.txt", 'a') or die("не удалось создать файл");
	fwrite($fd, $txt . PHP_EOL);
	fclose($fd);
	
	$arrContextOptions=array(
		"ssl"=>array(
			"verify_peer"=>false,
			"verify_peer_name"=>false,
		),
	);  
	
	$sendToTelegram = file_get_contents("https://api.telegram.org/bot/sendMessage?chat_id=HIDDEN&parse_mode=html&text=".$txt, false, stream_context_create($arrContextOptions));
	
	$url = "https://api.telegram.org/bot/sendPhoto";
    $_document = "../upload/".$_FILES['photo']['name'];
	$document = curl_file_create($_document,'image/*');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ["chat_id" => "chat", "photo" => $document, "caption" => "Фото заявки № $counter"]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $out = curl_exec($ch);
    curl_close($ch);
	
	$ext = pathinfo($target, PATHINFO_EXTENSION);
	$new_file = rename("../upload/".$_FILES['photo']['name'], "../upload/Заявка".$counter.'.'.$ext);
	
	if ($sendToTelegram) {
		header('Location: index2.php');
			} else {
					echo "Error";
							}

?>