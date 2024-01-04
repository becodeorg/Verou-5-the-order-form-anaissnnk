<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

$products = [
    ['name' => 'Your favourite drink', 'price' => 2.5],
    ['name' => 'Your favourite snack', 'price' => 2.5],
    ['name' => 'Your favourite ice-cream', 'price' => 2.5],
];

$totalValue = 0;

function validate()
{
    // TODO: This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)
    $selectedProducts = $_POST["products"];
    $deliveryAddress = $_POST["street"];
    $addressNumber = $_POST["streetnumber"];
    $zipCode = $_POST["zipcode"];
    $city = $_POST["city"];

    print_r("The selected products are " . implode(", " , $selectedProducts));
    echo "<br>";
    print_r("The delivery address is " . $deliveryAddress . " " . $addressNumber . " " . $zipCode . " " . "in " . $city);

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

$formSubmitted = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    handleForm();
}

require 'form-view.php';