<?php

defined( 'ABSPATH' ) or die(); ?>

<?php

//Define our elements
// extract($atts);
// $heading = $atts['heading'];
// $back_heading = $atts['back_heading'];
// $front_text_body = $atts['front_text_body'];
// $back_text_body = $atts['back_text_body'];
// $front_image = $atts['heading'];
// $back_image = $atts['heading'];
// $front_color = $atts['heading'];
// $back_color = $atts['heading'];
// $front_background_color = $atts['heading'];
// $back_background_color = $atts['heading'];
// $front_background_image = $atts['heading'];
// $back_background_image = $atts['heading'];

?>

<!-- Card Flip -->
<div class="card-flip">
	<div class="flip">
		<div class="front">
			<!-- front content -->
			<div class="card">
			  <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" data-holder-rendered="true">
			  <div class="card-block">
				<h4 class="card-title"><?php echo $atts['heading']; ?></h4>
				<p class="card-text"><?php echo $atts['back_heading'] ?></p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
		<div class="back">
			<!-- back content -->
			<div class="card">
			  <div class="card-block">
				<h4 class="card-title"><?php echo 'bla bla bla' ?></h4>
				<h6 class="card-subtitle text-muted">Support card subtitle</h6>
			  </div>
			  <img data-src="holder.js/100px180/?text=Image" alt="Image [100%x180]" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
			  <div class="card-block">
				<p class="card-text"> XXX </p>
				<a href="#" class="card-link">Card link</a>
				<a href="#" class="card-link">Another link</a>
			  </div>
			</div>
		</div>
	</div>
</div>
