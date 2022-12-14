<!DOCTYPE html>
<html lang="ru">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Conpatible" content="ie=edge">
    <title>Image Cropper</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

  <!--This is for taking picture input form user -->
  <div class="row">
      <div class="col-lg-12 col-md-12 text-center">
          <h3>Image Cropper</h3>
      </div>
      <div class="col-lg-12">
          <div class="jumbotron text-center">
              <div class="row">
                  <div class="col-lg-12">
                      <img id="uploaded-image" src="https://flexgroup.nz/wp-content/uploads/2018/05/dummy-image.jpg" height="300px" width="600px">
                  </div>
                  <div class="input-group mt-3">
                      <div class="custom-file">
                          <input type="file" accept="image/*" id="cover_image">
                      </div>
                  </div>
              </div>
          </div>
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

<!-- ?????? ???????????????????????????????? ???????? js -->
<script>
var image_crop = $('#image_demo').croppie({
    viewport: {
        width: 600,
        height: 300,
        type:'square'
    },
    boundary:{
        width: 650,
        height: 350
    }
});
/// catching up the cover_image change event and binding the image into my croppie. Then show the modal.
$('#cover_image').on('change', function(){
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
    $('#uploaded-image').attr('src', resp);
});

    $('#uploadimageModal').modal('hide');
});

</script>




</body>
</html>
