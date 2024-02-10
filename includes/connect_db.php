<?php

$conn = new mysqli('localhost', 'root', '', 'my_portfolio_db');

if(!$conn){

    die(mysqli_error($conn));
}