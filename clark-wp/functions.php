<?php
/**
 * clark functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clark
 */


// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
// tgm-plugin
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

if ( ! function_exists( 'clark_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function clark_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on clark, use a find and replace
		 * to change 'clark-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'clark-wp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'clark-wp' ),
      'footer-menu' => esc_html__( 'Footer Menu', 'clark-wp' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
        
        add_theme_support('blog-post', 800, 533, array('center', 'center'));

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'clark_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clark_wp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'clark_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'clark_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clark_wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Clark WP Sidebar', 'clark-wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add Sidebar Widgets Here.', 'clark-wp' ),
		'before_widget' => '<div class="sidebar-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="heading-sidebar">',
		'after_title'   => '</h3>',
	) );


register_sidebar( array(
    'name'      => esc_html__( 'Footer Sidebar 1', 'clark-wp' ),
    'id'      => 'sidebar-footer1',
    'description' => esc_html__( 'Drag and drop your widgets here', 'clark-wp' ),
    'before_widget' => '<div class="ftco-footer-widget mb-4">', 
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="ftco-heading-2">',
    'after_title' => '</h2>',
  ) );

register_sidebar( array(
    'name'      => esc_html__( 'Footer Sidebar 2', 'clark-wp' ),
    'id'      => 'sidebar-footer2',
    'description' => esc_html__( 'Drag and drop your widgets here', 'clark-wp' ),
    'before_widget' => '<div class="ftco-footer-widget mb-4 ml-md-4">', 
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="ftco-heading-2">',
    'after_title' => '</h2>',
  ) );

register_sidebar( array(
    'name'      => esc_html__( 'Footer Sidebar 3', 'clark-wp' ),
    'id'      => 'sidebar-footer3',
    'description' => esc_html__( 'Drag and drop your widgets here', 'clark-wp' ),
    'before_widget' => '<div class="ftco-footer-widget mb-4">', 
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="ftco-heading-2">',
    'after_title' => '</h2>',
  ) );

register_sidebar( array(
    'name'      => esc_html__( 'Footer Sidebar 4', 'clark-wp' ),
    'id'      => 'sidebar-footer4',
    'description' => esc_html__( 'Drag and drop your widgets here', 'clark-wp' ),
    'before_widget' => '<div class="ftco-footer-widget mb-4">', 
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="heading-sidebar">',
    'after_title' => '</h2>',
  ) );


}
add_action( 'widgets_init', 'clark_wp_widgets_init' );



/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class Clark_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

        function widget($args, $instance) {

                if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'clark-wp' );

            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 5;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */
            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );

            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
           
            <?php while ( $r->have_posts() ) : $r->the_post(); 
              $recent_post_image = get_the_post_thumbnail_url();
             ?>
                <div class="block-21 mb-4 d-flex">


                  <?php if(!empty($recent_post_image)) : ?>

                    <img src="<?php echo $recent_post_image; ?>" class="blog-img mr-4">

                  <?php else:?>

                   <img src="https://place-hold.it/200x200" class="blog-img mr-4">


                <?php endif?>

                    <div class="text">
                      <h3 class="heading"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h3>
                <?php if ( $show_date ) : ?>
                  <div class="meta">
                    <div><span class="icon-calendar"></span> <?php echo esc_html(get_the_date()); ?></div>
                    <div><span class="icon-person"></span> <?php echo esc_html( get_the_author());?></div>
                    <div><span class="icon-chat"></span> <?php echo esc_html( get_comments_number($post->ID));?></div>
                    </div>
                <?php endif; ?>
                  </div>
                </div>
            <?php endwhile; ?>
           
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
        }
}
function clark_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Clark_Recent_Posts_Widget');
}
add_action('widgets_init', 'clark_recent_widget_registration');



add_filter( 'walker_nav_menu_start_el', 'wpse_56028_title' );

function wpse_56028_title( $item )
{
    return preg_replace( '~(<a[^>]*>)([^<]*)</a>~', '$1<span class="icon-long-arrow-right mr-2"> $2</span></a>', $item);
}


function clark_cat_count_span( $links ) {
  $links = str_replace( '</a> (', '</a><span>(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'wp_list_categories', 'clark_cat_count_span' );


function clark_archive_count_span( $links ) {
  $links = str_replace( '</a>&nbsp;(', '</a><span>(', $links );
  $links = str_replace( ')', ')</span>', $links );
  return $links;
}
add_filter( 'get_archives_link', 'clark_archive_count_span' );

/* Add dynamic_sidebar_params filter */
add_filter('dynamic_sidebar_params','footer_widgets');
 
/* Register our callback function */
function footer_widgets($params) {   
 
     global $footer_widget_num; //Our widget counter variable
 
     //Check if we are displaying "Footer Sidebar"
      if(isset($params[0]['id']) && $params[0]['id'] == 'sidebar-footer1'){
         $footer_widget_num++;
   $divider = 3; //This is number of widgets that should fit in one row   
 
         //If it's third widget, add last class to it
         if($footer_widget_num % $divider == 0){
      $class = 'class="last '; 
      $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);
   }
 
  }
 
      return $params;
}

/**
 * Enqueue scripts and styles.
 */
function clark_wp_scripts() {
	wp_enqueue_style( 'clark-wp-style', get_stylesheet_uri() );

	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css');
	wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.min.css');
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('aos-css', get_template_directory_uri() . '/css/aos.css');
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/css/ionicons.min.css');
	wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css');
	wp_enqueue_style('icomoon', get_template_directory_uri() . '/css/icomoon.css');
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900');

	// Font-awesome
	wp_enqueue_style('font-awesome-5',  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css', array(), '5.11.2', 'all');



	wp_enqueue_script( 'clark-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery.animateNumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '20151215', true );
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array(), '20151215', true );
	wp_enqueue_script( 'scrollax', get_template_directory_uri() . '/js/scrollax.min.js', array(), '20151215', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'clark-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  add_image_size( 'clark-wp-blog', 800, 533, array( 'center', 'center' ) );
  add_image_size( 'clark-wp-recent-post', 200, 200, array( 'center', 'center' ) );
}
add_action( 'wp_enqueue_scripts', 'clark_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_action('init', 'clark_wp_post_type', 0 );

function clark_wp_post_type() {

      // Labels for the Post Type
    $labels = array(
      'name'                => _x( 'Slider', 'Post Type General Name', 'clark-wp' ),
      'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'clark-wp' ),
      'menu_name'           => __( 'Sliders', 'clark-wp' ),
      'parent_item_colon'   => __( 'Parent Slider', 'clark-wp' ),
      'all_items'           => __( 'All Slider', 'clark-wp' ),
      'view_item'           => __( 'View Slider', 'clark-wp' ),
      'add_new_item'        => __( 'Add New Slider', 'clark-wp' ),
      'add_new'             => __( 'Add New Slider', 'clark-wp' ),
      'edit_item'           => __( 'Edit Slider', 'clark-wp' ),
      'update_item'         => __( 'Update Slider', 'clark-wp' ),
      'search_items'        => __( 'Search Slider', 'clark-wp' ),
      'not_found'           => __( 'No sliders found', 'clark-wp' ),
      'not_found_in_trash'  => __( 'Not found in trash', 'clark-wp' ),
    );

    // Another Customizations
    $args = array(
        'label'   => __('Sliders','clark-wp' ),
        'description' => __('Image Slider Clark WP', 'clark-wp'),
        'labels'  => $labels,
        'supports' => array('title', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menus' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-page',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
    );

    // register the post Type
    register_post_type( 'slider', $args);
}


add_action('init', 'clark_wp_resume_post_type', 0 );

function clark_wp_resume_post_type() {

      // Labels for the Post Type
    $labels = array(
      'name'                => _x( 'Resume', 'Post Type General Name', 'clark-wp' ),
      'singular_name'       => _x( 'Resume', 'Post Type Singular Name', 'clark-wp' ),
      'menu_name'           => __( 'Resumes', 'clark-wp' ),
      'parent_item_colon'   => __( 'Parent Resume', 'clark-wp' ),
      'all_items'           => __( 'All Resume', 'clark-wp' ),
      'view_item'           => __( 'View Resume', 'clark-wp' ),
      'add_new_item'        => __( 'Add New Resume', 'clark-wp' ),
      'add_new'             => __( 'Add New Resume', 'clark-wp' ),
      'edit_item'           => __( 'Edit Resume', 'clark-wp' ),
      'update_item'         => __( 'Update Resume', 'clark-wp' ),
      'search_items'        => __( 'Search Resume', 'clark-wp' ),
      'not_found'           => __( 'No resumes found', 'clark-wp' ),
      'not_found_in_trash'  => __( 'Not found in trash', 'clark-wp' ),
    );

    // Another Customizations
    $args = array(
        'label'   => __('Resumes','clark-wp' ),
        'description' => __('Clark WP Resume', 'clark-wp'),
        'labels'  => $labels,
        'supports' => array('title', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menus' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
    );

    // register the post Type
    register_post_type( 'resume', $args);
}


add_action('init', 'clark_wp_service_post_type', 0 );

function clark_wp_service_post_type() {

      // Labels for the Post Type
    $labels = array(
      'name'                => _x( 'Service', 'Post Type General Name', 'clark-wp' ),
      'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'clark-wp' ),
      'menu_name'           => __( 'Services', 'clark-wp' ),
      'parent_item_colon'   => __( 'Parent Service', 'clark-wp' ),
      'all_items'           => __( 'All Service', 'clark-wp' ),
      'view_item'           => __( 'View Service', 'clark-wp' ),
      'add_new_item'        => __( 'Add New Service', 'clark-wp' ),
      'add_new'             => __( 'Add New Service', 'clark-wp' ),
      'edit_item'           => __( 'Edit Service', 'clark-wp' ),
      'update_item'         => __( 'Update Service', 'clark-wp' ),
      'search_items'        => __( 'Search Service', 'clark-wp' ),
      'not_found'           => __( 'No Services found', 'clark-wp' ),
      'not_found_in_trash'  => __( 'Not found in trash', 'clark-wp' ),
    );

    // Another Customizations
    $args = array(
        'label'   => __('Services','clark-wp' ),
        'description' => __('Clark WP Service', 'clark-wp'),
        'labels'  => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menus' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-tools',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
    );

    // register the post Type
    register_post_type( 'service', $args);
}

add_action('init', 'clark_wp_skills_post_type', 0 );

function clark_wp_skills_post_type() {

      // Labels for the Post Type
    $labels = array(
      'name'                => _x( 'Skill', 'Post Type General Name', 'clark-wp' ),
      'singular_name'       => _x( 'Skill', 'Post Type Singular Name', 'clark-wp' ),
      'menu_name'           => __( 'Skills', 'clark-wp' ),
      'parent_item_colon'   => __( 'Parent Skill', 'clark-wp' ),
      'all_items'           => __( 'All Skill', 'clark-wp' ),
      'view_item'           => __( 'View Skill', 'clark-wp' ),
      'add_new_item'        => __( 'Add New Skill', 'clark-wp' ),
      'add_new'             => __( 'Add New Skill', 'clark-wp' ),
      'edit_item'           => __( 'Edit Skill', 'clark-wp' ),
      'update_item'         => __( 'Update Skill', 'clark-wp' ),
      'search_items'        => __( 'Search Skill', 'clark-wp' ),
      'not_found'           => __( 'No Skills found', 'clark-wp' ),
      'not_found_in_trash'  => __( 'Not found in trash', 'clark-wp' ),
    );

    // Another Customizations
    $args = array(
        'label'   => __('Skills','clark-wp' ),
        'description' => __('Clark WP Skills', 'clark-wp'),
        'labels'  => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menus' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-tools',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
    );

    // register the post Type
    register_post_type( 'skills', $args);
}


add_action('init', 'clark_wp_project_post_type', 0 );

function clark_wp_project_post_type() {

      // Labels for the Post Type
    $labels = array(
      'name'                => _x( 'Project', 'Post Type General Name', 'clark-wp' ),
      'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'clark-wp' ),
      'menu_name'           => __( 'Projects', 'clark-wp' ),
      'parent_item_colon'   => __( 'Parent Project', 'clark-wp' ),
      'all_items'           => __( 'All Project', 'clark-wp' ),
      'view_item'           => __( 'View Project', 'clark-wp' ),
      'add_new_item'        => __( 'Add New Project', 'clark-wp' ),
      'add_new'             => __( 'Add New Project', 'clark-wp' ),
      'edit_item'           => __( 'Edit Project', 'clark-wp' ),
      'update_item'         => __( 'Update Project', 'clark-wp' ),
      'search_items'        => __( 'Search Project', 'clark-wp' ),
      'not_found'           => __( 'No Project found', 'clark-wp' ),
      'not_found_in_trash'  => __( 'Not found in trash', 'clark-wp' ),
    );

    // Another Customizations
    $args = array(
        'label'   => __('Projects','clark-wp' ),
        'description' => __('Clark WP Project', 'clark-wp'),
        'labels'  => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menus' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-tools',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
    );

    // register the post Type
    register_post_type( 'project', $args);
}


add_action( 'init', 'project_taxonomy', 0 );

function project_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Project Category', 'Taxonomy General Name', 'clark-wp' ),
		'singular_name'              => _x( 'Project categories', 'Taxonomy Singular Name', 'clark-wp' ),
		'menu_name'                  => __( 'Project Category', 'clark-wp' ),
		'all_items'                  => __( 'All Project Category', 'clark-wp' ),
		'parent_item'                => __( 'Parent Project Category', 'clark-wp' ),
		'parent_item_colon'          => __( 'Parent Project Category:', 'clark-wp' ),
		'new_item_name'              => __( 'New Project Category', 'clark-wp' ),
		'add_new_item'               => __( 'Add Project Category', 'clark-wp' ),
		'edit_item'                  => __( 'Edit Project Category', 'clark-wp' ),
		'update_item'                => __( 'Update Project Category', 'clark-wp' ),
		'view_item'                  => __( 'View Project Category', 'clark-wp' ),
		'separate_items_with_commas' => __( 'Separate Project Category with commas', 'clark-wp' ),
		'add_or_remove_items'        => __( 'Add or remove Project Category', 'clark-wp' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'clark-wp' ),
		'popular_items'              => __( 'Popular Project Category', 'clark-wp' ),
		'search_items'               => __( 'Search Project Category', 'clark-wp' ),
		'not_found'                  => __( 'Not Found', 'clark-wp' ),
		'no_terms'                   => __( 'No Project Category', 'clark-wp' ),
		'items_list'                 => __( 'Project Cato  list', 'clark-wp' ),
		'items_list_navigation'      => __( 'Project Category list navigation', 'clark-wp' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_taxonomy', array( 'project' ), $args );

}

add_action('init', 'project_tags');

function project_tags() {
  $labels = array(
  	'name'              => _x( 'Project Tag', 'taxonomy general name', 'clark-wp' ),
  	'singular_name'     => _x( 'Project Tags', 'taxonomy singular name', 'clark-wp' ),
  	'search_items'      => __( 'Search Project', 'clark-wp'  ),
  	'all_items'         => __( 'All Project', 'clark-wp' ),
  	'parent_item'       => __( 'Parent Project', 'clark-wp' ),
  	'parent_item_colon' => __( 'Parent Project:', 'clark-wp' ),
  	'edit_item'         => __( 'Edit Project', 'clark-wp' ),
  	'update_item'       => __( 'Update Project', 'clark-wp' ),
  	'add_new_item'      => __( 'Add Project', 'clark-wp' ),
  	'new_item_name'     => __( 'New Project', 'clark-wp' ),
  	'menu_name'         => __( 'Project', 'clark-wp' ),
  );

  $args = array(
    'hierarchical'  => false, //like categories or tags
    'labels'        => $labels,
    'show_ui'       => true, //add the default UI to this taxonomy
    'show_admin_column' => true, //add the taxonomies to the wordpress admin
    'query_var'         => true,
    'rewrite'       => array('slug' =>'project-tag'),
  );

  register_taxonomy( 'project_tags', 'project', $args );
}


// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__e('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    }
    return $classes;
}
add_filter('body_class', 'mbe_body_class');