<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="wrap">
		<!--Header Content-->
		<div  style="font-size: 25px; margin: 0 auto; width: 180px;height: 25px; margin-bottom: 30px;">
			<strong>Admin panel </br></strong>
		</div>
               
		<!-- End of Header Content-->
		<div id="main" style="width:320px; min-height: 115px; margin: 0 auto; background-color: #ccc; padding: 20px;">
			<div id="logIn" style="margin: 10px;">				
                            <form name="adminLogIn" action="main.php" method="post">
                                    <b> Your Name </b> <i><input type="text" class="inputText" onfocus="" name="userName" value="User Name" onclick="this.value=''" /></i>
                                    <b>  Password </b> <i>&nbsp;&nbsp;<input type="password" class="inputText"  name="password" value="password" onclick="this.value=''" /></i>
                                    <b><input type="submit" name="submit" class="log" value="Log In" /></b>
                            </form>				
			</div>
                     
		</div>
                <div style="width:210px; min-height: 115px; margin: 0 auto; padding: 20px;">
                <?php
                        if(isset($_GET['success']))
                        { 
                            echo $_GET['success'];
                        }
                ?> 
                </div>
	</div>	
</body>
</html>
