<!DOCTYPE html>
<html>
<head>
	<title>Card</title>
	<!-- Assets -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/app.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  	<script type="text/javascript" src="<?=base_url();?>js/semantic.min.js"></script>
  	<script type="text/javascript" src="<?=base_url();?>js/app.js"></script>

</head>
<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<div class="app-sidebar" id="app-sidebar">
			<div class="avatar">
				<img class="ui medium circular image" src="images/avatar.png">
			</div>
			<div class="">
				<ul class="links">
					<li><a href=""><i class="dashboard outline icon"></i> Dashboard</a></li>
					<li><a href="<?=base_url()?>products"><i class="shop outline icon"></i> Productos</a></li>
					<li><a href="<?=base_url()?>stock"><i class="shop outline icon"></i> Stock</a></li>
					<li><a href="<?=base_url()?>sales"><i class="dollar icon"></i> Ventas</a></li>
					<li><a href=""><i class="address card outline icon"></i> Alumnos</a></li>
					<li><a href="">Link</a></li>
				</ul>
		    
			</div>

		</div>
		<!-- / Sidebar -->
	  	<!-- App content -->
		<div class="app-main">
			<? echo $content_for_layout;?>
		</div>
		<!-- / App content -->
	</div>
	
</body>
</html>
