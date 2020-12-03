<?php

 $conn = new mysqli('localhost', 'root', '', 'hrrs');

if($conn->connect_error){
    die("error");
}