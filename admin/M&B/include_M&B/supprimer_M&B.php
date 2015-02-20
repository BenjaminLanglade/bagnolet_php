<?php
header( 'content-type: text/html; charset=utf-8' );
	if( isset( $_POST['confirmation'])){
		// confirmation OK
		$sql = "DELETE FROM
					`mode_beaute`
				WHERE
					id = ". (int) $_POST['id'] ."
				LIMIT 1;";
		if ( !$db->query( $sql )) {
			die( 'Supression échoué' );
		}
		header( 'Location: index_M&B.php' );
	} else {
		// affichage demande de confirmation
?>
	Voulez-vous vraiment supprimer?<br />
	<form action="index_M&B.php" method="post">
		<input type="hidden" name="page" value="supprimer"/>
		<input type="hidden" name="confirmation" value="1"/>
		<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>"/>
		<input type="submit" value="confirmer"/>
		<input type="button" value="non" onclick="history.back()" />
	</form>
<?php
	}
