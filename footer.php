<style>
/*
#footer{margin-top:0px}
.footerMenu {padding-top:15px;}
*/
</style>
<div id="footer">
	<div id="footerInner">
       <a href="http://www.topcoder.com/" class="topcoderLogoMed"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/i/tcLogoSmall.png" alt="" /></a>
	  <?php wp_nav_menu( 
        array(
          'container' => false,
          'theme_location' => '',
          'menu_class' => 'footerMenu',
          'menu' => 'bottom'
        ) 
      ); ?>
    </div>
  </div>
</div>
</div>
<div class="modalWrapper"></div>
<!-- Modal Box -->
<div id="modalBox" class="videoModal"> <a href="javascript:;" id="closeModal"></a>
  <div class="modalContentBox">
    <div class="header">NASA ISS Longeron Challenge Introduction</div>
    <div class="videoContent">
    <iframe width="600" height="355" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  
</div>
<!-- Modal Box End -->
</body>
<?php 
    wp_footer();
  ?>
</html>