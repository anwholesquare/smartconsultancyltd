<article class="themestek-box themestek-box-service themestek-servicebox-style-1">
	<div class="themestek-post-item"> 
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">
				<div class="themestek-pf-box-title">					
					<div class="themestek-head">
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>	
					</div>
					<div class="ts-ihbox-icon">
						<?php themestek_service_icon(); ?>
					</div>
					<div class="themestek-des">
						<?php if( has_excerpt() ) : ?>
						<div class="themestek-service-content"><?php the_excerpt(); ?></div>
						<?php endif; ?>
				  </div>
				  <a href="<?php echo get_permalink(); ?>" class="ts-service-link"></a>
			</div>				
		</div>
	</div>
</article>