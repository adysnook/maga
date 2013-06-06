<?php
$defaultpage='/';
$page=array(
    '/'=>array('file'=>'acasa.php', 'title'=>'Acasa'),
    '/login'=>array('file'=>'login.php','title'=>'Log IN'),
    '/logout'=>array('file'=>'logout.php', 'title'=>'Logout'),
    '/contact'=>array('file'=>'contact.php','title'=>'Contact'),
    '/produse'=>array('file'=>'lista.php','title'=>'Produse'),
    '/cos'=>array('file'=>'cos.php','title'=>'Cosul de cumparaturi'),
    '/produs'=>array('file'=>'produs.php', 'title'=>'Detalii Produs'),
    '/cos_adauga_produs'=>array('file'=>'cos_adauga_produs.php', 'title'=>'Adaugare produs in cos...'),
    '/cos_scade_produs'=>array('file'=>'cos_scade_produs.php', 'title'=>'Scadere produs din cos...'),
    '/edit'=>array('file'=>'edit.php','title'=>'Edit Produs'),
    '/add'=>array('file'=>'add.php','title'=>'Adaug Produs'),
    '/finalizare'=>array('file'=>'finalizare.php', 'title'=>'Finalizare comanda'),
    '/finalizare_validare'=>array('file'=>'finalizare_validare.php', 'title'=>'Ansamblu comanda'),

    '/comenzi'=>array('file'=>'comenzi.php', 'title'=>'Comenzi'),
    '/comanda'=>array('file'=>'comanda.php', 'title'=>'Comanda'),
    '/preia'=>array('file'=>'preia.php', 'title'=>'Asociere comanda...'),
	'/copyright'=>array('file'=>'copyright.php','title'=>'Copyright'),
);
if(isset($page[$req]))
    $pag=$req;
else{
    header('Location: '.$linkpath.$defaultpage);
    die();
}
$page_title=$page[$pag]['title'];
