</div><!-- .page-wrapper end-->

<?php if ( ! is_front_page() ) { ?>
<footer class="footer js-footer">
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            </div>
        </div><!-- .pre-footer end-->
    <?php endif; ?>

    <div class="container">
        <div class="row footer-row d-flex align-items-center justify-content-center text-center playfair">
            <div class="col-md-4 footer-item">
	            <?php if (has_phones()) { ?>
                    <ul class="phone mb-15">
			            <?php foreach (get_phones() as $phone) { ?>
                            <li class="phone-item">
                                <a href="tel:<?php echo esc_attr(get_phone_number($phone)); ?>" class="phone-number text-size-20">
						            <?php echo esc_html($phone); ?>
                                </a>
                            </li>
			            <?php } ?>
                    </ul>
	            <?php }

	            $email = get_theme_mod( 'bw_additional_email' );
	            if ( ! empty( $email ) ) { ?>
                    <div>
                        <a class="text-size-20" href="mailto:<?php echo esc_attr( $email ); ?>">
		                    <em><b><?php echo esc_html( $email ); ?></b></em>
                        </a>
                    </div>
	            <?php } ?>
            </div>
            <div class="col-md-4 footer-social footer-item">
                <p class="mb-15"><em><?php _e('Follow', 'brainworks'); ?> @zhuralvova_photo</em></p>
	            <?php if (has_social()) { ?>
                    <ul class="social">
			            <?php foreach (get_social() as $name => $social) { ?>
                            <li class="social-item">
                                <a href="<?php echo esc_attr(esc_url($social['url'])); ?>" class="social-link social-<?php echo esc_attr($name); ?>" target="_blank">
						            <?php if (!empty($social['icon-html'])) {
							            echo strip_tags($social['icon-html'], '<i>');
						            } else { ?>
                                        <i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"
                                           aria-label="<?php echo esc_attr($social['text']); ?>"></i>
						            <?php } ?>
                                </a>
                            </li>
			            <?php } ?>
                    </ul>
	            <?php } ?>
            </div>
            <div class="col-md-4 footer-item">
                <button type="button" class="button-medium button-outline <?php the_lang_class('js-contact'); ?>">
		            <?php _e('Contact me', 'brainworks'); ?>
                </button>
            </div>
        </div>
    </div>
</footer>
<?php } ?>

</div><!-- .wrapper end-->

<?php scroll_top(); ?>

<?php if (is_customize_preview()) { ?>
    <button class="button-small customizer-edit" data-control='{ "name":"bw_scroll_top_display" }'>
        <?php esc_html_e('Edit Scroll Top', 'brainworks'); ?>
    </button>
    <button class="button-small customizer-edit" data-control='{ "name":"bw_analytics_google_placed" }'>
        <?php esc_html_e('Edit Analytics Tracking Code', 'brainworks'); ?>
    </button>
    <button class="button-small customizer-edit" data-control='{ "name":"bw_login_logo" }'>
        <?php esc_html_e('Edit Login Logo', 'brainworks'); ?>
    </button>
<?php } ?>

<div class="is-hide"><?php svg_sprite(); ?></div>

<?php wp_footer(); ?>

</body>
</html>
