<?php
session_start();
$host="localhost";
$dbname= 'copy-staer';
$user="root";
$pass="";

$conn = new mysqli("mysql:host=$host;dbname=$dbname", $user, $pass);