<?php
session_destroy();
header('Location: '.$linkpath.$defaultpage);
die();
