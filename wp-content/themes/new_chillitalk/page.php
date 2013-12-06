<?php echo get_header(); ?>
	
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="row-fluid" >

	
	  <?php the_content(); ?>
      
	  </div>      
      <?php endwhile; else: ?>
      <div class="row-fluid">
	  <?php _e('Sorry, this page does not exist.'); ?></p>
  	  </div>			
        <?php endif; ?>
      </div>
      </div>
      <a class="toplink" style="display: block;"></a>
      <?php echo get_footer(); ?>
	  