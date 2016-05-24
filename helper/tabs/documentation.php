<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'documentation' ) {
	
	$imgpath = UixShortcodes::plug_directory().'helper/img/documentation/';
	
?>

        <ul class="uix-documentation">


                <li>
                    <h2><?php _e( 'Container Builder', 'uix-shortcodes' ); ?></h2>
                   <div class="uix-documentation-content" >
  
                           <p><?php _e( 'This shortcode required when you create content as container or mark the specific content. "<strong>Container</strong>" shortcode allows you use 100% width or boxed layout. You can customize background, height, border, color diversification, parallax background, wrapper margin, content padding for sections.<br>', 'uix-shortcodes' ); ?><br>

<strong>"<?php _e( 'Content Shortcode', 'uix-shortcodes' ); ?>"</strong>, <strong>"<?php _e( 'Column Shortcode', 'uix-shortcodes' ); ?>"</strong>, <strong>"<?php _e( 'Web Elements Shortcode', 'uix-shortcodes' ); ?>"</strong> and <strong>"<?php _e( 'Container Shortcode', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'could be used together to divide the page into sections.', 'uix-shortcodes' ); ?>

                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-container-1.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-container-2.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-container-3.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-container-5.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg">Options</h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'Choose Layout', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-container-4.jpg" alt="" /></td>
                                                <td><?php _e( 'This option will be useful if you use 100% width page template. Otherwise, the container will be center.', 'uix-shortcodes' ); ?><br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-container-6.jpg" alt="" /></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Width', 'uix-shortcodes' ); ?> (px)<?php _e( 'Period', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Choose Layout', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>1200</td>
                                                <td><?php _e( 'It will determine the width of the container in pixels if the', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'Choose Layout', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'value is', 'uix-shortcodes' ); ?> <code>center</code> .</td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Height', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>0</td>
                                                <td><?php _e( 'It will determine the height of the container in pixels. The browser automatically calculates the container height if the value is', 'uix-shortcodes' ); ?> <code>0</code>.</td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Vertically Center Content', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>true</td>
                                                <td><?php _e( 'When enabled, the content of container is placed in the middle.', 'uix-shortcodes' ); ?></td>
                                            </tr>    
                                            
                                           
                                            <tr>
                                                <td><?php _e( 'Background Image', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Background image URL. The CSS properties for the background appear after upload.', 'uix-shortcodes' ); ?><br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-container-7.jpg" alt="" />
                                                </td>
                                            </tr>                                    
                                           
                                           
                                            <tr>
                                                <td><?php _e( 'Background Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>-</td>
                                                <td><?php _e( 'Set a color for the container background. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>      
                                           
                                           
                                            <tr>
                                                <td><?php _e( 'Parallax', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>0</td>
                                                <td><?php _e( 'Add a parallax scrolling effect of the container on your pages. You need value', 'uix-shortcodes' ); ?> > 0.</td>
                                            </tr>         
                                           
                                            <tr>
                                                <td><?php _e( 'Class', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Additional class for container.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                            
                                            <tr>
                                                <td><?php _e( 'Wrapper Margin', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>margin-top:<code>25</code>px<br>margin-bottom:<code>25</code>px<br>margin-left:<code>0</code><br>margin-right:<code>0</code><br> </td>
                                                <td><?php _e( 'Use the input fields below to customize the margin of container wrapper.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                           
                                            <tr>
                                                <td><?php _e( 'Content Padding', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>padding-top:<code>0</code>px<br>padding-bottom:<code>0</code>px<br>padding-left:<code>25</code><br>padding-right:<code>25</code><br> </td>
                                                <td><?php _e( 'Use the input fields below to customize the padding of content from container.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                                                               
                                           
                                            <tr>
                                                <td><?php _e( 'Border', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, it will add a custom border for container.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                                            
                                            <tr>
                                                <td colspan="4">
                                                <p>
                                                <?php _e( 'To set up the following properties, the ', 'uix-shortcodes' ); ?><strong class="txt">"<?php _e( 'Border', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox should be checked.', 'uix-shortcodes' ); ?>
                                                </p>
                                             
                                               </td>
                                            </tr>        
                                            
                                            <tr>
                                                <td><?php _e( 'Border Width', 'uix-shortcodes' ); ?> (px)<span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Border', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>1</td>
                                                <td><?php _e( 'It will determine the width of the container border in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>    
                                           
                                            <tr>
                                                <td><?php _e( 'Border Color', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Border', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>-</td>
                                                <td><?php _e( 'Set a color for the container border. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>                                             
                                           
                                           
                                            <tr>
                                                <td><?php _e( 'Border Style', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Border', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>solid</td> 
                                                <td><?php _e( 'The option allows you to specify the style of a container border. The following values are allowed:', 'uix-shortcodes' ); ?> <code>solid</code>, <code>double</code>, <code>dashed</code>, <code>dotted</code>.</td>
                                            </tr> 
                                           
                                          
                                           
                                             
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example(header)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_container parallax='0.2' class='' height='350px' margin_top='25' margin_bottom='25' margin_left='0' margin_right='0' padding_top='70' padding_bottom='0' padding_left='45' padding_right='45' bgimage='http://your.website.com/test-img.jpg' bgimage_repeat='no-repeat' bgimage_position='left' bgimage_attachment='scroll' bgimage_size='cover' bgcolor='' layout='fullwidth' ]
&lt;h2&gt;&lt;span style="color: #ffffff;"&gt;Section Title&lt;/span&gt;&lt;/h2&gt;
&lt;span style="color: #ffffff;"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Teneo, inquit, finem illi videri nihil dolere. Esse enim, nisi eris, non potes.&lt;/span&gt;

[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Try It[/uix_button]

[/uix_container]

[uix_container parallax='0' class='' height='auto' margin_top='25' margin_bottom='25' margin_left='0' margin_right='0' padding_top='40' padding_bottom='40' padding_left='125' padding_right='125' borderwidth='3px' borderstyle='solid' bordercolor='rgb(226, 226, 226)' bgcolor='rgb(234, 234, 234)' layout='fullwidth' ]
&lt;h4 style="text-align: center;"&gt;Center Text &amp; Auto Height&lt;/h4&gt;
&lt;p style="text-align: center;"&gt;[uix_dividing_line style='gradient' color='dark' width='100%' opacity='17']&lt;/p&gt;

&lt;h6 style="text-align: center;"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Teneo, inquit, finem illi videri nihil dolere. Esse enim, nisi eris, non potes. Cum audissem Antiochum, Brute, ut solebam, cum M. Dolor ergo, id est summum malum, metuetur semper, etiamsi non aderit; Duo Reges: constructio interrete. Nam si propter voluptatem, quae est ista laus, quae possit e macello peti? Respondeat totidem verbis. Sic enim censent, oportunitatis esse beate vivere.&lt;/h6&gt;
[/uix_container]
&nbsp;
&nbsp;
</pre>
                                </div>
                                
                      
                                <h3><?php _e( 'Example(page)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_container parallax='0' class='' width='1200px' height='auto' margin_top='25' margin_bottom='25' margin_left='0' margin_right='0' padding_top='0' padding_bottom='0' padding_left='25' padding_right='25' bgcolor='' layout='center' ]

[uix_features col='3']
[uix_features_item col='3' icon='binoculars' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Creative WordPress Theme[/uix_features_item_title]
[uix_features_item_desc][p]Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='anchor' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Interactive Creative[/uix_features_item_title]
[uix_features_item_desc][p]Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='adjust' iconcolor='' titlecolor='' desccolor='' last='1']
[uix_features_item_title]Premium Templates[/uix_features_item_title]
[uix_features_item_desc][p]DThe first approach uses Bootstraps own offset classes so it requires no change in markup and no extra CSS. The key is to set an offset equal to half of the remaining size of the row. So for example, a column of size 2 would be centered by adding an offset of 5.[/p][/uix_features_item_desc]
[/uix_features_item]
[/uix_features]

[uix_features col='3']
[uix_features_item col='3' icon='cubes' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Multiple layouts[/uix_features_item_title]
[uix_features_item_desc][p]Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='coffee' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Search Engine Optimization[/uix_features_item_title]
[uix_features_item_desc][p]Aenean congue molestie sapien, nec convallis lectus interdum ut. Vestibulum facilisis, sem eu lobortis pulvinar, dui dui ornare erat, nec porta nunc quam a metus. Fusce eget consequat purus. Sed magna odio, rhoncus eget diam fermentum, mattis porttitor dolor.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='cloud-download' iconcolor='' titlecolor='' desccolor='' last='1']
[uix_features_item_title]Freebies[/uix_features_item_title]
[uix_features_item_desc][p]Nam et vestibulum odio. Aliquam auctor ac velit sit amet pretium. Maecenas pulvinar egestas rutrum. Nam et elit faucibus nunc euismod fringilla eu iaculis mi.[br]Vitiosum est enim in dividendo partem in genere numerare. Paulum, cum regem Persem captum adduceret, eodem flumine invectio[/p][/uix_features_item_desc]
[/uix_features_item]
[/uix_features]

&amp;nbsp;

&amp;nbsp;

[uix_heading color='' style='grand' align='center' size='45px' uppercase='true' spacing='2px' fillbg='']Our Team[/uix_heading][uix_heading_line line='true' width='182px' height='5px']
&lt;p style="text-align: center;"&gt;&lt;span style="color: #808080;"&gt;Summum a vobis bonum voluptas dicitur.&lt;/span&gt;&lt;/p&gt;
[uix_team col='4' avatarfillet='0%' gray='true']
[uix_team_item col='4' name='Jone Smmith' avatar='http://your.website.com/photo.png' position='CEO' social_1='twitter|#' social_2='facebook|#' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Donny Kiu' avatar='http://your.website.com/photo.png' position='Photographer' social_1='twitter|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Doky' avatar='http://your.website.com/photo.png' position='Andriod Developer' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]The Introduction of this member.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Haec Linla' avatar='http://your.website.com/photo.png' position='UI Designer' social_1='facebook|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. [/p][/uix_team_item_desc]
[/uix_team_item]
[/uix_team]

[/uix_container]

[uix_container parallax='0.4' class='' height='315px' margin_top='25' margin_bottom='25' margin_left='0' margin_right='0' padding_top='135' padding_bottom='0' padding_left='25' padding_right='25' bgimage='http://your.website.com/bg1.jpg' bgimage_repeat='no-repeat' bgimage_position='left' bgimage_attachment='scroll' bgimage_size='cover' bgcolor='' layout='fullwidth' ]
&lt;p style="text-align: center;"&gt;&lt;span style="color: #ffffff;"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si verbum sequimur, primum longius verbum praepositum quam bonum.&lt;/span&gt;&lt;/p&gt;
&lt;p style="text-align: center;"&gt;&lt;span style="color: #ffffff;"&gt;Summum a vobis bonum voluptas dicitur.&lt;/span&gt;&lt;/p&gt;
[/uix_container]

[uix_container parallax='0' class='' width='1200px' height='auto' margin_top='25' margin_bottom='0' margin_left='0' margin_right='0' padding_top='0' padding_bottom='0' padding_left='25' padding_right='25' bgcolor='' layout='center' ]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='3']

[uix_progress_bar barcolor='#a2bf2f' trackcolor='#f1f1f1' preccolor='#473f3f' size='120px' shape='circular' percent='75' units='%' linewidth='3' precsize='12px' title='Multiple layouts' top='25' bottom='0' left='25' right='25'][p]Duis mollis, est non commodo luctus[/p][/uix_progress_bar]

[/uix_column]
[uix_column grid='3']

[uix_progress_bar barcolor='#fa8072' trackcolor='#f1f1f1' preccolor='#473f3f' size='120px' shape='circular' percent='99' units='%' linewidth='3' precsize='12px' title='Full PJAX' top='25' bottom='0' left='25' right='25'][p]Donec sed odio dui.[/p][/uix_progress_bar]

[/uix_column]
[uix_column grid='3']

[uix_progress_bar barcolor='#ffd700' trackcolor='#f1f1f1' preccolor='#473f3f' size='120px' shape='circular' percent='88' units='%' linewidth='3' precsize='12px' title='Search Engine Optimization' top='25' bottom='0' left='25' right='25'][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit[/p][/uix_progress_bar]

[/uix_column]
[uix_column grid='3' last='1']

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#473f3f' size='120px' shape='circular' percent='35' units='%' linewidth='3' precsize='12px' title='Creative WordPress Theme' top='25' bottom='0' left='25' right='25'][p]Duis mollis, est non commodo luctus[/p][/uix_progress_bar]

[/uix_column]
[/uix_column_wrapper]

&amp;nbsp;

[uix_heading color='' style='grand' align='center' size='45px' uppercase='true' spacing='2px' fillbg='']Pricing[/uix_heading][uix_heading_line line='true' width='182px' height='5px']
&lt;p style="text-align: center;"&gt;&lt;span style="color: #808080;"&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si verbum sequimur.&lt;/span&gt;&lt;/p&gt;
[uix_pricing]
[uix_pricing_item target='_blank' class='' url='#' period='per month' bcolor='green' imcolor='#d59a3e' col='3']
[uix_pricing_item_level]free[/uix_pricing_item_level]
[uix_pricing_item_price]$49[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Quis animo aequo videt eum, quem inpure ac flagitiose putet vivere?[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]TRY FOR FREE[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]UX prototyping engaging[/li][li]For years is now over[/li][li]That search is now over[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='_blank' class='uix-sc-price-important' url='#' period='per month' bcolor='green' imcolor='#d59a3e' col='3']
[uix_pricing_item_level]premium[/uix_pricing_item_level]
[uix_pricing_item_price]$69[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Maximas animo voluptates percipiat omnibusque partibus maiores quam corpore, quid occurrat non videtis.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]UX prototyping engaging[/li][li]For years is now over[/li][li]That search is now over[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='_blank' class='' url='#' period='per month' bcolor='green' imcolor='#d59a3e' col='3' last='1']
[uix_pricing_item_level]professional[/uix_pricing_item_level]
[uix_pricing_item_price]$109[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Neminem videbis ita laudatum, ut artifex callidus.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]&lt;s&gt;Invalid Feature Description&lt;/s&gt;[/li][li]&lt;s&gt;Invalid Feature Description 2&lt;/s&gt;[/li][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]UX prototyping engaging[/li][li]For years is now over[/li][li]That search is now over[/li][li]Design is the method[/li][li]Look SEO[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[/uix_pricing]

[/uix_container]

[uix_container parallax='0' class='' height='5px' margin_top='0' margin_bottom='0' margin_left='0' margin_right='0' padding_top='0' padding_bottom='0' padding_left='25' padding_right='25' bgimage='http://your.website.com/bg2.jpg' bgimage_repeat='no-repeat' bgimage_position='left' bgimage_attachment='scroll' bgimage_size='cover' bgcolor='' layout='fullwidth' ][/uix_container]
</pre>
                                </div>
                                
                                       
                                <h3><?php _e( 'Preview(header)', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-container-8.jpg" alt="" />
                                </div>
                                
                                <h3><?php _e( 'Preview(page)', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-container-8_2.jpg" alt="" />
                                </div>                                 
                                
                            </div><!-- .uix-d-tabs -->

                    </div> <!-- /.uix-documentation-content -->
                </li>                    
                
                
                

                <li>
                    <h2><?php _e( 'Content Builder', 'uix-shortcodes' ); ?></h2>
                   <div class="uix-documentation-content" >
                       
                       <div class="uix-list-title"><?php _e( 'Recent Posts With Custom Template', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode allows you to fine-tune the posts you wish to display on a page. You can use the following placeholders in the post list item templates, which will be replaced by the actual values when the content is displayed.', 'uix-shortcodes' ); ?>
                            
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-1.jpg" alt="" />
                                </div>

                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                                            <tr>
                                                <td><?php _e( 'Number of posts to show', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>5</td>
                                                <td><?php _e( 'Set the number of posts to display per page there.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php _e( 'Loop Template', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'HTML|String', 'uix-shortcodes' ); ?></td>
                                                <td>[p]&lt;li&gt;&lt;a href="[uix_recent_posts_link]"&gt;[uix_recent_posts_title]&lt;/a&gt;&lt;/li&gt;[/p]</td>
                                                <td><?php _e( 'You can use the following placeholders in the post list item templates, which will be replaced by the actual values when the content is displayed:', 'uix-shortcodes' ); ?>
                                                <br><strong>
                                                    <code>[uix_recent_posts_link]</code> --&gt; <?php _e( 'Permalink', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_title]</code> --&gt; <?php _e( 'Title', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_date_m]</code> --&gt; <?php _e( 'Month', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_date_M]</code> --&gt; <?php _e( 'Month display in English', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_date_d]</code> --&gt; <?php _e( 'Day', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_date_y]</code> --&gt; <?php _e( 'Year', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_excerpt]</code> --&gt; <?php _e( 'Excerpt', 'uix-shortcodes' ); ?>
                                                <br><code>[uix_recent_posts_thumbnail]</code> --&gt; <?php _e( 'Featured image', 'uix-shortcodes' ); ?> 
                                                </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php _e( 'Output text before the &lt;a&gt; of the link', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'HTML|String', 'uix-shortcodes' ); ?></td>
                                                <td>&lt;ul&gt;</td>
                                                <td><?php _e( 'You can create custom tags for html and assign specific class name. For example:', 'uix-shortcodes' ); ?> <code>&lt;ul class="custom-list"&gt;</code></td>
                                            </tr>
                                            <tr>
                                                <td><?php _e( 'Output text after the &lt;/a&gt; of the link', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'HTML|String', 'uix-shortcodes' ); ?></td>
                                                <td>&lt;/ul&gt;</td>
                                                <td><?php _e( 'The HTML tag should have a corresponding ending tag.<', 'uix-shortcodes' ); ?>/td>
                                            </tr>
                                            
                                            
                                        </table>
                                    </div>
                                </div>
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_recent_posts show='5' before='&lt;ul&gt;' after='&lt;/ul&gt;'][p]&lt;li&gt;&lt;a href="[uix_recent_posts_link]"&gt;[uix_recent_posts_title]&lt;/a&gt;&lt;/li&gt;[/p][/uix_recent_posts]
&nbsp;
</pre>
                                </div>   
                                
                                
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-2.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
            
            

                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Pricing Table', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode allows you to add a new 3 or 4 column pricing section from your editor toolbar.', 'uix-shortcodes' ); ?>
                            
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-3.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-4.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Title', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'A title for the pricing table.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Price', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'You want for the price.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Price Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-content-7.jpg" alt="" /></td>
                                                <td><?php _e( 'You want for the text color of price.', 'uix-shortcodes' ); ?></td>
                                            </tr>                            
                                            
                                            <tr>
                                                <td><?php _e( 'Currency', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>$</td>
                                                <td><?php _e( 'Your desired currency sign.', 'uix-shortcodes' ); ?></td>
                                            </tr>                
                                            
                                            <tr>
                                                <td><?php _e( 'Period', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'per month', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'The period (time span) for the price.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                                            <tr>
                                                <td><?php _e( 'Description', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Description of this pricing table.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
                                            
                                            <tr>
                                                <td><?php _e( 'Button Label', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'That is the text you would like displayed on the button.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
                                                                                      
                                            <tr>
                                                <td><?php _e( 'Button Link', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'A destination link for the button.', 'uix-shortcodes' ); ?></td>
                                            </tr>            
                                            
                                            <tr>
                                                <td><?php _e( 'Button Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-13.jpg" alt="" /></td>
                                                <td><?php _e( 'You want for the text color of price.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
   
                                            <tr>
                                                <td><?php _e( 'Open in new tab', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, the button link to open in a new tab.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Features', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'HTML|String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Your pricing table content. Type one word or sentence per line when press <strong>"ENTER"</strong>. The textarea is supported by HTML tags.', 'uix-shortcodes' ); ?></td>
                                            </tr>                              
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Active', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, this pricing table to be marked as active (highlighted by default). <br>
                                                If you defined custom styles with custom names, you can customize using the <strong>"class"</strong> parameter of shortcode. <br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'Default: ', 'uix-shortcodes' ); ?><strong>uix-sc-price-important</strong><br>
                                                <?php _e( 'Example: ', 'uix-shortcodes' ); ?><code>[uix_pricing_item class='uix-sc-price-important']</code></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Hide', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, this pricing table will hide.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                   
                                            
                                
                                            
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example (3 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_pricing]
[uix_pricing_item target='' class='' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='3']
[uix_pricing_item_level]free[/uix_pricing_item_level]
[uix_pricing_item_price]$49[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]TRY FOR FREE[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='' class='uix-sc-price-important' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='3']
[uix_pricing_item_level]premium[/uix_pricing_item_level]
[uix_pricing_item_price]$69[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='' class='' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='3' last='1']
[uix_pricing_item_level]professional[/uix_pricing_item_level]
[uix_pricing_item_price]$109[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][li]Another Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[/uix_pricing]
&nbsp;
</pre>
                                </div>
                                
                                <h3><?php _e( 'Example (4 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_pricing]
[uix_pricing_item target='' class='' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='4']
[uix_pricing_item_level]free[/uix_pricing_item_level]
[uix_pricing_item_price]$49[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]TRY FOR FREE[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='' class='uix-sc-price-important' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='4']
[uix_pricing_item_level]premium[/uix_pricing_item_level]
[uix_pricing_item_price]$69[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='' class='' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='4']
[uix_pricing_item_level]professional[/uix_pricing_item_level]
[uix_pricing_item_price]$109[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][li]Another Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[uix_pricing_item target='' class='' url='' period='per month' bcolor='green' imcolor='#d59a3e' col='4' last='1']
[uix_pricing_item_level]expand[/uix_pricing_item_level]
[uix_pricing_item_price]$139[/uix_pricing_item_price]
[uix_pricing_item_desc][p]Some description text here.[/p][/uix_pricing_item_desc]
[uix_pricing_item_button]BUY[/uix_pricing_item_button]
[uix_pricing_item_detail][ul][li]Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][li]Invalid Feature Description[/li][li]Another Feature Description[/li][li]Another Feature Description[/li][/ul][/uix_pricing_item_detail]
[/uix_pricing_item]
[/uix_pricing]
&nbsp;
</pre>
                                </div>                          
                                
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-5.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-6.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
            
                       
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Accordion', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'Accordions are extremely useful for organizing and displaying large amounts of content without cluttering the page, and make it easy for the user to find what they’re looking for.', 'uix-shortcodes' ); ?>
                           <br><?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.
                            
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-9.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Transition Effect', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a Number', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>1</td>
                                                <td><?php _e( 'Controls the animation type. The following values are allowed:', 'uix-shortcodes' ); ?><code>slide</code>, <code>none</code>. </td>
                                            </tr> 
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Open The First One Automatically', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>true</td>
                                                <td><?php _e( 'When enabled, it will open the first element.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>Accordion Title</code> and <code>Accordion Content</code> within each sub-group. The textarea is supported by HTML tags.<br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.<br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-11.jpg" alt="" />
                                                </td>
                                            </tr>  
                                           
                                           
                                
                                            
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_toggle tabs='0' effect='1']
[uix_toggle_item open='true']
[uix_toggle_item_title]Accordion Title 1[/uix_toggle_item_title]
[uix_toggle_item_content open='true'][p]Accordion content 1 here.[/p][/uix_toggle_item_content]
[/uix_toggle_item]
[uix_toggle_item]
[uix_toggle_item_title]Accordion Title 2[/uix_toggle_item_title]
[uix_toggle_item_content][p]Accordion content 2 here.[/p][/uix_toggle_item_content]
[/uix_toggle_item]
[uix_toggle_item]
[uix_toggle_item_title]Accordion Title 3[/uix_toggle_item_title]
[uix_toggle_item_content][p]Accordion content 3 here.[/p][/uix_toggle_item_content]
[/uix_toggle_item]
[/uix_toggle]
&nbsp;
</pre>
                                </div>
           
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-10.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Tabs', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'Tabs allow you to organize your content and display only what is necessary at a particular moment. ', 'uix-shortcodes' ); ?>
                           <br><?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.
                            
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-12.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Transition Effect', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a Number', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>3</td>
                                                <td><?php _e( 'Controls the animation type. The following values are allowed:', 'uix-shortcodes' ); ?><code>slide</code>, <code>fade</code>, <code>none</code>.</td>
                                            </tr> 
                            
                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>Tab Title</code> and <code>Tab Content</code> within each sub-group. The textarea is supported by HTML tags.', 'uix-shortcodes' ); ?><br>
                                                <?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.<br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-14.jpg" alt="" />
                                                </td>
                                            </tr>  
                                           
                                           
                                
                                            
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_toggle style='vertical' tabs='1' effect='2']
[uix_toggle_item tabs='1']
[uix_toggle_item_title]Tab Title 1[/uix_toggle_item_title]
[uix_toggle_item_title]Tab Title 2[/uix_toggle_item_title]
[uix_toggle_item_title]Tab Title 3[/uix_toggle_item_title]
[/uix_toggle_item]
[uix_toggle_group]
[uix_toggle_item_content][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duarum enim vitarum nobis erunt instituta capienda. Tamen aberramus a proposito, et, ne longius, prorsus, inquam, Piso, si ista mala sunt, placet. Quae fere omnia appellantur uno ingenii nomine, easque virtutes qui habent, ingeniosi vocantur. Ut proverbia non nulla veriora sint quam vestra dogmata.[/p][/uix_toggle_item_content]
[uix_toggle_item_content][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duarum enim vitarum nobis erunt instituta capienda. Tamen aberramus a proposito, et, ne longius, prorsus, inquam, Piso, si ista mala sunt, placet. Quae fere omnia appellantur uno ingenii nomine, easque virtutes qui habent, ingeniosi vocantur. Ut proverbia non nulla veriora sint quam vestra dogmata. Ergo ita: non posse honeste vivi, nisi honeste vivatur? Duo Reges: constructio interrete. Obsecro, inquit, Torquate, haec dicit Epicurus? Sunt enim prima elementa naturae, quibus auctis vírtutis quasi germen efficitur.[/p][/uix_toggle_item_content]
[uix_toggle_item_content][p]Obsecro, inquit, Torquate, haec dicit Epicurus? Sunt enim prima elementa naturae, quibus auctis vírtutis quasi germen efficitur.[/p][/uix_toggle_item_content]
[/uix_toggle_group]
[/uix_toggle]

[uix_toggle  style='horizontal' tabs='1' effect='1']
[uix_toggle_item tabs='1']
[uix_toggle_item_title]Tab Title 1[/uix_toggle_item_title]
[uix_toggle_item_title]Tab Title 2[/uix_toggle_item_title]
[uix_toggle_item_title]Tab Title 3[/uix_toggle_item_title]
[/uix_toggle_item]
[uix_toggle_group]
[uix_toggle_item_content][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duarum enim vitarum nobis erunt instituta capienda. Tamen aberramus a proposito, et, ne longius, prorsus, inquam, Piso, si ista mala sunt, placet. Quae fere omnia appellantur uno ingenii nomine, easque virtutes qui habent, ingeniosi vocantur. Ut proverbia non nulla veriora sint quam vestra dogmata.[/p][/uix_toggle_item_content]
[uix_toggle_item_content][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duarum enim vitarum nobis erunt instituta capienda. Tamen aberramus a proposito, et, ne longius, prorsus, inquam, Piso, si ista mala sunt, placet. Quae fere omnia appellantur uno ingenii nomine, easque virtutes qui habent, ingeniosi vocantur. Ut proverbia non nulla veriora sint quam vestra dogmata. Ergo ita: non posse honeste vivi, nisi honeste vivatur? Duo Reges: constructio interrete. Obsecro, inquit, Torquate, haec dicit Epicurus? Sunt enim prima elementa naturae, quibus auctis vírtutis quasi germen efficitur.[/p][/uix_toggle_item_content]
[uix_toggle_item_content][p]Obsecro, inquit, Torquate, haec dicit Epicurus? Sunt enim prima elementa naturae, quibus auctis vírtutis quasi germen efficitur.[/p][/uix_toggle_item_content]
[/uix_toggle_group]
[/uix_toggle]
&nbsp;
</pre>
                                </div>
           
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-13.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.uix-list-content -->
                       
                       
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       <div class="uix-list-title"><?php _e( 'Portfolio', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode allows you to easily present portfolio section. The shortcode will display projects in different ways, depending on how you use the optional attributes to customize the portfolio layout. ', 'uix-shortcodes' ); ?><br><?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to unlimited add items.', 'uix-shortcodes' ); ?> <?php _e( 'Upload a thumbnail as cover. You can also upload a full preview image that it is an optional choice. ', 'uix-shortcodes' ); ?><?php _e( 'To set up the project destination URL by clicking ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'set up destination URL with this project', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link on the content of the popup window.', 'uix-shortcodes' ); ?><br>
                           
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-43.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-44.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                                            <tr>
                                                <td><?php _e( 'Column', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>3</td>
                                                <td><?php _e( 'Way of a grid list for presenting homogenous data and typically images. Allows 2, 3 and 4 columns across the page.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                         
                                            <tr>
                                                <td><?php _e( 'Filterable by Category', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, you can add a filterable portfolio to your site to showcase your content. If a particular category is selected, the list of projects is instantly regenerated with a new list of projects from the selected category. <br><em>Note: you need fill the <strong class="txt">"Category Name"</strong> input for per project.</em><br>', 'uix-shortcodes' ); ?>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-45.jpg" alt="" />


</td>
                                            </tr>                  
                         
                                            <tr>
                                                <td><?php _e( 'Open link in new tab', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, the project destination link to open in a new tab.', 'uix-shortcodes' ); ?>
                                                <br><em><?php _e( 'This option is valid when you use ', 'uix-shortcodes' ); ?><strong class="txt">"<?php _e( 'Destination URL', 'uix-shortcodes' ); ?>"</strong>.</em><br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-48.jpg" alt="" />
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Radius of Fillet Image', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>0</td>
                                                <td><?php _e( 'To set the fillet radius in pixels for project picture.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                         
                                            <tr>
                                                <td><?php _e( 'Class Prefix', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>uix-sc-portfolio-</td>
                                                <td><?php _e( 'Prefix string attached to the classes of all elements generated by the portfolio, the default value is ', 'uix-shortcodes' ); ?><strong>"uix-sc-portfolio-"</strong>.
                                                <br>
                                                <blockquote class="info">
<pre class="sc-code">/*-- <?php _e( 'Example generated elements class name', 'uix-shortcodes' ); ?> --*/

.<em class="normal">uix-sc-portfolio-</em>tiles { ... }
.<em class="normal">uix-sc-portfolio-</em>tiles .<em class="normal">uix-sc-portfolio-</em>item { ... }
.<em class="normal">uix-sc-portfolio-</em>tiles .<em class="normal">uix-sc-portfolio-</em>item > .<em class="normal">uix-sc-portfolio-</em>image { ... }
.<em class="normal">uix-sc-portfolio-</em>tiles .<em class="normal">uix-sc-portfolio-</em>item > .<em class="normal">uix-sc-portfolio-</em>image img { ... }
...
</pre>
</blockquote>                                          
                                                </td>
                                            </tr>     
                                            
                         

                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>Thumbnail</code>, <code>Full Preview</code>, <code>Project Title</code>, <code>Category Name</code>, <code>Description of Project</code> and <code>Destination URL</code> within each sub-group. Upload a thumbnail as cover. You can also upload a full preview image that it is an optional choice. The textarea is supported by HTML tags.<br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'You can click ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item.', 'uix-shortcodes' ); ?> <br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-47.jpg" alt="" /><br>
                                                <?php _e( 'To set up the project destination URL by clicking ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'set up destination URL with this project', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link on the content of the popup window.', 'uix-shortcodes' ); ?><br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-46.jpg" alt="" /><br>
                                                
                                                </td>
                                            </tr>  
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                             
                                <h3><?php _e( 'Example (3, 4 and 2 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_portfolio filterable='1' classprefix='uix-sc-portfolio-' col='3' imagefillet='0%']
[uix_portfolio_item type='Web Design' title='Project Title 1' image='http://your.website.com/list-demo-3.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Piso igitur hoc modo, vir optimus tuique, ut scis, amantissimus. [/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='Painting' title='Project Title 2' image='http://your.website.com/list-demo-2.jpg' fullimage='http://your.website.com/list-demo-2.jpg' target='0' url='']
[uix_portfolio_item_desc][p]The description of this project.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='Web Design' title='Project Title 3' image='http://your.website.com/list-demo-1.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]Tanti autem aderant vesicae et torminum morbi, ut nihil ad eorum magnitudinem posset accedere. Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? Atque ab isto capite fluere necesse est omnem rationem bonorum et malorum. Quia dolori non voluptas contraria est, sed doloris privatio. Invidiosum nomen est, infame, suspectum.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='' title='Project Title 4' image='http://your.website.com/list-demo-2.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]The description of this project.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='3D' title='Project Title 5' image='http://your.website.com/list-demo-3.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]anti autem aderant vesicae et torminum morbi, ut nihil ad eorum magnitudinem posset accedere. Tu autem negas fortem esse quemquam posse,[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[/uix_portfolio]


[uix_portfolio filterable='0' classprefix='uix-sc-portfolio-' col='4' imagefillet='0%']
[uix_portfolio_item type='Web Design' title='Project Title 1' image='http://your.website.com/list-demo-3.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Piso igitur hoc modo, vir optimus tuique, ut scis, amantissimus. [/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='Painting' title='Project Title 2' image='http://your.website.com/list-demo-2.jpg' fullimage='http://your.website.com/list-demo-2.jpg' target='0' url='']
[uix_portfolio_item_desc][p]The description of this project.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='Web Design' title='Project Title 3' image='http://your.website.com/list-demo-1.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]Tanti autem aderant vesicae et torminum morbi, ut nihil ad eorum magnitudinem posset accedere. Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Aut unde est hoc contritum vetustate proverbium: quicum in tenebris? Atque ab isto capite fluere necesse est omnem rationem bonorum et malorum. Quia dolori non voluptas contraria est, sed doloris privatio. Invidiosum nomen est, infame, suspectum.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='' title='Project Title 4' image='http://your.website.com/list-demo-2.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]The description of this project.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='3D' title='Project Title 5' image='http://your.website.com/list-demo-3.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]anti autem aderant vesicae et torminum morbi, ut nihil ad eorum magnitudinem posset accedere. Tu autem negas fortem esse quemquam posse,[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[/uix_portfolio]


[uix_portfolio filterable='1' classprefix='uix-sc-portfolio-' col='2' imagefillet='0%']
[uix_portfolio_item type='Web Design' title='Project Title 1' image='http://your.website.com/list-demo-3.jpg' fullimage='' target='0' url='']
[uix_portfolio_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Piso igitur hoc modo, vir optimus tuique, ut scis, amantissimus. [/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[uix_portfolio_item type='Painting' title='Project Title 2' image='http://your.website.com/list-demo-2.jpg' fullimage='http://your.website.com/list-demo-2.jpg' target='0' url='']
[uix_portfolio_item_desc][p]The description of this project.[/p][/uix_portfolio_item_desc]
[/uix_portfolio_item]
[/uix_portfolio]
&nbsp;
</pre>
                                </div>
                                             
           
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-49.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.uix-list-content -->
                         
                       
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       <div class="uix-list-title"><?php _e( 'Features Boxes', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode will add a new  features or services section from your editor toolbar.<br>
You\'ll see the best results with 2 and 3 columns when you want them evenly spaced. If you need to make a 2 column section. You can unlimited add items on the content of the popup window. Relatively speaking, make a 3 column section. Per section insert "for a maximum of 3" and you can repeat the same procedure to insert more sections.<br>', 'uix-shortcodes' ); ?>
<?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.
                            
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-15.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-20.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-16.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-21.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>Feature Title</code>, <code>Description</code> and <code>Feature Icon</code> within each sub-group, and you can create your own custom color palette. The textarea is supported by HTML tags.<br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>. <?php _e( 'Multiple items per column.<br>', 'uix-shortcodes' ); ?>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-19.jpg" alt="" />
                                                </td>
                                            </tr>  
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example (2 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_features col='2']
[uix_features_col_left]
[uix_features_item col='2' icon='binoculars' iconcolor='' titlecolor='' desccolor='']
[uix_features_item_title]Creative WordPress Theme[/uix_features_item_title]
[uix_features_item_desc][p]Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='2' icon='adjust' iconcolor='' titlecolor='' desccolor='']
[uix_features_item_title]Premium Templates[/uix_features_item_title]
[uix_features_item_desc][p]DThe first approach uses Bootstraps own offset classes so it requires no change in markup and no extra CSS. The key is to set an offset equal to half of the remaining size of the row. So for example, a column of size 2 would be centered by adding an offset of 5.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='2' icon='flask' iconcolor='' titlecolor='' desccolor='']
[uix_features_item_title]Search Engine Optimization[/uix_features_item_title]
[uix_features_item_desc][p]Aenean congue molestie sapien, nec convallis lectus interdum ut. Vestibulum facilisis, sem eu lobortis pulvinar, dui dui ornare erat, nec porta nunc quam a metus. Fusce eget consequat purus. Sed magna odio, rhoncus eget diam fermentum, mattis porttitor dolor. [/p][/uix_features_item_desc]
[/uix_features_item]
[/uix_features_col_left]
[uix_features_col_right]
[uix_features_item col='2' icon='anchor' iconcolor='' titlecolor='' desccolor='']
[uix_features_item_title]Interactive Creative[/uix_features_item_title]
[uix_features_item_desc][p]Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='2' icon='cube' iconcolor='' titlecolor='' desccolor='']
[uix_features_item_title]Multiple layouts[/uix_features_item_title]
[uix_features_item_desc][p]Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='2' icon='paper-plane-o' iconcolor='' titlecolor='' desccolor='']
[uix_features_item_title]Freebies[/uix_features_item_title]
[uix_features_item_desc][p]Nam et vestibulum odio. Aliquam auctor ac velit sit amet pretium. Maecenas pulvinar egestas rutrum. Nam et elit faucibus nunc euismod fringilla eu iaculis mi. [/p][/uix_features_item_desc]
[/uix_features_item]
[/uix_features_col_right]
[/uix_features]
&nbsp;
</pre>
                                </div>
                                
                                
                                <h3><?php _e( 'Example (3 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_features col='3']
[uix_features_item col='3' icon='binoculars' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Creative WordPress Theme[/uix_features_item_title]
[uix_features_item_desc][p]Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='anchor' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Interactive Creative[/uix_features_item_title]
[uix_features_item_desc][p]Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='adjust' iconcolor='' titlecolor='' desccolor='' last='1']
[uix_features_item_title]Premium Templates[/uix_features_item_title]
[uix_features_item_desc][p]DThe first approach uses Bootstraps own offset classes so it requires no change in markup and no extra CSS. The key is to set an offset equal to half of the remaining size of the row. So for example, a column of size 2 would be centered by adding an offset of 5.[/p][/uix_features_item_desc]
[/uix_features_item]
[/uix_features]

[uix_features col='3']
[uix_features_item col='3' icon='cubes' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Multiple layouts[/uix_features_item_title]
[uix_features_item_desc][p]Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='coffee' iconcolor='' titlecolor='' desccolor='' ]
[uix_features_item_title]Search Engine Optimization[/uix_features_item_title]
[uix_features_item_desc][p]Aenean congue molestie sapien, nec convallis lectus interdum ut. Vestibulum facilisis, sem eu lobortis pulvinar, dui dui ornare erat, nec porta nunc quam a metus. Fusce eget consequat purus. Sed magna odio, rhoncus eget diam fermentum, mattis porttitor dolor.[/p][/uix_features_item_desc]
[/uix_features_item]
[uix_features_item col='3' icon='cloud-download' iconcolor='' titlecolor='' desccolor='' last='1']
[uix_features_item_title]Freebies[/uix_features_item_title]
[uix_features_item_desc][p]Nam et vestibulum odio. Aliquam auctor ac velit sit amet pretium. Maecenas pulvinar egestas rutrum. Nam et elit faucibus nunc euismod fringilla eu iaculis mi.[br]Vitiosum est enim in dividendo partem in genere numerare. Paulum, cum regem Persem captum adduceret, eodem flumine invectio[/p][/uix_features_item_desc]
[/uix_features_item]
[/uix_features]
&nbsp;
</pre>
                                </div>      
           
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-17.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-18.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->                     
                       
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Testimonials Carousel', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode gives you ability to show your client testimonial in your web page. ', 'uix-shortcodes' ); ?>
                           <br><?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.<br>
                            
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-22.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>Avatar</code>, <code>Name</code>, <code>Position</code> and <code>Details</code> for the customer giving within each sub-group. The textarea is supported by HTML tags.<br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>.<br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-24.jpg" alt="" />
                                                </td>
                                            </tr>  
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_testimonials]
[uix_testimonials_item name='Name' avatar='http://your.website.com/demo-1.jpg' position='Position']
[uix_testimonials_item_desc][p]Enter some details for the customer giving this testimonial., E.g., Thank you from the bottom of our hearts.[/p][/uix_testimonials_item_desc]
[/uix_testimonials_item]
[uix_testimonials_item name='Name' avatar='http://your.website.com/demo-2.jpg' position='Position']
[uix_testimonials_item_desc][p]Enter some details for the customer giving this testimonial., E.g., Thank you from the bottom of our hearts.[/p][/uix_testimonials_item_desc]
[/uix_testimonials_item]
[/uix_testimonials]
&nbsp;
</pre>
                                </div>
                                
                                    
           
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-23.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       <div class="uix-list-title"><?php _e( 'Team', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode allows you to easily present your team members. You\'ll see the best results with fullwidth, 2, 3 and 4 columns when you want them evenly spaced. <br>', 'uix-shortcodes' ); ?><?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to unlimited add items. Upload an avatar and write a short bio so members can get a better feel for who you are and what you\'re about.', 'uix-shortcodes' ); ?> <?php _e( 'To set up the member social media links by clicking', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'set up links with social network', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link on the content of the popup window.', 'uix-shortcodes' ); ?><br>
                           
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-25.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-26.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-27.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-28.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>

                         
                                            <tr>
                                                <td><?php _e( 'Column', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>4</td>
                                                <td><?php _e( 'Way of a grid list for presenting homogenous data and typically images. Allows 2, 3 and 4 columns across the page.', 'uix-shortcodes' ); ?></td>
                                            </tr>

                         
                                            <tr>
                                                <td><?php _e( 'Radius of Fillet Avatar', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>0</td>
                                                <td><?php _e( 'To set the fillet radius in pixels for avatar photo.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                         
                                            
                                            <tr>
                                                <td><?php _e( 'Height of Grid', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>0</td>
                                                <td><?php _e( 'Set height of grid so that it will fit its avatar photo. Browsers use a default stylesheet to render webpages if the value is <code>0</code>.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                                
                            
                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>Avatar</code>, <code>Name</code>, <code>Position</code>, <code>Introduction</code> and <code>Social Network</code> of your team member within each sub-group. The textarea is supported by HTML tags.<br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>. <br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-29.jpg" alt="" /><br>
                                                <?php _e( 'To set up the member social media links by clicking ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'set up links with social network', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link on the content of the popup window.<br>', 'uix-shortcodes' ); ?>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-30.jpg" alt="" /><br>
                                                
                                                </td>
                                            </tr>  
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example (fullwidth)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_team col='fullwidth' avatarfillet='0%' gray='true']
[uix_team_item col='fullwidth' name='Jone Smmith' avatar='http://your.website.com/demo-1.jpg' position='CEO' social_1='twitter|#' social_2='facebook|#' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. Ergo hoc quidem apparet, nos ad agendum esse natos.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='fullwidth' name='Donny Kiu' avatar='http://your.website.com/demo-2.jpg' position='Photographer' social_1='twitter|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. Ergo hoc quidem apparet, nos ad agendum esse natos. Utrum igitur tibi litteram videor an totas paginas commovere? Duo Reges: constructio interrete.[/p][p]Estne, quaeso, inquam, sitienti in bibendo voluptas? Nos commodius agimus. Semper enim ex eo, quod maximas partes continet latissimeque funditur, tota res appellatur. At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? Immo vero, inquit, ad beatissime vivendum parum est, ad beate vero satis. Itaque in rebus minime obscuris non multus est apud eos disserendi labor. Haec bene dicuntur, nec ego repugno, sed inter sese ipsa pugnant. Non autem hoc: igitur ne illud quidem.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='fullwidth' name='Doky' avatar='http://your.website.com/demo-3.jpg' position='Andriod Developer' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]The Introduction of this member.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='fullwidth' name='Haec Linla' avatar='http://your.website.com/demo-4.jpg' position='UI Designer' social_1='facebook|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. [/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='fullwidth' name='Tery David' avatar='http://your.website.com/demo-5.jpg' position='Andriod Developer' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. [/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='fullwidth' name='Jimmy' avatar='http://your.website.com/demo-6.jpg' position='Photographer' social_1='twitter|#' social_2='git|#' social_3='linkedin|#']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. [br]Ergo hoc quidem apparet, nos ad agendum esse natos. Utrum igitur tibi litteram videor an totas paginas commovere? Duo Reges: constructio interrete.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='fullwidth' name='You are here' avatar='' position='Position' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]The Introduction of this member.[/p][/uix_team_item_desc]
[/uix_team_item]
[/uix_team]
&nbsp;
</pre>
                                </div>
                                
                                <h3><?php _e( 'Example (4, 3 and 2 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_team col='4' avatarfillet='0%' gray='true']
[uix_team_item col='4' name='Jone Smmith' avatar='http://your.website.com/demo-1.jpg' position='CEO' social_1='twitter|#' social_2='facebook|#' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Donny Kiu' avatar='http://your.website.com/demo-2.jpg' position='Photographer' social_1='twitter|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Doky' avatar='http://your.website.com/demo-3.jpg' position='Andriod Developer' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]The Introduction of this member.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Haec Linla' avatar='http://your.website.com/demo-4.jpg' position='UI Designer' social_1='facebook|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. [/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Tery David' avatar='http://your.website.com/demo-5.jpg' position='Andriod Developer' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. [/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='Jimmy' avatar='http://your.website.com/demo-6.jpg' position='Photographer' social_1='twitter|#' social_2='git|#' social_3='linkedin|#']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='4' name='You are here' avatar='' position='Position' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]The Introduction of this member.[/p][/uix_team_item_desc]
[/uix_team_item]
[/uix_team]

[uix_team col='3' avatarfillet='0%' gray='false']
[uix_team_item col='3' name='Jone Smmith' avatar='http://your.website.com/demo-1.jpg' position='CEO' social_1='twitter|#' social_2='facebook|#' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='3' name='Donny Kiu' avatar='http://your.website.com/demo-2.jpg' position='Photographer' social_1='twitter|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='3' name='Doky' avatar='http://your.website.com/demo-3.jpg' position='Andriod Developer' social_1='|' social_2='|' social_3='|']
[uix_team_item_desc][p]The Introduction of this member.[/p][/uix_team_item_desc]
[/uix_team_item]
[/uix_team]

[uix_team col='2' avatarfillet='0%' gray='false']
[uix_team_item col='2' name='Jone Smmith' avatar='http://your.website.com/demo-1.jpg' position='CEO' social_1='twitter|#' social_2='facebook|#' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles.[/p][/uix_team_item_desc]
[/uix_team_item]
[uix_team_item col='2' name='Donny Kiu' avatar='http://your.website.com/demo-2.jpg' position='Photographer' social_1='twitter|#' social_2='|' social_3='|']
[uix_team_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/p][/uix_team_item_desc]
[/uix_team_item]
[/uix_team]
&nbsp;
</pre>
                                </div>
                                             
           
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-32.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-31.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs --> 
                       
                       </div><!-- /.uix-list-content -->
                       
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       <div class="uix-list-title"><?php _e( 'List Of Clients', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode allows you to add a new client section of 3 or 4 column. Per section insert "for a maximum of 3 or 4" and you can repeat the same procedure to insert more sections. ', 'uix-shortcodes' ); ?><br><?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to unlimited add items.', 'uix-shortcodes' ); ?>
                           
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-33.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-34.jpg" alt="" />
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'List Item', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Group', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Per group contains <code>LOGO</code> and <code>Introduction</code> of your client member within each sub-group. The textarea is supported by HTML tags.<br>', 'uix-shortcodes' ); ?>
                                                <?php _e( 'You can click', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click here to add an item', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button to add a new item', 'uix-shortcodes' ); ?>. <?php _e( 'Multiple items per column.<br>', 'uix-shortcodes' ); ?>
                                                <img src="<?php echo $imgpath; ?>sc-preview-content-35.jpg" alt="" />
                                                
                                                
                                                </td>
                                            </tr>  
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example (3 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_client]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-1.jpg' ]
[uix_client_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. Quamquam te quidem video minime esse deterritum. Ita multa dicunt, quae vix intellegam. Ergo hoc quidem apparet, nos ad agendum esse natos.[/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-2.jpg' ]
[uix_client_item_desc][p]Estne, quaeso, inquam, sitienti in bibendo voluptas? Nos commodius agimus. Semper enim ex eo, quod maximas partes continet latissimeque funditur, tota res appellatur. At quicum ioca seria, ut dicitur, quicum arcan.[/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-3.jpg' last='1']
[uix_client_item_desc][p]Ergo hoc quidem apparet, nos ad agendum esse natos. Ego quoque, inquit, didicerim libentius si quid attuleris, quam te reprehenderim. Videamus igitur sententias eorum, tum ad verba redeamus. [/p][/uix_client_item_desc]
[/uix_client_item]
[/uix_client]

[uix_client]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-4.jpg' ]
[uix_client_item_desc][p] Videamus igitur sententias eorum, tum ad verba redeamus. Incommoda autem et commoda-ita enim estmata et dustmata appello-communia esse voluerunt.[/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-5.jpg' ]
[uix_client_item_desc][p]Dic in quovis conventu te omnia facere, ne doleas. Eadem fortitudinis ratio reperietur. Huic mori optimum esse propter desperationem sapientiae, illi propter spem vivere. [/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-6.jpg' last='1']
[uix_client_item_desc][p]Estne, quaeso, inquam, sitienti in bibendo voluptas? Nos commodius agimus. Semper enim ex eo, quod maximas partes continet latissimeque funditur, tota res appellatur. At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia?[/p][/uix_client_item_desc]
[/uix_client_item]
[/uix_client]

[uix_client]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-7.jpg' ]
[uix_client_item_desc][p]Ergo hoc quidem apparet, nos ad agendum esse natos. Ego quoque, inquit, didicerim libentius si quid attuleris, quam te reprehenderim. [/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='3' logo='http://your.website.com/demo-logo-8.jpg' ]
[uix_client_item_desc][p]Videamus igitur sententias eorum, tum ad verba redeamus. Incommoda autem et commoda-ita enim estmata et dustmata appello-communia esse voluerunt, paria noluerunt. Suo genere perveniant ad extremum.[/p][/uix_client_item_desc]
[/uix_client_item]
[/uix_client]
&nbsp;
</pre>
                                </div>
                                
                                <h3><?php _e( 'Example (4 col)', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_client]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-1.jpg' ]
[uix_client_item_desc][p]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sin aliud quid voles, postea. [/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-2.jpg' ]
[uix_client_item_desc][p]Estne, quaeso, inquam, sitienti in bibendo voluptas? Nos commodius agimus.[/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-3.jpg']
[uix_client_item_desc][p]Ergo hoc quidem apparet, nos ad agendum esse natos. Ego quoque, inquit, didicerim libentius si quid attuleris. [/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-4.jpg' last='1']
[uix_client_item_desc][p] Videamus igitur sententias eorum, tum ad verba redeamus. [/p][/uix_client_item_desc]
[/uix_client_item]
[/uix_client]
[uix_client]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-5.jpg' ]
[uix_client_item_desc][p]Dic in quovis conventu te omnia facere, ne doleas. Eadem fortitudinis ratio reperietur. [/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-6.jpg']
[uix_client_item_desc][p]At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia?[/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-7.jpg' ]
[uix_client_item_desc][p]Ergo hoc quidem apparet, nos ad agendum esse natos. [/p][/uix_client_item_desc]
[/uix_client_item]
[uix_client_item col='4' logo='http://your.website.com/demo-logo-8.jpg' last='1']
[uix_client_item_desc][p]Videamus igitur sententias eorum, tum ad verba redeamus. [/p][/uix_client_item_desc]
[/uix_client_item]
[/uix_client]
&nbsp;
</pre>
                                </div>
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-36.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-37.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs --> 
                       
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Responsive Video', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode allows you to add a responsive video. Here you can enter your video links. You can link videos from YouTube or Vimeo, or alternatively, host your own videos. If you decide to self-host your video files, you need to upload the video files via the Media section, and then enter the path to your video files in the corresponding fields. We recommend uploading videos in all three formats (WEBM, MP4, and OGV) in order to ensure compatibility with all modern browsers. In the Video Image field you can upload a background image that will be visible while the video is loading.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-38.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                              
                                            <tr>
                                                <td><?php _e( 'Video URL', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'The video\'s URL from your web browser\'s address bar. <br>e.g.,<strong>https://www.youtube.com/watch?v=abc</strong>', 'uix-shortcodes' ); ?></td>
                                            </tr>                            
                            
                            
                                            <tr>
                                                <td><?php _e( 'Display Width (px)', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>560</td>
                                                <td><?php _e( 'Defines width of the media. ', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                           
                                            <tr>
                                                <td><?php _e( 'Display Height (px)', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>315</td>
                                                <td><?php _e( 'Defines height of the media. ', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Responsive of Display', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>true</td>
                                                <td><?php _e( 'When enabled, using responsive video embedding.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                            
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_video width='560' height='315' responsive='true' url='https://www.youtube.com/watch?v=5_pMx7IjYKE']
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-39.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Audio', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode allows you to add a audio. You can paste the URL of SoundCloud or Audiomack, .mp3, .ogg format, and so on.', 'uix-shortcodes' ); ?>
                           <blockquote class="alert"><?php _e( 'If you are using SoundCloud or Audiomack, the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'Enable SoundCloud', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox should be checked on the content of the popup window.', 'uix-shortcodes' ); ?></blockquote>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-40.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                              
                                            <tr>
                                                <td><?php _e( 'Audio URL', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'The MP3 audio URL. <br>e.g.,<strong>http://example.com/my-audiofile.mp3</strong>', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Enable SoundCloud', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'Add Soundcloud audio format support to your WordPress site.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                                            <tr>
                                                <td><?php _e( 'Player Width (%)', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>100</td>
                                                <td><?php _e( 'It will determine the width of the player in pixels or relative percentage to the parent container. There are two types of length units: <code>%</code> and <code>px</code>.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                           
                                            <tr>
                                                <td><?php _e( 'Player Height (px)', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>150</td>
                                                <td><?php _e( 'It will determine the height of the player in pixels or relative percentage to the parent container. ', 'uix-shortcodes' ); ?><br><em><?php _e( 'This is an invalid option if the ', 'uix-shortcodes' ); ?><strong class="txt">"<?php _e( 'Enable SoundCloud', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox is <strong>unchecked</strong>', 'uix-shortcodes' ); ?>.</em></td>
                                            </tr>  
                                                                      
                            
                                            <tr>
                                                <td><?php _e( 'Autoplay', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, the audio will begin to play once it is ready. ', 'uix-shortcodes' ); ?><br><em><?php _e( 'This is an invalid option if the ', 'uix-shortcodes' ); ?><strong class="txt">"<?php _e( 'Enable SoundCloud', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox is <strong>checked</strong>', 'uix-shortcodes' ); ?>.</em></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Loop', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, the audio will loop and play again once it has finished.', 'uix-shortcodes' ); ?> <br><em><?php _e( 'This is an invalid option if the ', 'uix-shortcodes' ); ?><strong class="txt">"<?php _e( 'Enable SoundCloud', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox is <strong>checked</strong>', 'uix-shortcodes' ); ?>.</em></td>
                                            </tr>
                                            
                                         
                                            
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_audio width='100%' height='150' soundcloud='true' autoplay='null' loop='null' url='https://soundcloud.com/globalmusic/klpetaltothemaxx']

[uix_audio width='100%' height='null' soundcloud='false' autoplay='true' loop='false' url='https://audio-download.ngfiles.com/678000/678361_Fall-Ft-Steklo.mp3']
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-41.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-content-42.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       </div><!-- /.uix-list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                   
  
     

                    </div> <!-- /.uix-documentation-content -->
                </li>        
                          
           


                <li>
                    <h2><?php _e( 'Column Builder', 'uix-shortcodes' ); ?></h2>
                   
                   <div class="uix-documentation-content" >
  
                           <p><?php _e( 'Uix Shortcodes plugin comes with 7 sample columns. You can use the layout of columns shortcode to create a beautiful showcase. Click shortcodes and add your columns types. After that add your content or other shortcode in columns tag <code>[uix_column] ... [/uix_column]</code>.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-1.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'Padding (px)', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>padding-top:<code>20</code>px<br>padding-bottom:<code>20</code>px<br>padding-left:<code>0</code><br>padding-right:<code>0</code><br></td>
                                                <td><?php _e( 'Use the input fields below to customize the padding of your column shortcode. Measurement units is pixels (px).', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                           
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='3']
&lt;h4&gt;One Fourth (1)&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='3']
&lt;h4&gt;One Fourth (2)&lt;/h4&gt;
Aliquam congue dignissim tellus, vel eleifend urna rutrum nec. Morbi et mauris vitae quam venenatis imperdiet. Proin et rutrum magna. Nulla sed venenatis leo. Suspendisse potenti. Proin faucibus cursus luctus.

[/uix_column]
[uix_column grid='3']
&lt;h4&gt;One Fourth (3)&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='3' last='1']
&lt;h4&gt;One Fourth (4)&lt;/h4&gt;
Morbi et mauris vitae quam venenatis imperdiet. Proin et rutrum magna. Nulla sed venenatis leo. Suspendisse potenti. Proin faucibus cursus luctus.

[/uix_column]
[/uix_column_wrapper]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='4']
&lt;h4&gt;One Third&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='4']
&lt;h4&gt;One Third&lt;/h4&gt;
Aliquam congue dignissim tellus, vel eleifend urna rutrum nec. Morbi et mauris vitae quam venenatis imperdiet. Proin et rutrum magna. Nulla sed venenatis leo. Suspendisse potenti. Proin faucibus cursus luctus.

[/uix_column]
[uix_column grid='4' last='1']
&lt;h4&gt;One Third&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[/uix_column_wrapper]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='6']
&lt;h4&gt;One Half&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='6' last='1']
&lt;h4&gt;One Half&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[/uix_column_wrapper]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='3']
&lt;h4&gt;One Third&lt;/h4&gt;
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='9' last='1']
&lt;h4&gt;Two Third&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[/uix_column_wrapper]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='9']
&lt;h4&gt;Two Third&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='3' last='1']
&lt;h4&gt;One Third&lt;/h4&gt;
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[/uix_column_wrapper]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='4']
&lt;h4&gt;One Fourth&lt;/h4&gt;
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='8' last='1']
&lt;h4&gt;Three Fourth&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[/uix_column_wrapper]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='8']
&lt;h4&gt;Three Fourth&lt;/h4&gt;
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a mi ac diam varius commodo sit amet a eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[uix_column grid='4' last='1']
&lt;h4&gt;One Fourth&lt;/h4&gt;
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

[/uix_column]
[/uix_column_wrapper]
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-2.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-3.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-4.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-5.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-6.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-7.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-col-8.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->

                    </div> <!-- /.uix-documentation-content -->
                </li>          
                
                
                
                <li>
                  
                    <h2><?php _e( 'Web Elements Builder', 'uix-shortcodes' ); ?></h2>
                 
                   <div class="uix-documentation-content" >
  
                       <div class="uix-list-title"><?php _e( 'Buttons', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode enables you to add flat buttons to all of your posts and/or pages.<br>', 'uix-shortcodes' ); ?>
                           <?php _e( 'To set up the more properties by clicking', 'uix-shortcodes' ); ?> <strong>"<?php _e( 'click on the set more attributes', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button on the content of the popup window.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-10.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-12.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'Button Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-13.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the button. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>  
                                            
                            
                                            <tr>
                                                <td><?php _e( 'Text Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-15.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the text. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Link Text', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Link to', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'That is the text you would like displayed on the button.', 'uix-shortcodes' ); ?></td>
                                            </tr>     
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Destination URL', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'A destination link for the button.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                                 
                                            
                                            <tr>
                                                <td><?php _e( 'Fillet Radius', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>50</td>
                                                <td><?php _e( 'To set the fillet radius in pixels for button appearance.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Open link in new tab', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, the button link to open in a new tab.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                             
                              
                               
                                            <tr>
                                                <td colspan="4">
                                                <p>
                                                <?php _e( 'To set up the following properties by clicking', 'uix-shortcodes' ); ?> <strong class="txt">"<?php _e( 'click on the set more attributes', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'button.', 'uix-shortcodes' ); ?>
                                                </p>
                                           
                                               </td>
                                            </tr>                              
                              
                              
                                            <tr>
                                                <td><?php _e( 'Icon\'s Name', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>-</td>
                                                <td><?php _e( 'Returns the Font Awesome library for each icon\'s', 'uix-shortcodes' ); ?> <strong>"fa-"</strong> <?php _e( 'suffix text.', 'uix-shortcodes' ); ?> <?php _e( 'Like this:', 'uix-shortcodes' ); ?> <code>&lt;i class="fa fa-*"&gt;&lt;/i&gt;</code> <br><?php _e( 'Note: that will be pure text button if icon does not choose.', 'uix-shortcodes' ); ?>
                                                
</td>
                                            </tr> 
                           
                                            <tr>
                                                <td><?php _e( 'Font-Size for Button', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>12</td>
                                                <td><?php _e( 'The font size of button in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                           
                                            <tr>
                                                <td><?php _e( 'Letter Spacing', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>2</td>
                                                <td><?php _e( 'The letter spacing of button in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                                
                           
                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='3' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Small[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='2' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Medium[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Large[/uix_button]
[uix_button icon='briefcase' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Icon Button[/uix_button]
[uix_button icon='briefcase' fontsize='16px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Icon Button[/uix_button]

[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='0' paddingspacing='3' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Small[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='0' paddingspacing='2' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Medium[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='0' paddingspacing='1' target='0' bgcolor='green' txtcolor='#ffffff' url='#']Large[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='0' paddingspacing='1' target='0' bgcolor='green' txtcolor='rgb(255, 246, 26)' url='#'][uix_icons size='16' units='px' color='rgb(255, 246, 26)' name='anchor']Custom Icon[/uix_button]
[uix_button icon='' fontsize='16px' letterspacing='2px' fillet='0' paddingspacing='1' target='0' bgcolor='green' txtcolor='#333' url='#'][uix_icons size='16' units='px' color='#333' name='anchor']Custom Icon[/uix_button]

[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='3' target='0' bgcolor='red' txtcolor='#ffffff' url='#']RED[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='2' target='0' bgcolor='yellow' txtcolor='#ffffff' url='#']ORANGE[/uix_button]
[uix_button icon='' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='darkblue' txtcolor='#ffffff' url='#']DARKBLUE[/uix_button]
[uix_button icon='briefcase' fontsize='12px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='cadetblue' txtcolor='#ffffff' url='#']CADETBLUE  BUTTON[/uix_button]
[uix_button icon='briefcase' fontsize='16px' letterspacing='2px' fillet='50px' paddingspacing='1' target='0' bgcolor='black' txtcolor='#ffffff' url='#']BLACK BUTTON[/uix_button]
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-11.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-18.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       </div><!-- /.list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
     
     
                       <div class="uix-list-title"><?php _e( 'Google Maps', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'You can use this shortcode to display a Google Map anywhere on the page. Customize the style of your map if you like. It provides a variety of out-of-the-box image styles to choose from. And you can upload a custom marker icon.', 'uix-shortcodes' ); ?>
                           <blockquote class="note">
                           <?php _e( 'Get Latitude and Longitude:', 'uix-shortcodes' ); ?>  &rarr; <a href="http://www.latlong.net/" target="_blank"><?php _e( 'Get Latitude Longitude', 'uix-shortcodes' ); ?></a>
                           </blockquote>
                           
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-19.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                            <tr>
                                                <td><?php _e( 'Map Style', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-21.jpg" alt="" /></td>
                                                <td><?php _e( 'Create your own Google Maps style.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                            
                                            <tr>
                                                <td><?php _e( 'Map Width', 'uix-shortcodes' ); ?> (%)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>100</td>
                                                <td><?php _e( 'It will determine the width of the map in pixels or relative percentage. There are two types of length units:', 'uix-shortcodes' ); ?> <code>%</code> and <code>px</code>.</td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Map Height', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>285</td>
                                                <td><?php _e( 'Defines height of the map in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                            
                                            
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Place Name', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Link to', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Input an address to show on the map.', 'uix-shortcodes' ); ?></td>
                                            </tr>     
                                            
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Latitude', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>37.7770776</td>
                                                <td><?php _e( 'Input a separate latitude value.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Longitude', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>-122.4414289</td>
                                                <td><?php _e( 'Input a separate longitude value.', 'uix-shortcodes' ); ?></td>
                                            </tr>     
                           
                                            <tr>
                                                <td><?php _e( 'Zoom', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>14</td>
                                                <td><?php _e( 'Map scale at various zoom levels.', 'uix-shortcodes' ); ?></td>
                                            </tr>                         
                           
                                            <tr>
                                                <td><?php _e( 'Marker', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>/wp-content/plugins/uix-shortcodes/assets/images/map/map-location.png<br><img src="<?php echo $imgpath; ?>sc-preview-elements-22.jpg" alt="" /></td>
                                                <td><?php _e( 'Custom a pin (location marker) to be used on the map.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
                                            
                                                                          
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_map style='normal' width='100%' height='285px' latitude='37.7770776' longitude='-122.4414289' zoom='14' name='SEO San Francisco, CA, Gough Street, San Francisco, CA' marker='http://your.website.com/map-location.png' ]

[uix_map style='dark-blue' width='100%' height='285px' latitude='37.7770776' longitude='-122.4414289' zoom='14' name='SEO San Francisco, CA, Gough Street, San Francisco, CA' marker='http://your.website.com/map-location.png' ]
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-20.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       
                       </div><!-- /.list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Special Heading', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode lets you add a special heading into your page.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-23.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-28.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-24.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                           
                                            <tr>
                                                <td><?php _e( 'Title', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Text Here', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'The heading title.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Choose Title Style', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-26.jpg" alt="" /></td>
                                                <td><?php _e( 'Using background clip for text with CSS fallback if select the first one. You can select a background image from the WordPress Media Library, could also upload a new image.', 'uix-shortcodes' ); ?><br>
                                                <img src="<?php echo $imgpath; ?>sc-preview-elements-33.jpg" alt="" />
                                                </td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Size', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>52</td>
                                                <td><?php _e( 'The heading size in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Heading Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>-</td>
                                                <td><?php _e( 'Set a color for the heading. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. Browsers use a default stylesheet to render webpages if the value is empty. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>  
                                            

                                            <tr>
                                                <td><?php _e( 'Alignment', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>center</td>
                                                <td><?php _e( 'Specifies the horizontal alignment of text in an element. The following values are allowed:', 'uix-shortcodes' ); ?><code>left</code>, <code>center</code>, <code>right</code>.</td>
                                            </tr> 
                                            
                                            <tr>
                                                <td><?php _e( 'Letter Spacing', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>2</td>
                                                <td><?php _e( 'The letter spacing of heading in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Uppercase of Text', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>true</td>
                                                <td><?php _e( 'When enabled, controls text to upper case.', 'uix-shortcodes' ); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td><?php _e( 'Underline', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, it will add a horizontal line for heading.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                                            
                                            <tr>
                                                <td colspan="4">
                                                <p>
                                                <?php _e( 'To set up the following properties, the', 'uix-shortcodes' ); ?> <strong class="txt">"<?php _e( 'Underline', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox should be checked.', 'uix-shortcodes' ); ?>
                                                </p>
                                             
                                               </td>
                                            </tr>        
                                            
                                            <tr>
                                                <td><?php _e( 'Line Width', 'uix-shortcodes' ); ?> (%)<span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Underline', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>100</td>
                                                <td><?php _e( 'It will determine the width of the horizontal line in pixels to the heading. There are two types of length units: ', 'uix-shortcodes' ); ?><code>%</code> and <code>px</code>.</td>
                                            </tr>    
                                            
                                            <tr>
                                                <td><?php _e( 'Line Height', 'uix-shortcodes' ); ?> (px)<span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Underline', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>1</td>
                                                <td><?php _e( 'It will determine the height of the horizontal line in pixels to the heading.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                                       
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Description', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?></td>
                                                <td>false</td>
                                                <td><?php _e( 'When enabled, you can set more properties for Description.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                            
                                            
                                            <tr>
                                                <td colspan="4">
                                                <p>
                                                <?php _e( 'To set up the following properties, the ', 'uix-shortcodes' ); ?><strong class="txt">"<?php _e( 'Description', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'checkbox should be checked.', 'uix-shortcodes' ); ?>
                                                </p>
                                    
                                               </td>
                                            </tr>                              
                                   
                                            
                                            <tr>
                                                <td>D<?php _e( 'isplayed Text', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Description', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Some relevant text for the heading.', 'uix-shortcodes' ); ?></td>
                                            </tr>     
                                            
                                            <tr>
                                                <td><?php _e( 'Font Size', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Description', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>12</td>
                                                <td><?php _e( 'The description font size in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Description Color', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Description', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>-</td>
                                                <td><?php _e( 'Set a color for the description of heading. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. Browsers use a default stylesheet to render webpages if the value is empty. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>  
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Opacity', 'uix-shortcodes' ); ?><span class="depend"><?php _e( 'depends on', 'uix-shortcodes' ); ?> <code><?php _e( 'Description', 'uix-shortcodes' ); ?></code> <?php _e( 'option', 'uix-shortcodes' ); ?></span></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>65%</td>
                                                <td><?php _e( 'The description transparency. It inherits the color of the heading in order that showes the difference between them two.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                   
                                            

                                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_heading color='' style='grand-fill-yellow' align='center' size='52px' uppercase='true' spacing='2px' fillbg='']No change test[/uix_heading][uix_heading_line line='false' width='100%' height='1px']

[uix_heading color='' style='grand' align='center' size='52px' uppercase='true' spacing='2px' fillbg='']No background[/uix_heading][uix_heading_line line='false' width='100%' height='1px']

[uix_heading color='' style='grand-fill-yellow' align='center' size='52px' uppercase='true' spacing='2px' fillbg='']Background + Desc[/uix_heading][uix_heading_sub color='' align='center' size='12px' uppercase='true' spacing='2px' opacity='65'][p]This is a description for heading. do you like it?[/p][/uix_heading_sub][uix_heading_line line='true' width='35%' height='4px']





[uix_heading color='' style='grand-fill-yellow' align='left' size='52px' uppercase='true' spacing='2px' fillbg='http://your.website.com/text-fill2.jpg']Left Background Text[/uix_heading][uix_heading_sub color='' align='left' size='12px' uppercase='true' spacing='2px' opacity='65'][p]This is a description for heading. Do you like it?[/p][/uix_heading_sub][uix_heading_line line='true' width='100%' height='1px']

[uix_heading color='' style='grand' align='left' size='52px' uppercase='true' spacing='2px' fillbg='']Left Text[/uix_heading][uix_heading_sub color='' align='left' size='12px' uppercase='true' spacing='2px' opacity='65'][p]This is a description for heading. Do you like it?[/p][/uix_heading_sub][uix_heading_line line='true' width='100%' height='3px']

[uix_heading color='#DD514C' style='grand' align='left' size='52px' uppercase='true' spacing='2px' fillbg='']Red text[/uix_heading][uix_heading_sub color='#d59a3e' align='left' size='12px' uppercase='true' spacing='2px' opacity='65'][p]This is a description for heading. Do you like it?[/p][/uix_heading_sub][uix_heading_line line='true' width='100%' height='1px']

[uix_heading color='' style='grand' align='left' size='52px' uppercase='false' spacing='2px' fillbg='']Normal case[/uix_heading][uix_heading_sub color='' align='left' size='12px' uppercase='false' spacing='2px' opacity='65'][p]This is a description for heading. do you like it?[/p][/uix_heading_sub][uix_heading_line line='true' width='100%' height='1px']
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-25.jpg" alt="" />
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-27.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       
                       </div><!-- /.list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Icons', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode implements the Font Awesome icon font in WordPress through shortcodes. Add icons in the form of single icons, sets, lists, buttons and more. Icons are added using the Font Awesome library as well as extra icons added to supplement this library. The examples below show the usage for each method and the resulting image style.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-2.jpg" alt="" />
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-4.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                              
                                            <tr>
                                                <td><?php _e( 'Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-1.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the icon. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>  
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Icon\'s Name', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>-</td>
                                                <td><?php _e( 'Returns the Font Awesome library for each icon\'s', 'uix-shortcodes' ); ?> <strong>"fa-"</strong> <?php _e( 'suffix text.', 'uix-shortcodes' ); ?> <?php _e( 'Like this:', 'uix-shortcodes' ); ?> <code>&lt;i class="fa fa-*"&gt;&lt;/i&gt;</code>
</td>
                                            </tr> 
                                            
                                            <tr>
                                                <td><?php _e( 'Size', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>14</td>
                                                <td><?php _e( 'The icon size in pixels.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                           
                                        
                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_icons size='14' units='px' color='#333333' name='area-chart']
[uix_icons size='34' units='px' color='#333333' name='area-chart']
[uix_icons size='54' units='px' color='#333333' name='area-chart']
[uix_icons size='74' units='px' color='#333333' name='area-chart']

[uix_icons size='14' units='px' color='#a2bf2f' name='briefcase']
[uix_icons size='34' units='px' color='#daa520' name='briefcase']
[uix_icons size='54' units='px' color='#4BB1CF' name='briefcase']
[uix_icons size='74' units='px' color='#dc143c' name='briefcase']
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-3.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->                    
                       
                       </div><!-- /.list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Progress Bar', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode allows you add progress bars. Choose unlimited colors for each individual progress segment. Animate the segment and/or text. Customize any sizes. It is great for displaying varying types of data and content to your viewers. The progress bar include Circular and Square types for easy customization.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-34.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                                                
                    
                                           
                                            <tr>
                                                <td><?php _e( 'Choose Style', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>circular</td>
                                                <td><?php _e( 'You can choose vertical tabs or horizontal tabs. ', 'uix-shortcodes' ); ?><?php _e( 'The following values are allowed:', 'uix-shortcodes' ); ?> <code>circular</code>, <code>square</code>.</td>
                                            </tr>  
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Bar Size', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>120</td>
                                                <td><?php _e( 'Size of the bar in px.', 'uix-shortcodes' ); ?></td>
                                            </tr>      
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Percent', 'uix-shortcodes' ); ?> (%)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>75</td>
                                                <td><?php _e( 'The percent number the progress bar should have. Should be a number from 0 – 100.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                            
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Percentage & Icon Size', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>12</td>
                                                <td><?php _e( 'Size of the percentage or icon in px.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                    
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Line Width', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>3</td>
                                                <td><?php _e( 'Width of the bar line in px.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                              
                                            
                                            <tr>
                                                <td><?php _e( 'Icon', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Boolean', 'uix-shortcodes' ); ?> & <?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Using Icon instead of percentage. Default value is empty.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
                                            
                                              
                                            
                                            <tr>
                                                <td><?php _e( 'Bar Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-13.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the bar. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>  
                                   
                                           
                                            <tr>
                                                <td><?php _e( 'Track Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-32.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the track for the bar. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>                       
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Percentage & Icon Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-1.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the displayed percentage or icon. ', 'uix-shortcodes' ); ?><?php _e( 'You can add a custom color with color palette. ', 'uix-shortcodes' ); ?><?php _e( 'Click on the ', 'uix-shortcodes' ); ?><strong>"<?php _e( 'other color', 'uix-shortcodes' ); ?>"</strong> <?php _e( 'link at the bottom of the color selector.', 'uix-shortcodes' ); ?><br><img src="<?php echo $imgpath; ?>sc-preview-other-color.jpg" alt="" /></td>
                                            </tr>                       
                                                                       
      
                                            
                                            <tr>
                                                <td><?php _e( 'Title', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'The progress bar\'s title/name. Could be left blank.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
      
                                            <tr>
                                                <td><?php _e( 'Description', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'The progress bar\'s description. Could be left blank.', 'uix-shortcodes' ); ?></td>
                                            </tr>   
                                                   
                                            <tr>
                                                <td><?php _e( 'Displayed Units', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>%</td>
                                                <td><?php _e( 'The progress bar\'s displayed units. Could be left blank.', 'uix-shortcodes' ); ?></td>
                                            </tr>                                                   
                                                      
                                                      
                                            <tr>
                                                <td><?php _e( 'Margin', 'uix-shortcodes' ); ?> (px)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>margin-top:<code>25</code>px<br>margin-bottom:<code>0</code>px<br>margin-left:<code>25</code><br>margin-right:<code>25</code><br> </td>
                                                <td><?php _e( 'Use the input fields below to customize the margin of progress bar.', 'uix-shortcodes' ); ?></td>
                                            </tr>           
                                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_progress_bar barcolor='#a2bf2f' trackcolor='#f1f1f1' preccolor='#473f3f' size='120px' shape='circular' percent='75' units='%' linewidth='3' precsize='12px' title='' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_progress_bar barcolor='#a2bf2f' trackcolor='#dcdcdc' preccolor='#bebebe' size='120px' shape='circular' percent='55' units='%' linewidth='3' precsize='12px' title='Web Design' top='25' bottom='0' left='25' right='25' ][p]This is a description.[/p][/uix_progress_bar]

[uix_progress_bar barcolor='#daa520' trackcolor='#f1f1f1' preccolor='#473f3f' size='200px' shape='circular' percent='66' units='%' linewidth='8' precsize='28px' title='Clock' icon='clock-o'][/uix_progress_bar]

[uix_progress_bar barcolor='#dc143c' trackcolor='#f1f1f1' preccolor='#473f3f' size='120px' shape='circular' percent='75' units='%' linewidth='8' precsize='18px' title='Shop' icon='cart-plus'][/uix_progress_bar]

[uix_progress_bar barcolor='#dc143c' trackcolor='#dcdcdc' preccolor='#bebebe' size='120px' shape='circular' percent='100' units='%' linewidth='3' precsize='12px' title='Painter' top='25' bottom='0' left='25' right='25' ][p]This is a description.[/p][/uix_progress_bar]

[uix_progress_bar barcolor='#a2bf2f' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='75' units='%' linewidth='3' precsize='12px' title='Painter' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_progress_bar barcolor='#a2bf2f' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='35' units='%' linewidth='3' precsize='12px' title='Android Development' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_progress_bar barcolor='#DD514C' trackcolor='rgb(222, 156, 142)' preccolor='#473f3f' size='100%' shape='square' percent='75' units='%' linewidth='15' precsize='12px' title='Painter' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_progress_bar barcolor='#DD514C' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='35' units='%' linewidth='15' precsize='12px' title='Android Development' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_column_wrapper top='20' bottom='20' left='0' right='0']
[uix_column grid='6']

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='75' units='%' linewidth='3' precsize='12px' title='Photoshop' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='23' units='%' linewidth='3' precsize='12px' title='Front-End' top='25' bottom='0' left='25' right='0' ][p]This is a description.[/p][/uix_progress_bar]

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#dcdcdc' size='100%' shape='square' percent='100' units='%' linewidth='3' precsize='16px' title='Clock' top='25' bottom='0' left='25' right='25' icon='clock-o'][/uix_progress_bar]

[/uix_column]
[uix_column grid='6' last='1']

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='88' units='%' linewidth='3' precsize='12px' title='User Interface' top='25' bottom='0' left='25' right='25' ][/uix_progress_bar]

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#473f3f' size='100%' shape='square' percent='23' units='%' linewidth='3' precsize='12px' title='Web Design' top='25' bottom='0' left='25' right='0' ][p]This is a description.[/p][/uix_progress_bar]

[uix_progress_bar barcolor='#4BB1CF' trackcolor='#f1f1f1' preccolor='#dcdcdc' size='100%' shape='square' percent='98' units='%' linewidth='3' precsize='16px' title='Shop' top='25' bottom='0' left='25' right='25' icon='cart-plus'][/uix_progress_bar]

[/uix_column]
[/uix_column_wrapper]
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-35.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       </div><!-- /.list-content --> 
                       
                       
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Dividing Line', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode lets you create a visual divider between elements and sections on your pages.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-30.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                           
                                            <tr>
                                                <td><?php _e( 'Choose Line Style', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>solid</td>
                                                <td><?php _e( 'Choose a type for your separator.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td><img src="<?php echo $imgpath; ?>sc-preview-elements-1.jpg" alt="" /></td>
                                                <td><?php _e( 'Set a color for the separator. There are two colors of line:', 'uix-shortcodes' ); ?> <code>dark</code> and <code>light</code>.</td>
                                            </tr>  
                                            
                                            <tr>
                                                <td><?php _e( 'Width', 'uix-shortcodes' ); ?> (%)</td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>100</td>
                                                <td><?php _e( 'Set a width for the separator. There are two types of length units: ', 'uix-shortcodes' ); ?><code>%</code> and <code>px</code>.</td>
                                            </tr> 
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Opacity', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>17%</td>
                                                <td><?php _e( 'The separator transparency. It inherits your choice of color.', 'uix-shortcodes' ); ?></td>
                                            </tr>          
                                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
solid line
[uix_dividing_line style='solid' color='dark' width='100%' opacity='17']

double line
[uix_dividing_line style='double' color='dark' width='100%' opacity='17']

dashed line
[uix_dividing_line style='dashed' color='dark' width='100%' opacity='17']

dotted line
[uix_dividing_line style='dotted' color='dark' width='100%' opacity='17']

shadow line
[uix_dividing_line style='shadow' color='dark' width='100%' opacity='17']

gradient line
[uix_dividing_line style='gradient' color='dark' width='100%' opacity='17']
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-31.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.list-content -->
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Share Buttons', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                       
                           <p><?php _e( 'This shortcode enables you to add share buttons to all of your posts and/or pages. It takes that unique url and share it on the social page automagically.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-8.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                              
                              
                                            <tr>
                                                <td><?php _e( 'Choose Type of Button', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Multiple Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a String', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>facebook,twitter,google_plus</td>
                                                <td><?php _e( 'There are many different types of social media. You can choose custom button types.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Fillet Radius', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Number', 'uix-shortcodes' ); ?></td>
                                                <td>25</td>
                                                <td><?php _e( 'To set the fillet radius in pixels for social share buttons.', 'uix-shortcodes' ); ?></td>
                                            </tr> 
                                            
                                            <tr>
                                                <td><?php _e( 'Button Color', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a Number', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>1</td>
                                                <td><?php _e( 'Set a color for social share buttons.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                           
                                            <tr>
                                                <td><?php _e( 'Button Size', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'Selector', 'uix-shortcodes' ); ?><br><em class="prop">(<?php _e( 'Returns a Number', 'uix-shortcodes' ); ?>)</em></td>
                                                <td>1</td>
                                                <td><?php _e( 'Set a size for social share buttons.', 'uix-shortcodes' ); ?></td>
                                            </tr>        
                           
                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_share_buttons color='1' size='1' fillet='25px' show='facebook,twitter,google_plus,pinterest']
[uix_share_buttons color='1' size='2' fillet='25px' show='facebook,twitter,google_plus,pinterest']
[uix_share_buttons color='1' size='2' fillet='0' show='facebook,twitter,google_plus,pinterest']

[uix_share_buttons color='2' size='1' fillet='25px' show='facebook,twitter,google_plus,pinterest']
[uix_share_buttons color='2' size='2' fillet='25px' show='facebook,twitter,google_plus,pinterest']
[uix_share_buttons color='2' size='2' fillet='0px' show='facebook,twitter,google_plus,pinterest']
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-9.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       </div><!-- /.list-content -->
                       
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
                       
                       
                       <div class="uix-list-title"><?php _e( 'Contact Form(Use Commenting Form Template)', 'uix-shortcodes' ); ?></div>
                       <div class="uix-list-content">
                           <p><?php _e( 'This shortcode allows page embed a contact form which take your WordPress comment template.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-6.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                              
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>  
                           
                                         
                                          
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_contact_form]
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-elements-7.jpg" alt="" />
                                </div>
                            </div><!-- .uix-d-tabs -->
                       
                       </div><!-- /.list-content -->
                       
                       
                       <!-- ````````````````````````````````````````````````````````````````` -->
     
     

                    </div> <!-- /.uix-documentation-content -->
                </li>         
                
           
           
           
                <li>
                  
                    <h2><?php _e( 'Code Highlight Builder', 'uix-shortcodes' ); ?></h2>
                 
                 
                   <div class="uix-documentation-content" >
  
                           <p><?php _e( 'This shortcode allows you to easily post syntax-highlighted code to your site without losing it\'s formatting.', 'uix-shortcodes' ); ?>
                            </p>
                            
                            <div class="uix-d-tabs">
                                <h3><?php _e( 'Admin Screenshots', 'uix-shortcodes' ); ?></h3>
                                <div>
                                     <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-code-1.jpg" alt="" />
                                    
                                </div>

                                
                                <h3 class="arg"><?php _e( 'Options', 'uix-shortcodes' ); ?></h3>
                                <div>
                                    <div class="uix-table-all">
                                        <table>
                                            <tr>
                                                <th><?php _e( 'Name', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Type', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Default', 'uix-shortcodes' ); ?></th>
                                                <th><?php _e( 'Description', 'uix-shortcodes' ); ?></th>
                                            </tr>
                         
                            
                                           
                                            <tr>
                                                <td><?php _e( 'Language', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>javascript</td>
                                                <td><?php _e( 'Syntax highlighting has become pretty standard on most tutorial sites (as you can see below) and there are many options available, all depending on what languages you use and how you want your code snippets to be displayed.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                            
                                            
                                            <tr>
                                                <td><?php _e( 'Source code', 'uix-shortcodes' ); ?></td>
                                                <td><?php _e( 'String', 'uix-shortcodes' ); ?></td>
                                                <td>-</td>
                                                <td><?php _e( 'Copying code into textarea.', 'uix-shortcodes' ); ?></td>
                                            </tr>  
                                            
                                           
                                             
                                        </table>
                                    </div>
                                </div>
                                
                                
                                <h3><?php _e( 'Example', 'uix-shortcodes' ); ?></h3>
                                <div>
<pre class="brush: css;">
&nbsp;
[uix_code language='javascript']
<pre class="brush: javascript;">jQuery( document ).ready(function( $ ){

    $( document ).on('submit', '.register_form', function( event ){
        event.preventDefault();

        $.ajax({
            data: "action=register_submit&amp;" + $( this ).serialize(),
            dataType: 'json',
            type: "POST",
            url: _ajax_login_settings.ajaxurl,
            success: function( msg ) {
                //
            }
        });
    });

});</pre>
[/uix_code]
&nbsp;
</pre>
                                </div>
                                
                      
                                
                                       
                                <h3><?php _e( 'Preview (editor)', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-code-2.jpg" alt="" />
                                </div>
                                
                                <h3><?php _e( 'Preview (output)', 'uix-shortcodes' ); ?></h3>
                                <div>
                                   <img class="show-image" src="<?php echo $imgpath; ?>sc-preview-code-3.jpg" alt="" />
                                </div>                          
                                
                            </div><!-- .uix-d-tabs -->

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