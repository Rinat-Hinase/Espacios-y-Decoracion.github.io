<?php require_once 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <style type="text/css">
    /*--EDITANDO-MARGENES-POR-DEFECTO--*/
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'open sans', 'roboto', sans-serif;
}


/*--EDITANDO-TITULO----------------*/
.titulo{
    font-size: 50px;
    margin-bottom: 20px;
    color: black;
    text-align: center;
}

/*--EDITANDO-FORMULARIO------------*/
.formulario{
    width: 460px;
    padding: 30px;
    margin: auto;
    margin-top: 80px;
}

/*--EDITANDO-INPUTS----------------*/
.cajas{
    width: 100%;
    padding: 15px;
    border-radius: 2px;
    border: none;
    margin-bottom: 20px;
    font-size: 15px;
    border-left: 20px solid #79b7c9;
    border-right: 20px solid #79b7c9;
    transition: all .3s ease;
}

.cajas:hover, .cajas:focus{
    border-left: 20px solid black;
    border-right: 20px solid black;
}

/*--EDITANDO-TERMINOS--------------*/
.termino-1{
    text-align: center;
    color: #fff;
}

.termino-2{
    color: #e28282;
    text-decoration: none;
    font-weight: bold;
    transition: all .3s ease;
}

.termino-2:hover{
    color: #227184;
}

/*--EDITANDO-BOTON-REGISTRAR-------*/
.btn{
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 6px;
    background: #31647c;
    color: #fff;
    font-size: 15px;
    margin: 20px 0;
    cursor: pointer;
    transition: all .3s ease;
}

.btn:hover{
    background: #6a92a5;
}

.boton{
    width: 20%;
    height: 27%;
    padding: 20px;
    position:relative;
    float: right;
    top: 80px;
    margin-right: 15px;
    border-radius: 6px;
    background: white;
    -webkit-box-shadow: 2px 5px 16px 0px white, 5px 5px 15px 5px rgba(0,0,0,0), 5px 5px 15px 5px rgba(0,0,0,0); 
box-shadow: 2px 5px 16px 0px black, 5px 5px 15px 5px rgba(0,0,0,0), 5px 5px 15px 5px rgba(0,0,0,0);
    font-size: 20px;
}
.b1{
    padding: 20px;
    margin-left: 15%;
    border-radius: 10px;
    background: #151723;
    color: white;
    cursor: pointer;
    transition: all .3s ease;
}
.b1:hover{
    background: #5184b5;
}
.b2{
    position: relative;
    top: 10px;
    width: 74%;
    border-radius: 10px;
    margin-left: 15%;
    padding: 20px;
    background: #151723;
    color: white;
    cursor: pointer;
    transition: all .3s ease;
}
.b2:hover{
    background: #5184b5;
}
@media only screen and (max-width:414px){
    .formulario{
    width: 360px;
    padding: 30px;
    margin: auto;
    margin-top: 100px;
}
.titulo{
    font-size: 30px;
    margin-bottom: 20px;
    color: black;
    text-align: center;
}
.boton{
    width: 20%;
    height: 27%;
    padding: 20px;
    position:relative;
    float: right;
    top: 80px;
    margin-right: 30px;
    border-radius: 6px;
    background: white;
    -webkit-box-shadow: 2px 5px 16px 0px white, 5px 5px 15px 5px rgba(0,0,0,0), 5px 5px 15px 5px rgba(0,0,0,0); 
box-shadow: 2px 5px 16px 0px black, 5px 5px 15px 5px rgba(0,0,0,0), 5px 5px 15px 5px rgba(0,0,0,0);
    font-size: 20px;
}
}
    </style>
</head>
<body>
<div class="boton">
    <input class="b1" type="submit" value="Editar información">
    <a href="Escultura zeus.php"><input class="b2" type="submit" value="Dejar de editar"></a>
    </div>
    <!--FORMULARIO-->
    <form class="formulario">
        
        <!--TITULO-->
        <h1 class="titulo">EDITAR INFORMACIÓN</h1>
        
        <!--INPUTS-->
        <label class="titulos">Nuevo nombre</label><input class="cajas" type="text" placeholder="Título nuevo" maxlength="30" required>
        <label class="titulos">Nuevo precio</label><input class="cajas" type="number" placeholder="Precio" maxlength="30" required>
        <label class="titulos">Nuevo código</label><input class="cajas" type="text" placeholder="Código" maxlength="30" required>
        <label class="titulos">Nueva descripción</label><textarea class="cajas" type="text" placeholder="Descripción" maxlength="30" required></textarea>
        <label class="titulos">Imagen nueva</label><input class="cajas" type="file" name="archivo" multiple="multiple">
        <label for="categoria">Categoria</label>
        
        
        <!--BOTON-DE-REGISTRARSE-->
        <input class="btn" type="submit" value="Guardar cambios">
        
    </form>
    <?php require_once 'footer.php'; ?>
</body>
</html>
