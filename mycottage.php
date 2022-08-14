<!DOCTYPE html>
<html lang="ru">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Conpatible" content="ie=edge">
		<link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
	//echo $pass2;
	$flag=filter_var(trim($_POST['flag']),FILTER_SANITIZE_STRING);   //trim - удалить пробелы, filt - филтер нежелательных символов.
	//echo $flag;


	 ?>
	 <br><br><br>

<div  class="box_1 " >


	<?php		if ( $logi ) {  $logi =  $logi ; ?>

		<div  class="card-b" style=" flex: block;  margin:0 auto;  animation-delay: 0.25s; ">

			<form  id="upload-container" enctype="multipart/form-data" action=upload.php method="POST"   >

	<?php
			echo $logi;
//	echo $flag; echo "_"; echo $row1[0];  echo "_"; echo $row2[0]; echo "_"; echo $pass; echo "_"; echo $logi;
	$it = new DirectoryIterator("glob://C:/Prog/OpenServer/domains/localhost/ava/" . $logi . ".png");
					foreach($it as $f) {
					  $imagename = "ava/" . $logi . ".png";
						}
		if (!$imagename) { ?>	<img id="upload-image"  style=" 	margin: 0 25%; overflow: hidden; max-height: 70%;  max-width: 50%; width: auto; height: auto; " src="https://flexgroup.nz/wp-content/uploads/2018/05/dummy-image.jpg">  <?php }

		else 	{ ?> <meta http-equiv="cache-control" content="no-cache">
							<meta http-equiv="expires" content="0">

								<img id="upload-image" style=" 	margin: 0 25%; overflow: hidden; max-height: 70%;  max-width: 50%; width: auto; height: auto; " src = <?php echo $imagename ?>> <?php } ?>


					<div>
						<input type="hidden" name="50000000" value="30000" />
						<input  id="file-input"  name="userfile" type="file"  >
						 <input  id="file-input-base64"  name="file-input-base64" type="hidden">
						<label for="file-input"   style=" margin-top: 10px; " > Хочу новую аватарку!</label>
						<br>
						<input  name="logi" type="hidden" value= "<?php  echo $logi ?>" >
						<input  style= " color: blue;" class="btn"  type="submit" value="Сохранить" />

					</div>
			</form>
		</div>
	<?php
} else {
?>



<div style=" flex: block;  margin:0 auto; width: 456px; height: 100px; padding: 50px;  margin-top: 10px; border: 4px solid #000; box-sizing: border-box; height: 10em;*/
 animation-delay: 0.1 s;" class="card-b">
<div style= " vertical-align: middle; font-size:  1.5rem; color: blue; text-align:  center;
font-family: Helvetica, Arial, sans-serif;" class="texti" > Добро пожаловать! </div>
</div>

<?php
}
?>
</div>
	</div>

  <!-- This is the modal -->
  <div class="modal" tabindex="-1" role="dialog" id="uploadimageModal">
      <div class="modal-dialog" role="document" style="min-width: 700px">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12 text-center">
                          <div id="image_demo"></div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary crop_image">Crop and Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

<!-- Это пользовательский файл js -->
<script>
var image_crop = $('#image_demo').croppie({
    viewport: {
        width: 500,
        height: 500,
        type:'square'
    },
    boundary:{
        width: 550,
        height: 550
    }
});
/// catching up the cover_image change event and binding the image into my croppie. Then show the modal.
$('#file-input').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
        image_crop.croppie('bind', {
            url: event.target.result,
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
});

/// Get button click event and get the current crop image
$('.crop_image').click(function(event){
  image_crop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
}).then(function (resp) {
    $('#upload-image').attr('src', resp);
		$('#file-input-base64').val(resp);
		$('#upload-container').sumbit();
});

    $('#uploadimageModal').modal('hide');

});




</script>


</body>
</html>
