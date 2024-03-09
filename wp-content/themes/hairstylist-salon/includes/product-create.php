<?php

class Whizzie {

	public function __construct() {
		$this->init();
	}

	public function init()
	{
	
	}

	public static function hairstylist_salon_setup_widgets(){

	$hairstylist_salon_product_image_gallery = array();
	$hairstylist_salon_product_ids = array();

	$hairstylist_salon_product_category= array(
		'Product Category'       => array(
			'Product Title 01',
			'Product Title 02',
			'Product Title 03',
			'Product Title 04',
		),
	);

	$hairstylist_salon_k = 1;
	foreach ( $hairstylist_salon_product_category as $hairstylist_salon_product_cats => $hairstylist_salon_products_name ) { 
	// Insert porduct cats Start
	$content = 'This is sample product category';
	$hairstylist_salon_parent_category	=	wp_insert_term(
	$hairstylist_salon_product_cats, // the term
	'product_cat', // the taxonomy
		array(
		'description'=> $content,
		'slug' => str_replace( ' ', '-', $hairstylist_salon_product_cats)
		)
	);

// -------------- create subcategory END -----------------

	$hairstylist_salon_n=1;
	// create Product START
	foreach ( $hairstylist_salon_products_name as $key => $hairstylist_salon_product_title ) {
	$content = '
		<div class="main_content">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>';

	// Create post object
	$hairstylist_salon_my_post = array(
		'post_title'    => wp_strip_all_tags( $hairstylist_salon_product_title ),
		'post_content'  => $content,
		'post_status'   => 'publish',
		'post_type'     => 'product',
		'post_category' => [$hairstylist_salon_parent_category['term_id']]
	);

	// Insert the post into the database

	$hairstylist_salon_uqpost_id = wp_insert_post($hairstylist_salon_my_post);
	wp_set_object_terms( $hairstylist_salon_uqpost_id, str_replace( ' ', '-', $hairstylist_salon_product_cats), 'product_cat', true );

	$hairstylist_salon_product_price = array('35.89','35.89','35.89','35.89');
	$hairstylist_salon_product_regular_price = array('68.99','68.99','68.99','68.99');
	$hairstylist_salon_product_sale_price = array('35.89','35.89','35.89','35.89');
	
	update_post_meta( $hairstylist_salon_uqpost_id, '_regular_price', $hairstylist_salon_product_regular_price[$hairstylist_salon_n-1] );
	update_post_meta( $hairstylist_salon_uqpost_id, '_price', $hairstylist_salon_product_price[$hairstylist_salon_n-1] );
	update_post_meta( $hairstylist_salon_uqpost_id, '_sale_price', $hairstylist_salon_product_sale_price[$hairstylist_salon_n-1] );
	array_push( $hairstylist_salon_product_ids,  $hairstylist_salon_uqpost_id );

	// Now replace meta w/ new updated value array
	$hairstylist_salon_image_url = get_template_directory_uri().'/assets/images/product/'.$hairstylist_salon_product_cats.'/' . str_replace(' ', '_', strtolower($hairstylist_salon_product_title)).'.png';
	$hairstylist_salon_image_name  = $hairstylist_salon_product_title.'.png';
	$hairstylist_salon_upload_dir = wp_upload_dir();
	// Set upload folder
	$hairstylist_salon_image_data = file_get_contents(esc_url($hairstylist_salon_image_url));
	// Get image data
	$unique_file_name = wp_unique_filename($hairstylist_salon_upload_dir['path'], $hairstylist_salon_image_name);
	// Generate unique name
	$hairstylist_salon_filename = basename($unique_file_name);
	// Create image file name
	// Check folder permission and define file location
	if (wp_mkdir_p($hairstylist_salon_upload_dir['path'])) {
	$hairstylist_salon_file = $hairstylist_salon_upload_dir['path'].'/'.$hairstylist_salon_filename;
	} else {
	$hairstylist_salon_file = $hairstylist_salon_upload_dir['basedir'].'/'.$hairstylist_salon_filename;
	}
	
	file_put_contents($hairstylist_salon_file, $hairstylist_salon_image_data);
	// Check image file type
	$wp_filetype = wp_check_filetype($hairstylist_salon_filename, null);
	// Set attachment data
	$attachment = array(
	'post_mime_type' => $wp_filetype['type'],
	'post_title'     => sanitize_file_name($hairstylist_salon_filename),
	'post_type'      => 'product',
	'post_status'    => 'inherit',
	);

	// Create the attachment
	$hairstylist_salon_attach_id = wp_insert_attachment($attachment, $hairstylist_salon_file, $hairstylist_salon_uqpost_id);

	// Define attachment metadata
	$attach_data = wp_generate_attachment_metadata($hairstylist_salon_attach_id, $hairstylist_salon_file);

	// Assign metadata to attachment
	wp_update_attachment_metadata($hairstylist_salon_attach_id, $attach_data);
	if ( count( $hairstylist_salon_product_image_gallery ) < 3 ) {
		array_push( $hairstylist_salon_product_image_gallery, $hairstylist_salon_attach_id );
	}
	// // And finally assign featured image to post
	set_post_thumbnail($hairstylist_salon_uqpost_id, $hairstylist_salon_attach_id);
	++$hairstylist_salon_n;
	}
	// Create product END
	++$hairstylist_salon_k;
	}
	// Add Gallery in first simple product and second variable product START
	$hairstylist_salon_product_image_gallery = implode( ',', $hairstylist_salon_product_image_gallery );
	foreach ( $hairstylist_salon_product_ids as $hairstylist_salon_product_id ) {
	update_post_meta( $hairstylist_salon_product_id, 'hairstylist_salon_product_image_gallery', $hairstylist_salon_product_image_gallery );
	}
}

}
 