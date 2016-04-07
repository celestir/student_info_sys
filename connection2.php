<?php 

	$conn = mysql_connect("localhost","csacom_junjardin","3dQf^=RTbJWM");
	mysql_select_db("csacom_junjardin");
	
	if($conn)
	{
		echo "connected";
		
	}
	else
	{
		echo "not connected";
	}
	
	
			$st ="create table studentinfo(id varchar(100), name varchar(100), section varchar(100), course varchar(100), gpa decimal(10,2))";
			mysql_query($st);
		
?>