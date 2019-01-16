<?php 
	require_once ('core/init.php');
	//require_once ('functions.php');
	require_once ('functions.paypal.php');
	require_once ('connect.php');
if (isset($_POST['pid'])) {
	 $d = escape($_POST['pid']);
	 $u_id = escape($_POST['u_id']);
	 switch ($d) {
    case 'scotch':
        $price = 5;
        break;
    case "tequila":
        $price = 4;
        break;
    case "vodka":
        $price = 2;
        break;
	case "rum&cola":
        $price = 7;
        break;
	case "margarita":
        $price = 14;
        break;
		
	case "sexonthebeach":
        $price = 10;
        break;
		case "wine":
        $price = 11;
        break;
		case "shot":
        $price = 6;
        break;
		case "beer":
        $price = 3;
        break;
		
		
}
 PayPal::splitPayForDrinks($u_id, $price,$d);	


}

    

	

 
?>


   
        
