<?php 
require_once 'header.php';
require_once 'scholarship_stfap.php';
?>
<h1 align='center'>View Approved Scholarship</h1>
	<table align='center' class='tablestyle'>
		<tr>
			<th width='200'>Scholarship Name</th>
			<th width='200'>Amount Shouldered</th>
		</tr>
		<?php print_table_view_scholarship(search_approved_scholarship('')) ?>
	</table>
<?php require_once '../../admin_footer.php'?>