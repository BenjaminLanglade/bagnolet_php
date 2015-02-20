    <?php
header( 'content-type: text/html; charset=utf-8' );
	try {
		$db = new mysqli( 'localhost', 'root', '', 'cms_bagnolet' );
	} catch (mysqli_sql_exception $e) {
		die('Probleme de connexion');
	}
	define( 'PAGE_PAR_DEFAUT' , 'accueil' );
	$pages_admin = array(
		PAGE_PAR_DEFAUT => 'include_M&B/accueil_M&B.php',
		'ajouter' => 'include_M&B/ajouter_M&B.php',
		'supprimer' => 'include_M&B/supprimer_M&B.php',
		'modifier' => 'include_M&B/modifier_M&B.php',
	);
	if( isset( $_REQUEST['page'] ) && isset( $pages_admin[ $_REQUEST['page'] ] )){
		$page = $_REQUEST['page'];
	} else {
		$page = PAGE_PAR_DEFAUT;
	}
	require_once( $pages_admin[$page] );