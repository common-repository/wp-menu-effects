<?php

if (!class_exists('WP_Menu_Effects')) {

	class WP_Menu_Effects {

		use Vegacorp_Singleton;

		private $plugin_prefix = 'WPME_';
		private $settings;
		private $menu_effects_handler;

		public function late_init() {
			//Initializing the conditions handler         
			$this->initialize_object_vars();
		}

		public function init() {

			add_action('plugins_loaded', array($this, 'late_init'));

			add_action('init', array($this, 'after_init'));
		}

		function after_init() {
			load_plugin_textdomain('wp-menu-effects', false, wp_normalize_path(dirname(dirname(__FILE__))) . '/lang/');
		}

		/**
		 * Initializes this object properties
		 */
		public function initialize_object_vars() {

			/*
			 * The variable must be named like the class, the class must use underscores and must have the
			 * plugin prefix at the beginning for example: variable: $categories_restrictions_handler, class: Prefix_Categories_Restrictions_Handler
			 */

			//Getting this object properties
			$object_vars = array_keys(get_object_vars($this));

			//instantiating the properties
			foreach ($object_vars as $object_var) {

				//Getting the property class
				$class = $this->plugin_prefix . implode('_', array_map('ucfirst', explode('_', $object_var)));

				//Trying to instantiate the property
				if ($this->$object_var === null && class_exists($class)) {
					$this->$object_var = new $class();
				}
			}
		}

	}

}

if (!function_exists('WPME')) {

	function WPME() {
		return WP_Menu_Effects::get_instance();
	}

}

WPME();
