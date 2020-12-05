<?php require_once 'leonardo/includes/menu-subpaginas.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZEUS</title>
  <script type="text/javascript" src="lilibeth/includes/jquery.min.js"></script>
  <script type="text/javascript" src="lilibeth/includes/jquery.elevatezoom.min.js"></script>
  <link rel="stylesheet" href="Lilibeth/includes/swiper-bundle.min.css">
  <style type="text/css">
    .title {
      text-align: center;
      margin-top: 80px;
      font-size: 50px;
    }

    .container {
      width: 420px;
      float: left;
      position: relative;
      margin-left: 20px;
      margin-top: -10px;
      display: flex;
      flex-wrap: wrap;
      justify-content: left;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    .item {
      position: relative;
      left: 20px;
      width: 100%;
      margin: 10px;
    }

    .container img {
      max-width: 90%;
      border: black 3px double;
    }

    .item img {
      border: 1px solid #fff;
      cursor: pointer;
    }

    .ligthbox {
      width: 100%;
      height: 120vh;
      position: fixed;
      bottom: -100px;
      z-index: 11px;
      background: rgba(0, 0, 0, .8);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .btn-close {
      width: 70px;
      height: 70px;
      background: #AE4545;
      border: 3px solid #fff;
      border-radius: 100%;
      color: #fff;
      font-size: 30px;
      font-weight: bold;
      text-align: center;
      padding-top: 15px;
      position: absolute;
      top: 140px;
      right: 40px;
      cursor: pointer;
    }

    .one {
      position: absolute;
      left: 14%;
      top: 110px;
      width: 70px;
      height: 70px;
    }

    .two {
      position: absolute;
      right: 14%;
      top: 110px;
      width: 70px;
      height: 70px;
    }


    .title {
      text-align: center;
      margin-top: 80px;
      font-size: 50px;
    }

    .information {
      background: white;
      width: 59%;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
      height: 540px;
      position: absolute;
      padding: 10px;
      left: 35%;

    }

    .price {
      position: absolute;
      left: 25%;
      font-size: 50px;
    }

    .blue {
      position: absolute;
      left: 55%;
      font-size: 50px;
      color: blue;
    }

    .text1 {
      margin-top: 100px;
      margin-left: 15px;
      font-size: 30px;
      text-align: left;
      text-decoration: none;
    }

    .text2 {
      margin-top: 5px;
      position: relative;
      font-size: 30px;
      margin-left: 15px;
      text-align: left;
      text-decoration: none;
    }

    .description {
      margin-top: 125px;
      margin-left: 15px;
      margin-right: 15px;
      font-size: 30px;
      text-align: justify;
      border: 2px dashed;
      text-decoration: none;
    }

    .plus {
      position: absolute;
      top: 120px;
      right: 300px;
      width: 50px;
      height: 50px;
      align: right;
    }

    .quanty {
      position: absolute;
      top: -100px;
      left: 62%;
    }

    .dates {
      position: absolute;
      top: -40px;
      right: 50px;
    }

    .less {
      position: absolute;
      top: 120px;
      right: 30px;
    }

    .finish {
      margin-top: 60%;
    }

    @media screen and (max-width: 900px) {
      .title {
        text-align: center;
        font-size: 35px;
      }

      .one {
        position: absolute;
        left: 2%;
        top: 100px;
        width: 60px;
        height: 60px;
      }

      .two {
        position: absolute;
        right: 22%;
        top: 180px;
        width: 60px;
        height: 60px;
      }

      .container {
        width: 220px;
        float: center;
        position: relative;
        margin-left: 25%;
        margin-top: -10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }

      .item {
        position: relative;
        left: 20px;
        width: 100%;
        margin: 10px;
      }

      .container img {
        max-width: 90%;
        border: black 3px double;
      }

      .item img {
        border: 1px solid #fff;
        cursor: pointer;
      }

      .btn-close {
        width: 60px;
        height: 60px;
        background: #AE4545;
        border: 3px solid #fff;
        border-radius: 100%;
        color: #fff;
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding-top: 10px;
        position: absolute;
        top: 80px;
        right: 40px;
        cursor: pointer;
      }

      .information {
        width: 90%;
        align: center;
        margin-top: 290px;
        height: 400px;
        left: 5%;
      }

      .price {
        left: 15%;
        font-size: 40px;
      }

      .blue {
        left: 48%;
        font-size: 40px;
      }

      .text1 {
        font-size: 20px;
      }

      .plus {
        top: 70px;
        right: 200px;
        width: 0px;
        align: right;
      }

      .less {
        top: 70px;
        right: 140px;
        width: 0px;
        align: right;
      }

      .quanty {
        top: -70px;
        left: 52%;
        font-size: 25px;
      }

      .description {
        margin-top: 40px;
        margin-left: 15px;
        margin-right: 15px;
        font-size: 30px;
        text-align: justify;
      }

      .finish {
        margin-top: 130%;
      }
    }

    @media only screen and (max-width:480px) {
      .title {
        text-align: center;
        font-size: 27px;
      }

      .one {
        position: absolute;
        left: 2%;
        top: 110px;
        width: 40px;
        height: 40px;
      }

      .two {
        position: absolute;
        right: 22%;
        top: 180px;
        width: 40px;
        height: 40px;
      }

      .container {
        width: 220px;
        float: center;
        position: relative;
        margin-left: 20%;
        margin-top: -10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }

      .item {
        position: relative;
        left: 20px;
        width: 100%;
        margin: 10px;
      }

      .container img {
        max-width: 90%;
        border: black 3px double;
      }

      .item img {
        border: 1px solid #fff;
        cursor: pointer;
      }

      .btn-close {
        width: 60px;
        height: 60px;
        background: #AE4545;
        border: 3px solid #fff;
        border-radius: 100%;
        color: #fff;
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding-top: 10px;
        position: absolute;
        top: 80px;
        right: 40px;
        cursor: pointer;
      }

      .information {
        width: 90%;
        align: center;
        margin-top: 290px;
        height: 400px;
        left: 5%;
      }

      .price {
        left: 15%;
        font-size: 30px;
      }

      .blue {
        left: 48%;
        font-size: 30px;
      }

      .text1 {
        font-size: 20px;
      }

      .quanty {
        top: -70px;
        left: 52%;
        font-size: 20px;
      }

      .description {
        margin-top: 40px;
        margin-left: 15px;
        margin-right: 15px;
        font-size: 20px;
        text-align: justify;
      }

      .finish {
        margin-top: 160%;
      }
    }

    @media only screen and (max-width:414px) {
      .title {
        text-align: center;
        font-size: 19px;
      }

      .one {
        position: absolute;
        left: 2%;
        top: 110px;
        width: 35px;
        height: 35px;
      }

      .two {
        position: absolute;
        right: 2%;
        top: 110px;
        width: 35px;
        height: 35px;
      }

      .finish {
        margin-top: 140%;
      }
    }

    @media only screen and (max-width:360px) {
      .title {
        text-align: center;
        font-size: 17px;
      }

      .finish {
        margin-top: 160%;
      }
    }

    @media only screen and (max-width:320px) {
      .title {
        text-align: center;
        font-size: 16px;
      }

      .container {
        width: 220px;
        float: center;
        position: relative;
        margin-left: 10%;
        margin-top: -10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }

      .price {
        left: 15%;
        font-size: 25px;
      }

      .blue {
        left: 48%;
        font-size: 25px;
      }

      .text1 {
        font-size: 20px;
      }

      .quanty {
        top: -70px;
        left: 52%;
        font-size: 20px;
      }

      .finish {
        margin-top: 180%;
      }
    }
  </style>
</head>

<body>
<?php $entradas = conseguirEntradas($db, true, null, null, null, $_GET['nombre']);
      if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
        while ($entrada  = mysqli_fetch_assoc($entradas)) :
      ?>
  <div class="title">
    <h1><?= $entrada['Nombre'] ?></h1>
  </div>

  <div class="container">
    <div class="item">
          <td><img src="<?= $entrada['imagen'] ?>" alt="" class="imagen" data="Lilibeth/img/large/zeus.jpg">
    </div>
  </div>
  <div class="information">
    <p class="price">PRECIO: <div class="blue zoomIt">$<?= $entrada['Precio'] ?></div>
    </p>
    <div class="text1">
      <?php if (isset($entrada['Codigo'])):?>
      <p>CÓDIGO: <?= $entrada['Codigo'] ?></p></br>
      <?php endif; ?>
      <br>
      <p>CLASIFICACIÓN: <?= $entrada['Clasificacion'] ?></p>
    </div>
    <div class="text2">
      <p class="quanty">CANTIDAD: <?= $entrada['Cantidad'] ?></p>
    </div>
    <p class="description">
      Descripcion: <?= $entrada['Descripcion'] ?>.</p>
  </div>
</div>
<?php endwhile;
      endif; ?>
<?php require_once 'slider.php'; ?>
<div class="finish">
  <?php require_once 'leonardo/includes/footer-subpaginas.php'; ?></div>
<!-- Swiper JS -->
<script src="Lilibeth/includes/swiper-bundle.min.js"></script>
<script src="Leonardo/js/script.js"></script>
<script type="text/javascript">
  $(".imagen").click(function(e) {
    var enlaceImagen = e.target.src;
    var data = $(this).attr("data");
    var lightbox = '<div class="ligthbox">' +
      '<img src="' + enlaceImagen + '" alt="" id="zoom_mw" data-zoom-image="' + data + '">' +
      '<div class="btn-close">X</div>' +
      '</div>';

    $("body").append(lightbox)
    $("#zoom_mw").elevateZoom({
      scrollZoom: true,
      cursor: "crosshair",
      zoomWindowOffetx: 25
    });
    $(".btn-close").click(function() {
      $(".ligthbox").remove();
    })

  })
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

</html>