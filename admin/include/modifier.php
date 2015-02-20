<?php
header( 'content-type: text/html; charset=utf-8' );
	if( count( $_POST ) == 0 ) {
		$sql = "SELECT
                    `id`,
                    `nom_commerce`, 
                    `nom_proprietaire`, 
                    `mail`, 
                    `num`,
                    `adresse`, 
                    `date_inscription`
				FROM
					`commerces`
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
		<form action="index.php" method="post">
			<input type="hidden" name="data[id]" value="<?php echo $row['id']?>"/>
			<input type="hidden" name="page" value="modifier"/>
			Commerce:<br/>
			<input type="text" name="nom_commerce" value="<?php echo $row['nom_commerce']?>"/><br/>
			Nom propriétaire:<br/>
			<input type="text" name="nom_proprietaire" value="<?php echo $row['nom_proprietaire']?>"/><br/>
			email:<br/>
			<input type="text" name="mail" value="<?php echo $row['mail']?>"/><br/>
			numéro de téléphone:<br/>
			<input type="text" name="num" value="<?php echo $row['num']?>"/><br/>
			adresse:<br/>
			<input type="text" name="adresse" value="<?php echo $row['adresse']?>"/><br/>
			date inscription:<br/>
			<input type="text" name="date_inscription" value="<?php echo $row['date_inscription']?>"/><br/>
			<input type="submit" value="Envoyer"/><br/>
		</form>
<?php
	} else {
		$sql = "UPDATE
					`commerces`
				SET
					`nom_commerce` = '". $db->real_escape_string( $_POST['nom_commerce'] ) ."',
					`nom_proprietaire` = '". $db->real_escape_string( $_POST['nom_proprietaire'] ) ."',
					`mail` = '". $db->real_escape_string( $_POST['mail'] ) ."',
					`num`='". $db->real_escape_string( $_POST['num'] ) ."',
					`adresse`='". $db->real_escape_string( $_POST['adresse'] ) ."',
                    `date_inscription`='". $db->real_escape_string( $_POST['date_inscription'] ) ."'
				WHERE
					`id` = ". (int) $_POST['data']['id'] .";";
		if ( !( $result = $db->query( $sql ) ) ) {
			die( 'echec' );
		}
		header( 'Location: index.php' );
	}