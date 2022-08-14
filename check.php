<!DOCTYPE html>
<html lang="ru">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Conpatible" content="ie=edge">
		<link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">


    <?php require('block/header.php') ; ?>

		<title> Home </title>
</head>
<body>
<div class="container mt-5" style=" width: 666px;">


<h3 style="font-size: 200%; color: gray ; text-align: center;" class="mb-3 mt-5"> Аккаунт: </h3>
	<?php

	$logi=filter_var(trim($_POST['logi']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.
	//echo $logi;
	$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.
	//echo $pass;
	$pass2=filter_var(trim($_POST['pass2']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.
	//echo $pass2;
	$flag=filter_var(trim($_POST['flag']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.
//	echo $flag;

/*
@session_start();
if ( !$logi ) { $logi = $_SESSION['logi'];}
if ( !$pass ) { $pass = $_SESSION['pass'];}
echo $logi;
$_SESSION['logi'] = $logi;
$_SESSION['pass'] = $pass;
@session_write_close();
*/
$user = 'root';
$password = '';
$db = 'registerdb';
$host = 'localhost';
$port = 3306 ;

$link = mysqli_init();
$success = mysqli_real_connect(  $link,   $host,   $user,  $password,   $db,  $port);
if (!$link) {echo "Error";} if (!$success) {echo "Error";}
$result1 = mysqli_query( $link, "SELECT id FROM users WHERE login='".$logi."'");
$row1 = $result1->fetch_row();
$result2 = mysqli_query( $link, "SELECT pass FROM users WHERE login='".$logi."'");
$row2 = $result2->fetch_row();


if  ( $flag==1 ) {

	$per=0;
	//$result1 = mysqli_query( $link, "SELECT id FROM users WHERE login='".$logi."'");
	//"SELECT `id` FROM `users` WHERE `users`.`login` LIKE '$logi' ");
	//$result = mysqli_query($link,"SELECT `id` FROM `users` WHERE `login` = '%s' ", mysql_real_escape_string($logi));
	//$result = $link -> query ("SELECT `id` FROM `users` WHERE `login` = '$logi'");
	//$row1 = $result1->fetch_row();
	//$row2 = $result2->fetch_row();

		if ($row1[0] != 0 && $row2[0] != $pass) {

		?>
		<div class="d-flex flex-wrap">
		<div class="mt-10 container">
		<div style=" width: 556px; height: 200px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
    display: flex; margin-left: auto;
    margin-right: auto; animation-delay: 0,1s; " class="card-b">
		<div style= " vertical-align: middle; font-size:  1.5rem; color: red; text-align:  center;
	font-family: Helvetica, Arial, sans-serif;" class="texti" > Sorry, имя занято! </div>
		</div> <?php
		$per=1;
	}

	if (mb_strlen($logi) < 2 || mb_strlen($logi) > 50) {

		?>
		<div class="d-flex flex-wrap">
		<div class="mt-10 container">
		<div style=" width: 556px; height: 200px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
    display: flex; margin-left: auto;
    margin-right: auto; animation-delay: 0,1s; " class="card-b">
		<div style= " vertical-align: middle; font-size:  1.5rem; color: red; text-align:  center;
	font-family: Helvetica, Arial, sans-serif;" class="texti" > Недопустимая длина имени! </div>
		</div> <?php
		$per=1;
	}

	if (mb_strlen($pass) < 5 || mb_strlen($pass) > 20) {
		?>
		<div style=" width: 556px; height: 200px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
    display: flex;  margin-left: auto;
    margin-right: auto; animation-delay: 0.25s;" class="card-b">
		<div style= " vertical-align: middle; font-size:  1.5rem; color: red; text-align:  center;
	font-family: Helvetica, Arial, sans-serif;" class="texti" > Недопустимая длинна пароля! </div>
		</div> <?php
		$per=1;
	}
	if ( strcmp($pass, $pass2) != 0 && $row1[0] != 0 && $row2[0]!=$pass ) {
		?>
		<div style=" width: 556px; height: 200px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
    display: flex;margin-left: auto;
    margin-right: auto; animation-delay: 0.5s;" class="card-b">
		<div style= " vertical-align: middle; font-size:  1.5rem; color: red; text-align:  center;
	font-family: Helvetica, Arial, sans-serif;" class="texti" > Пароли не совпадают! </div>
		</div> </div> </div> <?php
		$per=1;
	}

	if ($per==0) {

if ( !$row1[0] ) {
		mysqli_query($link, "INSERT INTO `users` (`id`, `login`, `pass`) VALUES ( NULL, '$logi' , '$pass' )") ;
		$result1 = mysqli_query( $link, "SELECT id FROM users WHERE login='".$logi."'");
		$row1 = $result1->fetch_row();
		$row2[0]=$pass;

}
	//	header("Refresh: 1");
		$flag = 2;
		//	echo $per;
	}

}

$link->close();

if  ( $flag==2 ) {
//	 echo "cerf";
//echo $row1[0]; echo $row2[0];
	if ( ( $row1[0] != 0 ) && ($row2[0] != "" ) && ($row2[0] == $pass ) )
	{
?>
<form id=formareg action="scientist.php" method="post">
		<input  name="logi" type="hidden" value= "<?php echo $logi ?>" formaction="block/header.php"  >
		<input  name="pass" type="hidden" value= "<?php echo $pass ?>" formaction="block/header.php"  >
		<input  name="flag" type="hidden" value= "2" formaction="block/header.php"  >
		 </form>


 <?php
/// echo "cerf";
			header('Location: mycottage.php');
//<script > window.location.reload(); </script>
		//		<button type="submit" name="send" class="btn btn-success"> Готово! </button>
		/* <script >
			setTimeout(function()) {
				document.get.ElementById('formreg').submit();
			} , 0);
		 </script>*/
	}
	else
	{
		?>
	<br><br><br>
		<div style=" width: 556px; height: 200px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
    display: flex;margin-left: auto;
    margin-right: auto; animation-delay: 0.1 s;" class="card-b">
		<div style= " vertical-align: middle; font-size:  1.5rem; color: blue; text-align:  center;
	font-family: Helvetica, Arial, sans-serif;" class="texti" > Пройдите регистрацию! </div>
		</div>

		<?php

	}

}
?>

	</div>
</body>
</html>
