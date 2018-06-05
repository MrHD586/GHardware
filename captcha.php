<?php
session_start();


function nombre($n){
	//Random Character
	return str_pad(mt_rand(0,pow(10,$n)-1),$n,'0',STR_PAD_LEFT);
}

function image($mot)
{
	//Dimension Captcha
	$size = 32;
	$marge = 15;
	
	//Police
	$font = 'angelina.TTF';
	
	// Flou Gaussien
	$matrix_blur = array(
		array(1,2,1),
		array(2,4,2),
		array(1,2,1));
		
	
	$box = imagettfbbox($size, 0, $font, $mot);
	$largeur = $box[2] - $box[0];
	$hauteur = $box[1] - $box[7];
	$largeur_lettre = round($largeur/strlen($mot));
	
	//Cr�ation de l'image
	
	$img = imagecreate($largeur+$marge, $hauteur+$marge);
	$blanc = imagecolorallocate($img, 255, 255, 255); 
	$noir = imagecolorallocate($img, 0, 0, 0);
	
	for($i = 0; $i < strlen($mot);++$i)
	{
		$l = $mot[$i];
		$angle = mt_rand(-35,35);
		imagettftext($img,$size,$angle,($i*$largeur_lettre)+$marge, $hauteur+mt_rand(0,$marge/2),$noir, $font, $l);	
	}
	
	//Cr�ation de la Captcha + Flou
	imageconvolution($img, $matrix_blur,16,0);

	imagepng($img);
	imagedestroy($img);
}

//Appel de la Captcha

function captcha()
{
	$mot = nombre(5);
	$_SESSION['captcha'] = $mot;
	image($mot);
}

//Image

header("Content-type: image/png");
captcha();

