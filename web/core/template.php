<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$page[$pag]['title']?> ~ maga</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<script>
function alertbox()
{
		alert("ATENTIE! Pagina urmatoare este dedicata administratorilor site-ului!");
}
</script>
</head>
<body>
<center>
<div class="continut" align="center">

    <div class="header" >
        <div class="logo" >
            <img src="img/logo.png" width="250" />
        </div>

        <div class="login" align="right">            
            <?php	if($_SESSION['admin']){	?>
                <span style="color:white;">Logat ca <b><?=$_SESSION['admin']?><b></span><a href="logout"> <input type="button" value="  Logout  " /> </a>
            <?php	}else{   ?>
                <a href="login"> <input type="button" value="  Admin  " onclick="alertbox()"/> </a>
            <?php } ?>
        </div>
    
        <br /><br />
    	<a href="."> <input type="button" value="  Acasa  " /> </a>
    	<a href="produse"> <input type="button" value="  Produse  " /> </a>
        <a href="contact"> <input type="button" value="  Contact  " /> </a>
        <br />
        <p align="right" style="padding-right:10px" >
        <a href="cos"> <img src="../img/shop_icon.png" width="30" /> </a>
		</p>
    </div>

    <div class="pagina" >
    <h3>
    	<br />
        <?=$continut?>
    </h3>    
    </div>
    
    
    <div class="footer">
    	All rights reserved to Adi, Bianca, Diana, Florin 
    </div>


</div>
</center>
</body>
</html>
