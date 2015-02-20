<?php
header( 'content-type: text/html; charset=utf-8' );
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
				1;";
	if( !($result = $db->query( $sql ))){
		die( 'probléme de connexion à la base de donée, veuillez contacter votre administrateur réseau.' );
	}
	$ajouter = function(){
		echo "<a href=\"index.php?page=ajouter\">AJOUTER</a>";
	}
?>
<table border="1">
	<tr>
		<td>Liste des commerçants</td>
		<td>commerce</td>
		<td>propriétaire</td>
		<td>email</td>
        <td>numéro</td>
        <td>adresse</td>
        <td>date d'inscription</td>
	</tr>
	<?php if( $result->num_rows > 0 ):?>
		<?php while( $row = $result->fetch_assoc()):?>
	<tr>
		<td><?php echo $row['nom_commerce']?></td>
		<td><?php echo $row['nom_proprietaire']?></td>
		<td><?php echo $row['mail']?></td>
		<td><?php echo $row['num']?></td>
        <td><?php echo $row['adresse']?></td>
        <td><?php echo $row['date_inscription']?></td>
		<td>
			<a href="index.php?page=modifier&id=<?php echo $row['id']?>">Modifier</a>
			<a href="index.php?page=supprimer&id=<?php echo $row['id']?>">Supprimer</a>
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
