<?php
/**
 * Template Name: Page Without Title
 **/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>

    <div class="sp-xs-10 sp-sm-10 sp-md-1 sp-lg-1 sp-xl-1"></div>  
      
<?php
        the_content();
        wp_link_pages();

    endwhile;
else:
    get_template_part('loops/content', 'none');
endif;

get_footer();