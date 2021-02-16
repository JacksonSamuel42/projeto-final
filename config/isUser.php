<?php 

session_start();
include('../database/db.config.php');

if(!isset($_SESSION['user'])){
    header("location: ../login.php");
    exit;
}