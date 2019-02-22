<?php 
	/**
	*	Template Name: About page
	*/
?>

<?php get_header(); ?>


<div class="sp-sm-6 sp-xs-6 sp-md-6"></div>
<section class="block">
	<div class="container">
		<div class="block__row">
			<div class="block__item">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/about.png" />
			</div>	
			<div class="block__item">
				<div class="roboto block__item_content block__item_content--translated">
					<h2 class="playfair">
						<?php echo get_post_meta(get_the_ID(), "about_header", true); ?>
					</h2>
					<?php echo get_post_meta(get_the_ID(), "about_content", true); ?>
				</div> 
			</div>
		</div>
	</div>
</section>

<?php $cols = get_post_meta(get_the_ID(), 'about_columns', true);
if ($cols && sizeof($cols) > 0): ?>
<div class="sp-sm-6 sp-xs-6 sp-md-6"></div>
<section class="block block--bordered-top text-center" id="stats">
	<div class="sp-sm-3"></div>
		<div class="container">
			<div class="row">
				<?php foreach($cols as $col): ?>
				
				<div class="col-md-3">
					<h3 class="playfair block__header block__header--pink counter" style="opacity: 0;"><?php echo $col[0]; ?></h3>
					<div class="sp-sm-2"></div>
					<p class="bebas"><?php echo $col[1]; ?></p>
				</div>
					
				<?php endforeach; ?>
			</div>
		</div>
	<div class="sp-sm-3"></div> 
</section>
<?php endif; ?>

<div class="sp-sm-6 sp-xs-6 sp-md-6"></div>
<section class="block text-center">
	<div class="container">
		<h5 class="block__title block__title--small">
			Feedbacks
		</h5>
		<div class="sp-sm-2 sp-xs-2 sp-md-2"></div>
		<h2 class="block__title">
			What clients are saying ?
		</h2>
		<div class="sp-sm-2 sp-xs-4 sp-md-4"></div>
		<?php echo do_shortcode('[bw-static-reviews]'); ?>
		<div class="sp-sm-4 sp-xs-4 sp-md-4"></div>
		<div>
			<a href="/blog" class="button-large">
				More testimonials 
			</a>
		</div>
	</div>
</section>
<div class="sp-sm-6 sp-xs-6 sp-md-6"></div>

<?php get_footer(); ?>