<!DOCTYPE html>
<html lang="ru">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Conpatible" content="ie=edge">
		<link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <?php require('block/header.php') ; ?>

		<title> Registration </title>
</head>

<body>

<?php

$logi=filter_var(trim($_POST['logi']),FILTER_SANITIZE_STRING);
//echo $logi;
$uploaddir = 'ava/';
$uploadfile = $uploaddir . $logi . ".png";


//echo '<pre>';
if ( ((basename($_FILES['userfile']['type']) == 'png') || (basename($_FILES['userfile']['type']) == 'jpeg')) && (basename($_FILES['userfile']['size']) <= 50000000 )) {

	if(isset($_POST['file-input-base64'])){

				$data = $_POST['file-input-base64'];

				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);

				file_put_contents($uploadfile, $data);
		}

  ?>  <<div style=" width: 556px; height: 100px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
  display: flex;margin-left: auto;
  margin-right: auto; animation-delay: 0.1 s;" class="card-b">
  <div style= " vertical-align: middle; font-size:  1.5rem; color: blue; text-align:  center;
font-family: Helvetica, Arial, sans-serif;" class="texti" > Файл корректен и был успешно загружен! </div>
  </div>  <?php


} else {
  ?>  <<div style=" width: 556px; height: 100px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
  display: flex; margin-left: auto;
  margin-right: auto; animation-delay: 0.1 s;" class="card-b">
  <div style= " vertical-align: middle; font-size:  1.5rem; color: red; text-align:  center;
font-family: Helvetica, Arial, sans-serif;" class="texti" > Не удалось загрузить файл! </div>

  </div> ?> <?php

}
//cho basename($_FILES['userfile']['type']);
//echo 'Некоторая отладочная информация:';
//print_r($_FILES);
//print "</pre>";

?>
</body>
</html>
