<?php
//CSO Form5 Class
//Version 2: Revision Date: September 23, 2010
//Version 1: Date: September 13, 2010
//By: Mae Ann A. Amarado
//CSO TEAM

include("connect_to_database.php");
include("sql_queries.php");
	class form5 {
	
		function view 
echo "<table height='350' width='680' border='1' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='112' class='style3'><div align='center' class='style9'>SUBJECTS</div></td>
          <td width='65' class='style3'><div align='center' class='style9'>SEC</div></td>
          <td width='69' class='style3'><div align='center' class='style9'>UNITS</div></td>
          <td width='82' class='style3'><div align='center' class='style9'>DAYS</div></td>
          <td width='82' class='style3'><div align='center' class='style9'>TIME</div></td>
          <td width='82' class='style3'><div align='center' class='style9'>ROOM</div></td>
          <td width='82' class='style3'><div align='center' class='style9'>CLASS TYPE</div></td>
          <td width='88' class='style3'><div align='center' class='style9'>LAB FEE</div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
          <td class='style3'><div align='center'></div></td>
        </tr>
        <tr>
          <td class='style10'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
          <td class='style3'>&nbsp;</td>
        </tr>
      </table>";


?>
