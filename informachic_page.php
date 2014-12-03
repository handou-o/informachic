
<?php
global $smarty;
include_once('../../config/config.inc.php');
include_once('../../header.php');
//if (isset($smarty->cart->id_customer))
// echo ;
$connect = mysql_connect('localhost','root','123456789') or die("Erreur de connexion au serveur.");
mysql_select_db('prestashop', $connect) or die("Erreur de connexion à la base");
// 
?>
<Style> <!-- td{border:1px solid;text-align:center} --> </style>
<form method="post" action="return.php">
<table id="wawa" ><tr><td>Numero de commande:</td><td>Produit:</td><td>Reference</td><td>Quantité</td><td>Retourné</td><td>Taille</td><td>Couleur</td><td>Coupe</td><td>Prix</td><td>Style</td><td>J'ai déjà</td><td>Commentaires</td>
<?php
$resulta = mysql_query('SELECT id_order,reference FROM `ps_orders` WHERE id_customer='. "{$cart->id_customer}");
$num = 0;
while ($data = mysql_fetch_array($resulta))
{ 
	$test =mysql_query('SELECT * FROM `ps_order_return` WHERE id_order='. $data['id_order']);
	if (mysql_num_rows($test) == 0)
	{ 
		$results = mysql_query('SELECT product_name,product_reference,product_quantity FROM `ps_order_detail` WHERE id_order='. $data['id_order']);
		while ($donnees = mysql_fetch_array($results)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
		{
		?>
			<tr><td>
			<input type="hidden" value="<?php echo $data['id_order'] ?>" name="id_order<?php echo $num?>"/>
			<?php
			echo $data['reference'];?></td><td><?php
			echo utf8_encode($donnees['product_name']);?></td><td><?php
			echo utf8_encode ($donnees['product_reference']);?></td><td> <?php
			echo utf8_encode ($donnees['product_quantity']);?></td><td>
			<input type="checkbox" name="return<?php echo $num?>">
			</td>
			<td>
				<input type="checkbox" name="size<?php echo $num?>">
			</td>
			<td>
				<input type="checkbox" name="color<?php echo $num?>">
			</td>
			<td>
				<input type="checkbox" name="cut<?php echo $num?>">
			</td>
			<td>
				<input type="checkbox" name="price<?php echo $num?>">
			</td>
			<td>
				<input type="checkbox" name="style<?php echo $num?>">
			</td>
			<td>
				<input type="checkbox" name="jai<?php echo $num?>">
			</td>
			<td>
				<input type="text" name="com<?php echo $num++;?>">
			</td></tr><?php
		}
	}
}?>
</table>
<input type="hidden" value="<?php echo $num ?>" name="nb_commande"/>
<input type="submit" value="Renvoyer"></form><?php
$smarty->display(dirname(__FILE__).'/informachic_page.tpl');
$mymodule = new MyModule();
$message = $mymodule->l('Welcome to my shop!');
$smarty->assign('messageSmarty', $message ); // creation of our variable

 
include('../../footer.php');
?>