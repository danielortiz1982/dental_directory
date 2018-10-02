<?php $args = array('post_type' => 'doctors', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC'); $the_query = new WP_Query( $args ); ?>
<section class="bv-row">
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  <div class="bv-3">
    <div class="profile-box">
      <div class="profile-img"><a href="<?php the_permalink()?>"><img class="img" src="<?php the_post_thumbnail_url(); ?>"></a></div>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
  </div>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</section>