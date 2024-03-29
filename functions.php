<?php
/*
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}
*/
add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'd3systems_scripts', 100);
function d3systems_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'fontawesome',
    '//use.fontawesome.com/releases/v5.0.8/js/all.js',
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'modernizr',
    get_template_directory_uri() . '/js/modernizr.custom.js',
    array('jquery'),
    '',
    false
  );

  wp_register_script(
    'masonry',
    get_template_directory_uri() . '/js/masonry.min.js',
    array('jquery'),
    '',
    false
  );
  wp_register_script(
    'imagesloaded',
    get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js',
    array('jquery'),
    '',
    false
  );
  wp_register_script(
    'swiper-js',
    get_template_directory_uri() . '/js/swiper.min.js',
    '',
    false
  );

  wp_register_script(
    'd3systems-scripts', 
    get_template_directory_uri() . '/js/d3systems-scripts.js', 
    array('jquery'), 
    '', 
    true
  ); 
  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('fontawesome');
  wp_enqueue_script('modernizr');
  //if(is_home() || is_archive()){
  //  wp_enqueue_script('masonry');
  //  wp_enqueue_script('imagesloaded');
  //}
  wp_enqueue_script('swiper-js');
  wp_enqueue_script('d3systems-scripts');  
}

add_action('wp_enqueue_scripts', 'd3systems_styles');
function d3systems_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
  wp_register_style('swiper-css', get_template_directory_uri() . '/swiper.css');
  wp_register_style('d3systems', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('google-fonts');
  wp_enqueue_style('swiper-css');
  wp_enqueue_style('d3systems');
}

add_action('after_setup_theme', 'd3systems_setup');
function d3systems_setup(){
  add_theme_support('post-thumbnails');
  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
    'security-nav' => 'Security Navigation'
  ));

}

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        
        //$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */

			 $item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			if ( ! empty( $item->attr_title ) ){
				$item_output .= '&nbsp;<span class="' . esc_attr( $item->attr_title ) . '"></span>';
			}

			$item_output .= ( $args->has_children && 0 === $depth ) ? ' </a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

function d3systems_header_fallback_menu(){ ?>
  <ul class="nav navbar-nav">
    <li<?php if(is_page('our-process')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('our-process'); ?>">Our Process</a></li>
    <li<?php if(is_page('our-network')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('our-network'); ?>">Our Network</a></li>
    <li<?php if(is_page_template('global-reach')){ echo ' class="active"'; } ?>>
      <a href="<?php echo home_url('global-reach'); ?>" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Global Reach</a>
      <ul class="dropdown-menu">
        <li<?php if(is_page('the-americas-and-the-caribbean')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('the-americas-and-the-caribbean'); ?>">The Americas and the Caribbean</a></li>
        <li<?php if(is_page('europe')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('europe'); ?>">Europe</a></li>
        <li<?php if(is_page('middle-east-and-north-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('middle-east-and-north-africa'); ?>">Middle East and North Africa</a></li>
        <li<?php if(is_page('sub-saharan-africa')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sub-saharan-africa'); ?>">Sub-Saharan Africa</a></li>
        <li<?php if(is_page('central-and-south-asia')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('central-and-south-asia'); ?>">Central and South Asia</a></li>
        <li<?php if(is_page('east-southeast-asia-and-oceana')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('east-southeast-asia-and-oceana'); ?>">East, Southeast Asia and Oceana</a></li>
      </ul>
    </li>
    <li<?php if(is_home() || is_single() || is_category() || is_tag()){ echo ' class="active"'; } ?>><a href="<?php echo home_url('our-work'); ?>">Our Work</a></li>
    <li<?php if(is_page('contact')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
  </ul>
<?php }

add_action('init', 'd3systems_create_post_types');
function d3systems_create_post_types(){
  //staff post type
  $staff_labels = array(
    'name' => 'Staff',
    'singular_name' => 'Staff',
    'menu_name' => 'Staff',
    'add_new_item' => 'Add New Staff',
    'search_items' => 'Search Staff',
    'edit_item' => 'Edit Staff',
    'view_item' => 'View Staff',
    'all_items' => 'All Staff',
    'new_item' => 'New Staff',
    'not_found' => 'Staff Not Found'
  );
  $staff_args = array(
    'labels' => $staff_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-businessman',
    'query_var' => 'staff',
    'supports' => array(
      'title',
      'editor',
      'custom_fields'
    )
  );
  register_post_type('staff', $staff_args);
  
  //staff taxonomies
  $team_labels = array(
    'name' => 'Teams',
    'singular_name' => 'Team',
    'search_items' => 'Search Teams',
    'all_items' => 'All Teams',
    'parent_item' => 'Parent Team',
    'parent_item_colon' => 'Parent Team:',
    'edit_item' => 'Edit Team',
    'update_item' => 'Update Team',
    'add_new_item' => 'Add New Team',
    'new_item_name' => 'New Team Name',
    'menu_name' => 'Teams'
  );
  $team_args = array(
    'hierarchical' => true,
    'labels' => $team_labels,
    'show_ui' => true,
	  'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => 'teams'
  );
  register_taxonomy('team', 'staff', $team_args);

  $regional_expertise_labels = array(
    'name' => 'Regional Expertise',
    'singular_name' => 'Regional Expertise',
    'search_items' => 'Search Regional Expertise',
    'all_items' => 'All Regional Expertise',
    'parent_item' => 'Parent Regional Expertise',
    'parent_item_colon' => 'Parent Regional Expertise:',
    'edit_item' => 'Edit Regional Expertise',
    'update_item' => 'Update Regional Expertise',
    'add_new_item' => 'Add New Regional Expertise',
    'new_item_name' => 'New Regional Expertise Name',
    'menu_name' => 'Regional Expertise'
  );
  $regional_expertise_args = array(
    'hierarchical' => true,
    'labels' => $regional_expertise_labels,
    'show_ui' => true,
	  'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => 'regional_expertise'
  );
  register_taxonomy('regional_expertise', 'staff', $regional_expertise_args);

  $country_expertise_labels = array(
    'name' => 'Country Expertise',
    'singular_name' => 'Country Expertise',
    'search_items' => 'Search Country Expertise',
    'all_items' => 'All Country Expertise',
    'parent_item' => 'Parent Country Expertise',
    'parent_item_colon' => 'Parent Country Expertise:',
    'edit_item' => 'Edit Country Expertise',
    'update_item' => 'Update Country Expertise',
    'add_new_item' => 'Add New Country Expertise',
    'new_item_name' => 'New Country Expertise Name',
    'menu_name' => 'Country Expertise'
  );
  $country_expertise_args = array(
    'hierarchical' => true,
    'labels' => $country_expertise_labels,
    'show_ui' => true,
	  'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => 'country_expertise'
  );
  register_taxonomy('country_expertise', 'staff', $country_expertise_args);

  $languages_labels = array(
    'name' => 'Languages',
    'singular_name' => 'Language',
    'search_items' => 'Search Languages',
    'all_items' => 'All Languages',
    'parent_item' => 'Parent Language',
    'parent_item_colon' => 'Parent Language:',
    'edit_item' => 'Edit Language',
    'update_item' => 'Update Language',
    'add_new_item' => 'Add New Language',
    'new_item_name' => 'New Language Name',
    'menu_name' => 'Languages'
  );
  $languages_args = array(
    'hierarchical' => true,
    'labels' => $languages_labels,
    'show_ui' => true,
	  'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => 'languages'
  );
  register_taxonomy('language', 'staff', $languages_args);
  
  //subsidiaries
  $subsidiaries_labels = array(
    'name' => 'Subsidiaries',
    'singular_name' => 'Subsidiary',
    'menu_name' => 'Subsidiaries',
    'add_new_item' => 'Add New Subsidiary',
    'search_items' => 'Search Subsidiaries',
    'edit_item' => 'Edit Subsidiary',
    'view_item' => 'View Subsidiary',
    'all_items' => 'All Subsidiaries',
    'new_item' => 'New Subsidiary',
    'not_found' => 'Subsidiary Not Found'
  );
  $subsidiaries_args = array(
    'labels' => $subsidiaries_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-networking',
    'query_var' => 'subsidiaries',
    'supports' => array(
      'title',
      'editor', 
      'custom_fields'
    )
  );
  register_post_type('subsidiary', $subsidiaries_args);

  //temp post types for importing
  /*$events_news_args = array(
    'labels' => array('name' => 'News & Events'),
    'capability_type' => 'post',
    'public' => true,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail'
    )
  );
  register_post_type('news-events', $events_news_args);
  $research_args = array(
    'labels' => array('name' => 'Research & Publications'),
    'capability_type' => 'post',
    'public' => true,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail'
    )
  );
  register_post_type('research', $research_args);*/
}

add_action('init', 'd3systems_create_taxonomies');
function d3systems_create_taxonomies(){
  //our work taxonomies
  $topic_labels = array(
    'name' => 'Topics',
    'singular_name' => 'Topic',
    'search_items' => 'Search Topics',
    'all_items' => 'All Topics',
    'parent_item' => 'Parent Topic',
    'parent_item_colon' => 'Parent Topic:',
    'edit_item' => 'Edit Topic',
    'update_item' => 'Update Topic',
    'add_new_item' => 'Add New Topic',
    'new_item_name' => 'New Topic Name',
    'menu_name' => 'Topics'
  );
  $topic_args = array(
    'hierarchical' => true,
    'labels' => $topic_labels,
    'show_ui' => true,
	  'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => 'topics',
  );
  register_taxonomy('topic', array('post'), $topic_args);

  $country_labels = array(
    'name' => 'Countries',
    'singular_name' => 'Country',
    'search_items' => 'Search Countries',
    'all_items' => 'All Countries',
    'parent_item' => 'Parent Country',
    'parent_item_colon' => 'Parent Country:',
    'edit_item' => 'Edit Country',
    'update_item' => 'Update Country',
    'add_new_item' => 'Add New Country',
    'new_item_name' => 'New Country Name',
    'menu_name' => 'Countries'
  );
  $country_args = array(
    'hierarchical' => true,
    'labels' => $country_labels,
    'show_ui' => true,
	  'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => 'countries'
  );
  register_taxonomy('country', array('post'), $country_args);
}

if(function_exists('acf_add_options_page')){
  acf_add_options_page(array(
    'page_title' => 'General Settings',
    'menu_title' => 'General Settings',
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}