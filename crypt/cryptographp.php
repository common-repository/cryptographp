<?php

// -----------------------------------------------
// Cryptographp v1.4
// (c) 2006-2007 Sylvain BRISON 
//
// www.cryptographp.com 
// cryptographp@alphpa.com 
//
// Licence CeCILL modifi�e
// => Voir fichier Licence_CeCILL_V2-fr.txt)
// -----------------------------------------------


session_start();
error_reporting(E_ALL ^ E_NOTICE);
SetCookie("cryptcookietest", "1");
Header("Location: cryptographp.inc.php?sn=".session_name()."&".SID);
?>
