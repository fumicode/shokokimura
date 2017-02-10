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

<?php
        if ($the_query->found_posts <= 3) : ?>
<!-- the loop -->
    <section>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       

<?php

make_grid();

$post_counter++;

?>
	<?php endwhile; ?>
</section>
<?php else: ?>

<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>      
<?php

if ($post_counter % 3 == 1){
    echo "<section>";
    make_grid();
    if ($post_counter == $the_query->found_posts){
        echo "</section>";
    }
} else if ($post_counter % 3 == 2 && $post_counter !== $the_query->found_posts){
    make_grid();
    if ($post_counter == $the_query->found_posts){
        echo "</section>";
    }
} else if ($post_counter % 3 == 0){
    make_grid();
    echo "</section>";
}

?>

<?php $post_counter++; ?>
	<?php endwhile; ?>
<?php endif; ?>


	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
