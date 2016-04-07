<?php
include_once("query.php");
$id2=genRandomId();
$name2="";
$section2 = "";
$course2="";
$gpa2="";

	if(isset($_GET['edit']))
	{
		include("connection.php");
		$id2 = $_GET['id'];	
		$st = "select * from studentinfo where id like '".$id2."'";
		$result = mysql_query($st);
		while($row=mysql_fetch_array($result))
		{
			$name2 = $row[1];
		$section2 = $row[2];
		$course2 = $row[3];
		$gpa2 = $row[4];
		}
	}
	
	function random()
	{
		
	}
?>
<html>
	<form name= "mainform" method ="get" action ="tblstudents.php" target="iframe_table">
		<br>
		<input type = "hidden" name = "id" value = "<?php echo $id2 ?>">
		<input type = "hidden" name = "numstart" value = "0">
		<input type = "hidden" name = "numend" value = "8">
		<input type = "hidden" name = "filterby" value = "name">
		<input type = "hidden" name = "txtfilter" value = "">
		 &nbsp;STUDENT #: <input type="text" id='id' size=15 maxlength=10  value = "<?php echo $id2; ?>" disabled=true> <br><br>
		 &nbsp;NAME: <input type="text" id="name" size=27 maxlength=50 name = "name" value = "<?php echo $name2; ?>"><br><br>
		 &nbsp;SECTION: <input type="text" id="section" size=23 maxlength=50 name = "section" value = "<?php echo $section2; ?>"><br><br>
		 &nbsp;COURSE: <select id="course" name = "course">
			 	<option id ="main" value = "<?php echo $course2; ?>"><?php echo $course2; ?></option>
				<option id="opt_0" value="AB`">AB</option>
				<option  id="opt_1" value="BSCS">BSCS</option>
				<option  id="opt_2" value="BSCRIM">BSCRIM</option>
				<option  id="opt_3" value="BSA">BSA</option>
				<option  id="opt_4" value="BSCPE">BSCPE</option>
				<option   id="opt_5" value="BSED">BSED</option>
				<option  id="opt_6" value="BSN">BSN</option>
				<option  id="opt_7" value="BSHM">BSHM</option>
						</select>
		  GPA: <input type="text" id="gpa" size=2 maxlength=50 name = "gpa" value = "<?php echo $gpa2; ?>"><br><br>
	
		<center>  
			<input type=hidden name = "condition" value="id">
			<input type = "submit" id="save" name="save" value = "SAVE">
			<a href = "mainfields.php?"><input type = "button" value = "CANCEL" ></a>
			
		</center>
		</form>

</html>
