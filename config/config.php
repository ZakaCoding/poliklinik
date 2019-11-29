<?php

/**
 * Configuration file for this website
 * 
 */

//  disable any error
// use comment if you want error message turn on
error_reporting(0);

/**
 * This is base url
 * Main page of this page
 *
 */

define ('BASE_URL',"http://localhost/poliklinik_um/");

/**
 * Connection to database
 * you can costum this setting for connection to database
 * with your configuration file dbms
 * this web use MySQL for dbms
 */
$mysqli = new mysqli('localhost','root','','poliklinik');
// if connection has error
if($mysqli->connect_error)
{
    die("Mysql connection error [". $mysqli->connect_errno ."] ".$mysqli->connect_error);
    // End connection
    $mysqli->close;
}

