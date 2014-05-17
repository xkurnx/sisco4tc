<?php
/*
Template Name: Home
*/

?>
<?php get_header();?>
    <!-- Content Wrapper -->
<div id="homePage">
    <div id="contentWrapper">
      <div id="homeBanner">
        <div class="introContent">
			<?php				
			  //$page=get_page_by_path('challenge-details');
			  $homeBannerText = get_post_meta($post->ID, "Challenge Banner Text", true);
			  $allContest = get_post_meta($post->ID,'allcontestsURL', true);
			  if($homeBannerText != null) :
				echo apply_filters('the_content', $homeBannerText);
			  endif;?>
		</div>
      </div>
	 
	  <div id="videoOverview">
		 <!--	
			<?php
			$YoutubeID = get_post_meta($post->ID, "Video YouTube ID", true);
			$videoTitle =  get_post_meta($post->ID, "Video Title", true);
			$jsvideo =  ( $YoutubeID == '' ) ?"alert('Video is coming soon')":"popupYT('".$YoutubeID."','".$videoTitle."')";
			
			?>
			
			<a class="btnWatch" href="javascript:;" onclick="<?php echo $jsvideo;?>">Click here to watch a short video & learn more about <?php $videoTitle;?></a>
			<div class="clear intro">
				<?php
						echo get_post_meta($post->ID, "Video Intro Text", true);
					?>
			</div>
		-->	
	  </div>
	 <div id="contentArea" class="post">
               <div class="featuredBox registerBox">
				<div class="content">
					<?php
						echo get_post_meta($post->ID, "Box1 Text", true);
					?>
					
				</div>
				<a class="button" target="_blank" href="<?php echo get_post_meta($post->ID, "Box1 URL", true);?>"><span>Register Now</span></a>
			   </div>
			   
			   <div class="featuredBox learnBox">
				<div class="content">
					<?php
						echo get_post_meta($post->ID, "Box2 Text", true);
					?>
				</div>
				<a class="button" target="_blank" href="<?php echo get_post_meta($post->ID, "Box2 URL", true);?>"><span>Learn More About NTL</span></a>	
			   </div>
			   
			   <div class="featuredBox harvardBox">
				<div class="content">
					<?php
						echo get_post_meta($post->ID, "Box3 Text", true);
					?>
				</div>
				<a class="button" target="_blank" href="<?php echo get_post_meta($post->ID, "Box3 URL", true);?>"><span>Learn More About Harvard-NTL</span></a>	
			   </div>
			   <div class="clear"></div>
			   <?php the_content();?>
            </div>
	  
    </div>
</div>
<?php get_footer(); ?>