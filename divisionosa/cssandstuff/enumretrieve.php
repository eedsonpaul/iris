<?
include("dbconnect.php");
function enum_select( $table , $field ){
$query = " SHOW COLUMNS FROM `$table` LIKE '$field' ";
$result = mysql_query( $query ) or die( 'error getting enum field ' . mysql_error() );
$row = mysql_fetch_array( $result , MYSQL_NUM );
#extract the values
#the values are enclosed in single quotes
#and separated by commas
$regex = "/'(.*?)'/";
preg_match_all( $regex , $row[1], $enum_array );
$enum_fields = $enum_array[1];
return( $enum_fields );
}

$p = enum_select("osa_employee","employee_housingtype");
print_r($p);
print(sizeof($p));

?>