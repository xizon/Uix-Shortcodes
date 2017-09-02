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
								esc_url( 'https://uiux.cc/wp-plugins-helper/uix-shortcodes' )
							);
						?>    
						   </p>

                            
                    </div> <!-- /.uix-documentation-content -->
                </li>                    
             
                
       </ul><!-- /.uix-documentation --> 
       
       
<script>
		( function($) {
			"use strict";
			
			/*
			 * Tab
			*/
			if ( $( document.body ).width() > 768 ) {
				$( '.uix-d-tabs' ).accTabs();
			}
	
			/*
			 * syntaxhighlighter
			*/
			function uix_syntaxhighlighter_path() {
				var args = arguments,
				result = [];
				for (var i = 0; i < args.length; i++)
					result.push(args[i].replace("$", "<?php echo UixShortcodes::plug_directory(); ?>assets/add-ons/syntaxhighlighter/scripts/"));
				return result
			}
	
			$(function () {
				SyntaxHighlighter.autoloader.apply(null, uix_syntaxhighlighter_path(
					"applescript            $shBrushAppleScript.js",
					"actionscript3 as3      $shBrushAS3.js",
					"bash shell             $shBrushBash.js",
					"coldfusion cf          $shBrushColdFusion.js",
					"cpp c                  $shBrushCpp.js",
					"c# c-sharp csharp      $shBrushCSharp.js",
					"css                    $shBrushCss.js",
					"delphi pascal          $shBrushDelphi.js",
					"diff patch pas         $shBrushDiff.js",
					"erl erlang             $shBrushErlang.js",
					"groovy                 $shBrushGroovy.js",
					"java                   $shBrushJava.js",
					"jfx javafx             $shBrushJavaFX.js",
					"js jscript javascript  $shBrushJScript.js",
					"perl pl                $shBrushPerl.js",
					"php                    $shBrushPhp.js",
					"text plain             $shBrushPlain.js",
					"py python              $shBrushPython.js",
					"ruby rails ror rb      $shBrushRuby.js",
					"sass scss              $shBrushSass.js",
					"scala                  $shBrushScala.js",
					"sql                    $shBrushSql.js",
					"vb vbnet               $shBrushVb.js",
					"xml xhtml xslt html    $shBrushXml.js"
				));
				SyntaxHighlighter.all();
			});
	
		} )( jQuery );
</script>   
         
       
<?php } ?>