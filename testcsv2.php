<?php
$conn=mysql_connect("localhost","root","proggasoft123") or die("unable to connect localhost".mysql_error());
$db=mysql_select_db("testfile",$conn) or die("unable to select db name");

$mycsvfile="yyy.csv";
/*while(($var=fgetcsv($file,1000,","))!==FALSE)
{
$var1=$var[0];
//$var2=$var[1];
//print_r($var);
//echo $var2 ."<br />\n";
$ro=mysql_query("select username from user where username='$var1'");
$ro1= mysql_num_rows($ro);
echo $ro1;

if($ro1<1)
//mysql_query("insert into user(username,pass,address,age) values('$var[0]','$var[1]','$var[2]','$var[3]')");
mysql_query("INSERT INTO products (`id`,'name','company','description',`price`, `categories`,'subcategories','picture','year','make','model') values ('','".$data[0]."', '".$data[1]."', '".$data[7]."','".$data[9]."','".$data[2]."','".$data[3]."','".$data[14]."','".$data[6]."','".$data[4]."','".$data[5]."')");
}*/
$i=0;
if (($handle = fopen($mycsvfile, "r"))) {

    while (($data = fgetcsv($handle, 1000, ","))) {
        // this loops through each line of your csv, putting the values into array elements
        echo $sql1 ="INSERT INTO products (name,company,description,price, categories,subcategories,picture,year,make,model) values ('".$data[0]."', '".$data[1]."', '".$data[7]."','".$data[9]."','".$data[2]."','".$data[3]."','".$data[14]."','".$data[6]."','".$data[4]."','".$data[5]."')";
        //$sql2 = "INSERT INTO table2 (`haircolour`, `shoesize`) values ('".$data[3]."', '".$data[4]."')";
		//echo $sql1 ="INSERT INTO products (name,company,description,price,categories,subcategories,picture,year,make,model) values ('aaa', '12', 'dddd','12.4','1','2','rrr','1234','1236','45')";
		if(mysql_query ($sql1)){
		echo "successfully";
		}
		else
		echo " not successfully";
    if($i==3)
	die();
	}
	
	}
    fclose($handle);
//fclose($file);

?> 