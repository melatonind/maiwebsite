<div class="container main">
	<div class="row text-center">
		<h1>Beep Boop</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<?php
	//if "email" variable is filled out, send email
	if (isset($_REQUEST['email']))  {

	//Email information
	$admin_email = "mei.broughsmyth@gmail.com";
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['name'];
	$comment = $_REQUEST['text'];

	//send email
	mail($admin_email, "$subject", $comment, "From:" . $email);

	//Email response
	echo "<div class='alert alert-success  alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Your message has been sent. :)</div>";
	}
?>
			<div class="col-sm-4">
				<div class="bubble pull-right">
					Hi,<br>I'm <b>Mei</b>.
				</div><br>
				<div class="bubble pull-right">
					I'm currently completing a dual degree at Queensland University of Technology in:
					<br>
					<ul>
						<li>IT (Software Engineering)</li>
						<li>Business (Finance)</li>
					</ul>
				</div>
			</div>
			
			<div class="col-sm-4">
				<img class="img-responsive center-block" src="assets/images/me.gif">
			</div>
			
			<div class="col-sm-4">
				<div class="bubbleLeft pull-left">
					I like to make things, check them out in my blog:
					<br>
					<div class="blog-button"><a href="http://www.beepboop.com.au" class="btn btn-primary btn-lg" target="_blank">Beep Boop</div></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
	<h2></h2>
		<div class="col-sm-12">
			<div class="col-sm-2 text-center">
				<a href="http://www.linkedin.com/pub/mei-weng-brough-smyth/19/837/435" target="_blank"><i class="fa fa-linkedin fa-5x"></i><br>Linked In</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="https://twitter.com/meibroughsmyth" target="_blank"><i class="fa fa-twitter fa-5x"></i><br>Twitter</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="https://github.com/melatonind" target="_blank"><i class="fa fa-github-alt fa-5x"></i><br>GitHub</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="http://codepen.io/melatonind" target="_blank"><i class="fa fa-codepen fa-5x"></i><br>Codepen</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="mailto:mei.broughsmyth@gmail.com" target="_blank"><i class="fa fa-envelope fa-5x"></i><br>e-mail</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#contact"><i class="fa fa-paper-plane fa-5x"></i><br>Contact me</a>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2>Blog roll</h2>
		</div>
		<div class="col-sm-12 blog">
			<?php
				$rss = new DOMDocument();
				$rss->load('http://meid-up.blogspot.com/feeds/posts/default?alt=rss');
				$feed = array();
				foreach ($rss->getElementsByTagName('item') as $node) {
					$htmlStr = $node->getElementsByTagName('description')->item(0)->nodeValue;
					$html = new DOMDocument();
					$html->loadHTML($htmlStr);
					//get the first image tag from the description HTML
					$imgTag = $html->getElementsByTagName('img');
					$img = ($imgTag->length==0)?'noimg.png':$imgTag->item(0)->getAttribute('src');
					$item = array ( 
						'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
						'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
						'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
						'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
						'image' => $img,
						);
					array_push($feed, $item);
				}
				$limit = 3;
				for($x=0;$x<$limit;$x++) {
					$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
					$link = $feed[$x]['link'];
					$img = $feed[$x]['image'];
					$description = maxWords($feed[$x]['desc'], 100);
					$date = date('l F d, Y', strtotime($feed[$x]['date']));
					echo '<div class="col-md-4"><div class="blog-posts">';
					echo '<small>'.$date.'</small></p>';
					echo '<p><h4><a href="'.$link.'" title="'.$title.'">'.$title.'</a></h4><br />';
					echo '<div class="description">';
					echo '<img class="img-responsive" src="'.$img.'">';
					echo '<p>'.$description.'</p>';
					echo '</div>';
					echo '</div>';
					echo '<p class="text-center"><a href="'.$link.'" target="_blank">Read more <i class="fa fa-chevron-circle-right a-2x"></i></a></p>';
					
					echo '</div>';
				}
				
				function maxWords($textOrHtml, $maxWords) { 
					$text = strip_tags($textOrHtml, '<p><a><br><ul><li>');
					$words = preg_split("/\s+/", $text, $maxWords+1); 
					if (count($words) > $maxWords) { unset($words[$maxWords]); } 
					$output = join(' ', $words); 

					return $output; 
				} 
			
			?>
		</div>
	</div>
</div>

<div class="container" id="contact">
	<form role="form">
	<div class="row">
		<h2>Message me</h2>
	</div>
	
	<form action="index.php?page=resume" method="post">

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Your name" required>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="E-mail" required>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<textarea name="text" class="form-control" rows="4" placeholder="What's up?" required></textarea>
				</div>
			</div>
		</div>
	
	
		<div class="row">
			<div class="col-sm-12 text-center">
				<button type="submit" class="btn btn-primary btn-lg">Send</button>
			</div>
		</div>
	
	</form>
	
	<div class="row text-center">
		<h3>I live in Brisbane, Australia.</h3>
	</div>

	<div class="row text-center">
		<div id="map_canvas"></div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js"></script>
	
<script>
	
 var map;
	function initialize() {
		map = new google.maps.Map(document.getElementById('map_canvas'), {
		zoom: 4,
		center: new google.maps.LatLng(-27.429332, 153.027579),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	});

	var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
	var icons = {
	  mei: {
		name: 'Mei',
		icon: 'assets/images/meOnAMap.gif'
	  }
	};

	function addMarker(feature) {
	  var marker = new google.maps.Marker({
		position: feature.position,
		icon: icons[feature.type].icon,
		map: map,
		optimized: false
	  });
	}

	var features = [
	  {
		position: new google.maps.LatLng(-27.429332, 153.027579),
		type: 'mei'
	  }
	];

	for (var i = 0, feature; feature = features[i]; i++) {
	  addMarker(feature);
	}

  }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>