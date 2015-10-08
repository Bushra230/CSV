<pre>
<?php
# include parseCSV class.
require_once('../parsecsv.lib.php');


# create new parseCSV object.
$csv = new parseCSV();
# Parse '_books.csv' using automatic delimiter detection...
$csv->auto('PercFramesLoadedonQA_092915.csv');
//print_r($csv);

# ...or if you know the delimiter, set the delimiter character
# if its not the default comma...
// $csv->delimiter = "\t";   # tab delimited

# ...and then use the parse() function.
// $csv->parse('_books.csv');


# Output result.
//echo '<pre>';print_r($csv->data);die;
$i = 1;
//$j=2;
$html = '';
$aFPC = array();
foreach ($csv->data as $key => $row)
{   
    $aFPC[] =  $row['FPC Code'];
}
foreach (array_unique($aFPC) as $key => $row)
{ 
//echo   $row; 
$html = ( htmlentities('<LineItem Id="'.$i.'" Quantity="'.$i.'"><FPC Value="'.$row.'"/><Patient FirstName="New'.$i.'" LastName="Order'.$i.'" PatientId="'.$i.'"/></LineItem>'));
 echo $result= $html."\n";   
    $i++;
   // $j++;
    
}
