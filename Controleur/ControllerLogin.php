<?php




//include("../Modele/Customer.php");
//include("../Modele/Product.php");
//include("../Modele/invoice.php");
//include("../Controleur/controllerCustomer.php");
//include("../Controleur/controllerProduct.php");
//include("../Controleur/controllerInvoice.php");

include_once('../includes/config.php');
class ControllerLogin{
    //construct
    function __construct(){}
    
    function connectDB(){
       // output any connection error
    $mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
     
    if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
        


    echo "success connection DB</br>";
   // Login to system
   $action = isset($_POST['action']) ? $_POST['action'] : "";
  if($action == 'login') {

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	session_start();

    $myArray = [];
    $myArray = extract($_POST);
    echo $myArray;
    echo "success extracting post </br>";

    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $pass_encrypt = md5(mysqli_real_escape_string($mysqli,$_POST['password']));

    $query = "SELECT * FROM `users` WHERE username='$username' AND `password` = '$pass_encrypt'";

    $results = mysqli_query($mysqli,$query) or die (mysqli_error());
    $count = mysqli_num_rows($results);
    echo "succes getting result from db </br>";
    if($count!="") {
        echo 'count empty</br>';
		$row = $results->fetch_assoc();

		$_SESSION['login_username'] = $row['username'];

		// processing remember me option and setting cookie with long expiry date
		if (isset($_POST['remember'])) {	
			session_set_cookie_params('604800'); //one week (value in seconds)
			session_regenerate_id(true);
		}  
		echo '1';
		echo json_encode(array(
			'status' => 'Success',
			'message'=> 'Login was a success! Transfering you to the system now, hold tight!'
		));
        echo '2';
    } else {
        echo 'not count empty</br>';
    	echo json_encode(array(
	    	'status' => 'Error',
	    	//'message'=> 'There has been an error, please try again.'
	    	'message' => 'Login incorrect, does not exist or simply a problem! Try again!'
	    ));
    }
      
}
    
   echo "end of function connecDB </br>";  
}
}
