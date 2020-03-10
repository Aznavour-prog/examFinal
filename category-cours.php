<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astral
 * @since 0.1
 */
get_header();
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' );

?>
	<section class="align-blog" id="blog">
        <div class="container">
            <?php

wp_reset_postdata();
$args2 = array(
   "category_name"=>"cours",
   'posts_per_page'=>30,
   'orderby'=>'title',
   
   'order'=>'ASC');

/*The 2nd Query (without global var) */
$query2 = new WP_Query( $args2 );
 
                
                
               
               
                echo "<h1>".category_description()."</h1>";
                
                // The 2nd Loop
                $compte = 0;
                while ($query2->have_posts() ) {
     
                    $query2->the_post();
                    
			        get_template_part( 'template-parts/content', 'cours' );
                    echo "<div style='background-color:white; padding:1%;'>";
                    
                    echo "<h1>".get_the_title()."</h1>";
                   
                    
                    echo "</div>";
                    $compte++;
                    
                  
                    }
                           

                
            ?>
        </div>
    </section>
<?php
get_footer();