<?php

add_action('add_meta_boxes', 'bw_post_meta_box');

function bw_post_meta_box()
{
    add_meta_box(
        'post-meta-box', // id
        'Addition', // title
        'bw_post_addition_callback', // callback
        'post', // screen (post, page, link, attachment or custom_post_type)
        'normal', // context (normal, advanced, side)
        'high' // priority (low, default, high)
    );
}

function bw_post_addition_callback($post, $meta_info)
{
    $on_front = get_post_meta($post->ID, 'on-front', true);
    wp_nonce_field(basename(__FILE__), 'post_nonce');
    ?>
    <p class="meta-options">
        <label for="on-front"><b><?php echo esc_html('Enable/Disable'); ?></b></label>
        <br>
        <input type="checkbox" name="on-front" id="on-front" value="yes" <?php checked($on_front, 'yes'); ?>>
        <?php echo esc_html('Display post on Home page'); ?>
    </p>
<?php }

add_action('save_post', 'bw_save_post_addition');

function bw_save_post_addition($post_id)
{
    if (!isset($_POST['post_nonce']) || !wp_verify_nonce($_POST['post_nonce'], basename(__FILE__))) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['on-front'])) {
        update_post_meta($post_id, 'on-front', 'yes');
    } else {
        update_post_meta($post_id, 'on-front', 'no');
    }

}

add_action('add_meta_boxes', 'bw_reviews_meta_box');

function bw_reviews_meta_box()
{
    add_meta_box(
        'reviews-meta-box', // id
        'Addition', // title
        'bw_reviews_addition_callback', // callback
        'reviews', // screen (post, page, link, attachment or custom_post_type)
        'normal', // context (normal, advanced, side)
        'high' // priority (low, default, high)
    );
}

function bw_reviews_addition_callback($post, $meta_info)
{
    $review = array(
        'display' => get_post_meta($post->ID, 'review-display', true),
        'vk' => get_post_meta($post->ID, 'review-vk', true),
        'youtube' => get_post_meta($post->ID, 'review-youtube', true),
        'twitter' => get_post_meta($post->ID, 'review-twitter', true),
        'facebook' => get_post_meta($post->ID, 'review-facebook', true),
        'linkedin' => get_post_meta($post->ID, 'review-linkedin', true),
        'instagram' => get_post_meta($post->ID, 'review-instagram', true),
        'google-plus' => get_post_meta($post->ID, 'review-google-plus', true),
        'odnoklassniki' => get_post_meta($post->ID, 'review-odnoklassniki', true),
    );
    wp_nonce_field(basename(__FILE__), 'reviews_nonce');
    ?>
    <p class="meta-options">
        <label for="review-display"><b><?php echo esc_html('Enable/Disable'); ?></b></label>
        <br>
        <input type="checkbox" name="review-display" id="review-display"
               value="1" <?php checked($review['display'], '1'); ?>>
        <?php echo esc_html('Display review on Home page'); ?>
    </p>
    <p class="meta-options">
        <label for="review-vk"><b><?php echo esc_html('VK URL'); ?></b></label>
        <br>
        <input type="url" name="review-vk" id="review-vk" placeholder="https://vk.com"
               size="30" value="<?php echo esc_attr($review['vk']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-youtube"><b><?php echo esc_html('YouTube URL'); ?></b></label>
        <br>
        <input type="url" name="review-youtube" id="review-youtube" placeholder="https://www.youtube.com"
               size="30" value="<?php echo esc_attr($review['youtube']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-twitter"><b><?php echo esc_html('Twitter URL'); ?></b></label>
        <br>
        <input type="url" name="review-twitter" id="review-twitter" placeholder="https://twitter.com"
               size="30" value="<?php echo esc_attr($review['twitter']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-facebook"><b><?php echo esc_html('Facebook URL'); ?></b></label>
        <br>
        <input type="url" name="review-facebook" id="review-facebook" placeholder="https://www.facebook.com"
               size="30" value="<?php echo esc_attr($review['facebook']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-linkedin"><b><?php echo esc_html('LinkedIn URL'); ?></b></label>
        <br>
        <input type="url" name="review-linkedin" id="review-linkedin" placeholder="https://www.linkedin.com"
               size="30" value="<?php echo esc_attr($review['linkedin']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-instagram"><b><?php echo esc_html('Instagram URL'); ?></b></label>
        <br>
        <input type="url" name="review-instagram" id="review-instagram" placeholder="https://www.instagram.com"
               size="30" value="<?php echo esc_attr($review['instagram']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-google-plus"><b><?php echo esc_html('Google Plus URL'); ?></b></label>
        <br>
        <input type="url" name="review-google-plus" id="review-google-plus" placeholder="https://plus.google.com"
               size="30" value="<?php echo esc_attr($review['google-plus']); ?>">
    </p>
    <p class="meta-options">
        <label for="review-odnoklassniki"><b><?php echo esc_html('Odnoklassniki URL'); ?></b></label>
        <br>
        <input type="url" name="review-odnoklassniki" id="review-odnoklassniki" placeholder="https://ok.ru"
               size="30" value="<?php echo esc_attr($review['odnoklassniki']); ?>">
    </p>
<?php }

add_action('save_post', 'bw_save_reviews_addition');

function bw_save_reviews_addition($post_id)
{
    if (!isset($_POST['reviews_nonce']) || !wp_verify_nonce($_POST['reviews_nonce'], basename(__FILE__))) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['review-display'])) {
        update_post_meta($post_id, 'review-display', '1');
    } else {
        update_post_meta($post_id, 'review-display', '0');
    }

    if (isset($_POST['review-vk'])) {
        update_post_meta($post_id, 'review-vk', sanitize_text_field($_POST['review-vk']));
    } else {
        update_post_meta($post_id, 'review-vk', '');
    }

    if (isset($_POST['review-youtube'])) {
        update_post_meta($post_id, 'review-youtube', sanitize_text_field($_POST['review-youtube']));
    } else {
        update_post_meta($post_id, 'review-youtube', '');
    }

    if (isset($_POST['review-twitter'])) {
        update_post_meta($post_id, 'review-twitter', sanitize_text_field($_POST['review-twitter']));
    } else {
        update_post_meta($post_id, 'review-twitter', '');
    }

    if (isset($_POST['review-facebook'])) {
        update_post_meta($post_id, 'review-facebook', sanitize_text_field($_POST['review-facebook']));
    } else {
        update_post_meta($post_id, 'review-facebook', '');
    }

    if (isset($_POST['review-linkedin'])) {
        update_post_meta($post_id, 'review-linkedin', sanitize_text_field($_POST['review-linkedin']));
    } else {
        update_post_meta($post_id, 'review-linkedin', '');
    }

    if (isset($_POST['review-instagram'])) {
        update_post_meta($post_id, 'review-instagram', sanitize_text_field($_POST['review-instagram']));
    } else {
        update_post_meta($post_id, 'review-instagram', '');
    }

    if (isset($_POST['review-google-plus'])) {
        update_post_meta($post_id, 'review-google-plus', sanitize_text_field($_POST['review-google-plus']));
    } else {
        update_post_meta($post_id, 'review-google-plus', '');
    }

    if (isset($_POST['review-odnoklassniki'])) {
        update_post_meta($post_id, 'review-odnoklassniki', sanitize_text_field($_POST['review-odnoklassniki']));
    } else {
        update_post_meta($post_id, 'review-odnoklassniki', '');
    }

}


add_filter( 'rwmb_meta_boxes', 'about_page_metaboxes' );
function about_page_metaboxes( $meta_boxes ) {
    $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-about.php'
    ];
    $pages = get_posts( $args );
    if (isset($_GET['post'])) {
        if (!in_array($_GET['post'], $pages)) {
            return $meta_boxes;
        }
    } else if (isset($_POST['post_ID'])) {
        if (!in_array($_POST['post_ID'], $pages)) {
            return $meta_boxes;
        }
    }

    if (isset($_GET["post_type"]) && !isset($_GET["post"])) {
        return $meta_boxes;
    }

    $meta_boxes[] = array(
        'title'   => 'About settings',
        'include' => [
            'custom' => 'front_page_access',
            'relation' => 'AND'
        ],
        'show_on'	  => array( 'id' => $pages ),
        'post_types' => array('page'), 
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => 'false',
        'fields'  => array(
            array(
                'type' => 'text',
                'name' => 'About me: Header',
                'id' => 'about_header'
            ),
            array(
                'type' => 'wysiwyg',
                'name' => 'About me: Content',
                'id' => 'about_content'
            ),
            array(
				'id' => 'about_columns',
				'type' => 'text_list',
				'name' => esc_html__( 'About me: Columns (Maximum: 4)', 'metabox-online-generator' ),
				'options' => array(
					'Например, 32' => 'Введите значение колонки',
					'Например, "Photos"' => 'Введите текст колонки',
                ),
                'clone' => 'true'
			),
        ),
    );
	return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'services_page_metaboxes' );
function services_page_metaboxes( $meta_boxes ) {
    $args = [
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-services.php'
    ];
    $pages = get_posts( $args );
    if (isset($_GET['post'])) {
        if (!in_array($_GET['post'], $pages)) {
            return $meta_boxes;
        }
    } else if (isset($_POST['post_ID'])) {
        if (!in_array($_POST['post_ID'], $pages)) {
            return $meta_boxes;
        }
    }

    if (isset($_GET["post_type"]) && !isset($_GET["post"])) {
        return $meta_boxes;
    }

    $meta_boxes[] = array(
        'title'   => 'Services settings',
        'include' => [
            'custom' => 'front_page_access',
            'relation' => 'AND'
        ],
        'show_on'	  => array( 'id' => $pages ),
        'post_types' => array('page'), 
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => 'false',
        'fields'  => array(
            array(
                'type' => 'text',
                'name' => 'Special proposition: Header',
                'id' => 'services_special_proposition_header'
            ),
            array(
				'id' => 'services_special_proposition_items',
				'type' => 'text_list',
				'name' => esc_html__( 'Special proposition: Items', 'metabox-online-generator' ),
				'options' => array(
					'For example, Themed photoshoot' => 'Value',
                ),
                'clone' => 'true'
			),
            array(
				'id' => 'services_tabs',
				'type' => 'text_list',
				'name' => esc_html__( 'Tabs', 'metabox-online-generator' ),
				'options' => array(
					'Enter tab header here...' => 'Tab header',
					'Enter tab content here...' => 'Tab content'
                ),
                'clone' => 'true'
			),
        ),
    );
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'packages_metaboxes' );
function packages_metaboxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'   => 'Meta-data',
        'post_types' => array('packages'), 
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => 'false',
        'fields'  => array(
            array(
				'id' => 'pkg_items',
				'type' => 'text_list',
				'name' => esc_html__( 'Items', 'metabox-online-generator' ),
				'options' => array(
					'Item here...' => 'Enter item of package',
                ),
                'clone' => 'true'
            ),
            array(
                'id' => 'pkg_special',
                'type' => 'checkbox',
                'name' => 'Is special ?'
            )
        ),
    );
	return $meta_boxes;
}
