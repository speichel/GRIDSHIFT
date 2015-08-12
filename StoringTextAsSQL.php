<html>
<body>

<?php

	DEFINE('DBUSER','root');
	DEFINE('DBPW','mysql');
	DEFINE('DBHOST','localhost');
	DEFINE('DBNAME','database_name');
	
	if ($dbc = mysql_connect (DBHOST, DBUSER, DBPW))
	{
		if (!mysql_select_db (DBNAME))
		{
			trigger_error("Coundn't select database MySQL Error:" . mysql_error());
			exit();
		} 
	} else {
	
	trigger_error("Coundn't select database MySQL Error:" . mysql_error());
	exit();
	}
	
	//$querytextfiletosql = "LOAD DATA LOCAL INFILE 'BigBlueData.txt' INTO TABLE table_name";
	//echo "<br>";
	//echo $querytextfiletosql . "<br />";
	//$result = mysql_query($querytextfiletosql) or trigger_error("Query MySQL Error: " . mysql_error());
	
	
	$lines = file("C:\\Program Files (x86)\Ampps\www\BigBlueData.txt");
	
	
	foreach($lines as $line)
	{
		$foo =$line;
		//echo($line);
		echo "<br /><br />";
		$splitting_each_line = explode(" ", $foo);
		echo "<br /><br />";
		//echo $splitting_each_line[1], " ", $splitting_each_line[2],  " ", $splitting_each_line[3], " ", $splitting_each_line[4], " ", $splitting_each_line[5]," ", 
			// $splitting_each_line[6], " ", $splitting_each_line[7],  " ", $splitting_each_line[8], " ", $splitting_each_line[9], " ", $splitting_each_line[10]," ", 
			// $splitting_each_line[11]," ", $splitting_each_line[12], " ", $splitting_each_line[13], "<br /><br />";
		
		//echo "Using Preg_split";
		
		$parts_split = preg_split('/\s+/', $foo);
		print_r(array_values($parts_split ));
		echo "<br /><br />";
		
		echo "Using Implode:  ";
		$parts_implode = implode(",", $parts_split);
		$string_two = "(" . $parts_implode . ")";
		//echo $string_two;
		$string_three = str_replace( '(,','(',$string_two);
		$string_four = str_replace( ',)',')',$string_three);	
		$string_five = str_replace( ':','5',$string_four);
		echo $string_five;
		echo "<br /><br />";
		
		//Using Regex to add date and time in the corrent formating
		
		//$string_six = preg_match("%4470%", $string_five);
		
		//foreach($string_six as $result)
		//{
		//	echo $result, "<br /><br />";
		//}
		
		/*$test_date_time = "2015-10-10 12:30:00";
		echo strtotime($test_date_time);
		echo "<br /><br />";
		echo date("Y-m-dHis", strtotime($test_date_time));
		$time_for_string = date("His", strtotime($test_date_time));
		$date_for_string = date("Y-m-d", strtotime($test_date_time));
		
		
		$string_six =  '(4470,' . $date_for_string . ',' . $time_for_string .  ',95456.500,95745.453,95842.570,-10200.000,0.000,48.000,34791.836,-10384.820,0.958,0.000,0.000)';
		*/
		//Using Regex to add date and time in the corrent formating
		
		$querytextfiletosql2 = 'INSERT INTO table_name (X,Date_Table,Time_Table,VA_MAG,VB_MAG,VC_MAG,MV10,SC01,SC02,P,Q,PF,MV32,MV27) VALUES ' . $string_five . ''; //. $string_four; 
		echo "<br>";
		echo $querytextfiletosql2 . "<br />";
		$result2 = mysql_query($querytextfiletosql2) or trigger_error("Query MySQL Error: " . mysql_error());
		
	}
	
	
	
/*	
	
	$foo = "0 1 2 3 4 5 6 7 8";
	$splitting_each_line = explode(" ", $foo);
	echo $splitting_each_line;
	echo $splitting_each_line[0], " ", $splitting_each_line[3], "<br /><br />";
	
	echo "<br /><br />";
	echo "<br /><br />";
	echo "<br /><br />";
	
	//$make_each_line_string = (1 2 3 4 5);
	//$spliting_each_line = explode(" ", $make_each_line_string);
	
	

	$myInfo = array("#" => "4470", "Date" => "12/03/2014", "Time" => "04:30:10.500", 
	"VA_MAG" => "95456.500", "VB_MAG" => "95456.500", "VC_MAG" => "95745.453", 
	"MV10" => "-10200.000", "SC01" => "0.000", "SC02" => "48.000", 
	"P" => "34791.836", "Q" => "-10384.820", "PF" => "0.958", "MV32" => "0.000", "MV27" => "0.000");
	
	
	echo "My name is ", $myInfo["Name"], "<br /><br />";

	//$moreInfo = array("State" => "PA", "Age" => 35);

	//$myInfo = array_merge($myInfo, $moreInfo);

	
	foreach( $myInfo as $key => $value)
	{
	echo $key, " ", $value, "<br />";
	}
	echo "<br /><br />";
	
	
	
	

	if(array_key_exists("SC01", $myInfo)) echo "The SC01 stored is ", $myInfo["SC01"];
	echo "<br /><br />";

	$citySearch = array_search("0.958", $myInfo);
	echo "The PF for the city is ", $citySearch;
	echo "<br /><br />";
	
	

	print_r(array_keys($myInfo));  //print out array in readable forms
	echo "<br /><br />";

	print_r(array_values($myInfo));
	echo "<br /><br />";

	$customer1 = array("#" => "4469", "Date" => "12/03/2014", "Time" => "04:30:15.500", 
	"VA_MAG" => "95456.500", "VB_MAG" => "95456.500", "VC_MAG" => "95745.453", 
	"MV10" => "-10200.000", "SC01" => "0.000", "SC02" => "48.000", 
	"P" => "34791.836", "Q" => "-10384.820", "PF" => "0.958", "MV32" => "0.000", "MV27" => "0.000");
	$customer2 = array("#" => "4470", "Date" => "12/03/2014", "Time" => "04:30:10.500", 
	"VA_MAG" => "95456.500", "VB_MAG" => "95456.500", "VC_MAG" => "95745.453", 
	"MV10" => "-10200.000", "SC01" => "0.000", "SC02" => "48.000", 
	"P" => "34791.836", "Q" => "-10384.820", "PF" => "0.958", "MV32" => "0.000", "MV27" => "0.000");

	
	
	$customers = array($customer1, $customer2);
	print_r(array_values($customers));
	echo "<br /><br />";

	
	foreach($customers as $key)
	{
		foreach($key as $key2 => $value)
		{
		echo $key2, " ", $value, "<br />";
		}
	}

	
	
	
	//array_merge
	
	//array file ( string $lines[, int $flags = 0 [, resource $context ]] )
	*/
	
	?>
	

</body>
</html>