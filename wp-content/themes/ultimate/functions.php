<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */

/* HABILITAR / DESABILITAR */
add_theme_support( 'post-thumbnails' );

// Unable admin bar
add_filter('show_admin_bar', '__return_false');

add_post_type_support( 'post', 'excerpt' );

// remove itens padrões
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	//remove_post_type_support( 'post', 'editor' );
	//remove_post_type_support('page', 'editor');
	//remove_post_type_support( 'page', 'thumbnail' );
}

// REMOVE PARENT PAGE
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

// Remove tags
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


/* MENUS */
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
}

/* ADICIONA CLASSE */
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'page' ) );
} );

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}


// muda nome post
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Notícias';
    $submenu['edit.php'][5][0] = 'Todas as notícias';
    $submenu['edit.php'][10][0] = 'Adicionar notícia';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Notícias';
    $labels->singular_name = 'Notícia';
    $labels->add_new = 'Adicionar notícia';
    $labels->add_new_item = 'Adicionar notícia';
    $labels->edit_item = 'Editar notícia';
    $labels->new_item = 'Notícia';
    $labels->view_item = 'Ver notícia';
    $labels->search_items = 'Buscar notícia';
    $labels->not_found = 'Nenhuma notícia encontrado';
    $labels->not_found_in_trash = 'Nenhuma notícia encontrada na lixeira';
    $labels->all_items = 'Todas as notícias';
    $labels->menu_name = 'Notícias';
    $labels->name_admin_bar = 'Notícias';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );


/* PAGINAS CONFIGURAÇÕES */
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));
}

/* PAGINAÇÃO */
function paginacao() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="paginacao">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

// NOVOS POST TYPES 
add_action('init', 'type_post_projetos');
function type_post_projetos() {
	$labels = array(
		'name' => _x('Projetos', 'post type general name'),
		'singular_name' => _x('Projeto', 'post type singular name'),
		'add_new' => _x('Adicionar projeto', 'Novo item'),
		'add_new_item' => __('Novo projeto'),
		'edit_item' => __('Editar projeto'),
		'new_item' => __('Novo projeto'),
		'view_item' => __('Ver projeto'),
		'search_items' => __('Procurar projeto'),
		'not_found' => __('Nenhum projeto encontrado'),
		'not_found_in_trash' => __('Nenhum projeto encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Projetos'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-images-alt',
		'supports' => array('title','editor', 'thumbnail')
	);

	register_post_type( 'projetos' , $args );
	flush_rewrite_rules();
}

add_action('init', 'type_post_eventos');
function type_post_eventos() {
	$labels = array(
		'name' => _x('Eventos', 'post type general name'),
		'singular_name' => _x('Evento', 'post type singular name'),
		'add_new' => _x('Adicionar Novo evento', 'Novo item'),
		'add_new_item' => __('Novo evento'),
		'edit_item' => __('Editar evento'),
		'new_item' => __('Novo evento'),
		'view_item' => __('Ver evento'),
		'search_items' => __('Procurar evento'),
		'not_found' => __('Nenhum evento encontrado'),
		'not_found_in_trash' => __('Nenhum evento encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Eventos'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array('title', 'thumbnail','editor')
	);

	register_post_type( 'eventos' , $args );
	flush_rewrite_rules();
}

add_action('init', 'type_post_galerias');
function type_post_galerias() {
	$labels = array(
		'name' => _x('Galerias', 'post type general name'),
		'singular_name' => _x('Galeria', 'post type singular name'),
		'add_new' => _x('Adicionar nova galeria', 'Novo item'),
		'add_new_item' => __('Nova galeria'),
		'edit_item' => __('Editar galeria'),
		'new_item' => __('Nova galeria'),
		'view_item' => __('Ver galeria'),
		'search_items' => __('Procurar galeria'),
		'not_found' => __('Nenhuma galeria encontrado'),
		'not_found_in_trash' => __('Nenhuma galeria encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Galerias'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-format-video',
		'supports' => array('title', 'thumbnail','excerpt')
	);

	register_post_type( 'galerias' , $args );
	flush_rewrite_rules();
}

$producao = false;
if($producao){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, #menu-appearance, #menu-plugins, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, 
	  	#menu-posts li:nth-child(4), 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		#commentstatusdiv, 
		#commentsdiv, 
		#toplevel_page_wpglobus_options, 
		.taxonomy-category .form-field.term-parent-wrap, 
		.wp-menu-separator 
		{
			display: none!important;
		} 

		#categories, .column-categories {
			text-indent: -10000px;
		}
	  </style>';

	  echo '
		<script type="text/javascript">
			jQuery.noConflict();

			jQuery("document").ready(function(){
				jQuery("#menu-media").remove();
				jQuery("#menu-comments").remove();
				jQuery("#menu-appearance").remove();
				jQuery("#menu-plugins").remove();
				jQuery("#menu-tools").remove();
				jQuery("#menu-settings").remove();
				jQuery("#toplevel_page_edit-post_type-acf").remove();
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
				jQuery("#toplevel_page_zilla-likes").html("");
				jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
				jQuery(".wp-menu-separator").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();

				jQuery("#menu-posts li:nth-child(4)").remove();

				jQuery("#categories").html("");
				jQuery(".column-categories").html("");

				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
				jQuery("#toplevel_page_wpglobus_options").remove();
				jQuery("#commentstatusdiv").remove();
				jQuery("#commentsdiv").remove();

				jQuery(".user-rich-editing-wrap").remove();
				jQuery(".user-admin-color-wrap").remove();
				jQuery(".user-comment-shortcuts-wrap").remove();
				jQuery(".user-admin-bar-front-wrap").remove();
				jQuery(".user-language-wrap").remove();

				jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
				jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
				jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
				jQuery("#toplevel_page_delete_all_posts ul").remove();
			});
		</script>
	  ';
	}
}

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        } elseif ( is_archive() ) {

            $title = post_type_archive_title( '', false );

        }

    return $title;

});
?>