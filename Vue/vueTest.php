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


echo '<br/><h3>fin page test<h3>';