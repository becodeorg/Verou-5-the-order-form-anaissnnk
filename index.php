<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Store the current input data in the session
$_SESSION['input_data'] = $_POST;

// Use the current input data, if available, otherwise return empty string
$inputData = $_SESSION['input_data'] ?? [];

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
    ['name' => 'Computer-shaped punching ball', 'price' => 25.5],
    ['name' => 'Selection of soothing tea blends', 'price' => 12.5],
    ['name' => 'Pillow to scream into', 'price' => 5.5],
];

$totalValue = 0;

function validate()
{
    $errors = [];
    if (!isset($_POST["products"])) {
        $errors["products"] = "Please select a product";
    }
    if (empty($_POST["email"])) {
        $errors["email"] = "Please enter an email address";
    } elseif (!filter_var(($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please provide a valid email address";
    }
    if (empty($_POST["street"])) {
        $errors["street"] = "Please enter a valid street address";
    }
    if (empty($_POST["streetnumber"])) {
        $errors["streetnumber"] = "Please enter a valid street number";
    }
    if (empty($_POST["city"])) {
        $errors["city"] = "Please enter a valid city";
    }
    if (empty($_POST["zipcode"])) {
        $errors["zipcode"] = "Please enter a valid zipcode";
    } elseif (!is_numeric($_POST["zipcode"])) {
        $errors["zipcode"] = "Please provide a valid zipcode";
    }
    return $errors;
}

function handleForm()
{
    $errors = validate();
    if (!empty($errors)) {
        echo '<div class="alert alert-danger">';
        echo "<strong>Errors found:</strong><br>" . implode("<br>", $errors);
        echo '</div>';

    } else {
        $selectedProducts = $_POST["products"];
        $deliveryAddress = $_POST["street"];
        $addressNumber = $_POST["streetnumber"];
        $zipCode = $_POST["zipcode"];
        $city = $_POST["city"];

        echo '<div class="alert alert-success" role="alert">';
        echo "Order placed successfully!";
        echo '<br>';
        echo "The selected products are: " . implode(", " , $selectedProducts);
        echo '<br>';
        echo "The delivery address is: " . $deliveryAddress . ", " . $addressNumber;
        echo '<br>';
        echo $zipCode . ", " . $city;
        echo '</div>';
    }
}

$formSubmitted = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    handleForm();
}

require 'form-view.php';

