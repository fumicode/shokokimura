<?php


get_header('home');

$args = array(
    'post_type' => 'home',
    'name' => '',
    'term' => '',
    'orderby' => 'asc',
    'posts_per_page' => -1,
  );

$post_counter = 1;

$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
<?php

if ($post_counter % 3 == 1 && $post_counter !== $the_query->found_posts) : ?>


<section>
<?php
make_grid();
?>
<?php

endif; ?>
<?php
if ($post_counter % 3 == 2 && $post_counter !== $the_query->found_posts) : ?>
           
<?php

make_grid();

?>

<?php endif; ?>
<?php
if ($post_counter % 3 == 0 || $post_counter == $the_query->found_posts) : ?>
           
<?php
make_grid();
?>

</section>
<?php endif; ?>

<?php $post_counter++; ?>

	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
