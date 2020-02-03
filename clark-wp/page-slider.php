<?php
/**
 * Template Name: Home with Slider
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clark
 */

get_header();
?>

<?php
		while ( have_posts() ) :
			the_post(); ?>

<section id="home-section" class="hero">
		  <div class="home-slider  owl-carousel">

		  	<?php $home_slider = new WP_Query(array('post_type' => 'slider','order' => 'ASC')); ?>
        <?php while ($home_slider->have_posts()) : $home_slider->the_post();?>

	      <div class="slider-item">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third js-fullheight order-md-last img" style="background-image:url(<?php echo get_the_post_thumbnail_url(array()); ?>);">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading"><?php the_field('greetings')?></span>
			            <h1 class="mb-4 mt-3"><?php the_field('i_am')?> <span><?php the_field('your_name_goes_here')?></span></h1>
			            <h2 class="mb-4"><?php the_field('what_you_do')?></h2>
			            <p><a href="<?php the_field('hire_me');?>" class="btn btn-primary py-3 px-4"><?php the_field('hire_me_text');?></a> <a href="<?php the_field('link_to_works');?>" class="btn btn-white btn-outline-white py-3 px-4"><?php the_field('my_work')?></a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	      <?php endwhile; wp_reset_postdata();?>
	    </div>
    </section>

    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?php the_field('about_bg_image');?>);">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<h1 class="big"><?php the_field('about_backgound_text')?></h1>
		            <h2 class="mb-4"><?php the_field('about_h2_text')?></h2>
		            <p><?php the_field('about_desc')?></p>
		            <ul class="about-info mt-4 px-md-0 px-2">
		            	<li class="d-flex"><span>Name:</span> <span><?php the_field('name');?></span></li>
		            	<li class="d-flex"><span>Age:</span> <span><?php the_field('age');?></span></li>
		            	<li class="d-flex"><span>Address:</span> <span><?php the_field('address');?></span></li>
		            	<li class="d-flex"><span>Zip code:</span> <span><?php the_field('zip_code');?></span></li>
		            	<li class="d-flex"><span>Email:</span> <span><?php the_field('email_address');?></span></li>
		            	<li class="d-flex"><span>Phone: </span> <span><?php the_field('phone_number')?></span></li>
		            </ul>
		          </div>
		        </div>
	          <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text">
              	<p class="mb-4">
	                <span class="number" data-number="<?php the_field('project_completed');?>">0</span>
	                <span>Project complete</span>
                </p>
                <p><a href="<?php the_field('download_cv');?>" class="btn btn-primary py-3 px-3" download>Download CV</a></p>
              </div>
	          </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pb" id="resume-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<h1 class="big big-2"><?php the_field('background_text');?></h1>
            <h2 class="mb-4"><?php the_field('heading_text');?></h2>
            <p><?php the_field('resume_desc');?></p>
          </div>
        </div>
    		<div class="row">
    			<?php $resume = new WP_Query(array('post_type' => 'resume','order' => 'ASC', 'posts_per_page'=> -1)); ?>
    			<?php while ($resume->have_posts()) : $resume->the_post();?>
    			<div class="col-md-6">
       					 
    				<div class="resume-wrap ftco-animate">
    					<span class="date"><?php the_field('start_and_end_date')?></span>
    					<h2><?php the_title()?></h2>
    					<span class="position"><?php the_field('university_name')?></span>
    					<p class="mt-4"><?php the_content()?></p>
    				</div>
    				
    			</div>
    			 <?php endwhile; wp_reset_postdata();?>
    			

    		</div>
    		
    	</div>
    </section>

    <section class="ftco-section" id="services-section">
    	<div class="container">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2"><?php the_field('service_background_text');?></h1>
            <h2 class="mb-4"><?php the_field('heading_text_services');?></h2>
            <p><?php the_field('service_desc');?></p>
          </div>
        </div>
    		<div class="row">
    			<?php $service = new WP_Query(array('post_type' => 'service','order' => 'ASC', 'posts_per_page'=> -1)); ?>
    			<?php while ($service->have_posts()) : $service->the_post();?>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1">
							<span class="icon">
								<?php the_field('service_icons');?>
							</span>
							<div class="desc">
								<h3 class="mb-5"><?php the_title();?></h3>
							</div>
						</a>
					</div>
					 <?php endwhile; wp_reset_postdata();?>

				</div>
    	</div>
    </section>

		
		<section class="ftco-section" id="skills-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2"><?php the_field('skill_background_text');?></h1>
            <h2 class="mb-4"><?php the_field('heading_text_skill');?></h2>
            <p><?php the_field('skill_desc');?></p>
          </div>
        </div>
				<div class="row">

					<?php $my_skills = new WP_Query(array('post_type' => 'skills','order' => 'ASC', 'posts_per_page'=> -1)); ?>
    			<?php while ($my_skills->have_posts()) : $my_skills->the_post();?>

					<div class="col-md-6 animate-box">
						<div class="progress-wrap ftco-animate">
							<h3><?php the_title();?></h3>
							<div class="progress">
							 	<div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
							  	aria-valuemin="0" aria-valuemax="100" style="width:<?php the_field('skill_level');?>%">
							    <span><?php the_field('skill_level');?>%</span>
							  	</div>
							</div>
						</div>
					</div>
					 <?php endwhile; wp_reset_postdata();?>
				</div>
			</div>
		</section>
 

    <section class="ftco-section ftco-project" id="projects-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2"><?php the_field('project_background_text');?></h1>
            <h2 class="mb-4"><?php the_field('heading_text_project');?></h2>
            <p><?php the_field('project_desc');?></p>
          </div>
        </div>
    		<div class="row">


    			<?php $my_project = new WP_Query(array('post_type' => 'project', 'order' => 'ASC', 'posts_per_page'=> -1)); ?>
    			<?php while ($my_project->have_posts()) : $my_project->the_post();?>

    			<div class="col-md-4">
    				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?php echo get_the_post_thumbnail_url(array()); ?>);">
    					<div class="overlay"></div>
	    				<div class="text text-center p-4">
	    					<h3><a href="#"><?php the_title()?></a></h3>
	    					<?php
                        global $post;
                        $taxonomy = 'project_taxonomy';
                        $terms = wp_get_post_terms($post->ID, $taxonomy);
                        if ($terms && !is_wp_error($terms)) :?>
                        <?php foreach ($terms as $project_terms) : ?>
                        <span><a class="term-color" href="#"><?php echo $project_terms->name; ?></a></span>
                        <?php endforeach ?>
                        <?php endif; ?>
	    					
	    				</div>
    				</div>
  				</div>
  				
  				 <?php endwhile; wp_reset_postdata();?>

    		</div>
    	</div>
    </section>


    <section class="ftco-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h1 class="big big-2">Blog</h1>
            <h2 class="mb-4">Our Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex">
        
     <?php 
// the query
		$clark_blog_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=> 3, 'order' => 'desc')); ?>
 
			<?php if ( $clark_blog_query->have_posts() ) : ?>
  
  				<?php while ( $clark_blog_query->have_posts() ) : $clark_blog_query->the_post(); ?>
          
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="<?php the_permalink();?>" class="block-20" style="background-image: url('<?php echo get_the_post_thumbnail_url(array()); ?>);');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center mb-3 meta">
	                <p class="mb-0">
	                	<span class="mr-2"><?php echo esc_html(get_the_date()); ?></span>
	                	<a href="<?php echo esc_html(get_author_posts_url( $post->ID ));?>" class="mr-2"><?php the_author();?></a>
	                	<a href="" class="meta-chat"><span class="icon-chat"><?php echo esc_html( get_comments_number($post->ID));?></span></a>
	                </p>
                </div>
                <h3 class="heading"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                <p><?php echo wp_trim_words( get_the_content(), 30, ' ...' );?></p>
              </div>
            </div>
          </div>

     			<?php endwhile; ?>
     			 <div class="container">
     			 <div class="row justify-content-center mt-5">
    			<div class="col-md-12 text-center ftco-animate fadeInUp ftco-animated">
    				<p><a href="http://localhost:8888/clark/blog" class="btn btn-primary py-4 px-5">View All Post</a></p>
    			</div>
    		</div>
    	</div>

 					 <?php wp_reset_postdata(); ?>

    			<?php else : ?>
   					 <p><?php _e( 'Sorry, there is no post yet Add New Post.', 'clark-wp' ); ?></p>
				<?php endif; ?>

        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
    	<div class="container">
				<div class="row d-md-flex align-items-center">

			   <?php 
            			$award_text =   get_theme_mod( 'set_award_text', __( 'Awards', 'clark-wp' ));
            			$award_count  = get_theme_mod( 'set_award_count', __( '100', 'clark-wp' ));
            	?>

           <?php if(!empty($award_text) && !empty($award_count)) : ?>

	          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
	            <div class="block-18">
	              <div class="text">
	                <strong class="number" data-number="<?php echo $award_count;?>">0</strong>
	                <span><?php echo $award_text;?></span>
	              </div>
	            </div>
	          </div>

        <?php endif;?>

        		<?php 
            			$completed_project_text = get_theme_mod( 'set_completed_project_text', __( 'Completed Projects', 'clark-wp' ));
            			$completed_project_number  = get_theme_mod( 'set_number_completed_project_text', __( '1500', 'clark-wp' ));
            	?>


            <?php if(!empty($completed_project_text) && !empty($completed_project_number)) : ?>

          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="<?php echo $completed_project_number;?>">0</strong>
                <span><?php echo $completed_project_text;?></span>
              </div>
            </div>
          </div>
          <?php endif;?>

          		<?php 
            			$happy_customer_text = get_theme_mod( 'set_happy_customer_text', __( 'Happy Customers', 'clark-wp' ));
            			$happy_customer_number  = get_theme_mod( 'set_happy_customer_number', __( '1500', 'clark-wp' ));
            	?>


            <?php if(!empty($happy_customer_text) && !empty($happy_customer_number)) : ?>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		              <div class="text">
		                <strong class="number" data-number="<?php echo $happy_customer_number;?>">0</strong>
		                <span><?php echo $happy_customer_text;?></span>
		              </div>
		            </div>
		          </div>
           <?php endif;?>


				<?php 
            			$coffee_number_text = get_theme_mod( 'set_coffee_number_text', __( 'Cups of Coffee', 'clark-wp' ));
            			$happy_coffee_number  = get_theme_mod( 'set_coffee_number', __( '500', 'clark-wp' ));
            	?>
             <?php if(!empty($coffee_number_text) && !empty($happy_coffee_number)) : ?>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text">
                <strong class="number" data-number="<?php echo $happy_coffee_number;?>">0</strong>
                <span><?php echo $coffee_number_text;?></span>
              </div>
            </div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </section>




    <section class="ftco-section ftco-hireme img margin-top" style="background-image: url(<?php the_field('hire_bg_image');?>)">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 ftco-animate text-center">
					<h2><?php the_field('i_am')?> <span><?php the_field('available');?></span> <?php the_field('for_freelancing');;?></h2>
						<p><?php the_field('why_hire_me');?></p>
						<p class="mb-0"><a href="<?php the_field('hire_me_link');?>" class="btn btn-primary py-3 px-5"><?php the_field('hire_me_text');?></a></p>
					</div>
				</div>
			</div>
		</section>



    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h1 class="big big-2"><?php the_field('contact_us_background_text')?></h1>
            <h2 class="mb-4"><?php the_field('heading_text_contact')?></h2>
            <p><?php the_field('contact_us_short_desc')?></p>
          </div>
        </div>

        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          	<?php $address = get_theme_mod( 'set_contact_address', __( '198 West 21th Street, Suite 721 New York NY 10016', 'clark-wp' ));?>
          		<?php if(!empty($address)):?>
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>

          			<h3 class="mb-4">Address</h3>
	            <p><?php echo $address;?></p>
	        <?php endif;?>
          		
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">
          		<?php $contact_number = get_theme_mod( 'set_contact_number', __( '+ 1235 2355 98', 'clark-wp' ));?>
          		<?php if(!empty($address)):?>
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel:<?php echo $address;?>"><?php echo $contact_number;?></a></p>
	             <?php endif;?>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">

          		<?php $email = get_theme_mod( 'set_contact_email', __( 'info@example.com', 'clark-wp' ));?>
          			<?php if(!empty($email)):?>
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
	             <?php endif;?>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center">

          		<?php $website = get_theme_mod( 'set_contact_website', __( 'https://www.95media.co.uk', 'clark-wp' ));?>
          			<?php if(!empty($website)):?>

          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a href="<?php echo $website?>"><?php echo $website;?></a></p>

	             <?php endif;?>

	          </div>
          </div>
        </div>

        <div class="container">
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex"> 
          	<?php echo do_shortcode('[contact-form-7 id="99" title="Contact form 1" html_class="bg-light p-4 p-md-5 contact-form"]');?>
          </div>

          <div class="col-md-6 d-flex contact-img">
          	<div class="img" style="background-image: url(<?php the_field('contact_bg_image');?>);"></div>
          </div>
        </div>
    </div>
      </div>
    </section>

  <?php endwhile; // End of the loop.?>
		
	
<?php get_footer();?>
