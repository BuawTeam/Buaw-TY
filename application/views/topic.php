<!DOCTYPE html>
<html lang="en-US">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="UTF-8" />
	<title>Activity Management</title>
	<!-- JavaScript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <?php echo css_asset('bootstrap.min.css'); ?>
	<?php echo js_asset('bootstrap.min.js'); ?>
	<style type="text/css">
		/*h2{
			color: #CCCCFF;
			background-color: transparent;
			font-size: 27px;
			font-weight: normal;
			width: 550px;
			padding: 2px 50px 0px 100px;
		}*/
		.menupage{
			
			padding: 20px 50px 0px 100px;
/*      color: #FFFFFF;*/

		}
		.pageheader{
          width:100%;
          height:75px;
          background-color:#666666;
          position:fixed;
          top:0;
          z-index:99;
       }
	</style>
</head>	
<body>
	<div>
        <div id="pageheader"class="pageheader">
        	<!-- <h2>ACTIVITY MANAGEMENT</h2> -->
        	<div class="container">
        		<ul id ="menupage" class="nav navbar-nav">
        			<li><a href="#1">Home</a></li>
        				<li class="dropdown">
          				<a href="#2" class="dropdown-toggle" data-toggle="dropdown" role="button">Management Facebook<span class="caret"></span></a>
          					<ul class="dropdown-menu" role="menu">
            				<li role="presentation"><a href="#3">Post FB</a></li>
            				<li class="divider"></li>
            				<li><a href="#4">Get Data from FB</a></li>
          					</ul>
        				</li>
        		</ul>
        	 </div>
        </div>
        <!-- <div class="item"> -->
        	<!-- <div class="carousel-caption"> -->
		<?php echo image_asset('bg.jpg'); ?>
		<!-- </div></div> -->
	</div>
</body>
</html>