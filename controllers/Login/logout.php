<?php
	################################################################################
	#### Auteur : Butticaz Yvann   
	#### Date : 11 Janvier 2018
	#### Examen PHP :
	####       Site web dynamique d'un salon de coiffure
	################################################################################
	
	session_start();
    session_destroy();
	header("location:index.php?controller=Site&action=home");

	

