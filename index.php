<h1> Welcome to my website! </h1><br>
<p> You may think this is weird but... it is! this is for my college work, where i have to mess around with 2d arrays and multidimensional</p><br>


<?php
error_reporting(0);

function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

function calculateAverage($array){
    $sum = array_sum($array);
    $average = $sum / count($array);

    return $average;
}


$array = array(
    array("name" => "Mary Johnson","age" => 43),
    array("name" => "Amanda Miller","age" => 23),
    array("name" => "James Brown","age" => 47),
    array("name" => "Patricia Williams","age" => 31),
    array("name" => "Michael Davis","age" => 15),
    array("name" => "Sarah Miller","age" => 35),
    array("name" => "Patrick Miller","age" => 44)
  ); 



echo build_table($array);
  // sort by first name
array_multisort( array_column($array, "name"), SORT_ASC, $array );
echo "<h3>Sorted by first name name</h3>" , build_table($array);

// sort by age
array_multisort( array_column($array, "age"), SORT_ASC, $array );
echo "<h3>Sorted by age</h3>" , build_table($array);

$ageAverage = calculateAverage(array_column($array, "age") );

echo "<h3>Average age of people is $ageAverage</h3>";

$adults = array_filter($array, function($item) {
    return $item['age'] >= 18;
});

echo "<h3>Adults</h3>" , build_table($adults);                                              


