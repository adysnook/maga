<?php
$ms_s=microtime(true);
require_once('core/request.php');
require_once('core/pages.php');
require_once('core/db.php');
require_once('core/session.php');
require_once('core/pages/'.$page[$pag]['file']);
require_once('core/template.php');
$ms_e=microtime(true);
echo '
<!-- Time: '.round(($ms_e-$ms_s)*1000).'ms -->';
