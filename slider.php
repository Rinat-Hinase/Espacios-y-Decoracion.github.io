<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="swiper-bundle.min.css">

  <!-- Demo styles -->
  <style>
    .swiper-container {
      width: 50%;
      height: 300px;
      background: white; 
      position: relative;
      top: 640px;
      right: 16%;
      padding: 10px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: white;
      width: 25px;
      left: 0px;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .swiper-slide img{
      position: relative;
      top: 5px;
      bottom: 40px;
      border: 2px solid black;
  border-radius: 5px 5px 0px 0px;
      width: 90%;
    }
    .white{
      position: absolute;
      width: 50%;
      border: black 2px ridge;
      right: 23%;
      background: white;
      top: 780px;
      text-align: center;
      font-size: 40px;
    }
    .info{
      position: absolute;
      background: white;
      width: 160px;
      top: 220px;
      right: 5%; 
      border: 2px solid black;
  border-radius: 0px 0px 5px 5px;
    }
    .info:hover{
      background: #e0e0e0;
    }
    .zoomIt{
display:block!important;
-webkit-transition:-webkit-transform 1s ease-out;
-moz-transition:-moz-transform 1s ease-out;
-o-transition:-o-transform 1s ease-out;
-ms-transition:-ms-transform 1s ease-out;
transition:transform 1s ease-out;
}
.zoomIt:hover{
-moz-transform: scale(1.1);
-webkit-transform: scale(1.1);
-o-transform: scale(1.1);
-ms-transform: scale(1.1);
transform: scale(1.1)
}
@media screen and (max-width: 900px){
  .white{
      width: 80%;
      right: 10%;
      top: 980px;
      font-size: 30px;
    }
    .swiper-container {
      height: 150px;
      top: 540px;
      left: 0%;
    }
    .info{
      font-size: 30px;
      width: 80px;
      top: 600px;
      right: 5%; 
    }
}
@media only screen and (max-width:480px){
  .white{
      width: 80%;
      right: 10%;
      top: 960px;
      font-size: 25px;
    }
    .swiper-container {
      height: 150px;
      width: 320px;
      top: 540px;
      left: 0%;
    }
    .info{
      font-size: 30px;
      width: 80px;
      top: 600px;
      right: 5%; 
    }
}
@media only screen and (max-width:414px){
  .white{
      width: 80%;
      right: 10%;
      top: 880px;
      font-size: 25px;
    }
    .swiper-container {
      height: 150px;
      width: 320px;
      top: 540px;
      left: 0%;
    }
    .info{
      font-size: 30px;
      width: 80px;
      top: 600px;
      right: 5%; 
    }
}

  </style>
</head>

<body>

  <!-- Swiper -->
  <p class="white">Más publicaciones de esculturas</p>
  <div class="swiper-container">
    <div class="swiper-wrapper">
    <?php $Escultura = "Escultura"; ?>
    <?php $categorias_slider = conseguirEntradas($db, null, $Escultura, null); ?>
            <?php if (!empty($categorias_slider) && mysqli_num_rows($categorias_slider) >= 1) : ?>
                <?php while ($categoria_slider  = mysqli_fetch_assoc($categorias_slider)) : ?>
      <div class="swiper-slide zoomIt"><img src="<?= $categoria_slider['imagen'] ?>"><div class="info zoomIt"><?= $categoria_slider['Nombre'] ?></div></div>
      <?php endwhile;
            else : ?>
                <div class="alerta alerta-alert">&nbsp;&nbsp;&nbsp;&nbsp;No hay entradas en esta categoria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>?>
            <?php endif; ?>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <!-- Swiper JS -->
  <script src="swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
