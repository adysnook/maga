<!DOCTYPE html>
<html>
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
        <a href="cos">
            <div style="float:right; padding-right:10px; border: 1px solid black;">
                <img src="../img/shop_icon.png" width="30" border="0" />
                <div style="float:left;text-align:left; color:white;">
                    Produse: <?=$_SESSION['cos']['total']?> <br>
                    Total: <?=$_SESSION['cos']['valoare']?> ron
                </div>
            </div>
        </a>
    </div>

    <div class="pagina" >
    	<br />
        <?=$continut?>
     </div>    
    
    <div class="footer">
    	All rights reserved to Adi, Bianca, Diana, Florin 
    </div>


</div>
</center>
</body>
</html>
