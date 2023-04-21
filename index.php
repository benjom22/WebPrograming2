<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');
require 'vendor/autoload.php';


Flight::register('db', 'PDO', 
array('mysql:host=localhost;dbname=lab3_db','root',''));


Flight::route('GET /api/users', function(){
    $users = Flight::db()->query('SELECT * FROM Users', PDO::FETCH_ASSOC)->fetchAll();
    //var_dump($users);
    Flight::json($users);
});

Flight::route('GET /api/usersid', function(){
    $users = Flight::db()->query('SELECT id, firstName FROM Users', PDO::FETCH_ASSOC)->fetchAll();
    //var_dump($users);
    Flight::json($users);
});

Flight::route('GET /api/usersid/@id', function($id){
   /* $servername = "localhost";
    $username = "root";
    $password = "";
    $schema = "lab3_db";
    $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      /** TODO
      * write a query that will list investor by given id
      *
      * This endpoint should return output in JSON format
      */
  
      /*$stmt = $conn->prepare("SELECT * FROM Users where id = $id");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      Flight::json(reset($result));*/
});

Flight::start();
    

?>