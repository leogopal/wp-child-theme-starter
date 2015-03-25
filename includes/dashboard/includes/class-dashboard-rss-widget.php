<?php

class Dashboard_RSS_Widget {
	private $feed = 'http://www.wobble.co.za/feed/';

	function __construct() {
		add_action('wp_dashboard_setup', array($this, 'add'));
	}

	function add() {
		add_meta_box('kol_updates_widget', __('Wobble Blog', 'wobble'), array($this, 'widget'), 'dashboard', 'side', 'high');
	}

	function widget() {
		$items = '';
		$rss = fetch_feed($this->feed);
		if (!is_wp_error($rss)) {
			$max_items = $rss->get_item_quantity(5);
			$rss_items = $rss->get_items(0, $max_items);
		}
		if (!empty($rss_items)) {
			$date_format = get_option('date_format');
			foreach ($rss_items as $item)
				$items .= "\t\t<li ><a class=\"rsswidget\" href=\"" . esc_url($item->get_permalink()) . "\" title=\"" . esc_attr__($item->get_description(), 'wobble') . "\">" . esc_attr__($item->get_title(), 'wobble') . "</a> <span class=\"rss-date\">" . esc_attr__(human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'wobble' ), 'wobble') . "</span></li>\n";
		}
		else
			$items .= "\t\t<li><a href=\"$this->feed\">" . __('Check out the <strong>Wobble</strong> blog!', 'wobble') . "</a></li>\n";
		echo
			"<div class=\"rss-widget rss-kol\">\n",
			"\t<ul>\n",
			$items,
			"\t</ul>\n",
			"</div>\n";
	}
}
?>