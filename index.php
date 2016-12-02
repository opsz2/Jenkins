<?php
//$jobNames = "";
$statusArray = "";

	include("connect.php");

//insert api data into Database
	$urlContents = file_get_contents("http://edytorex.com.ng/text.json");
//

	$contentArray = json_decode($urlContents, true);

	$jobNames = $contentArray['jobs'];

	if(is_array($jobNames)){

		echo "its an array";

    $query = "INSERT INTO jenkins (name, color) values ";

    $valuesArr = array();
    foreach($jobNames as $row){

        $name = $row['name'];
        $color =$row['color'];

        $valuesArr[] = "('$name', '$color')";
    }

    $query .= implode(',', $valuesArr);

    mysqli_query($link, $query);
}

//Get all data from Database
	/*$query = "SELECT * FROM `jenkins`" ;

	if ($result = mysqli_query($link, $query)){

		$row = mysqli_fetch_all($result);
		
		print_r($row);
	}*/


?>

