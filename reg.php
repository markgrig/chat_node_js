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
<div class="container mt-5" style=" width: 666px;">

		<h3 style="font-size: 200%; color: gray ; text-align: center;" class="mb-3 "> Регистрация: </h3>

	 <br>
	 <form action="check.php" method="post">
	<input  name="logi" autocomplete="off" type="text" placeholder="Введите login, 2-50 символов"
	class="form-control">  <br>
	<input name="pass" type="password"
	placeholder="Введите пароль, 5-20 символов" class="form-control" > <br>
	<input name="pass2" type="password"
	placeholder="Повторите пароль" class="form-control" > <br>
	<button type="submit" name="send" class="registerbtn btn-success"> Готово!</button>
	 <input type="reset"  name="send" class="btn" value ="Сброс">
	<input type="hidden"  name="flag" value ="1" >
	</form>

	</div>
	<?php require('block/footer.php') ; ?>
</body>
</html>
