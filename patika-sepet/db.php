<?php

try {
	$pdo = new PDO("mysql:host=localhost;dbname=basketApp","root","");

}catch(PDOException $e){
    echo $e->message;
}

