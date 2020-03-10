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

<nav class="menuHeader">
    <a href='http://localhost/vcd_veille/category/cours/'>Cours</a>
    <a href='http://localhost/vcd_veille/category/nouvelle/'>Nouvelle</a>
    <a href='http://localhost/vcd_veille/category/evenement/'>Evenement</a>
</nav>
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
                echo '<ol style="background-color:white; padding:5%;">';
                // The 2nd Loop
                $compte = 0;
                while ($query2->have_posts() ) {
     
                    $query2->the_post();
                    
			        get_template_part( 'template-parts/content', 'cours' );
                    $oSession = substr(get_the_title(),4,1);
                    $oDomaine = substr(get_the_title(),5,1);
                    echo '<li >';
    
                    echo '<a class="oCours" href='.get_permalink().'>' . get_the_title() .  '<p style="display:inline;color:red"> - Session : '.$oSession.'</p><p style="display:inline;color:blue"> - Domaine : '.$oDomaine. '</p></a>';
                   
                    
                    echo "</li>";
                    $compte++;
                    
                  
                    }
                echo '</ol>';   

                
            ?>
        </div>
    </section>
<?php
get_footer();