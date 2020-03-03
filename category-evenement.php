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
                "category_name"=>"evenement",
                "order"=>"ASC",
                "orderBy"=>"date");
               
                /*The 2nd Query (without global var) */
                $query2 = new WP_Query( $args2 );
                 
               
               $category = get_the_category($query2->post->ID);
               
               echo "<h1>".category_description($category[0])."</h1>";
               echo '<div class="oGrid" style="background-color:white;">';
                // The 2nd Loop
                $iPostId = $query2->post->ID;
                
                while ( $query2->have_posts()) {
                    
                    $oMois = get_the_date("m");
                    var_dump($query2->post->post_date);
                    switch($oMois%10){
                        case 0 :
                            $query2->the_post();
                            echo '<div style="background-color:lightgrey; padding:1%;" class="Octobre">';
                            echo '<h4>' . get_the_title() . ' - ' . get_the_date() . '</h4>';
                            echo '</div>';
                        break;

                        case 1 :
                            $query2->the_post();
                            echo '<div style="background-color:lightgrey; padding:1%;" class="Novembre">';
                            echo '<h4>' . get_the_title() . ' - ' . get_the_date() . '</h4>';
                            echo '</div>';
                        break;

                        case 2:
                            $query2->the_post();
                            echo '<div style="background-color:lightgrey; padding:1%;" class="Decembre">';
                            echo '<h4>' . get_the_title() . ' - ' . get_the_date() . '</h4>';
                            echo '</div>';
                        break;
                    }
                           
                            
                     
                        

                        
                    }
                    
                
                 

                echo '</div>';
            ?>
        </div>
    </section>
<?php
get_footer();