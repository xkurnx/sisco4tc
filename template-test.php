<?php
/*
Template Name: Really from Content
*/
?>

<?php
	get_header();	
	$home = get_page_by_path('home');
	$home_url = get_permalink ( $home->ID );
	wp_reset_query();
?>
<body>
 <div class="rounded-corners clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu111"><!-- group -->
     <a class="nonblock nontext anim_swing shadow browser_width mse_pre_init" id="u111" href="index.html#register"><!-- simple frame --></a>
     <div class="clip_frame mse_pre_init" id="u95"><!-- image -->
      <img class="block" id="u95_img" src="http://www.topcoder.com/cisco/files/2014/05/800px-cisco_logosvg.png" alt="" width="71" height="40"/>
     </div>
     <div class="clearfix mse_pre_init" id="u83-4"><!-- content -->
      <p>Developer&nbsp; Challenge</p>
     </div>
     <a class="nonblock nontext anim_swing clearfix mse_pre_init" id="u76-4" href="#home"><!-- content --><p>Home</p></a>
     <a class="nonblock nontext anim_swing clearfix mse_pre_init" id="u82-4" href="#challenges"><!-- content --><p>Challenges</p></a>
     <a class="nonblock nontext anim_swing clearfix mse_pre_init" id="u78-4" href="#register"><!-- content --><p>Register</p></a>
     <a class="nonblock nontext anim_swing clearfix mse_pre_init" id="u81-4" href="#faq"><!-- content --><p>FAQ</p></a>
    </div>
    <a class="anchor_item colelem" id="home"></a>
    <div class="clearfix mse_pre_init" id="u339"><!-- column -->
     <a class="nonblock nontext anim_swing colelem" id="u338" href="index.html#home"><!-- simple frame --></a>
     <a class="nonblock nontext anim_swing colelem" id="u337" href="index.html#home" data-mu-ie-matrix="progid:DXImageTransform.Microsoft.Matrix(M11=-0.7071,M12=0.7071,M21=-0.7071,M22=-0.7071,SizingMethod='auto expand')" data-mu-ie-matrix-dx="-2" data-mu-ie-matrix-dy="-3"><!-- simple frame --></a>
    </div>
    <div class="clearfix mse_pre_init" id="u350"><!-- column -->
     <a class="nonblock nontext anim_swing colelem" id="u351" href="index.html#challenges"><!-- simple frame --></a>
     <a class="nonblock nontext anim_swing colelem" id="u352" href="index.html#challenges" data-mu-ie-matrix="progid:DXImageTransform.Microsoft.Matrix(M11=-0.7071,M12=0.7071,M21=-0.7071,M22=-0.7071,SizingMethod='auto expand')" data-mu-ie-matrix-dx="-2" data-mu-ie-matrix-dy="-3"><!-- simple frame --></a>
    </div>
    <div class="clearfix mse_pre_init" id="u343"><!-- column -->
     <a class="nonblock nontext anim_swing colelem" id="u344" href="index.html#register"><!-- simple frame --></a>
     <a class="nonblock nontext anim_swing colelem" id="u345" href="index.html#register" data-mu-ie-matrix="progid:DXImageTransform.Microsoft.Matrix(M11=-0.7071,M12=0.7071,M21=-0.7071,M22=-0.7071,SizingMethod='auto expand')" data-mu-ie-matrix-dx="-2" data-mu-ie-matrix-dy="-3"><!-- simple frame --></a>
    </div>
    <div class="clearfix mse_pre_init" id="u356"><!-- column -->
     <a class="nonblock nontext anim_swing colelem" id="u358" href="index.html#faq"><!-- simple frame --></a>
     <a class="nonblock nontext anim_swing colelem" id="u357" href="index.html#faq" data-mu-ie-matrix="progid:DXImageTransform.Microsoft.Matrix(M11=-0.7071,M12=0.7071,M21=-0.7071,M22=-0.7071,SizingMethod='auto expand')" data-mu-ie-matrix-dx="-2" data-mu-ie-matrix-dy="-3"><!-- simple frame --></a>
    </div>
	<!-- content / banner start -->
	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  <?php the_content(); ?>
	 <?php endwhile; endif; ?>
	<!-- ./ content / banner start -->
 
	
   
   </div>
  </div>
 
 
 <?php
 get_footer();
 
 
 ?>
