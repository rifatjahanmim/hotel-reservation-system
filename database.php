<?php

 $conn = new mysqli('localhost', 'root', '', 'hrrs1');

if($conn->connect_error){
    die("error");
}