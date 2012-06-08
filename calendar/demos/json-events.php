<?php
	//Connect to database.
	$con = mysql_connect("localhost","root","root");
	if (!$con)
	{
	  die('Could not connect: ' . mysql_error());
	}
	//Select database "test".
	mysql_select_db("test");
	
	//Retrieve all the events.
	$query = "SELECT * FROM `full-calendar-events`";
	$result = mysql_query($query);
	
	//Create an empty array and push all the events in it.
	$rows = array();
	while ($row = mysql_fetch_assoc($result)) 
	{
		array_push( $rows, $row );		
	}
	
	//Encode in JSON format.
	$str =  json_encode( $rows );
	
	//Replace "true","false" with true,false for javascript.
	$str = str_replace('"true"','true',$str);
	$str = str_replace('"false"','false',$str);
	
	//Return the events in the JSON format.
	echo $str;
?>
