<html>
<head>
	<title>SORT</title>
	<meta charset="UTF-8" />
	<!-- JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  	<?php echo css_asset('bootstrap.min.css'); ?>
	<?php echo js_asset('bootstrap.min.js'); ?>
</head>
<body>
	<h1>Facebook Sort</h1><br>
	<div>
		Found <?php echo $num_results; ?>
	</div>
<table border='1' >
	<thead>
		<th>ID</th>
		<th>NAME</th>
	</thead>

	<tbody>
		<?php foreach ($sortdips as $sortdip) { ?>
			<tr>
				<td><?php echo $sortdip['sid']; ?></td>
				<td><?php echo $sortdip['name']; ?></td>
			</tr>
			<?php }?>
		
	</tbody>
</table>

<?php if (strlen($pagination));{ ?>
<div>
	Pages: <?php echo $pagination; ?>
</div>
<?php } ?>
	

</body>
</html>