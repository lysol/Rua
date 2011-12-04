<?php

function get_post_title($id) {
    $query = new WP_Query("p=$id");
    $query->the_post();
    $title = get_the_title();
    wp_reset_postdata();
    return $title;
}

function image_posts() {

    $query = new WP_Query('category_name=gallery&orderby=date&order=DESC');

    $posts = array();

    $post_ids = array();

    while ( $query->have_posts() ) {
        $query->the_post();
        // this is where we put the code to show what we want for each post
        // Get the post ID
        $post_id = get_the_ID();
        $posts[$post_id] = array();
        array_push($post_ids, $post_id);
        // Get images for this post
    }

    foreach($post_ids as $post_id) {
        $args = array( 'post_type' => 'attachment', 'numberposts' => -1,
            'post_status' => null, 'post_parent' => $post_id, 'orderby' => 'menu_order',
            'order' => 'ASC' ); 
        $attachments = get_posts($args);
        foreach($attachments as $attachment) {
            array_push($posts[$post_id], array(
                wp_get_attachment_thumb_url($attachment->ID),
                wp_get_attachment_url($attachment->ID),
                $attachment->ID,
                htmlentities($attachment->post_excerpt, ENT_COMPAT | ENT_HTML401 | ENT_QUOTES)
            ));
        }
    }
    $rp = $posts;
    foreach(array_keys($posts) as $pk) {
        if (count($posts[$pk]) == 0)
            unset($rp[$pk]);
    }
    return $rp;
}

if (count(get_included_files()) == 1) {
    print_r(image_posts());
}

?>
