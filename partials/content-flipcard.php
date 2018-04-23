<?php

defined( 'ABSPATH' ) or die(); ?>

<?php

//Define our elements
$title = ! empty( $atts['title'] ) ? '<h3 class="tailor-card__title">' . esc_html( (string) $atts['title'] ) . '</h3>' : '';
$backtitle = ! empty( $atts['back_title'] ) ? '<h3 class="tailor-card__title">' . esc_html( (string) $atts['back_title'] ) . '</h3>' : '';
$backimage = ! empty( $atts['back_image'] ) ? '<img src="'. esc_html( (string) $atts['back_image'] ) . '"/>' : '';

//'<header class="tailor-card__header">' .  . '</header>';

?>

<!-- Card Flip -->
<div class="card-flip">
	<div class="flip">
		<div class="front">
			<!-- front content -->
			<div class="card">
			  <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" data-holder-rendered="true">
			  <div class="card-block">
				<h4 class="card-title"><?php echo $title ?></h4>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
		<div class="back">
			<!-- back content -->
			<div class="card">
			  <div class="card-block">
				<h4 class="card-title"><?php echo $backtitle ?></h4>
				<h6 class="card-subtitle text-muted">Support card subtitle</h6>
			  </div>
			  <img data-src="holder.js/100px180/?text=Image" alt="Image [100%x180]" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
			  <div class="card-block">
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="#" class="card-link">Card link</a>
				<a href="#" class="card-link">Another link</a>
			  </div>
			</div>
		</div>
	</div>
</div>
