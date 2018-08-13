page call templat in wordpress
<?php
/**
 * Template Name: Contact
 */
get_header();
?> 

--css templat in wordpress
/*
Theme Name: kiwi-loan-provider-final
Author: Miraculous soft solutions
Description: wordpress
Version: 0.0.1
*/

--manu function
<?php
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_theme_support( 'post-thumbnails' );


?>

[[[[[[[[[[[[[[[[[[[[[[[
--register widget function
<?php
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}
?>
--footer and contact page the contact get wordpress
<?php dynamic_sidebar('footer3')?>
]]]]]]]]]]]]]]]]]]]]]]]]]]]]

--custom post type function 
<?php
add_action( 'init', 'practice_area' );

function practice_area() {
 $labels = array(
  'name' => _x('Practice Area', 'post type general name'),
  'singular_name' => _x('practice-area', 'post type singular name'),
  'add_new' => _x('Add Practice Area', 'practice-area'),
  'add_new_item' => __('Add Practice Area'),
  'edit_item' => __('Edit Practice Area'),
  'new_item' => __('New Practice Area'),
  'view_item' => __('View Practice Area'),
  'search_items' => __('Search Practice Area'),
  'not_found' =>  __('No Practice Area'),
  'not_found_in_trash' => __('No Practice Area found in Trash'),
  'parent_item_colon' => ''
 );
 
 $supports = array('title', 'editor', 'custom-fields', 'revisions', 'excerpt','thumbnail');
 
 register_post_type( 'practice-area',
  array(
   'labels' => $labels,
   'public' => true,
   'show_ui' => true,
   'rewrite' => true,
   'query_var'=>true,
   'menu_position' => 5,
   'supports' => $supports
  )
 );
 
 register_taxonomy(
  'state-cities',
  'practice-area',
  array(
   'label' => __( 'State & Cities' ),
   'rewrite' => array( 'slug' => 'state-cities' ),
   'hierarchical' => true,
  )
 );
}
?>

--header and footer get in wordpress
<?php
get_header();
?>

<?php
get_footer();
?>

--css get in wordpress and images and script
<?php bloginfo('template_directory');?>/

--wordpress manu
<?php
	wp_nav_menu(
    array(
	'theme_location'  => 'header-menu',
    'menu'            => '',
	'container'       => '',
    'container_class' => 'menu-{menu slug}-container',
	'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
	'after'           => '',
	'link_before'     => '<span>',
	'link_after'      => '</span>',
	'items_wrap'      => '<ul class="navigation clearfix">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
	)
    );
	?>
									
--link get in wordpress									
<?php echo get_the_permalink(page id)?>

--url get(print) in wordpress
<?php echo home_url();?>
home page head get in wordpress
<?php wp_head();?>

--html form shot cod in wordpress
<?php echo do_shortcode('[contact-form-7 id="73" title="contact form 2"]');?>

--title get in wordpress
<?php echo get_the_title();?>

[[[[[[[[[[[[[[[
--title get while loop
--start while loop
<?php while ( have_posts() ) : the_post();?>
--end while loop
<?php endwhile;?>
]]]]]]]]]]]]]]]

--content page call in wordpress(admin)
<?php the_content()?>

----(list plugin)  footer end to start
<?php
wp_footer();
?>

--page id get -----
<?php echo get_the_ID()?>

--post show in wprdpress(images,title,content)
<?php
				$args = array( 
				   'post_type' => 'post',
				   'posts_per_page' => 3,
				   'post_status' => 'publish',
				   'orderby' => 'date',
				   'order' => 'DESC',
				);
				$the_query = new WP_Query($args);
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
					$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
					
					<!--html start
					    html end-->
					
					endwhile;
					wp_reset_postdata();
				endif;
?>
---title to use url (header.php)
<title><?php wp_title(''); ?></title>

--post contant show in wordpress
<?php the_excerpt()?>

--title print wordpress pages
<?php echo get_the_title()?>

--comments fild templat(while loop end)
<?php comments_template(); ?>

--date function()
<?php echo get_the_date()?>

---search box in wordpress
<?php get_search_form(); ?>

--tag functions
<p>
<?php the_tags('','',''); ?>
</p>

---comment images get in wordpress
<?php echo get_avatar( $id_or_email, $size, $default, $alt, $args ); ?>

--comment query one post 3 comment show
<?php
						$args = array( 
				   'post_type' => 'post',
				   'posts_per_page' => 3,
				   'post_status' => 'publish',
				   'status' => 'all',
				    'number' => 3,
				);

						// The Query
						
						$comment_query = new WP_Comment_Query;
						$comments = $comment_query->query( $args );
                        
						// Comment Loop
						if ( $comments ) {
							foreach ( $comments as $comment ) {
								
								$authorname = $comment->comment_author;
								//echo $authorname;
								$commentpostid = $comment->comment_post_ID;
								//echo get_the_title($commentpostid);
								//echo '<p>' . $comment->comment_content . '</p>';
							?>
							<h6 class="comment-adnew"><a href="#"><?php echo $authorname?> </a><small>on</small> <a href="#"><?php echo get_the_title($commentpostid)?></a></h6>
					<p><a class="content" href="#"><?php echo $comment->comment_content ?></a></p>
						<?php	
							}
							
						} else {
							echo 'No comments found.';
						}
						?>
						
						
						
-----page.php start						
<?php
get_header();
while ( have_posts() ) : the_post();

$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
echo $imgLink;

the_title();
the_content();


endwhile;



get_footer();
?>	

---single.php page open
<?php
get_header();
while ( have_posts() ) : the_post();

$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
$postid = get_the_id();


the_title();
?>
html start
html end
<?php
endwhile;



get_footer();
?>

--- category in wordpress
<?php
				
				$the_query = new WP_Query($args);
					$category = get_the_category();
					
					if(!empty($category)){
						$categorylist = array();
						foreach($category as $cat){
							$categorylist[]=$cat->name;
						}
					}
					
			?>

			
---comment query one post single comment show			
<?php
						$args = array( 
				   'post_type' => 'post',
				   'post_status' => 'publish',
				   'status' => 'all',
				    'post_id' =>$postid,
				   
				);

						// The Query
						
						$comment_query = new WP_Comment_Query;
						$comments = $comment_query->query( $args );
                        
						// Comment Loop
						if ( $comments ) {
							foreach ( $comments as $comment ) {
								echo '<p>' . $comment->comment_content . '</p>';
							}
						} else {
							echo 'No comments found.';
						}
						?>		

[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[

----category ways post show 
<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 2,
							'post_status' => 'publish',
							'orderby' => 'rand',
							'order' => 'ASC',
							'post__not_in' => array($postid),
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => $categorylist,
								),
							),
						);
						$the_query = new WP_Query($args);
						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post();
							$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
							
						?>
----foreach under category variavle 					
<?php $categorylist[] = $cat->name;?>
]]]]]]]]]]]]]]]]]]]]]]




[[[[[[[[[[[[[[[[[[
---  add javascript function 
<?php wp_head();?>(header.php)
<?php
function my_theme_scripts_function() {

  wp_enqueue_script( 'coding', get_template_directory_uri() . '/js/coding.js',array(),time(), true);

}

add_action('wp_enqueue_scripts','my_theme_scripts_function');
?>
<?php
wp_footer();
?>(footer.php)	
]]]]]]]]]]]]]]]]]]]]]]]




[[[[[[[[[[[[[[[[[[[[[[[[[[[

---comment count function
<?php
function commentCount($postid){	$commentCount = 0;
	$args = array(	   
	'post_type' => 'post',	   
	'post_status' => 'publish',	   
	'status' => 'all',		
	'post_id' =>$postid,				
	'number' => '',	
	);	
	$comment_query = new WP_Comment_Query;	
	$comments = $comment_query->query( $args );	
	if ( count($comments) )	{		
	$commentCount = count($comments);	
	}		
	return $commentCount;
	}
	
	
?>	
--comment count show variavle
<?php $commentCount = commentCount(get_the_ID()); ?>
]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]	

--add custom menu item login and logout function ------
<?php
add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
function add_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'header-menu') {
        $items .= '<li class="menu-item"><a href="'.home_url().'/your-profile/">My accout</a>';
        $items .= '<ul class="sub-menu">
		        <li class="menu-item"><a href="'. get_the_permalink(217) .'">ADD YOUR POST</a></li>
		        <li class="menu-item"><a href="'. get_the_permalink(267) .'">My POSTS</a></li>
				<li class="menu-item"><a href="'. wp_logout_url() .'">Log Out</a></li>
				
				
			</ul>
		</li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'header-menu') {
        $items .= '<li class="menu-item"><a href="'. site_url('login') .'">Log In</a></li>';
    }
    return $items;
} 

?>



----script update button (link=>http://harwinder.siteclientportal.com/edit/?pid=346&_wpnonce=cebe6e71cf&msg=post_updated) cheak button------
<?php
setInterval(function(){
   $(".wpuf-submit-button").removeAttr('disabled');

	},10);	

?>	


[[[[[[[[[[[[[[[[[[[[[[[[[[[[	
----image upload function (custom profile page)-------	
	<?php

			
	
         
			$current_user = wp_get_current_user();
			$id = $current_user->ID; 
			// Check that the nonce is valid, and the user can edit this post.
		if ( 
			isset( $_POST['my_image_upload_nonce'], $_POST['post_id'] ) 
			&& wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )
			
		) {
			// The nonce was valid and the user has the capabilities, it is safe to continue.

			// These files need to be included as dependencies when on the front end.
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			
			// Let WordPress handle the upload.
			// Remember, 'my_image_upload' is the name of our file input in our form above.
			$attachment_id = media_handle_upload( 'my_image_upload', $_POST['post_id'] );
			
			if ( is_wp_error($attachment_id) ) {
				// There was an error uploading the image.
			} else {
				// The image was uploaded successfully!
				update_user_meta($id,'wp_user_avatar',$attachment_id);
			}

		} else {

			// The security check failed, maybe show the user an error.
		}
		$imgid = get_user_meta($id,'wp_user_avatar',true);	
        $imglink = wp_get_attachment_url($imgid); 
?>
<form id="featured_upload" method="post" action="" enctype="multipart/form-data">
	<input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
	<input type="hidden" name="post_id" id="post_id" value="55" />
	<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />
	<img src="<?php echo $imglink ?>" >
</form>

]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]

[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[
----user login get function(custom profile page user get)----------
<?php
     $current_user = wp_get_current_user();
?>
]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]


-----login function(custom login page function)------------
<?php
$creds = array();
					$creds['user_login'] = $_POST["username"];
					$creds['user_password'] = $_POST["password"];
					$creds['remember'] = true;

					$login_array = array();
					$login_array['user_login']=$username;
					$login_array['user_password']=$password;
					
					$user = wp_signon( $creds, false );		  
					
					
					wp_set_current_user( $user );
					if ( is_user_logged_in() ) 
					{
						echo "SUCCESS";
                        wp_redirect($url=home_url()); 						
					} 
					else 
					{ 
						echo "FAIL!"; 
					}
			
?>

------register page function(custom register page function)--------- 
<?php
$website = "http://localhost/harwinder/blog";
						$userdata = array(
							'user_login'  =>  $username,
							'first_name'  =>  $firstname,
							'last_name'   =>  $lastname,
							'user_email'  =>  $email,
							'user_pass'   =>  $password,
							
						);

						$user_id = wp_insert_user( $userdata ) ;

						//On success
						if ( ! is_wp_error( $user_id ) ) {
							echo "User created : ". $user_id;
						}
?>

------page link url name changes---------
<?php
add_action('init','change_author_permalinks');  
function change_author_permalinks()  
{  
    global $wp_rewrite;  
    $wp_rewrite->author_base = 'user'; // Change 'member' to be the base URL you wish to use  
    $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';  
}  

?>

-----custom (submit-post page) function in php-------- 
<?php
$my_post = array(
			'post_type'		=> 'post',
			'post_title'    => $title,
			'post_content'  => $content,
			'post_category' => $category,
			'tags_input'    => $input,
		);
		 
		// Insert the post into the database.
		wp_insert_post( $my_post );
?>

----custom delete function----
<?php
     wp_delete_post($id)
?>

----category image get------
<?php
$imgLink = get_field('category_image', 'listing category_'.$category->term_id);
?>

----category contant get-----
<?php 
echo category_description($category->term_id);
?>
 --- array data get-----
 <?php
 $images->url
 $images['url']
 ?>
 
-----foreach  loop-----
<?php 
	
		$gallery = array();
		$img = get_field('gallery_image', get_the_id());
		if(!empty($img)){
		foreach($img as $images){
			
			echo '<img src="'.$images['url'].'">';
		}
		}
		
	?>
	
----meta key parameter link(price filter)-----	
<?php 
https://wordpress.stackexchange.com/questions/126772/query-to-sort-a-list-by-meta-key-first-if-it-exists-and-show-remaining-posts	
?>


------meta boxs create custom field link(custom post type)------
<?php
https://code.tutsplus.com/articles/reusable-custom-meta-boxes-part-1-intro-and-basic-fields--wp-23259
?>

-----custom field value get in wordpress function------
<?php echo get_post_meta(($id), 'price', TRUE); ?>


------single category get in wordpress function------
<?php $category_detail=get_the_terms( $id, 'listing-category' );?>

------woocommerce single-product page template function----
<?php
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

?>