<?php

// -----------------------------------------------
// Cryptographp v1.4
// (c) 2006-2007 Sylvain BRISON 
//
// www.cryptographp.com 
// cryptographp@alphpa.com 
//
// Licence CeCILL modifiée
// => Voir fichier Licence_CeCILL_V2-fr.txt)
// -----------------------------------------------


// -------------------------------------
// Configuration du fond du cryptogramme
// -------------------------------------

$cryptwidth = (isset($cryptographp->settings['cryptwidth'])?$cryptographp->settings['cryptwidth']:130);  // Largeur du cryptogramme (en pixels)
$cryptheight = (isset($cryptographp->settings['cryptheight'])?$cryptographp->settings['cryptheight']:40);   // Hauteur du cryptogramme (en pixels)

$bgR  = (isset($cryptographp->settings['bgR'])?$cryptographp->settings['bgR']:255);         // Couleur du fond au format RGB: Red (0->255)
$bgG  = (isset($cryptographp->settings['bgR'])?$cryptographp->settings['bgR']:255);         // Couleur du fond au format RGB: Green (0->255)
$bgB  = (isset($cryptographp->settings['bgR'])?$cryptographp->settings['bgR']:255);         // Couleur du fond au format RGB: Blue (0->255)

$bgclear = (isset($cryptographp->settings['bgclear'])?$cryptographp->settings['bgclear']:true);     // Fond transparent (true/false)
                     // Uniquement valable pour le format PNG

$bgimg = (isset($cryptographp->settings['bgimg'])?$cryptographp->settings['bgimg']:'');                 // Le fond du cryptogramme peut-être une image  
                             // PNG, GIF ou JPG. Indiquer le fichier image
                             // Exemple: $fondimage = 'photo.gif';
				                     // L'image sera redimensionnée si nécessaire
                             // pour tenir dans le cryptogramme.
                             // Si vous indiquez un répertoire plutôt qu'un 
                             // fichier l'image sera prise au hasard parmi 
                             // celles disponibles dans le répertoire

$bgframe = (isset($cryptographp->settings['bgframe'])?$cryptographp->settings['bgframe']:true);    // Ajoute un cadre de l'image (true/false)


// ----------------------------
// Configuration des caractères
// ----------------------------

// Couleur de base des caractères

$charR = (isset($cryptographp->settings['charR'])?$cryptographp->settings['charR']:0);     // Couleur des caractères au format RGB: Red (0->255)
$charG = (isset($cryptographp->settings['charG'])?$cryptographp->settings['charG']:0);     // Couleur des caractères au format RGB: Green (0->255)
$charB = (isset($cryptographp->settings['charB'])?$cryptographp->settings['charB']:0);     // Couleur des caractères au format RGB: Blue (0->255)

$charcolorrnd = (isset($cryptographp->settings['charcolorrnd'])?$cryptographp->settings['charcolorrnd']:true);      // Choix aléatoire de la couleur.
$charcolorrndlevel = (isset($cryptographp->settings['charcolorrndlevel'])?$cryptographp->settings['charcolorrndlevel']:2);    // Niveau de clarté des caractères si choix aléatoire (0->4)
                           // 0: Aucune sélection
                           // 1: Couleurs très sombres (surtout pour les fonds clairs)
                           // 2: Couleurs sombres
                           // 3: Couleurs claires
                           // 4: Couleurs très claires (surtout pour fonds sombres)

$charclear = (isset($cryptographp->settings['charclear'])?$cryptographp->settings['charclear']:10);   // Intensité de la transparence des caractères (0->127)
                  // 0=opaques; 127=invisibles
	                // interessant si vous utilisez une image $bgimg
	                // Uniquement si PHP >=3.2.1

// Polices de caractères

//$tfont[] = 'Alanden_.ttf';       // Les polices seront aléatoirement utilisées.
//$tfont[] = 'bsurp___.ttf';       // Vous devez copier les fichiers correspondants
//$tfont[] = 'ELECHA__.TTF';       // sur le serveur.
//$tfont[] = 'luggerbu.ttf';         // Ajoutez autant de lignes que vous voulez   
//$tfont[] = 'RASCAL__.TTF';       // Respectez la casse ! 
//$tfont[] = 'SCRAWL.TTF';  
//$tfont[] = 'WAVY.TTF';   

$tfont = (isset($cryptographp->settings['tfont'])?explode(',',$cryptographp->settings['tfont']):array('luggerbu.ttf'));

// Caracteres autorisés
// Attention, certaines polices ne distinguent pas (ou difficilement) les majuscules 
// et les minuscules. Certains caractères sont faciles à confondre, il est donc
// conseillé de bien choisir les caractères utilisés.

$charel = (isset($cryptographp->settings['charel'])?$cryptographp->settings['charel']:'ABCDEFGHKLMNPRTWXYZ234569');       // Caractères autorisés

$crypteasy = (isset($cryptographp->settings['crypteasy'])?$cryptographp->settings['crypteasy']:true);       // Création de cryptogrammes "faciles à lire" (true/false)
                         // composés alternativement de consonnes et de voyelles.

$charelc = (isset($cryptographp->settings['charelc'])?$cryptographp->settings['charelc']:'BCDFGHKLMNPRTVWXZ');   // Consonnes utilisées si $crypteasy = true
$charelv = (isset($cryptographp->settings['charelv'])?$cryptographp->settings['charelv']:'AEIOUY');              // Voyelles utilisées si $crypteasy = true

$difuplow = (isset($cryptographp->settings['difuplow'])?$cryptographp->settings['difuplow']:false);          // Différencie les Maj/Min lors de la saisie du code (true, false)

$charnbmin = (isset($cryptographp->settings['charnbmin'])?$cryptographp->settings['charnbmin']:4);         // Nb minimum de caracteres dans le cryptogramme
$charnbmax = (isset($cryptographp->settings['charnbmax'])?$cryptographp->settings['charnbmax']:4);         // Nb maximum de caracteres dans le cryptogramme

$charspace = (isset($cryptographp->settings['charspace'])?$cryptographp->settings['charspace']:20);        // Espace entre les caracteres (en pixels)
$charsizemin = (isset($cryptographp->settings['charsizemin'])?$cryptographp->settings['charsizemin']:14);      // Taille minimum des caractères
$charsizemax = (isset($cryptographp->settings['charsizemax'])?$cryptographp->settings['charsizemax']:16);      // Taille maximum des caractères

$charanglemax = (isset($cryptographp->settings['charanglemax'])?$cryptographp->settings['charanglemax']:25);     // Angle maximum de rotation des caracteres (0-360)
$charup   = (isset($cryptographp->settings['charup'])?$cryptographp->settings['charup']:true);        // Déplacement vertical aléatoire des caractères (true/false)

// Effets supplémentaires

$cryptgaussianblur = (isset($cryptographp->settings['cryptgaussianblur'])?$cryptographp->settings['cryptgaussianblur']:false); // Transforme l'image finale en brouillant: méthode Gauss (true/false)
                            // uniquement si PHP >= 5.0.0
$cryptgrayscal = (isset($cryptographp->settings['cryptgrayscal'])?$cryptographp->settings['cryptgrayscal']:false);     // Transforme l'image finale en dégradé de gris (true/false)
                            // uniquement si PHP >= 5.0.0

// ----------------------
// Configuration du bruit
// ----------------------

$noisepxmin = (isset($cryptographp->settings['noisepxmin'])?$cryptographp->settings['noisepxmin']:10);      // Bruit: Nb minimum de pixels aléatoires
$noisepxmax = (isset($cryptographp->settings['noisepxmax'])?$cryptographp->settings['noisepxmax']:10);      // Bruit: Nb maximum de pixels aléatoires

$noiselinemin = (isset($cryptographp->settings['noiselinemin'])?$cryptographp->settings['noiselinemin']:1);     // Bruit: Nb minimum de lignes aléatoires
$noiselinemax = (isset($cryptographp->settings['noiselinemax'])?$cryptographp->settings['noiselinemax']:1);     // Bruit: Nb maximum de lignes aléatoires

$nbcirclemin = (isset($cryptographp->settings['nbcirclemin'])?$cryptographp->settings['nbcirclemin']:1);      // Bruit: Nb minimum de cercles aléatoires 
$nbcirclemax = (isset($cryptographp->settings['nbcirclemax'])?$cryptographp->settings['nbcirclemax']:1);      // Bruit: Nb maximim de cercles aléatoires

$noisecolorchar  = (isset($cryptographp->settings['noisecolorchar'])?$cryptographp->settings['noisecolorchar']:3);  // Bruit: Couleur d'ecriture des pixels, lignes, cercles: 
                       // 1: Couleur d'écriture des caractères
                       // 2: Couleur du fond
                       // 3: Couleur aléatoire
                       
$brushsize = (isset($cryptographp->settings['brushsize'])?$cryptographp->settings['brushsize']:1);        // Taille d'ecriture du princeaiu (en pixels) 
                       // de 1 à 25 (les valeurs plus importantes peuvent provoquer un 
                       // Internal Server Error sur certaines versions de PHP/GD)
                       // Ne fonctionne pas sur les anciennes configurations PHP/GD

$noiseup = (isset($cryptographp->settings['noiseup'])?$cryptographp->settings['noiseup']:false);      // Le bruit est-il par dessus l'ecriture (true) ou en dessous (false) 

// --------------------------------
// Configuration système & sécurité
// --------------------------------

$cryptformat = (isset($cryptographp->settings['cryptformat'])?$cryptographp->settings['cryptformat']:'png');   // Format du fichier image généré "GIF", "PNG" ou "JPG"
				                // Si vous souhaitez un fond transparent, utilisez "PNG" (et non "GIF")
				                // Attention certaines versions de la bibliotheque GD ne gerent pas GIF !!!

$cryptsecure = (isset($cryptographp->settings['cryptsecure'])?$cryptographp->settings['cryptsecure']:'md5');    // Méthode de crytpage utilisée: "md5", "sha1" ou "" (aucune)
                         // "sha1" seulement si PHP>=4.2.0
                         // Si aucune méthode n'est indiquée, le code du cyptogramme est stocké 
                         // en clair dans la session.
                       
$cryptusetimer = 0;        // Temps (en seconde) avant d'avoir le droit de regénérer un cryptogramme

$cryptusertimererror = 3;  // Action à réaliser si le temps minimum n'est pas respecté:
                           // 1: Ne rien faire, ne pas renvoyer d'image.
                           // 2: L'image renvoyée est "images/erreur2.png" (vous pouvez la modifier)
                           // 3: Le script se met en pause le temps correspondant (attention au timeout
                           //    par défaut qui coupe les scripts PHP au bout de 30 secondes)
                           //    voir la variable "max_execution_time" de votre configuration PHP

$cryptusemax = 1000;  // Nb maximum de fois que l'utilisateur peut générer le cryptogramme
                      // Si dépassement, l'image renvoyée est "images/erreur1.png"
                      // PS: Par défaut, la durée d'une session PHP est de 180 mn, sauf si 
                      // l'hebergeur ou le développeur du site en ont décidé autrement... 
                      // Cette limite est effective pour toute la durée de la session. 
                      
$cryptoneuse = false;  // Si vous souhaitez que la page de verification ne valide qu'une seule 
                       // fois la saisie en cas de rechargement de la page indiquer "true".
                       // Sinon, le rechargement de la page confirmera toujours la saisie.

$logenable = (isset($cryptographp->settings['logenable'])?$cryptographp->settings['logenable']:false);
                      
?>
