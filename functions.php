<?php 
/**
 * wrap content to $len length content, and add '...' to end of wrapped conent
 */
function wrap_content($content, $len, $strip_html = false, $sp = '\n\r', $ending = '...') {
	if ($strip_html) {
		$content = strip_tags($content);
	}
	$c_title_wrapped = wordwrap($content, $len, $sp);
	$w_title = explode($sp, $c_title_wrapped);
    if (strlen($content) <= $len) { $ending = ''; }
	return $w_title[0].$ending;
}
/**
 * 
 * get page link
 * @param string $path
 */
function get_page_link_by_path($path) {
    $p = get_page_by_path($path);
    if ($p == NULL) {
        return '#';
    } else {
        return get_page_link($p->ID);
    }
}

// enable theme menu feature
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

remove_filter('the_content', 'wpautop');

add_post_type_support( 'page', 'excerpt' );

/**
 * Nav custom walker.
 * Needed to customize the navigation styling
 */
class increment_walker extends Walker_Nav_Menu
{
		
	function start_el(&$output, $item, $depth, $args)
	{
		global $wp_query;
		static $ctr;
				
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		if ($item->menu_item_parent==0) {
			$ctr++;
		}
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . ' nav-'.$ctr.'"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
// END of Nav walker

/**
 * Start of Theme Options
 */
function themeoptions_admin_menu() {
    add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}
add_action('admin_menu', 'themeoptions_admin_menu');

function themeoptions_page()
{
	if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }  //check options update
	// here's the main function that will generate our options page
	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>Microsite option</h2>

		<form method="POST" action="" enctype="multipart/form-data">
			<input type="hidden" name="update_themeoptions" value="true" />		
			<?php 
                $link = "";
                $banner = get_option("banner");
                $topLogo = get_option("topLogo");
				$isImageChecked = get_option("useUploadedImage") == "true" ? " CHECKED " : "";
            ?>
            <p>
                <label for="useUploadedImage"><strong>Use Uploaded Image</strong></label><br />
                <input type="checkbox" name="useUploadedImage" value="true" <?php echo $isImageChecked; ?>/>
                <span>P.S.Check it will use or use default one.</span>
            </p>
			<p>
                <label for="banner"><strong>Home Banner</strong></label><br />
                <input type="file" name="banner" />
				<?php if($banner!=null) echo "<img src='".$link.$banner."'></img>"; ?>
            </p>
            <p>
                <label for="topLogo"><strong>Top Logo</strong></label><br />
                <input type="file" name="topLogo" />
				<?php if($topLogo!=null) echo "<img src='".$link.$topLogo."'></img>"; ?>
            </p>
			
			<br />
			<p><input type="submit" name="submit" value="Update Options" class="button button-primary" /></p>
		</form>

	</div>
	<?php
}

// Update options function
function themeoptions_update() {	
    update_option('useUploadedImage', $_POST['useUploadedImage']);
	uploadAndSave('banner', 'banner');
	uploadAndSave('topLogo', 'topLogo');
}


add_post_type_support('page', 'excerpt');


if ( ! function_exists('tdav_css') ) {
	function tdav_css($wp) {
		$wp .= ',' . get_template_directory_uri() . '/css/index.css';
		$wp .= ',' . get_template_directory_uri() . '/css/site_global.css';
	return $wp;
	}
}
add_filter( 'mce_css', 'tdav_css' );


function myformatTinyMCE($in)
{
 $in['remove_linebreaks']=false;
 $in['gecko_spellcheck']=false;
 $in['keep_styles']=true;
 $in['accessibility_focus']=true;
 $in['tabfocus_elements']='major-publishing-actions';
 $in['media_strict']=false;
 $in['paste_remove_styles']=false;
 $in['paste_remove_spans']=false;
 $in['paste_strip_class_attributes']='none';
 $in['paste_text_use_dialog']=true;
 $in['wpeditimage_disable_captions']=true;
 $in['valid_elements'] = "*[*]";
 $in['extended_valid_elements'] = "*[*]";
 $in['plugins']='tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpfullscreen';
 $in['content_css']=  get_template_directory_uri() . '/css/index.css'.',' . get_template_directory_uri() . '/css/site_global.css';
 $in['wpautop']=false;
 $in['apply_source_formatting']=true;
 $in['toolbar1']='bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
 $in['toolbar2']='formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help ';
 $in['toolbar3']='';
 $in['toolbar4']='';
 return $in;
}
add_filter('tiny_mce_before_init', 'myformatTinyMCE' );

remove_filter("the_content", "wptexturize");
remove_filter("the_content", "convert_chars");

	
;?>