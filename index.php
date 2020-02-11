<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
$_SESSION['email'] = $_POST["email"];
whatIsHappening();
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
// Validation
$email = $street =  $streetNumber = $city = $zipcode = "";

$emailErr = $streetErr = $streetNumberErr = $cityErr= $zipcodeErr = "";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["street"])) {
        $streetErr  ='<div class="alert alert-danger position-relative">Please fill out this field</div>';
    } else {
        $street = test_input($_POST["street"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$street)) {
            $streetErr ='<div class="alert alert-danger position-relative">Please fill out this field</div>';
        }
    }

    if (empty($_POST["streetNumber"])) {
        $streetNumberErr ='<div class="alert alert-danger position-relative">Please fill out this field</div>';
    } else {
        $street = test_input($_POST["streetNumber"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$street)) {
            $streetNumberErr  ='<div class="alert alert-danger position-relative">Please fill out this field</div>';
        }
    }
    if (empty($_POST["city"])) {
        $cityErr ='<div class="alert alert-danger position-relative">Please fill out this field</div>';
    } else {
        $city = test_input($_POST["city"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
            $cityErr = "";
        }
    }
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = '<div class="alert alert-danger position-relative">Please fill out this field</div>';
    } else {
        $zipcode = test_input($_POST["zipcode"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$zipcode)) {
            $zipcodeErr ='<div class="alert alert-danger position-relative">Please fill out this field</div>';
        }
    }
    if (empty($_POST["email"])) {
        $emailErr =   '<div class="alert alert-danger position-relative">Please fill out this field</div>';
    } else {
        $email = test_input($_POST["email"]);

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = '<div class="alert alert-danger position-relative">Invalid Email</div>';
        }
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;

require 'front-view.php';
// Mail this information to client
echo "<h2>Your Input:</h2>";
echo $email;
echo "<br>";
echo $street;
echo "<br>";
echo $city;
echo "<br>";


