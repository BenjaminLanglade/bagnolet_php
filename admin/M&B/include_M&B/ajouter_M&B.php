<?php
header( 'content-type: text/html; charset=utf-8' );
	if( count( $_POST ) == 0 ) {
		?>
		<form action="index_M&B.php" method="post">
		<input type="hidden" name="page" value="ajouter"/>
			Commerce:<br/>
			<input type="text" name="nom_commerce" value=""/><br/>
			adresse:<br/>
			<input type="text" name="adresse" value=""/><br/>
			numero:<br/>
			<input type="text" name="numero" value=""/><br/>
			horaire:<br/>
			<input type="text" name="horaire" value=""/><br/>
			image:<br/>
			<input type="text" name="image" value=""/><br/>
			<input type="submit" value="Ajouter"/><br/>
		</form>
	<?php
        
	} else {
		$sql = "INSERT INTO
					`mode_beaute`
				(
                    `nom_commerce`, 
                    `adresse`, 
                    `numero`, 
                    `horaire`,
                    `image`
				) VALUES (
					'". $db->real_escape_string(  $_POST['nom_commerce'] ) ."',
					'". $db->real_escape_string(  $_POST['adresse'] ) ."',
					'". $db->real_escape_string(  $_POST['numero'] ) ."',
					'". $db->real_escape_string(  $_POST['horaire'] ) ."',
					'". $db->real_escape_string(  $_POST['image'] ) ."'                  
				)";
		if ( !( $result = $db->query( $sql ) ) ) {
			die( 'Tentative d\'ajout échouée' );
		}
		header( 'Location: index_M&B.php' );
	}