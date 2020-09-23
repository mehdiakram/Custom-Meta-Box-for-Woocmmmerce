
// Custom Meta Box for Woocmmmerce ========================================
//This function initializes the meta box.
 function royal_woo_custom_editor_meta_box() {  
           add_meta_box ( 
				'warrantyeditor', 
				'Product Warranty Information',
				'warranty_custom_editor',
				'product'     	  
           );

            add_meta_box ( 
				'featureseditor', 
				'Product Features Information', 
				'features_custom_editor',
				'product'
           );

           add_meta_box ( 
				'furniturecareeditor', 
				'Furniture Care Information',
				'furniture_care_custom_editor',
				'product'     	  
           );

            add_meta_box ( 
				'upholsterycareeditor', 
				'Upholstery Care Information', 
				'upholstery_care_custom_editor',
				'product'
           );
 }
 add_action('admin_init', 'royal_woo_custom_editor_meta_box');



 //Displaying the warranty custom editor
 function warranty_custom_editor($post) {
          $content = get_post_meta($post->ID, '_warranty_custom_editor', true);
          wp_editor ( 
          	$content , 
          	'_warranty_custom_editor', 
          	array ( 
          		'media_buttons' => true,
          		'textarea_rows' => 8,
          	) 
          );
 
 }
  


 //Displaying the warranty custom editor
 function features_custom_editor($post) {
          $content = get_post_meta($post->ID, '_features_custom_editor', true);
          wp_editor ( 
          	$content , 
          	'_features_custom_editor', 
          	array (
          		'media_buttons' => true,
          		'textarea_rows' => 8,
          	) 
          );
 
 }


 //Displaying the warranty custom editor
 function furniture_care_custom_editor($post) {
          $content = get_post_meta($post->ID, '_furniture_care_custom_editor', true);
          wp_editor ( 
          	$content , 
          	'_furniture_care_custom_editor', 
          	array (
          		'media_buttons' => true,
          		'textarea_rows' => 8,
          	) 
          );
 
 }


 //Displaying the warranty custom editor
 function upholstery_care_custom_editor($post) {
          $content = get_post_meta($post->ID, '_upholstery_care_custom_editor', true);
          wp_editor ( 
          	$content , 
          	'_upholstery_care_custom_editor', 
          	array (
          		'media_buttons' => true,
          		'textarea_rows' => 8,
          	) 
          );
 
 }




 //This function saves the data you put in the meta box
 function royal_woo_custom_editor_save_postdata($post_id) { 

        $data = $_POST['_warranty_custom_editor'];
        update_post_meta($post_id, '_warranty_custom_editor', $data);   


        $data = $_POST['_features_custom_editor'];
        update_post_meta($post_id, '_features_custom_editor', $data);   


        $data = $_POST['_furniture_care_custom_editor'];
        update_post_meta($post_id, '_furniture_care_custom_editor', $data);   


        $data = $_POST['_upholstery_care_custom_editor'];
        update_post_meta($post_id, '_upholstery_care_custom_editor', $data);   


 }
add_action('save_post', 'royal_woo_custom_editor_save_postdata');









add_filter( 'woocommerce_product_tabs', 'royal_woo_custom_product_tabs' );
function royal_woo_custom_product_tabs( $tabs ) {

    //Warranty tab
	    $tabs['royal_warranty_tab'] = array(
	        'title'     => 'Warranty',
	        'priority'  => 100,
	        'callback'  => 'warranty_tab_content'
	    );


    //Features tab
	    $tabs['royal_features_tab'] = array(
	        'title'     => 'Features',
	        'priority'  => 5,
	        'callback'  => 'features_tab_content'
	    );
    
    //Warranty tab
	    $tabs['royal_furniture_care_tab'] = array(
	        'title'     => 'Furniture Care',
	        'priority'  => 120,
	        'callback'  => 'furniture_care_tab_content'
	    );


    //Features tab
	    $tabs['royal_upholstery_care_tab'] = array(
	        'title'     => 'Upholstery Care',
	        'priority'  => 130,
	        'callback'  => 'upholstery_care_tab_content'
	    );


	if( empty( get_post_meta( get_the_ID(), '_warranty_custom_editor', true ) ) ) :
		unset( $tabs['royal_warranty_tab'] );
	endif;


	if( empty( get_post_meta( get_the_ID(), '_furniture_care_custom_editor', true ) ) ) :
		unset( $tabs['royal_furniture_care_tab'] );
	endif;


	if( empty( get_post_meta( get_the_ID(), '_warranty_custom_editor', true ) ) ) :
		unset( $tabs['royal_warranty_tab'] );
	endif;


	if( empty( get_post_meta( get_the_ID(), '_upholstery_care_custom_editor', true ) ) ) :
		unset( $tabs['royal_upholstery_care_tab'] );
	endif;




	return $tabs;
}

// New Tab contents
function warranty_tab_content() {
    echo get_post_meta( get_the_ID(), '_warranty_custom_editor', true );
}


function features_tab_content() {
    echo get_post_meta( get_the_ID(), '_features_custom_editor', true );
}


function furniture_care_tab_content() {
    echo get_post_meta( get_the_ID(), '_furniture_care_custom_editor', true );
}


function upholstery_care_tab_content() {
    echo get_post_meta( get_the_ID(), '_upholstery_care_custom_editor', true );
}

// Custom Meta Box for Woocmmmerce ========================================
