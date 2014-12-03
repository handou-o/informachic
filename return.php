
<?php
global $smarty;
include_once('../../config/config.inc.php');
include_once('../../header.php');
//if (isset($smarty->cart->id_customer))
$connect = mysql_connect('localhost','root','123456789') or die("Erreur de connexion au serveur.");
mysql_select_db('prestashop', $connect) or die("Erreur de connexion à la base");
for ($num = 0;$num < $_POST['nb_commande'];$num++)
{
if (isset($_POST['return'.$num]))
{
	$size = isset($_POST[size.$num]) ? 1 : 0;
	$color = isset($_POST[color.$num]) ? 1 : 0;
	$cut = isset($_POST[cut.$num]) ? 1 : 0;
	$price = isset($_POST[price.$num]) ? 1 : 0;
	$style = isset($_POST[style.$num]) ? 1 : 0;
	$jai = isset($_POST[jai.$num]) ? 1 : 0;
	$comment = $_POST[com.$num];
	$sql = "INSERT INTO ps_order_return(id_customer, id_order, state, taille, Couleur, Coupe, Prix, Style, deja,Comment,date_add) VALUES ({$cart->id_customer},".$_POST[id_order.$num].", 1, $size
	, $color, $cut, $price, $style, $jai,'$comment',now())";
	$resulta = mysql_query($sql);
}

	
// echo $_POST['id_order'.$num];
}
 include 'informachic_page.php';
// $retour = $_POST['return1'];
// if ($retour)
	// echo "retour";

// // // 
// if ($retourpp)


// include('../../footer.php');
?>