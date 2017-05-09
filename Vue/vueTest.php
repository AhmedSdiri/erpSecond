<h3>hello i am the test!!!</h3>
<head>
</head>

<body>
    <div><a href="vueCustomer_Add.php" a>Customer create</a>
    </div>
</body>

</html>

<?php

//include('../header.php');

include("../Modele/Customer.php");
include("../Modele/Product.php");
include("../Modele/invoice.php");
include("../Modele/Modele.php");
include ("../Controleur/ControllerLogin.php");
//include("../Vue/vueTest.php");

$client = new Customer();
$product = new Product();
$invoice = new Invoice();
$modele = new Modele();
echo $client->getCustomers();
echo 'test<br/>';
echo '<strong>pop customer list</strong<br/>';
echo $client->popCustomersList();
echo '<strong>get products<strong><br/>';
echo $product->getProducts();
echo '<strong>get invoices</strong><br/>';
echo $invoice->getInvoices();

echo $client->__toString().'<br/>';

$modele->connectDB();
$controllerlogin = new ControllerLogin();
$controllerlogin->connectDB();
/*echo '</br>'.json_encode(array(
			'status' => 'Success',
			'message'=> 'Login was a success! Transfering you to the system now, hold tight!'
		));*/
$a = 10;
var_dump($a);
$url="http://localhost/erpSecond/.brackets.json";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);
echo '<pre>' . print_r($json, true) . '</pre>';

//$_POST
?>
<form method="post">
<p>Votre nom : <input type="text" name="nom" /></p>
<p>Votre âge : <input type="text" name="age" /></p>
<input type="submit">
    </form>
Bonjour, <?php echo htmlspecialchars($_POST['nom']); ?>.
Tu as <?php echo (int)$_POST['age']; ?> ans.</br>
<?php
$user = $_POST["nom"];
$age = $_POST["age"];
if($user != null)
{
    echo $user;
    echo " is your username";
}
else
{
    echo "no username supplied";
}

//json encode

$arr = array($user => $age);

echo '</br>'. json_encode($arr).'</br>';
	echo json_encode(array(
	    	'status' => 'Error',
	    	//'message'=> 'There has been an error, please try again.'
	    	'message' => 'Login incorrect, does not exist or simply a problem! Try again!'
	    ));
echo '</br>Version PHP courante : ' . phpversion();
//fin page
echo '<br/><h3>fin page test<h3>';
