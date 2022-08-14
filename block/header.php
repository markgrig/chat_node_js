<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
		<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Conpatible" content="ie=edge">
		<link rel="stylesheet" href="/style/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<?php	function out_adjusted_link_image($img_file, $img_alt, $img_title,
                                 $a_href, $div_wd, $div_ht,
                                 $div_more_style = '', $a_more = '') {
  define('ALIGN_BY_WD', 0);
  define('ALIGN_BY_HT', 1);

  $size = getimagesize($img_file);
  $img_wd = $size[0];
  $img_ht = $size[1];

  if ($div_wd / $div_ht > $img_wd / $img_ht)
    $align = ALIGN_BY_HT;
  else
    $align = ALIGN_BY_WD;

  if ($align == ALIGN_BY_HT) {
    $new_img_ht = $div_ht;
    $new_img_wd = $new_img_ht * $img_wd / $img_ht;
    $rel_edge = 'left';
    $abs_edge = 'top';
    $new_img_dim = $new_img_wd;
  }
  else {
    $new_img_wd = $div_wd;
    $new_img_ht = $new_img_wd * $img_ht / $img_wd;
    $rel_edge = 'top';
    $abs_edge = 'left';
    $new_img_dim = $new_img_ht;
  }

  $img_style = 'position:absolute; ' . $rel_edge . ':50%; width:' .
               $new_img_wd . 'px; height:' . $new_img_ht . 'px; margin-' .
               $rel_edge . ':-' . ($new_img_dim / 2) . 'px; ' .
               $abs_edge . ':0';

  return '<div style="position:relative; width:' . $div_wd .
         'px; height:' . $div_ht . 'px; border:1px solid silver;' .
         $div_more_style . '"><img src="' . $img_file . '" style="' .
         $img_style . '" /><a href="' . $a_href . '" '. $a_more .
         '><img src="images/Transparent.png" alt="' .
         $img_alt . '" title="' . $img_title . '" width="' .
         $div_wd . '" height="' . $div_ht .
         '" style="position:absolute; top:0px; left:0px;" /></a></div>';
}
?>
	<div class="container">
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		<a href="/" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
			<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
		</a>

		<ul class="nav col-12 col-md-auto mb-4 justify-content-center mb-md-0" >
			<li><a  style="font-size: 130%;" href="scientist.php" class="nav-link px-2 link-dark">Научные работы ⚛️</a> </li>
			<li><a   style="font-size: 130%;" href="chat.php" class="nav-link px-2 link-dark">Чат 👋</a></li>
		</ul>
<?php


$logi=filter_var(trim($_POST['logi']),FILTER_SANITIZE_STRING); //trim - удалить пробелы, filt - филтер нежелательных символов.
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$flag=filter_var(trim($_POST['flag']),FILTER_SANITIZE_STRING);

@session_start();
if ( !$logi  ) { $logi = $_SESSION['logi'];} else { $_SESSION['logi'] = $logi; }
if ( !$pass ) { $pass = $_SESSION['pass'];} else { $_SESSION['pass'] = $pass; }

if ($flag==1  || $flag==2  || !$flag) {
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
  $link->close();
}

if ( !$flag ) { $flag = 3; $_SESSION['flag'] = $flag;}

//чтобы не выводил в шопку логин, если в процессе входа возникли неурядицы
if ( (!$row1[0]  || $row2[0]!= $pass) && ( $flag==2) ) { $logi = 1; $_SESSION['logi']=1;}

//Чтобы шапка была адекватной при занятом пользавателе на регистрации
if ( $row1[0] && $row2[0]!=$pass &&  $flag==1 ) { $logi = 1; $_SESSION['logi']=1; }
//Чтбы шапка не обновлялась при неудачной регистрации
if ( !$row1[0] && $flag==1 ) { $logi = 1;  }
if ( !$row1[0] && $flag==3 ) { $logi = 1; $_SESSION['logi']=1; }

//echo $flag; echo "_"; echo $row1[0]; echo "_"; echo $row2[0]; echo "_"; echo $pass; echo "_"; echo $logi;

// что бы выводил логин "суете" (таскание шапки), если всё четко
if ( !$logi  ||  $logi==1) { $logi = 1;}  else { echo $logi; }



if( ($logi != 1) )	 {
	$it = new DirectoryIterator("glob://C:/prog/openserver/domains/localhost/ava/" . $logi . ".png");
	foreach($it as $f) {
	  $imagename = "ava/" . $logi . ".png"
		?>   <img src = "<?php echo $imagename; ?>" style=" width: auto; height: 70px;" class="im g-thambnail">  <?php
	}
 ?>
 <div style=" display:flex;   flex-direction: row;">
			<form action="mycottage.php" method="post">
				<input  name="logi" type="hidden" value= "<?php echo  $_SESSION['logi']; ?>"   >
				<input  name="pass" type="hidden" value = "<?php echo $_SESSION['pass'] ; ?> " >
				<input  name="flag" type="hidden" value ="2" formaction="block/header.php" >
				<button type="submit" name="send" class="btn btn-outline-primary me-2"> MyCottage 🏡 </button>  </form>

			<form action="intel.php" method="post">

				<input  name="logi" type="hidden" value= "1"  >
				<input  name="pass" type="hidden" value= "1"  >

				<button type="submit" name="send" class="btn btn-primary " > Выход </button>
					</form>
		</div>
		<?php
}
else {  ?>
		<div style=" display:flex;   flex-direction: row;">
			<!-- --> <form action="intel.php" method="post">
			<button  style="font-size: 110%;" type="submit" name="send" class="btn btn-outline-primary me-2">Войти</button>  </form>
			<!-- --> <form action="reg.php" method="post">
			<button   style="font-size: 110%;" type="submit" name="send" class="btn btn-primary " > Регистрация </button> </form>

		</div>
<?php }  ?>
	</header>

</div>

</html>
