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
echo  $_SESSION["username"];
?>

<div>
    <strong>Upload CSV file</strong>
<form action="upload.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="uploadedfile" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</div>

