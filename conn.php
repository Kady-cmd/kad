<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "kad";
$conn = null;

try 
{
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} 
catch (Exception $e) 
{
  print_r($e->getMessage());  
}
