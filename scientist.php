<!DOCTYPE html>
<html lang="ru"  >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="wigth=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Conpatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

	<?php require('block/header.php') ; ?>
	<title> Scientist </title>

</head>

<style>



.title {
	text-transform:capitalize;
	font-size: 1.8rem;
	color: green;
	text-align: center;
	font-family: Helvetica, Arial, sans-serif;

}

.meaning {
	vertical-align: middle;
	font-size:  1.5rem;
	color: blue;
	text-align:  left; /* justify */
	font-family: Helvetica, Arial, sans-serif;
}




.card-bodi{
	background: ; /* Цвет фона */
    width: 100%;
  	height: 400px; /* Ширина блока */
    padding: 30px; /* Поля */
    margin-top: 0px; /* Отступ сверху */
    border: 3px solid #000; /* Параметры рамки */
    box-sizing: border-box; /* Ширина блока с полями */
	/* height: 10em;*/
    display: flex;
    align-items: center;
    justify-content: center
}


.card-title{
	background: ; /* Цвет фона */
    width: 100%; /* Ширина блока */
	height: 120px; /* Ширина блока */
    padding: 30px; /* Поля */
    margin-top: 3px; /* Отступ сверху */
    border: 3px solid #000; /* Параметры рамки */
    box-sizing: border-box; /* Ширина блока с полями */
	/* height: 10em;*/
    display: flex;
    align-items: center;
    justify-content: center
}


div.container6 meaning {
  margin: 0 }



 .wrapper {
        width: 100%;
        height: 650px;
        border: 0px solid #515151;
      }
      .exmpl {
        overflow: hidden;

        justify-content: center;
        align-items: center;
      }
      .exmpl img {
        height: auto;
        width: 100%;
      }

.icon-link{
	font-size:  1.4rem;
	color: red;
	font-family: Helvetica, Arial, sans-serif;
}



.card-b {
	opacity:0; /*Элемент полностью прозрачный (невидимый)*/
	transition: 0.5s; /*Скорость перехода состояния элемента*/
	animation: show 1s 1; /* Указываем название анимации, её время и количество повторов*/
	animation-fill-mode: forwards; /* Чтобы элемент оставался в конечном состоянии анимации */ /* Задержка перед началом */
}

.box_1 {
	margin: -30px -160px;
  height: 100px;
	display: flex;
  flex-direction: column;
	flex-wrap: wrap;

	 }
	 .box_1>* {
			 flex: 1 1 0px;
			 margin: 0px 50px;  /* по вертикали | по горизонтали */
	 }

@keyframes show{
0%{
opacity:0;
}
100% {
opacity:1;
}
}


#upload-container {
     display: flex;
		 text-align: center;
     justify-content: center;
     flex-direction: column;
     width: 400px;
     height: 400px;
     outline: 2px dashed #5d5d5d;
     outline-offset: -12px;
     background-color: #e1f2f9;
     font-family: Helvetica, Arial, sans-serif;
     color: #1f3c44;
}

#upload-container img {
     width: 40%;
     margin-bottom: 20px;
     user-select: none;
}

#upload-container div {
     position: relative;
     z-index: 10;
}

#upload-container label {
     font-weight: bold;
}

#upload-container label:hover {
     cursor: pointer;
     text-decoration: underline;
}

#upload-container input[type=file] {
     width: 0.1px;
     height: 0.1px;
     opacity: 0;
     position: absolute;
     z-index: -10;
}

.chat {
	border:1px solid #333;

	width:40%;
	height:70%;
	background:#111;
	color:gold;
	align-items: center;
	margin:auto;

}

.chat-messages {
	align-items: center;
	min-height:93%;
	max-height:93%;
	overflow:auto;
}

.chat-messages__content {

	padding:1px;
}

.chat__message {
	border-left:3px solid #999;
	margin-top:2px;
	padding:2px;
}

.chat__message_black {
	border-color:#999;
}

.chat__message_blue {
	border-color:blue;
}

.chat__message_green {
	border-color:green;
}

.chat__message_red {
	border-color:red;
}

.chat-input {
	min-height:200px;
}
input {
	min-height:50px;
	font-family:arial;
	font-size:20px;
	vertical-align: middle;
	background: #605599;
	border:0;
	display:inline-block;
	margin:1px;
	height:60px;
}

.chat-form__input {
  color: gold;
	padding-left: 30px;
	font-size:20px;
	width:79%;
}

.chat-form__submit {
	color:gold;
	font-size:20px;
	width:18%;
}

</style>
<body>
	<<div class="container mt-5S">
			<h3 style="font-size: 300%; color: gray ; text-align: center;" class="mb-1 "> Мои научные работы: </h3>

<div class="d-flex flex-wrap" 	style = "width: 100%">
<?php for ($i = 1; $i <= 1; $i++): ?>
	<div class="tak">
		<div class="row g-4 py-5 row-cols-2 row-cols-lg-3">
	<div class="featurecol">
		<div class="feature-icon bg-primary bg-gradient">
			<svg class="bi"  height="3em"><use xlink:href="#collection"></use></svg>
		</div>
		<div class="card-title">
		<div class="title" >Газовое усиление</div> </div>
		<div class="card-bodi">


	<div class="meaning" > Это явление происходит благодаря удраной и фотонной ионицации. Измерения проводились на пропориональном счётчике на смеси гелия с пропаном, и ДМЭ.</div>
 </div>
 <br>
 <div class="wrapper exmpl">
		<img src="imj/1.PNG" class="im g-thambnail">
	<a  href="https://smallpdf.com/ru/file#s=b330d941-0b4b-4fc6-9de7-c590bb2aea83" class="icon-link" target="_blank">
			Подробнее
			<svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
		</a>
		</div>

			</div>
	<div class="featurecol">
		<div class="feature-icon bg-primary bg-gradient">
			<svg class="bi"  height="3em"><use xlink:href="#people-circle"></use></svg>
		</div>
		<div class="card-title">
		<div class="title" > Прототип дрейфовой камеры Супер-Чарм-Тау Фабрики</div> 	</div>
		<div class="card-bodi">


		<div class="meaning" > Впервые я увидел такую могучую установку. Также, я столкнулся с явлением Мальтеровских токов. </div>
	</div>
	<br>
		 <div class="wrapper exmpl">
		<img src="imj/2.PNG" >
	<a href="https://smallpdf.com/ru/file#s=d323c0bc-f6a2-4637-8a96-0b91b0be9c21" class="icon-link" target="_blank" >
			Подробнее
			<svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
	</a>
	</div>
</div>

	<div class="featurecol">
		<div class="feature-icon bg-primary bg-gradient">
			<svg class="bi"  height="3em"><use xlink:href="#toggles2"></use></svg>
		</div>
		<div class="card-title">
		<div class="title" >Радиоционная стойкость</div> </div>
			<div class="card-bodi">

		<div class="meaning" >С одной стороны я исследовал новую газовую смесь, которую начали использовать на дрейфовой камере детектора КЕДР. С другой стороны я ислледовал старение модели ДК СЧТФ на рабочей газовой смеси. </div>
	</div>
	<br>
		<div class="wrapper exmpl">

<img src="imj/3.PNG"  class="im g-thambnail">
<a href="https://smallpdf.com/ru/file#s=0b12971d-c6f8-4965-b42a-2906b16f7b6c" class="icon-link" target="_blank">
			Подробнее
			<svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
		</a>
	</div>
		</div>
</div>

        </div>
			<?php endfor; ?>
			      </div>
							 	</div>

<?php require('block/footer.php') ; ?>
</body>
</html>
