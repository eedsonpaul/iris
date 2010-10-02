<?php
	function set_query($table_name,$field_name,$value)
	{
		$query = mysql_query("update ".$table_name." set ".$field_name." = ".$value."") or die(mysql_error());
	}
	
	function get_query($table_name,$field_name,$id,$id_value)
	{
	}
	
	function cols($r,$s)
	{
		$i = 0;
		while($row = mysql_fetch_array($r))
		{
			$arr[$i++] = $row[$s];
		}
		
		return $arr;
	}
	
	function print_arr2($r)
	{
		$i= 0;
		while($i < sizeof($r))
		{
			print($r[$i][0]. ',' .$r[$i++][1])."<br>";
		}
	}

	function print_arr3($r)
	{
		$i= 0;
		while($i < sizeof($r))
		{
			print($r[$i][0]. ',' .$r[$i][1]. ',' .$r[$i++][2])."<br>";
		}
	}

	function rows($r)
	{
		$i = 0;		
		return mysql_fetch_row($r);
	}
	
	function print_arr($r)
	{
		$i= 0;
		$j=0;
		while($i < sizeof($r))
		{
			while($j <sizeof($r[$i]))
			{
				print($r[$j++])."<br>";
			}
			$i++;
		}
	}
	
	function options($r)
	{
		$i = 0;
		while($i < sizeof($r))
		{
			echo "<option value=".$r[$i][0].">".$r[$i++][1]."</option>";
		}
	}
	
	function display_options($r)
	{
		$i = 0;
		while($i < sizeof($r))
		{
			echo "<option value=".$r[$i].">".$r[$i++]."</option>";
		}
	}
	
	function cols_2($r,$s,$t)
	{
		$i = 0;
		while($row = mysql_fetch_array($r))
		{
			$arr[$i][0] = $row[$s];
			$arr[$i++][1] = $row[$t];
		}
		return $arr;
	}
	
	function cols_3($r,$s,$t,$u)
	{
		$i = 0;
		while($row = mysql_fetch_array($r))
		{
			$arr[$i][0] = $row[$s];
			$arr[$i][1] = $row[$t];
			$arr[$i++][2] = $row[$u];
		}	
		return $arr;
	}
	
	function options_3($r)
	{
		$i = 0;
		while($i < sizeof($r))
		{
			echo "<option value=".$r[$i][0].">".$r[$i][1].", ".$r[$i++][2]."</option>";
		}
	}
	
	function options_2($r,$s)
	{
		$i = 0;
		while($i < sizeof($r))
		{
			echo "<option value=".$r[$i].">".$s[$i][0].", ".$s[$i++][1]."</option>";
		}
	}
?>