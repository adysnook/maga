<?php
$install_query[]="INSERT INTO `produse` (`pid`, `nume`, `bucati_disponibile`, `pret`, `detalii`, `preview`) VALUES
(1, 'rochie', 3, 500, '-bumbac\r\n-alba,roz', 'rochie'),
(2, 'Pantaloni', 5, 200, '-bumbac\r\n-negru', 'pantaloni'),
(3, 'Tricou ', 2, 100, '-bumbac\r\n-culori la comananda', 'Tricou femei'),
(4, 'Maieu', 1, 90, '-elastic\r\n-albastru,rosu', 'maieu'),
(5, 'Inel', 100, 60, '-argint', 'Inel argint'),
(6, 'ceas femei', 0, 120, '-curea de piele(alb,rosu,negru)\r\n-plastic', 'CEAS'),
(7, 'ceas barbatesc', 4, 100, '-curea piele(alb,negru,maro)\r\n-metal', 'CEAS');";

//administratorii
$install_query[]="INSERT INTO `utilizatori` (`uid`, `username`, `password`, `admin`, `operator`) VALUES
(1, 'bianca', 'bianca', TRUE, TRUE),
(2, 'adrian', 'adrian', TRUE, TRUE),
(3, 'diana', 'diana', TRUE, TRUE),
(4, 'florin', 'florin', TRUE, TRUE),
(5, 'user', 'user', FALSE, FALSE),
(6, 'operator', 'operator', FALSE, TRUE),
(7, 'admin', 'admin', TRUE, FALSE),
(8, 'root', 'root', TRUE, TRUE);";
