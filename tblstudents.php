<html>
<link rel = "stylesheet" type="text/css" href="styles.css">
<PAGE>
<div name = "div3" class="div3">
	PAGE: <?php
		$cond = $_GET['condition'];
		include("connection.php");
		include("query.php");
		$que = "select * from studentinfo where ".$_GET['filterby']." like '%".$_GET['txtfilter']."%'";
		$division = (int)(total($que)/7);
		$interval=1;
		for($a=1;$a<=$division+1;$a++)
		{
			echo "&nbsp;<a href =tblstudents.php?condition=".$cond."&numstart=".$interval."&numend=".($interval+7)."&filterby=".$_GET['filterby']."&txtfilter=".$_GET['txtfilter'].">$a</a> &nbsp;";
			$interval+=8;
		}
	?>
</div>
<div name = "div4" class="div4">	
	<form name = "frm" method="get" action = "tblstudents.php">
		<input type="hidden" name="condition" value="id">
		<input type="hidden" name="numstart" value="1">
		<input type="hidden" name="numend" value="8">
	FILTER BY:
		<select name= "filterby">
			<option id ="option1" value = "id"> id </option>
			<option id ="option1" value = "name"> name </option>
			<option id ="option1" value = "section"> section </option>
			<option id ="option1" value = "course"> course </option>
			<option id ="option1" value = "gpa"> gpa </option>
			
			</select>
		<input type = "text" size =12 name ="txtfilter"></input>
		<input type= "submit" value = "GO"></input>
		</form>
	</div>
<table  name ="tbl_record" border=1 class="tbl_record">
	<tr >
		<td style="font-family: Impact, Charcoal, sans-serif;"><a id="a1" href="tblstudents.php?condition=id&numstart=1&numend=8&filterby=''&&filterby=<?php echo $_GET['filterby'];?>&txtfilter=<?php echo $_GET['txtfilter'];?>">STUDENT #</a></td>
		<td style="font-family: Impact, Charcoal, sans-serif;"><a id="a1" href="tblstudents.php?condition=name&numstart=1&numend=8&filterby=<?php echo $_GET['filterby'];?>&txtfilter=<?php echo $_GET['txtfilter'];?>">NAME</a></td>
		<td style="font-family: Impact, Charcoal, sans-serif;"><a id="a1" href="tblstudents.php?condition=section&numstart=1&numend=8&filterby=<?php echo $_GET['filterby'];?>&txtfilter=<?php echo $_GET['txtfilter'];?>">SECTION</a></td>
		<td style="font-family: Impact, Charcoal, sans-serif;"><a id="a1" href="tblstudents.php?condition=course&numstart=1&numend=8&filterby=<?php echo $_GET['filterby'];?>&txtfilter=<?php echo $_GET['txtfilter'];?>">COURSE</a></td>
		<td style="font-family: Impact, Charcoal, sans-serif;"><a id="a1" href="tblstudents.php?condition=gpa&numstart=1&numend=8&filterby=<?php echo $_GET['filterby'];?>&txtfilter=<?php echo $_GET['txtfilter'];?>	">GPA</a></td>
		<td style="font-family: Impact, Charcoal, sans-serif;">ACTION</td>
			</tr>
<?php 

include("connection.php");
 showstudentdata($cond,$_GET['filterby'],$_GET['txtfilter']);
  ?>
</table>

<?php 

	function showstudentdata($cond,$filterby,$txtfilter)
	{	
		//include("query.php");
		//echo genRandomId();

		include("connection.php");
		echo "<form name= \"tblform\"  method= get action =\"tblstudents.php\">";
		$st = "select * from studentinfo where ".$filterby." like '%".$txtfilter."%' order by ".$cond ;
		//echo $st;
		$result = mysql_query($st);
		$counter=0;
		while($row=mysql_fetch_array($result))
		{
			if($counter+1 >= $_GET['numstart']  && $counter+1<= $_GET['numend'])
			{
			if($counter%2==0)
			{
				
				echo"<tr bgcolor =lightgreen id=tr1>";	
			}
			else
			{
				echo"<tr bgcolor = lightblue id=tr1>";
			}
			
			echo"<td  id = id_".$counter.">".$row[0]."</b></td>";
			echo"<td id = name_".$counter.">".$row[1]."</td>";
			echo"<td id = section_".$counter.">".$row[2]."</td>";
			echo"<td  id = course_".$counter.">".$row[3]."</td>";
			echo"<td  id = gpa_".$counter.">".$row[4]."</td>";
			echo "<td><center><a href = mainfields.php?edit&id=".$row[0]." target = iframe_mainfield><input type ='button' name = 'edit'  value='E' style=\"width:40; height:40;\"></a> &nbsp;";
			echo "<a href = tblstudents.php?del=".$row[0]."&condition=id&numstart=0&numend=8&filterby=''&txtfilter><input type ='button' value='X'  style=\"width:40; height:40;\"></a></center></td >";
			echo"</tr>";
			
			}
			$counter++;
		}
		echo "</form>";	
	}
	
	if(isset($_GET['del']))
	{
		//include_once("query.php");
	//	alertFunc($_GET['del']);
		//echo $_GET['del'];
	//	include("connection.php");
		execQuery("delete from studentinfo where id like '".$_GET['del']."'");
		echo "<script>parent.window.location.reload()</script>";
	}
	
	if(isset($_GET['save']))	
	{
		//include("connection.php");
		//include_once("query.php");
		if($_GET['name']=="" || $_GET['section'] =="" || $_GET['course'] == "" || $_GET['gpa']=="")
		{
			alertFunc("Fill all Fields to proceed");
			return;
		}
		if(exist("select * from studentinfo where id like '".$_GET['id']."'")==true)
		{
			execQuery("update studentinfo set name = '".$_GET['name']."', section = '".$_GET['section']."',course = '".$_GET['course']."',gpa='".$_GET['gpa']."' where id = '".$_GET['id']."' ");	
		}
		else
		{
			execQuery("insert into studentinfo values('".$_GET['id']."','".$_GET['name']."','".$_GET['section']."','".$_GET['course']."','".$_GET['gpa']."')");	
		}
		echo "<script>parent.window.location.reload()</script>";
	}
	
?>
<html>