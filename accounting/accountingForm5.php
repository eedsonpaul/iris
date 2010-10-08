<?php 
  require_once 'accounting_header.php';
  include('connect.php');
?>

<div class="main">
	<div id="navigation">
		
	  <ul>
			<li><a href="accounting.php">Return</a></li>
		</ul>

	<br>
	</div>

	<div id="right_side">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<body>
<br>
<br>
<br>
<br>
<br>
<center>
<form action="cso_view_form5.php" method="get" name="accountingform">
	<table>
		<tr>
			<td>Student Number:</td>
			<td><input type="text" name="id" onFocus="javascript:this.value=''">
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<table width="288">
	  <tr>
	    <td width="106">&nbsp;</td>
	    <p = align="Center"><td width="73"><input type="submit" value="Submit" /></td>
	    <td width="93">&nbsp;</td>
      </tr>
  </table>
	<p>&nbsp;</p>
</form>
</body>
</html>
</div>
</body>
</html>

<?php 
  require_once 'cashier_footer.php';
?>