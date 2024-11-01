<?php

if (!class_exists('WPME_Settings')) {

	class WPME_Settings {

		public function __construct() {
			$this->init();
		}

		public function add_submenu() {

			add_submenu_page(
					'options-general.php', __('Menu effects', 'wp-menu-effects'), __('Menu effects', 'wp-menu-effects'), 'manage_options', 'wpme_settings', array($this, 'display_content')
			);
		}

		public function display_content() {

			echo '<form method="POST" action="options.php">';
			settings_fields('wpme_settings');
			do_settings_sections('wpme_settings');
			submit_button();
			echo '</form>';
		}

		public function add_sections() {

			foreach ($this->get_settings_sections() as $setting_section_key => $setting_section) {

				add_settings_section($setting_section_key, $setting_section['title'], array($this, 'render_settings_section_fields'), 'wpme_settings');

				foreach ($setting_section['settings'] as $setting_key => $settings) {
					register_setting('wpme_settings', $setting_key);
				}
			}
		}

		public function get_settings_sections() {

			$gifs_url = WPME_URL . 'assets/effects-previews/';
			$selected_effect = get_option('wpme_hover_effect', '');
			$selected_effect_preview_gif = !empty($selected_effect) ? (str_replace('_', '-', $selected_effect) . '.gif') : '';
			$effects = wpme_helpers()->get_effects('data');
			$effect = !empty($effects[$selected_effect]) ? $effects[$selected_effect] : null;
			$effect_settings = !empty($effect['settings']) ? $effect['settings'] : array();

			return array(
				'wpme_general' => array(
					'title' => __('Menu effects general settings', 'wp-menu-effects'),
					'settings' => array(
						'wpme_effect_preview' => array(
							'title' => __('Effect preview', 'wp-menu-effects'),
							'type' => 'img',
							'src' => $selected_effect ? $gifs_url . $selected_effect_preview_gif : '',
							'data-gifs_url' => $gifs_url,
							'data-empty_message' => __('No effect selected', 'wp-menu-effects')
						),
						'wpme_hover_effect' => array(
							'title' => __('Hover effect', 'wp-menu-effects'),
							'type' => 'select',
							'options' => wpme_helpers()->get_effects(),
							'value' => $selected_effect,
							'data-effects' => htmlspecialchars(json_encode(wpme_helpers()->get_effects('data')))
						),
						'wpme_selected_menu' => array(
							'title' => __('Menu', 'wp-menu-effects'),
							'type' => 'select',
							'options' => wpme_helpers()->get_menu_options(),
							'value' => get_option('wpme_selected_menu', '')
						),
						'wpme_apply_to_submenus' => array(
							'title' => __('Apply to submenus?', 'wp-menu-effects'),
							'type' => 'select',
							'options' => array(
								'0' => __('No', 'wp-menu-effects'),
								'1' => __('Yes', 'wp-menu-effects')
							),
							'value' => get_option('wpme_apply_to_submenus', '')
						),
						'wpme_normal_text_color' => array(
							'title' => __('Normal text color', 'wp-menu-effects'),
							'type' => 'color',
							'value' => get_option('wpme_normal_text_color', !empty($effect_settings['normal_text_color']) ? $effect_settings['normal_text_color'] : ''),
							'class' => 'wpme-effect-setting'
						),
						'wpme_hover_text_color' => array(
							'title' => __('Hover text color', 'wp-menu-effects'),
							'type' => 'color',
							'value' => get_option('wpme_hover_text_color', !empty($effect_settings['hover_text_color']) ? $effect_settings['hover_text_color'] : ''),
							'class' => 'wpme-effect-setting'
						),
						'wpme_normal_background_color' => array(
							'title' => __('Normal background color', 'wp-menu-effects'),
							'type' => 'color',
							'value' => get_option('wpme_normal_background_color', !empty($effect_settings['normal_background_color']) ? $effect_settings['normal_background_color'] : ''),
							'class' => 'wpme-effect-setting'
						),
						'wpme_hover_background_color' => array(
							'title' => __('Hover background color', 'wp-menu-effects'),
							'type' => 'color',
							'value' => get_option('wpme_hover_background_color', !empty($effect_settings['hover_background_color']) ? $effect_settings['hover_background_color'] : ''),
							'class' => 'wpme-effect-setting'
						),
						'wpme_normal_border_color' => array(
							'title' => __('Normal border color', 'wp-menu-effects'),
							'type' => 'color',
							'value' => get_option('wpme_normal_border_color', !empty($effect_settings['normal_border_color']) ? $effect_settings['normal_border_color'] : ''),
							'class' => 'wpme-effect-setting'
						),
						'wpme_hover_border_color' => array(
							'title' => __('Hover border color', 'wp-menu-effects'),
							'type' => 'color',
							'value' => get_option('wpme_hover_border_color', !empty($effect_settings['hover_border_color']) ? $effect_settings['hover_border_color'] : ''),
							'class' => 'wpme-effect-setting'
						)
					)
				)
			);
		}

		public function render_settings_section_fields($args) {

			$sections = $this->get_settings_sections();

			$settings = $sections[$args['id']]['settings'];

			foreach ($settings as $setting_key => $setting) {
				add_settings_field(
						$setting_key, $setting['title'], array($this, 'render_setting'), 'wpme_settings', $args['id'], array('setting_key' => $setting_key, 'setting_args' => $setting, 'class' => $this->get_tr_class($setting_key, $setting))
				);
			}
		}

		public function get_tr_class($setting_key, $setting) {

			$class_pieces = !empty($setting['class']) ? explode(' ', $setting['class']) : array();

			if (!in_array('wpme-effect-setting', $class_pieces)) {
				return '';
			}

			$effects = wpme_helpers()->get_effects('data');
			$selected_effect = get_option('wpme_hover_effect', '');
			$effect = !empty($effects[$selected_effect]) ? $effects[$selected_effect] : null;

			if (empty($effect)) {
				return 'wpme_hidden';
			}

			$effect_settings = !empty($effect['settings']) ? array_keys($effect['settings']) : array();

			$setting_true_key = str_replace('wpme_', '', $setting_key);

			if (!in_array($setting_true_key, $effect_settings)) {
				return 'wpme_hidden';
			}

			return '';
		}

		public function render_setting($args) {

			$non_tag_attributes = array('title');

			$tag_attributes = array();

			if ($args['setting_args']['type'] === 'select') {
				$non_tag_attributes = array_merge($non_tag_attributes, array('options', 'type'));
			}

			if ($args['setting_args']['type'] === 'img') {
				$non_tag_attributes = array_merge($non_tag_attributes, array('type'));
			}

			foreach ($args['setting_args'] as $setting_arg => $setting_arg_value) {

				if (in_array($setting_arg, $non_tag_attributes)) {
					continue;
				}

				$tag_attributes[$setting_arg] = $setting_arg_value;
			}

			$tag_attributes['id'] = !empty($tag_attributes['id']) ? $tag_attributes['id'] : $args['setting_key'];
			$tag_attributes['name'] = !empty($tag_attributes['name']) ? $tag_attributes['name'] : $args['setting_key'];

			if ($args['setting_args']['type'] === 'select') {

				$options = !empty($args['setting_args']['options']) ? $args['setting_args']['options'] : array();

				$selected_value = !empty($args['setting_args']['value']) ? $args['setting_args']['value'] : array();

				$generated_options = wpme_helpers()->generate_options($options, $selected_value);

				wpme_helpers()->display_tag(array(
					'tag' => 'select',
					'attributes' => $tag_attributes,
					'content' => $generated_options
				));

				return;
			}

			if ($args['setting_args']['type'] === 'img') {

				$message_hidden_class = !empty($tag_attributes['src']) ? 'wpme_hidden' : '';

				if (empty($tag_attributes['src'])) {
					$tag_attributes['class'] = 'wpme_hidden';
					unset($tag_attributes['src']);
				}

				echo "<p class=\"{$message_hidden_class}\">" . __('No effect selected', 'wp-menu-effects') . '</p>';

				wpme_helpers()->display_tag(array(
					'tag' => 'img',
					'attributes' => $tag_attributes,
					'closed' => false
				));
			}

			if ($args['setting_args']['type'] === 'color') {

				if (empty($tag_attributes['value'])) {
					unset($tag_attributes['value']);
				}
				$tag_attributes['type'] = 'text';

				$tr_class_pieces = !empty($args['class']) ? explode(' ', $args['class']) : array();
				$tr_class_pieces = array_map('trim', $tr_class_pieces);
				if (in_array('wpme_hidden', $tr_class_pieces)) {
					$tag_attributes[] = 'disabled';
				}

				wpme_helpers()->display_tag(array(
					'tag' => 'input',
					'attributes' => $tag_attributes,
					'closed' => false
				));
			}

			do_action('wpme_render_setting', $args);
		}

		public function enqueues($hook) {

			$page = !empty($_GET['page']) ? sanitize_text_field($_GET['page']) : '';

			if ($page !== 'wpme_settings') {
				return;
			}

			wp_enqueue_script('wpme_settings', WPME_URL . 'assets/js/backend/settings.js', array('wp-color-picker', 'jquery'));
			wp_enqueue_style('wp-color-picker');
		}

		public function add_style_tag() {

			$page = !empty($_GET['page']) ? sanitize_text_field($_GET['page']) : '';

			if ($page !== 'wpme_settings') {
				return;
			}
			?>
			<style>.wpme_hidden{ display: none; }</style>
			<?php

		}

		public function init() {
			add_action('admin_head', array($this, 'add_style_tag'));
			add_action('admin_menu', array($this, 'add_submenu'));
			add_action('admin_init', array($this, 'add_sections'));
			add_action('admin_enqueue_scripts', array($this, 'enqueues'));
		}

	}

}
