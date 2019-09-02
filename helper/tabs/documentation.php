<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'documentation' ) {
	
	
?>

        <ul class="uix-documentation">


                <li>
                    <h2>
                    <?php _e( 'Online Documentation', 'uix-shortcodes' ); ?>
                  </h2>
                   <div class="uix-documentation-content" >
  
                           <p><?php _e( 'Detailed parameters introduction and shortcode examples can refer to the online documentation.', 'uix-shortcodes' ); ?>
                            </p>
                            <P>
						<?php 
							printf( 
								__('<a href="%s" target="_blank" rel="noopener">Check Out Here</a>', 'uix-shortcodes' ), 
								esc_url( 'https://xizon.github.io/wp-documentations/uix-shortcodes/' )
							);
						?>    
						   </p>

                            
                    </div> <!-- /.uix-documentation-content -->
                </li>                    
             
                
       </ul><!-- /.uix-documentation --> 
       
       
<?php } ?>