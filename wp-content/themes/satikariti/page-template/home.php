<?php
/**
 * Template Name: Home Page Template
 * Template Post Type: page
 */

get_header();
?>

<main>
	<section class="banner">
		<?php if( have_rows('main_slider_images') ): ?>
		    <div class="owl-carousel owl-theme banner_slider ">
		    <?php while( have_rows('main_slider_images') ): the_row(); 
		       
		        ?>

		        <div class="item">
		        	<?php 
		        	 $image = get_sub_field('slider_images');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
		            
		        </div>
		    <?php endwhile; ?>
		    </div>
		<?php endif; ?>		
	</section>
	
	<?php 
	$args = array( 'post_type' => 'products', 'posts_per_page' => -1,'order'=>'ASC', );
		$the_query = new WP_Query( $args ); 
	?>
	<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<section class="five-image-section">
				<div class="container">
					<?php $images_main_title = get_field( "images_main_title" ); ?>
					<?php if( $images_main_title ): ?>
						<div class="home-heading">	
						<h2><?php echo $images_main_title ?></h2>
					</div>
					<?php endif; ?>					
					<?php if( have_rows('five_image_box') ): ?>
					    <div class="five_image_box"> 
						    <?php while( have_rows('five_image_box') ): the_row(); 
						    	$image = get_sub_field('category_image');
						    	$category_title = get_sub_field('category_name');	
						        ?>
						        <?php if( !empty( $image ) ): ?>
						        <div class="home_image_box">
						        	<a href="<?php echo get_sub_field('category_image_url'); ?>">
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										
										<?php if( $category_title ): ?>
							            <span class="item-title"><?php echo $category_title ?></span>
							            <?php endif; ?>	
							        </a>
						        </div>
						        <?php endif; ?>
						    <?php endwhile; ?>
					  	</div>  
					<?php endif; ?>	
					
				</div>
			</section>
			<section class="shop-by-category gary-bg" >
				<div class="container">					
					<?php $category_name = get_field( "product_image_title" ); ?>
					<?php if( $category_name ): ?>
						<div class="home-heading">	
						<h2><?php echo $category_name ?></h2>
					</div>
					<?php endif; ?>
					<div class="shop_category_slider">
						<?php if( have_rows('product_image_list') ): ?>
						    <div class="owl-carousel owl-theme category_slider ">
						    <?php while( have_rows('product_image_list') ): the_row(); 
						        ?>
						        <div class="item">
						        	<a href="<?php echo get_sub_field('products_url'); ?>">
							        	<?php 
							        	 $image = get_sub_field('products_image');
							        	 $price = get_sub_field( "price" ); 
										if( !empty( $image ) ): ?>
										    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
							            <span class="item-title"><?php echo get_sub_field('products_name'); ?>
							            	<?php if( !empty( $price ) ): ?>
							            		<br>
							            	<small>₹ <?php echo $price ?></small>
							            	<?php endif; ?>
							            </span>
							        </a>
						        </div>
						    <?php endwhile; ?>
						    </div>
						<?php endif; ?>	
					</div>
				</div>
			</section>
			
	<?php endwhile;
	wp_reset_postdata(); ?>
	<?php else:  ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>	
	<section class="footer-address-section gary-bg">
		<div class="container">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</section>


</main>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.banner_slider').owlCarousel({
		    loop:true,
		    margin:0,
		    nav:true,
		    items:1,
		    dots:false,
		    autoplay:false,
			smartSpeed: 2000,
			navText : ["<i class='las la-arrow-left'></i>","<i class='las la-arrow-right'></i>"]
			
		});
		
	});
	jQuery(document).ready(function(){
		jQuery('.category_slider').owlCarousel({
		    loop:true,
		    margin:40,
		    nav:true,		    
		    dots:false,
		    autoplay:false,
			smartSpeed: 500,
			navText : ["<i class='las la-arrow-left'></i>","<i class='las la-arrow-right'></i>"],
			responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			        },
			        400:{
			            items:2,
			        },
			        767:{
			            items:3,
			        },
			        1000:{
			            items:4,
			        }
			    }
			
		});
		
	});
</script>

