<?php
require($_SERVER['DOCUMENT_ROOT']."/assesment/conf/dbCred.php");
$myImaginaryData = array(
    array( 'companyname' => 'Nike' , 'contact' => 'tesffd@gmail.com','country' => 'Brazil'),
    array( 'companyname' => 'Puma' , 'contact' => 'nifd@gmail.com', 'country' => 'Greece'),
    array( 'companyname' => 'Adiddas' , 'contact' => 'stezer95@gmail.com','country' => 'England'),
    array( 'companyname' => 'ANEK Lines' , 'contact' => 'fdd@yahoo.com','country' => 'Greece'),
    array( 'companyname' => 'Attica Bank' , 'contact' => 'att@gmail.com','country' => 'Greece'),
    array( 'companyname' => 'Test Company' , 'contact' => 'test@gmail.com','country' => 'Italy')
    );

$db = 'mysql:host='.SERVER.';dbname='.DATABASE.'';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $db = new PDO($db, DB_USER, PASSWORD, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode($myImaginaryData);
    die();
}

//fetch customers
$data = $pdo->query("SELECT * FROM company.customers")->fetchAll();
echo json_encode($data);
die();