<?php
header( 'content-type: text/html; charset=utf-8' );
	if( count( $_POST ) == 0 ) {
		$sql = "SELECT
                    `id`,
                    `nom_commerce`, 
                    `adresse`, 
                    `numero`, 
                    `horaire`,
                    `image`
				FROM
					`mode_beaute`
				WHERE
					`id` = " . (int) $_REQUEST['id'] . ";";
		if ( !( $result = $db->query( $sql ) ) ) {
			die( 'modification échouée' );
		}
		if ( $result->num_rows == 0 ) {
			die( 'Pas de resultats' );
		}
		$row = $result->fetch_assoc();
		?>
		<form action="index_M&B.php" method="post">
			<input type="hidden" name="data[id]" value="<?php echo $row['id']?>"/>
			<input type="hidden" name="page" value="modifier"/>
			Commerce:<br/>
			<input type="text" name="nom_commerce" value="<?php echo $row['nom_commerce']?>"/><br/>
			adresse:<br/>
			<input type="text" name="adresse" value="<?php echo $row['adresse']?>"/><br/>
			numero:<br/>
			<input type="text" name="numero" value="<?php echo $row['numero']?>"/><br/>
			horaire:<br/>
			<input type="text" name="horaire" value="<?php echo $row['horaire']?>"/><br/>
			image:<br/>
			<input type="text" name="image" value="<?php echo $row['image']?>"/><br/>
			<input type="submit" value="Envoyer"/><br/>
		</form>
<?php
	} else {
		$sql = "UPDATE
					`mode_beaute`
				SET
					`nom_commerce` = '". $db->real_escape_string( $_POST['nom_commerce'] ) ."',
					`adresse` = '". $db->real_escape_string( $_POST['adresse'] ) ."',
					`numero` = '". $db->real_escape_string( $_POST['numero'] ) ."',
					`horaire` = '". $db->real_escape_string( $_POST['horaire'] ) ."',
					`image` = '". $db->real_escape_string( $_POST['image'] ) ."'
				WHERE
					`id` = ". (int) $_POST['data']['id'] .";";
		if ( !( $result = $db->query( $sql ) ) ) {
			die( 'echec' );
		}
		header( 'Location: index_M&B.php' );
	}