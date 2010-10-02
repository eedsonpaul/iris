<?
	include("cat.php");
	include("dbconnect.php");
	$kayot = new cat("kayot","1 year","blackgray stripes","female","1","1");
	/*$kayot = new cat();
	$kayot->name = "kayot";
	$kayot->age = "1";
	$kayot->furcolor = "blackgray";
	$kayot->gender = "female";
	$kayot->height = "1";
	$kayot->weight = "1";*/
	function add_cat($c)
	{
		connect_db();
		$d = mysql_query("INSERT INTO cat VALUES ('".$c->name."','".$c->age."','".$c->furcolor."','".$c->gender."','".$c->height."','".$c->weight."')");
		print(mysql_affected_rows()." records added.");
		mysql_close();
	}
	
	function add_cats()
	{
		connect_db();
		mysql_query("INSERT INTO cat VALUES ('Bani','1 years','yellow white','male','1','1')");
		print(mysql_affected_rows()." records added.");
		mysql_close();
	}
	
	print($kayot->name);
	//add_cat($kayot);
	//add_cats();
?>
<table>
<form action="call_cat.php" method="post">
<tr>
<td>Name</td>
<td><input type="text" name="name"></td>
</tr>
<tr>
<td>Age</td>
<td><input type="text" name="age"></td>
</tr>
<tr>
<td>Fur Color</td>
<td><input type="text" name="furcolor"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="text" name="gender"></td>
</tr>
<tr>
<td>Height</td>
<td><input type="text" name="height"></td>
</tr>
<tr>
<td>Weight</td>
<td><input type="text" name="weight"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="Add" value="Add"></td>
</tr>
</form>
</table>
<form action="cat.php" method="post">
<tr>
<td><input type="text" name="w"></td>
<td><a href="cat.php?action=post"><input type="button" value="s"></a></td>
</tr>
</form>
<?
	$phpdate = strtotime('1992-03-20');
	$mysqldate = date( 'Y-m-d H:i:s', $phpdate);
	//$mysqldate = date( 'H:i:s', $phpdate);
	print($phpdate);
	print($mysqldate);
	print("dsfsd");
	//add_cat(new cat($_POST['name'],$_POST['age'],$_POST['furcolor'],$_POST['gender'],$_POST['height'],$_POST['weight']));
?>