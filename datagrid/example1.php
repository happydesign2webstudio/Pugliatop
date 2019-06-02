<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Example 1 PDatagrid</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php 
require 'pdatagrid.class.php';

//Establish a database connection
require 'dbconfig.php';
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('Connection to database failed: ' . mysql_error());
mysql_select_db(DB_NAME) or die ('select_db failed!');

//Initialize instance with database connection
$grid = new PDatagrid($conn);

//SQL queries to count/select records
$grid->setSqlCount("Select count(*) from composers");
$grid->setSqlSelect("Select name, date_format(date_birth,'%b %D %Y') db, 
date_format(date_death,'%b %D %Y') dd from composers");

//Base url for navigation links
$grid->baselink = 'example1.php';

//Maximum number of page navigation links
$grid->setMaxNavLinks(4);

//Rows (records) per page
$grid->setRowsPerPage(5);

//Set current page index
if(isset($_GET['page']))
	$grid->setPage($_GET['page']);
?>
<table cellspacing="0" cellpadding="0" width="500">
<thead>
<tr>
	<td width="50%">Name</td>
	<td width="25%">Date of Birth</td>
	<td width="25%">Date of Death</td>
</tr>
</thead>
<tfoot>
<tr>
	<td colspan="3">
	<span id="navlinks"><?php echo $grid->getLinks();?></span>
	</td>
</tr>
</tfoot>
<tbody>
	<?php echo $grid->getRows();?>
</tbody>
</table>
<p style="font-size: 80%"><a href="http://www.webmastergate.com/">Webmastergate.com</a> - web development and web design tools and resources</p>
</body>
</html>
