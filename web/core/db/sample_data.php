<?php
$install_query[]="INSERT INTO `produse` (`pid`, `nume`, `pret`, `detalii`, `preview`) VALUES
(1, 'rochie', 500, '-bumbac\r\n-alba,roz', 'rochie'),
(2, 'Pantaloni', 200, '-bumbac\r\n-negru', 'pantaloni'),
(3, 'Tricou ', 100, '-bumbac\r\n-culori la comananda', 'Tricou femei'),
(4, 'Maieu', 90, '-elastic\r\n-albastru,rosu', 'maieu'),
(5, 'Inel', 60, '-argint', 'Inel argint'),
(6, 'ceas femei', 120, '-curea de piele(alb,rosu,negru)\r\n-plastic', 'CEAS'),
(7, 'ceas barbatesc', 100, '-curea piele(alb,negru,maro)\r\n-metal', 'CEAS');";

//administratorii
$install_query[]="INSERT INTO `administratori` (`aid`, `username`, `password`) VALUES
(1, 'bianca', 'bianca'),
(2, 'adrian', 'adrian'),
(3, 'diana', 'diana'),
(4, 'florin', 'florin');";
