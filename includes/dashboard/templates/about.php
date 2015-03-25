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


$author = $theme->get('Author');
list($author_name, $author_business) = explode(', ', $author, 2);

?>	
		
<div class="feature-section col three-col" style="margin-bottom: 1.618em; overflow: hidden;">
	<div class="col-1">
		<img src="<?php echo esc_url( $screenshot ); ?>" class="image-50" width="440" />
		<h4><?php _e( 'Who built '.$theme['Name'].'?', 'wobble' ); ?></h4>
		<p><?php _e( 'My name is '.$author_name.'. I develop at '.$author_business.'.', 'wobble' ); ?></p>
		<p><a href="<?php echo $theme->get( 'AuthorURI' ); ?>" class="button"><?php _e( 'About '.$author_business, 'wobble' ); ?></a></p>
	</div>

	<div class="col-2">
		<img src="<?php echo esc_url( $screenshot ); ?>" class="image-50" width="440" />
		<h4><?php _e( 'We have awesome PageLeads', 'wobble' ); ?></h4>
		<p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'wobble' ); ?></p>
		<p><a href="#" class="button button-primary"><?php _e( 'Action', 'wobble' ); ?></a>
		<a href="#" class="button"><?php _e( 'Action', 'wobble' ); ?></a></p>
	</div>

	<div class="col-3 last-feature">
		<img src="<?php echo esc_url( $screenshot ); ?>" class="image-50" width="440" />
		<h4><?php _e( 'Do You Have Other Themes?', 'wobble' ); ?></h4>
		<p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'wobble' ); ?></p>
		<p><a href="#" class="button"><?php _e( 'Kolakube Themes', 'wobble' ); ?></a></p>
	</div>
</div>

<hr style="clear: both;">