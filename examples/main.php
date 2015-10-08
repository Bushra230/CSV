<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$strLogin = $_POST["submit"];
$strUserName = strtolower($_POST["userName"]);
$strPassword = md5($_POST["password"]);
// store session data
$_SESSION["username"] = $strUserName;
// retrieve session data
echo "Username = " . $_SESSION["username"];
?>
<div>
    <strong>Upload CSV file</strong>
</div>
