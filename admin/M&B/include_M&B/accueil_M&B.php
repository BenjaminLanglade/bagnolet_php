<?php
header( 'content-type: text/html; charset=utf-8' );
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
				1;";
	if( !($result = $db->query( $sql ))){
		die( 'probléme de connexion à la base de donée, veuillez contacter votre administrateur réseau.' );
	}
	$ajouter = function(){
		echo "<a href=\"index_M&B.php?page=ajouter\">AJOUTER</a>";
	}
?>
<table border="1">
	<tr>
		<td>commerce</td>
		<td>adresse</td>
		<td>numéro</td>
        <td>horaire</td>
        <td>image</td>
        <td>action</td>
	</tr>
	<?php if( $result->num_rows > 0 ):?>
		<?php while( $row = $result->fetch_assoc()):?>
	<tr>
		<td><?php echo $row['nom_commerce']?></td>
		<td><?php echo $row['adresse']?></td>
		<td><?php echo $row['numero']?></td>
		<td><?php echo $row['horaire']?></td>
        <td><?php echo $row['image']?></td>
		<td>
			<a href="index_M&B.php?page=modifier&id=<?php echo $row['id']?>">Modifier</a>
			<a href="index_M&B.php?page=supprimer&id=<?php echo $row['id']?>">Supprimer</a>
		</td>
	</tr>
		<?php endwhile;?>
	<?php else:?>
		<tr>
			<td colspan="2">Aucune coordonnée</td>
		</tr>
	<?php endif;?>
</table>
<?php $ajouter();?>
