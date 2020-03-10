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
                echo '<div class="oGrid2">';
                // The 2nd Loop
                $compte = 0;
                echo '<div style="grid-area:1/1/2/1">Environnement</div><div style="grid-area:1/2/2/2">Animation</div><div style="grid-area:1/3/2/3">Design</div><div style="grid-area:1/4/2/4">Programmation</div><div style="grid-area:1/5/2/5">Intégration</div>';
                while ($query2->have_posts() ) {
                    
                    $query2->the_post();
                    
			        get_template_part( 'template-parts/content', 'cours' );
                    $oSession = (int)substr(get_the_title(),4,1) + 1;
                    $oDomaine = (int)substr(get_the_title(),5,1) ;
                    
                    echo '<div id=cours'.$compte.' style="grid-area:'.$oSession.'/'.$oDomaine.'/'.($oSession+1).'/'.$oDomaine.';">';
                        echo '<a class="oCours"  href='.get_permalink().'>' . substr(get_the_title(),0,7) .  '</a>';
                    echo '</div>';
                    
                    $compte++;
                    
                  
                    }
                echo '</div>';   

                
            ?>
        </div>
    </section>
<?php
get_footer();