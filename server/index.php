<!-- Mei Weng Brough-Smyth
	 Beep Boop
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
	<title>Beep Boop</title>
	<meta name="author" content="Mei Weng Brough-Smyth"/>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Fredoka+One|Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
	<script src="assets/javascript/jquery.min.js"></script>
	<script src="assets/javascript/bootstrap.min.js" /></script>
	<script src="assets/javascript/index.js" /></script>
</head>

<body>
	<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="meLogo">
		  <a href="#" onClick="resetTongue();"><img src="assets/images/meLogo.png">
		  <div id="circle"></div></a>
	  </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
		<li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=resume">Résumé</a></li>
		<li><a href="index.php?page=blog">Blog</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="visible-sm visible-xs">
	<div class="gap"></div>
</div>

	<!-- Central content -->
	<div class = "content">
		<?php
			$pages_dir = 'pages';
			if (!empty($_GET['page'])) {
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);
				
				$page = $_GET['page'];
				
				if (in_array($page.'.php', $pages)) {
						include ($pages_dir.'/'.$page.'.php');
					} else {
						include($pages_dir.'/pagenotfound.php');
					}
					
			} else { 
				include($pages_dir.'/default.php');
			}
		?>
		
	</div> <!-- End of content -->
	
	
	<div class="footer panel-footer">
		<div class="text-center">
			<p>Thanks for checking out my website!</p>
		</div>
	</div>
</body>
</html>
	