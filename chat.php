<!DOCTYPE html>
<html lang="ru">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Conpatible" content="ie=edge">
		<link rel="stylesheet" href="/style/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
		<script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"	> </script>

			<?php
		$logi=filter_var(trim($_POST['logi']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.
		//echo $logi;
		$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.

		//echo $pass;
		?>
		<form action="block/header.php" method="post">
				<input  name="logi" type="hidden" value= "<?php echo $logi ?>"  >
				<input  name="pass" type="hidden" value= "<?php echo $pass ?>"  >
				 </form>
			<style	>

			input[type="text"]::-webkit-input-placeholder {
 			color:  white; font-size:20px;
			}
			input[type="text"]::-moz-placeholder {
 			color:  white; 	font-size:20px;
			}

	 </style>

		<?php require('block/header.php') ; ?>

		<title> Intel </title>
</head>
<body>

		<h3 style="font-size: 200%; color: gray ; text-align: center;" class="mb-3 "> Разгвор по душам: </h3>
	 <br>
	 <?php
	 $mess = $_POST['mess'];
	// $mess = 123;
if ( !$logi  ||  $logi == 1) {
 ?>	<h3 style="	margin-top:20px; text-align: center;" > Войди в катедж... </h3>
  	<img style="  display: flex;   margin-left: auto;
    margin-right: auto;  height: 700px;" src="imj/cottage.jpg " 	class="im g-thambnail"> <?php
	}
else {
	$bytes = openssl_random_pseudo_bytes(40);
	$key = bin2hex($bytes);
  $method = "AES-192-CBC";
  error_reporting(0);
  $urlcode = openssl_encrypt($logi, $method, $key);
	$urlcode = str_ireplace("+", "b", $urlcode);
  //echo $urlcode;
  error_reporting(E_ALL);

	$user = 'root';
	$password = '';
	$db = 'registerdb';
	$host = 'localhost';
	$port = 3306 ;

	$link = mysqli_init();
	$success = mysqli_real_connect(  $link,   $host,   $user,  $password,   $db,  $port);
	if (!$link) {echo "Error";} if (!$success) {echo "Error";}
	mysqli_query($link, "INSERT INTO `usersrun` (`id`, `login`, `code`) VALUES ( NULL, '$logi' , '$urlcode' )") ;
	$link->close();



?>
 <script  type="text/javascript">
 location="http://localhost:3036/?pfki=<?php echo $urlcode ;?>";
 </script>



<?php
} ?>

	<?php require('block/footer.php') ; ?>
</body>
</html>
