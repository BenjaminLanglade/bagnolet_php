<?php
header( 'content-type: text/html; charset=utf-8' );
	if( count( $_POST ) == 0 ) {
		?>
		<form action="index.php" method="post">
		<input type="hidden" name="page" value="ajouter"/>
			Commerce:<br/>
			<input type="text" name="nom_commerce" value=""/><br/>
			Nom propriétaire:<br/>
			<input type="text" name="nom_proprietaire" value=""/><br/>
			email:<br/>
			<input type="text" name="mail" value=""/><br/>
			numéro de téléphone:<br/>
			<input type="text" name="num" value=""/><br/>
			adresse:<br/>
			<input type="text" name="adresse" value=""/><br/>
			date d'incription:<br/>
			<input type="text" name="date_inscription" value=""/><br/>
			<input type="submit" value="Ajouter"/><br/>
		</form>
	<?php
        
	} else {
		$sql = "INSERT INTO
					`commerces`
				(
					`nom_commerce`,
					`nom_proprietaire`,
					`mail`,
					`num`,
					`adresse`,
                    `date_inscription`
				) VALUES (
					'". $db->real_escape_string( $_POST['nom_commerce'] ) ."',
					'". $db->real_escape_string( $_POST['nom_proprietaire'] ) ."',
					'". $db->real_escape_string( $_POST['mail'] ) ."',
					'". $db->real_escape_string( $_POST['num'] ) ."',
					'". $db->real_escape_string( $_POST['adresse'] ) ."',
                    '". $db->real_escape_string( $_POST['date_inscription'] ) ."'
				)";
		if ( !( $result = $db->query( $sql ) ) ) {
			die( 'Tentative d\'ajout échouée' );
		}
		header( 'Location: index.php' );
	}