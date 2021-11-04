<?php
/**
 * Template Name: About Us Page Template
 * Template Post Type: page
 */

get_header();
?>

<main>
	<section class="about-info">
		<div class="container">
			<h1 class="text-center mb-3"><?php echo $post->post_title; ?></h1>
			<?php 
			    $my_postid = 12;
			    $content_post = get_post($my_postid);
			    $content = $content_post->post_content;                     
			    echo $content; 
			?> 
		</div>
	</section>
</main>

<?php get_footer(); ?>


