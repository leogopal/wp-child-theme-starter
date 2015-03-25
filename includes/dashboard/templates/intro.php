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
	<div class="col-1">
		<h1 style="margin-right: 0;"><?php echo '<strong>'.$theme['Name'].'</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . $theme['Version'] . '</sup>'; ?></h1>

		<p style="font-size: 1.2em;"><?php _e( 'Awesome! You\'ve decided to use '.$theme['Name'].' to enrich your WordPress experience.', 'wobble' ); ?></p>
		<p><?php _e( $theme['Description'], 'wobble' ); ?>
	</div>

	<div class="col-2 last-feature">
		<img src="<?php echo esc_url( $screenshot ); ?>" class="image-50" width="440" />
	</div>
</div>

<hr />