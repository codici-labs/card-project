<!DOCTYPE html>
<html>
<head>
	<title>Card</title>
	<!-- Assets -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/app.css">
	<script type="text/javascript" src="<?=base_url()?>js/jquery-3.2.1.min.js"></script>
  	<script type="text/javascript" src="<?=base_url()?>js/semantic.min.js"></script>
  	<script type="text/javascript" src="<?=base_url()?>js/app.js"></script>
  	<script type="text/javascript" src="<?=base_url()?>js/Chart.min.js"></script>
  	<script type="text/javascript" src="<?=base_url()?>js/mustache.js"></script>

</head>
<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<div class="app-sidebar" id="app-sidebar">
			<?php if($this->config->item('use_avatar')){ ?>
			<div class="avatar">
				<img class="ui small circular image" src="<?=base_url()?>images/avatar.png">
				<div class="username"><i class="edit icon"></i> Username</div>
			</div>
			<?php } ?>
			<div class="">
				<ul class="links">
					<li><a class="<?php if($pagename=='dashboard') echo 'active' ;?>" href="<?=base_url('dashboard')?>"><i class="dashboard outline icon"></i> Dashboard</a></li>
					<li><a class="<?php if($pagename=='salepoints') echo 'active' ;?>" href="<?=base_url('salepoints')?>"><i class="marker outline icon"></i> Puntos de ventas</a></li>
					<li><a class="<?php if($pagename=='products') echo 'active' ;?>" href="<?=base_url('products')?>"><i class="shop outline icon"></i> Productos</a></li>
					<li><a class="<?php if($pagename=='stock') echo 'active' ;?>" href="<?=base_url('stock')?>"><i class="shop outline icon"></i> Stock</a></li>
					<li><a class="<?php if($pagename=='sales') echo 'active' ;?>" href="<?=base_url('sales')?>"><i class="dollar icon"></i> Ventas</a></li>
					<li><a class="<?php if($pagename=='students') echo 'active' ;?>" href="<?=base_url('students')?>"><i class="address card outline icon"></i> Alumnos</a></li>
					<li><a href=""><i class="alarm outline icon"></i> Notificaciones</a></li>
					
				</ul>
		    
			</div>

		</div>
		<!-- / Sidebar -->
	  	<!-- App content -->
		<div class="app-main">
			<?php echo $content_for_layout;?>
		</div>
		<!-- / App content -->
	</div>
	
</body>
</html>
