
<?php
	include("connection.php");
	include("query.php");
	function actions()
	{
		
		$theId = getAllId();
		if(isset($_POST['save']) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			execQuery("insert into studentinfo values('".$_POST['id']."','".$_POST['name']."','".$_POST['section']."','".$_POST['course']."','".$_POST['gpa']."')");
		}
		if(isset($_POST['edit']) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			
		}
			for($a=0;$a<totalRec();$a++)
			{
					if(isset($_POST['del_'.$a]) and $_SERVER['REQUEST_METHOD'] == "POST")
					{
						alertFunc($theId[$a]);
						execQuery("delete from studentinfo where id like '".$theId[$a]."'");
					}
			}	
	}
	
	function loadContent()
	{
		
	}
?>
