<?php

if (!class_exists('WPME_Menu_Effects_Handler')) {

	class WPME_Menu_Effects_Handler {

		private $submenus_detected = false;

		public function __construct() {
			$this->init();
		}

		public function enqueues() {

			if (is_admin()) {
				return;
			}

			$creative_links_effects_url = WPME_URL . 'assets/vendor/creative-links-effects/';

			wp_enqueue_style('creative_links_effects_normalize', $creative_links_effects_url . 'css/normalize.css');
			wp_enqueue_script('creative_links_effects_modernizr', $creative_links_effects_url . 'js/modernizr.custom.js');
			wp_enqueue_script('menu_effects_handler', WPME_URL . 'assets/js/frontend/menu-effects.js', array('jquery'));
		}

		public function render_menu_effects() {

			$normal_text_color = get_option('wpme_normal_text_color', '');

			$selected_menu = intval(get_option('wpme_selected_menu'));
			$apply_to_submenu = intval(get_option('wpme_apply_to_submenus'));

			if (empty($selected_menu)) {
				return;
			}

			$selected_effect = $this->get_selected_effect();

			if (empty($selected_effect)) {
				return;
			}

			$selected_effect_number = $selected_effect['effect_number'];
			$effect_html = $selected_effect['html'];

			$style = str_replace('.cl-effect-' . $selected_effect_number, '.wpme-item', $effect_html);

			$style = str_replace('.csstransforms3d', '', $style);

			$style = str_replace(';', ' !important;', $style);

			ob_start();
			?>
			<style id="wpme-general-style">

				.wpme-item *,
				.wpme-item *::after,
				.wpme-item *::before {
					-webkit-box-sizing: border-box !important;
					-moz-box-sizing: border-box !important;
					box-sizing: border-box !important;
				}

				.wpme-item a {
					position: relative !important;
					display: inline-block !important;
					margin: 15px 25px !important;
					outline: none !important;
					text-decoration: none !important;
					text-transform: none !important;
					letter-spacing: 1px !important;
					font-weight: 400 !important;
					text-shadow: 0 0 1px rgba(255,255,255,0.3) !important;
				}

				.wpme-item a:hover,
				.wpme-item a:focus {
					outline: none !important;
				}
			</style>
			<?php

			$default_styles = ob_get_clean();

			$style = $default_styles . str_replace('<style', '<style id="wpme-style" ', $style);
//                        if(!$apply_to_submenu){
			$style = str_replace('.wpme-item a', '.wpme-item > a', $style);
			//$style = str_replace( 'a span', 'a > span:first-child', $style );
			//$style = str_replace( 'span', 'span:first-child', $style );
			//$style = str_replace( ' span', ' span:first-child', $style );

			$style = str_replace(' span ', ' > span:first-child ', $style);
			$style .= '<style>.wpme-item > a > span:first-child,
                .wpme-item a {
                    width: auto !important;
                } .wpme-item ul.sub-menu {
    min-width: 300px;
}</style>';
//                        }
			echo $style;
		}

		public function add_menu_effects_class_to_selected_menu($nav_menu, $args) {

			$selected_effect = get_option('wpme_hover_effect', '');

			if (empty($selected_effect)) {
				return $nav_menu;
			}

			$selected_menu = intval(get_option('wpme_selected_menu'));
			$menu_id = intval($args->menu->term_id);

			$lis = array();

			if ($selected_menu === $menu_id) {
				//$this->prepare_menu_html($nav_menu);
				//file_put_contents(WPME_PATH . 'test.txt', json_encode(compact('nav_menu', 'args')));
				$ul_matches = array();
				preg_match('/<ul[^>]*>/', $nav_menu, $ul_matches);
				$li_matches = array();
				preg_match_all('/<li[^>]*>[\s\S]*<\/li>/', $nav_menu, $li_matches);

				//$list_items_modified = str_replace( 'class="menu-item', 'class="menu-item wpme-item ', implode( '', reset( $li_matches ) ) );
				//$modified_nav_menu = str_replace('class="', 'class="wpme-selected-menu ', $ul_matches[0]) . $list_items_modified . '</ul>';
				//$modified_nav_menu = str_replace('class="menu-item', 'class="menu-item wpme-item ', $nav_menu);
				$modified_nav_menu = str_replace('class="', 'class="wpme-selected-menu ', $ul_matches[0]) . implode('', reset($li_matches)) . '</ul>';

				return $modified_nav_menu;
			}

			return $nav_menu;
		}

		public function get_selected_effect() {

			$effects = wpme_helpers()->get_effects('data');

			$selected_effect = get_option('wpme_hover_effect', '');

			$effect = !empty($effects[$selected_effect]) ? $effects[$selected_effect] : null;

			if (empty($effect)) {
				return null;
			}

			$effect_html = !empty($effect['html']) ? $effect['html'] : '';

			if (empty($effect_html)) {
				return null;
			}

			if (!empty($effect['settings']) && is_array($effect['settings'])) {

				foreach ($effect['settings'] as $effect_setting_key => $effect_setting_value) {

					$option_value = get_option('wpme_' . $effect_setting_key, $effect_setting_value);
					$color = $option_value ? $option_value : 'none';
					$effect_html = str_replace($effect_setting_key, $color, $effect_html);
				}
			}

			$effect['html'] = $effect_html;

			return $effect;
		}

		public function prepare_menu_items($sorted_menu_items, $args) {

			$selected_effect = get_option('wpme_hover_effect', '');

			$selected_menu = intval(get_option('wpme_selected_menu'));
			$menu_id = intval($args->menu->term_id);

			if ($selected_menu !== $menu_id || empty($selected_effect)) {
				return $sorted_menu_items;
			}

			$prepared_menu_items = array();
			$apply_to_submenus = boolval(get_option('wpme_apply_to_submenus', '0'));

			foreach ($sorted_menu_items as $index => $menu_item) {

				$menu_item_original_classes = $menu_item->classes;

				$menu_item->classes[] = 'wpme-item';

				if (!empty($menu_item->menu_item_parent)) {
					$this->submenus_detected = true;
				}

				if (!empty($menu_item->menu_item_parent) && !$apply_to_submenus) {
					$menu_item->classes = $menu_item_original_classes;
				}

				$prepared_menu_items[$index] = $menu_item;
			}

			return $prepared_menu_items;
		}

		public function init() {

			add_action('wp_enqueue_scripts', array($this, 'enqueues'));
			add_action('wp_head', array($this, 'render_menu_effects'));
			add_filter('wp_nav_menu', array($this, 'add_menu_effects_class_to_selected_menu'), 10, 2);

			add_filter('wp_nav_menu_objects', array($this, 'prepare_menu_items'), 10, 2);
		}

	}

}
