<?php

function csvFileread($target_file){
# include parseCSV class.
require_once('parsecsv.lib.php');

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
 echo"hello";
print_r($csv->data);
$i = 0;
foreach ($csv->data as $key => $row)
{    
    print_r($row);
    if ($i == 5)
        die();
$i++;
}

}
?>