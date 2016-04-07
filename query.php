<script src="jsfunc.js"></script>
<?php	
	 $ids  = array();
	
	include("connection.php");
	
	
	function execQuery($str)
	{
		try
		{
			$st = $str;
			mysql_query($st);
		}catch(Exception $e)
		{
			echo "<script>alert(".$e."); </script>";
		}
		
	}
	
	function totalRec()
	{
		$st = "select * from studentinfo";
		$result = mysql_query($st);
		$counter2=0;
		while($row=mysql_fetch_array($result))
		{
			$counter2++;
		}
		return $counter2;
	}
	function total($t)
	{
		$st =$t;
		$result = mysql_query($st);
		$counter2=0;
		while($row=mysql_fetch_array($result))
		{
			$counter2++;
		}
		return $counter2;
	}
	function getAllId()
	{
		$arr =  array(totalRec());
		$st = "select id from studentinfo";
		$result = mysql_query($st);
		$counter3=0;
		while($row=mysql_fetch_array($result))
		{
			$arr[$counter3] = $row[0];
			$counter3++;
		}
		
		return $arr;
	}
	function exist($str)
	{
		$st = $str;
		$result = mysql_query($st);
		if($row = mysql_fetch_array($result))
		{
			return true;
		}
		
			return false;
	}
	
	function genRandomId()
	{
		$temp = "";
		for($a=0;$a<6;$a++)
		{
			$temp.= rand(0,9);
			if($a==2)
			{
				$temp.="-";
			}
		}
			if(exist("select * from studentinfo where id =".$temp)==true)
			{
				genRandomId();
			}
		return $temp;
	}

	function hel()
	{}
	function alertFunc($str)
	{
		echo "<script>alert('".$str."') </script>";
	}
	
	?>
	<script>
		function sample(id)
		{
			alert(id);			
			var x = "<?php hel() ?>";
			alert(x);
		}		
		</script>