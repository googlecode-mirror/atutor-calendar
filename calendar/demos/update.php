<?php
	//Retrieve all the parameters from request.
	$iddd = $_GET["id"];
	$newstartd = $_GET["start"];
	$newend = $_GET["end"];
	$newtitle = $_GET["title"];
	$alld = $_GET["allday"];
	$command = $_GET["cmd"];
	
	//Connect to database.
	$con = mysql_connect("localhost","root","root");
	if (!$con)
	{
	  die('Could not connect: ' . mysql_error());
	}
	
	//Select database "test".
	mysql_select_db("test");
	
	//Use SQL Query according to the situation. 
	if( strcmp($command,"drag") == 0 )
	{
		//Event is dragged, so update dates.
		$query = "UPDATE `full-calendar-events` SET start = '".$newstartd.
		"', end = '".$newend."' WHERE id=".$iddd;
		mysql_query( $query, $con );
	}
	else if( strcmp($command,"create") == 0 )
	{
		//New event is created, first insert the record in the table and then return id to javascript.
		$query = "INSERT INTO `full-calendar-events` (title,start,end,allDay) values".
		" ('".$newtitle."','".$newstartd."','".$newend."','".$alld."')" ;
		mysql_query( $query, $con );
		$query = "SELECT MAX(id) from `full-calendar-events`";
		$resultno = mysql_query( $query, $con );
		$idno=mysql_fetch_row($resultno);  
		echo $idno[0];	
	}
	else if( strcmp($command,"delete") == 0 )
	{
		//Delete the event.
		$query = "DELETE FROM `full-calendar-events` WHERE id=".$iddd;
		mysql_query( $query, $con );
	}
	else if( strcmp($command,"update") == 0 )
	{
		//User clicked on the event. The dates and title may be changed. So update the database record.
		$query = "UPDATE `full-calendar-events` SET title = '".$newtitle."' , start = '".
		$newstartd."', end = '".$newend."' WHERE id=".$iddd;
		mysql_query( $query, $con );
	}
?>