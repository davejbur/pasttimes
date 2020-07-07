<?php
$filename = '../docs/Table_37_Havant_and_Hayling_Island_split_DW.csv';

//flips the table diagonally as we need to deal with columns not rows
//pinched from https://stackoverflow.com/questions/797251/transposing-multidimensional-arrays-in-php
function flipDiagonally($arr)
{
  $out = array();
  foreach ($arr as $key => $subarr)
  {
    foreach ($subarr as $subkey => $subvalue)
    {
      $out[$subkey][$key] = $subvalue;
    }
  }
  return $out;
}

// The nested array to hold all the arrays
$allrows = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($row = fgetcsv($h)) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $allrows[] = $row;		
  }

  // Close the file
  fclose($h);
}

//need to read the data column by column, not row by row...
$ttdata = flipDiagonally($allrows);

// check...
echo "<pre>";
var_dump($ttdata);
echo "</pre>";


?>
