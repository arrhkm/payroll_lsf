<?php 
# Koneksi 
require_once('connections/conn_mysqli_procedural.php');
# select DB 
//mysql_select_db($database_koneksi, $koneksi);

$qry_project="SELECT * FROM project WHERE kd_project='$_REQUEST[kd_project]'";
$rs_project = mysqli_query($link, $qry_project) or die(mysqli_error($link));
$row_project=mysqli_fetch_assoc($rs_project);

$qry_project = "SELECT b.emp_id, c.emp_name, a.kd_project
FROM project a, ikut_project b, employee c
WHERE b.kd_project= a.kd_project
AND c.emp_id=b.emp_id
AND a.kd_project='$_REQUEST[kd_project]'";
$rs_project = mysqli_query($link, $qry_project);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. Lintech</title>
<meta name="keywords" content="orando template, blog page, website template, CSS, HTML, drop down menu" />
<meta name="description" content="Orando Template, Blog Page, Free Template with Drop Down menu, designed by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	customtheme: ["#", "#"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 

</head>
<body>
<!-- Header Menu -->
<?php require_once('header.inc'); ?>

<div id="templatemo_main" class="wrapper">
	<!-- Tempat Menaruh Tabel ISI -->
	    <h2>Group Project <?php echo "No ($row_project[kd_project]) $row_project[nama_project]";?></h2>        		
		<!-- Awal tabel -->
		<table class="bordered" width="700px">
		<tr align="center">
		<th>EMP ID</th>
		<th>Nama Emp</th>		
		<th colspan = "3" align=center><a href="insert_ikutproject.php?kd_project=<?php echo $_REQUEST[kd_project];?>" >Insert</a> | 
		<a href="m_project.php"> <-Back </a> 
		</th>		
		</tr>
		<?php while($row_rsproject = mysqli_fetch_assoc($rs_project)) { ?>
		<tr align="center">
		<td><?php echo $row_rsproject[emp_id];?></td>
		<td align="left"><?php echo $row_rsproject[emp_name];?></td>	
		
		<td>
		<!--<a href="saveinsert_ikutproject.php?edit=1&kd_project=<?php echo $row_rsproject[kd_project];?>&emp_id=<?php echo $row_rsproject[emp_id];?>">Edit</a> |--> 
		<a href="saveinsert_ikutproject.php?delete=1&kd_project=<?php echo $row_rsproject[kd_project];?>&emp_id=<?php echo $row_rsproject[emp_id];?>">Delete</a>
		</td>		
		</tr>
		<?php } ?>
		</table>    	
	<div class="clear"></div>
	</div>
<!--Footer-->
</body>
</html>