<?php 
    /**
     * Template Name: Services
     */
    $container_class = "js-container";
     get_header();
?>


<div class="sp-sm-4 sp-xs-6"></div>

<section class="block">
    <div class="container">
        <h2 class="block__title">
            Wedding Photoshoot
        </h2>
        <div class="sp-sm-5 sp-xs-4"></div>
        <div class="packages">
            <?php echo do_shortcode('[bw-packages]'); ?>
        </div>
    </div>
</section>
<div class="sp-sm-6 sp-xs-4"></div>

<section class="block">
    <div class="container">
        <h2 class="block__title">
            <?php echo get_post_meta(get_the_ID(), "services_special_proposition_header", true); ?>
        </h2>
        <div class="sp-sm-4 sp-xs-4"></div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="special-package text-center">
                    <ul class="packages-list">
                        <?php 
                        $items = get_post_meta(get_the_ID(), "services_special_proposition_items", true);
                        if ($items && sizeof($items) > 0):
                        foreach ($items as $item): ?>
                            <li>
                                <span>
                                    <?php echo $item[0]; ?>
                                </span>
                            </li>
                        <?php endforeach; endif; ?>
                    </ul>
                    <div class="sp-sm-8 sp-xs-8"></div>
                    <div> 
                        <a href="#" target="_blank" class="button-medium">
                            Get price
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="sp-sm-6 sp-xs-4"></div>

<section class="block block--with-background">
    <div class="block__header_background">
        <div class="sp-sm-6 sp-xs-4"></div>
        <h5 class="block__title block__title--small">
            Feedbacks
        </h5>
        <div class="sp-sm-5 sp-xs-3"></div>
        <h2 class="block__title">
            Answers to common questions
        </h2>
        <div class="sp-sm-6 sp-xs-6"></div>
    </div>
    <div class="container">
        
        <div class="sp-sm-8"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabs">
                    <?php 
                    $tabs = get_post_meta(get_the_ID(), 'services_tabs', true);
                    if ($tabs && sizeof($tabs)):
                    foreach ($tabs as $tab): ?>
                        <h3><?php echo $tab[0]; ?></h3>
                        <div><?php echo $tab[1]; ?></div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="sp-sm-6"></div>

<?php get_footer(); ?>