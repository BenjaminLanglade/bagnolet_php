<?php
header( 'content-type: text/html; charset=utf-8' );
	try {
		$db = new mysqli( 'localhost', 'root', '', 'cmsBagnolet' );
	} catch (mysqli_sql_exception $e) {
		die('Probleme de connexion');
	}
	define( 'PAGE_PAR_DEFAUT' , 'accueil' );
	$pages_admin = array(
		PAGE_PAR_DEFAUT => 'include/accueil.php',
		'ajouter' => 'include/ajouter.php',
		'supprimer' => 'include/supprimer.php',
		'modifier' => 'include/modifier.php',
	);
	if( isset( $_REQUEST['page'] ) && isset( $pages_admin[ $_REQUEST['page'] ] )){
		$page = $_REQUEST['page'];
	} else {
		$page = PAGE_PAR_DEFAUT;
	}
	require_once( $pages_admin[$page] );