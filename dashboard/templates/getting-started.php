<?php
/**
 * Template part for the Wobble Dashboard introduction section.
 *
 * @package     Wobble Dashboard
 * @copyright   Copyright (c) 2014
 * @license     GPL-2.0+
 * @link        http://wobble.co.za/
 * @since       0.0.1
 */
?>	

<div class="feature-section col two-col" style="margin-bottom: 1.618em; overflow: hidden;">

	<h2><?php _e( "Using {$theme['Name']}", 'wobble' ); ?> <div class="dashicons dashicons-lightbulb"></div></h2>
	<p><?php _e( "We've purposely kept {$theme['Name']} lean & mean so you can focus on your content. Here are some common theme-setup tasks:", 'wobble' ); ?></p>

	<div class="col-1">

		<h4><?php _e( 'Simple Theme Customization' ,'wobble' ); ?></h4>
		<p><?php _e( "Using the WordPress Customizer you can tweak {$theme['Name']}'s appearance to match your brand.", 'wobble' ); ?></p>
		<p><a href="<?php echo esc_url( $customize_url ); ?>" class="button"><?php _e( 'Open the Customizer', 'wobble' ); ?></a></p>
	</div>

	<div class="col-2 last-feature">

		<h4><?php _e( 'Have A Question?', 'wobble' ); ?></h4>
		<p><?php _e( "{$theme['Name']} the software isn't the product you're buying, it's the support and community around it. If you have any questions, hit us up in the forums.", 'wobble' ); ?></p>
		<p><a href="http://wobble.co.za/forum/" class="button" target="_blank"><?php _e( "{$theme['Name']} Forum", 'wobble' ); ?></a></p>
	</div>

</div>

<hr style="clear: both;">