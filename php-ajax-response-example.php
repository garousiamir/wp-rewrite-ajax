<?php

class agAjaxes {

    public function __construct() {
        add_action('template_redirect', array($this,'ag_search_ajax'));
    }


    
    public function ag_search_ajax(){
            global $wp_query;
            $method = $wp_query->get('rewrite_search_ajax');
            if (!$method) {
                return;
            }
            if($method === 'search1'):
    
            $ss = esc_attr( $_POST['keyword'] );
            $the_query = new WP_Query( array( 'posts_per_page' => 3, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('product') ) );
            if( $the_query->have_posts() ) :
              
                while( $the_query->have_posts() ): $the_query->the_post(); ?>
    
    
                    <?php endwhile;
                  
                    if($the_query->found_posts > 3){
                    ?>
                  
                    <?php
                    }elseif($the_query->found_posts == 0){
                        ?>
                        <?php
                    }
                wp_reset_postdata();  
            endif;
          endif;
            
          die();
    }
    


}