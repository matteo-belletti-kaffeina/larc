<?php
/**
 * Child-Theme functions and definitions
 */

function luxmed_child_scripts() {
    wp_enqueue_style( 'luxmed-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'luxmed_child_scripts' );
 
function add_taxonomy_class( $classes ){
 
    global $post;
    $tax = 'news';
 
    $terms = get_the_terms( $post->ID, $tax );
 
    if ( $terms ) {
        foreach ($terms as $term) {
            $classes[] = $tax;
        }
    }
 
    return $classes;
}
add_filter( 'body_class', 'add_taxonomy_class', 10, 1 );

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
	$title = single_tag_title( '', false );
    } elseif ( is_author() ) {
	$title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
 
    return $title;
});

function my_connection_types() {
	p2p_register_connection_type( array(
    'name' => 'corsi_to_users',
    'from' => 'corsi',
    'to' => 'user'
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );


function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar per i corsi',
		'id'            => 'sidebar_corsi',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function generate_custom_title($title) {
    global $wpdb;    
    if (isset($_GET['branca'])){
        $brancaRows = $wpdb->get_results( "SELECT * FROM A6vnDNw9U_mp_specialita WHERE A6vnDNw9U_mp_specialita.Slug='".$_GET['branca']."'");
        foreach ( $brancaRows as $branca ){
            $title=$branca->Nome;
        }
        $title.=" - LARC";
        return $title;
    }   
}

// add the filter 
add_filter( 'wpseo_title', 'generate_custom_title', 15 );
add_filter( 'pre_get_document_title', 'generate_custom_title', 10 );


// aggiunta custom fields per medici
function medici_customfields_support() {
    add_meta_box( 'meta-box-id', __( 'Campi personalizzati', 'custom-fields' ), null, 'team' );
}
add_action( 'add_meta_boxes', 'medici_customfields_support' );

 
add_filter( 'pre_get_posts', 'add_cpt_search' );
function add_cpt_search( $query ) {
    if ( !is_admin() && $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'cpt_team', 'cpt_services','corsi' ) );
    }
    return $query;
    
}

/*

Array(
    [0] => Array(
        [0] => ALLERGOLOGIA ED IMMUNOLOGIA CLINICA
    )
)
*/

function get_specialita_from_id_user(){   
    $user_id = get_current_user_id();
    $key = "specialita";
    $single = false;
    $x = get_user_meta( $user_id, $key, $single );  
    $first = $x[0];
    if(is_string($first)){        
        return $first;
    }else{
        $second = $first[0];        
        return $second;
    }            
}

add_shortcode("get_specialita_add_to_form", "get_specialita_from_id_user");
?>
