<?php

function csvFileread($target_file){
# include parseCSV class.
require_once('parsecsv.lib.php');

$conn=mysql_connect("localhost","root","proggasoft123") or die("unable to connect localhost".mysql_error());
$db=mysql_select_db("testfile",$conn) or die("unable to select db name");

# create new parseCSV object.
$csv = new parseCSV();

# Parse '_books.csv' using automatic delimiter detection...
$csv->auto("uploads/$target_file.csv");
//$csv->auto("abc.csv");

# ...or if you know the delimiter, set the delimiter character
# if its not the default comma...
 $csv->delimiter = "\t";   # tab delimited

# ...and then use the parse() function.
// $csv->parse('_books.csv');


# Output result.
// print_r($csv->data);
$i = 0;
foreach ($csv->data as $key => $row)
{    
    //print_r($row);
    //if ($i == 5)
        //die();
    //Work on Main category...........
    $main_category = mysql_real_escape_string($row['Categories']);
    $maincatesql = "INSERT INTO main_catagories (main_catagory) values ('".$main_category."')";
    //echo $catesql;
    $result = mysql_query($maincatesql);
    if ($result)
    {
        //$main_cat_id = "query of last id";
        $main_cat_id = mysql_insert_id();
    }
    else
        
        die('not successfuly');
   
    //Work on Category...........
    $category = mysql_real_escape_string($row['Mypafway Categories']);
    $catesql = "INSERT INTO categories (main_cat_id,title) values ('".$main_cat_id."','".$category."')";
    $result = mysql_query($catesql);
    if ($result)
    {
        //$cat_id = "query of last id";
         $cat_id = mysql_insert_id();
    }
    else
        die('not successfuly');
    
    
    //Work on Subcategory...........
    
    $subcategory = mysql_real_escape_string($row['Mypafway Sub Categories']);
    $subcatesql = "INSERT INTO sub_categories (main_cat_id,cat_id,title) values ('".$main_cat_id."','".$cat_id."','".$subcategory."')";
    $subcatresult = mysql_query($subcatesql);
    if ($subcatresult)
    {
        //$cat_id = "query of last id";
         $subcat_id = mysql_insert_id();
    }
    else
        die('not successfuly');
    
    //Work on Make table...........
    $make = mysql_real_escape_string($row['Make']);
    $makesql = "INSERT INTO  auto_makes (text) values ('".$make."')";
    $makeresult = mysql_query($makesql);
    if ($makeresult)
    {
        //$cat_id = "query of last id";
         $make_id = mysql_insert_id();
    }
    else
        die('not successfuly make');
    
     //Work on Model table...........
    $model = mysql_real_escape_string($row['Model']);
    $modelsql = "INSERT INTO  auto_models (auto_make_id,text,year,Cylinders,Engine_Code,Engine_Bore,Engine_Size,Comments_on_file) 
        values ('".$make_id."','".$model."','','','','','','')";
    $modelresult = mysql_query($modelsql);
    if ($modelresult)
    {
        //$cat_id = "query of last id";
         $model_id = mysql_insert_id();
    }
    else
        die('not successfuly model');
    
    
    //Work on Product...........
    
    $product_name = mysql_real_escape_string($row['Name']);
  //echo $product_make = $row['Make'];
   //echo $product_model = $row['Model'];
    $product_yaer = mysql_real_escape_string($row['Year']);
    $product_price = mysql_real_escape_string($row['Price']);
    $product_image = mysql_real_escape_string($row['Images']);
   //echo $product_desc = $row['Short Description'];
    $product_desc = mysql_real_escape_string($row['Long Description']);
    $product_metatitle = mysql_real_escape_string($row['Meta Title']);
    $product_metadesc = mysql_real_escape_string($row['Meta Description']);
    $product_tags = mysql_real_escape_string($row['Tags']);
   
  // echo $product ="INSERT INTO products (name,company,description,price,categories,subcategories,picture,year,make,model)
       // values ('".$product_name."', 'mypafway', '".$product_desc."','".$product_price."','".$cat_id."','".$subcat_id."','".$product_image."','".$product_yaer."','".$product_make."','".$product_model."')";
 
    $product ="INSERT INTO products (user_id,title,partno,company,url,description,price,
        product_type,Quantity,headings,categories,subcategories,show_address,show_phone,show_cell,show_fax,
        picture,year,make,model,location,time,supp1,supp2,supp3,supp4,supp5,search_count,pushed,downloads,
        meta_title,meta_description,tags)
        
      values ('','".$product_name."','','','','$product_desc','".$product_price."','','','','".$cat_id."','".$subcat_id."',
            'a','a','a','a','".$product_image."','".$product_yaer."','".$make_id."',
             '".$model_id."','','','','','','','','','','','".$product_metatitle."','".$product_metadesc."','".$product_tags."')";


     
    $productresult = mysql_query($product);
    if ($productresult)
    {
        //$cat_id = "query of last id";
         $subcat_id = mysql_insert_id();
    }
    else
        die('not successfuly product');
    
    //Work on Search keyword table...........
    $searchkey = $row['Meta Keywords'];
    $searchkeysql = "INSERT INTO  search (date,keyword) values ('','".$searchkey."')";
    $result = mysql_query($searchkeysql);
    if ($result)
    {
        //$cat_id = "query of last id";
        $cat_id = mysql_insert_id();
        //echo "CSV file upload successfuly.";
    }
    else
        die('not successfuly');
//$i++;
}

}
?>