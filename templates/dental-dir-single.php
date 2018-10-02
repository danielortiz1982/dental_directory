<?php get_header(); ?>
<main class="site-content" id="doctors">
	<div class="content-box">
		<div class="bv-container">
			<?php if(have_posts() ) : while(have_posts() ) : the_post(); ?>
			<div class="<?php post_class(); ?>" id="doctor-content">
				<h1 class="the-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

				<div class="bv-row">
					<div class="bv-6">
						<div class="left">
							<div class="doctor-thumbnail"><img src="<?php echo the_post_thumbnail_url(); ?>" /></div>
							<hr />
							<h3><span class="fa fa-vcard"></span> Contact Info</h3>
							<div><p><strong><i><?php echo get_post_meta($post->ID, 'doc_full_name_input', true) ?></i></strong></p></div>
							<div><p><?php echo get_post_meta($post->ID, 'doc_addr_input', true); ?></p></div>
							<div><p><?php echo get_post_meta($post->ID, 'doc_city_input', true); ?>, <?php echo get_post_meta($post->ID, 'doc_state_select', true); ?> <?php echo get_post_meta($post->ID, 'doc_zip_input', true); ?></p></div>
							<div><p><?php echo get_post_meta($post->ID, 'doc_phone_input', true); ?></p></div>
							<div><p><a href="mailto:<?php echo get_post_meta($post->ID, 'doc_email_input', true); ?>"><?php echo get_post_meta($post->ID, 'doc_email_input', true); ?></a></p></div>
							<hr />
							<h4><span class="fa fa-user-md"></span> Bio</h4>
							<div class="the-content"><?php the_content(); ?></div>
							<hr />
							<h4><span class="fa fa-mortar-board"></span> education summary</h4>
							<div><p><?php echo get_post_meta($post->ID, 'doc_edu_input', true); ?></p></div>
						</div>
					</div>

					<div class="bv-6">
						<div class="right">
							<div><p><?php echo get_post_meta($post->ID, 'doc_map_input', true); ?></p></div>
							<h3><span class="fa fa-credit-card-alt"></span> Payment & Insurance</h3>
							<hr />
							<h4>Payments Accepted:</h4>
							<div class="payment-content"><?php echo get_the_term_list( $post->ID, 'payment', '<ul class="payments"><li>', '</li><li>', '</li></ul>' ); ?></div>
							<h4>Insurance Accepted:</h4>
							<div class="insurance-content"><?php echo get_the_term_list( $post->ID, 'insurance', '<ul class="insurances"><li>', '</li><li>', '</li></ul>' ); ?></div>
							<h3><span class="fa fa-university"></span> Associations & Specialties</h3>
							<hr />
							<h4>Associations:</h4>
							<div class="association-content"><?php echo get_the_term_list( $post->ID, 'associations', '<ul class="associations"><li>', '</li><li>', '</li></ul>' ); ?></div>
							<h4>Specialties:</h4>
							<div class="specialties-content"><?php echo get_the_term_list( $post->ID, 'specialties', '<ul class="specialties"><li>', '</li><li>', '</li></ul>' ); ?></div>
						</div>
					</div>
				</div>
			</div>
				<?php endwhile ?>
			<?php endif ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>