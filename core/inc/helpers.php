<?php
if (!class_exists('WPME_Helpers')) {

    class WPME_Helpers {

        private $menu_effects;

        use Vegacorp_Singleton;

        /**
         *
         * Renders a html tag attributes
         *
         * @param array $attributes Array with the html attributes to be used in a html tag
         *
         */
        public function display_tag_attributes($attributes = array()) {

            if (!empty($attributes)) {
                foreach ($attributes as $attribute_key => $attribute) {

                    //If attribute key is not string we assume is a single attribute
                    if (is_string($attribute_key)) {
                        echo implode('', array(' ', $attribute_key, '="', esc_attr($attribute), '" '));
                    } else {
                        echo implode('', array(' ', esc_attr($attribute), ' '));
                    }
                }
            }
        }

        /**
         *
         * Renders a html tag
         *
         * @param array $tag_args $tag_args['tag'] The name of the tag: default value is empty string,
         *                        $tag_args['attributes'] The html attributes of the tag: default value is array(),
         *                        $tag_args['closed'] If the tag must be closed: default value is false,
         *                        $tag_args['content'] The content that is inside the tag: default value is empty string
         *
         */
        public function display_tag($tag_args = array()) {

            $default_args = array(
                'tag' => '',
                'attributes' => array(),
                'closed' => true,
                'content' => ''
            );

            $args = apply_filters(
                    'wpme_tag_arguments', array_merge($default_args, $tag_args)
            );

            if (empty($args['tag'])) {
                return;
            }

            do_action('vegacorp_before_display_tag', $args);
            ?><<?php
            esc_attr_e($args['tag']);
            $this->display_tag_attributes($args['attributes']);
            ?>><?php
            if ($args['closed']) {
                echo $args['content'];
                echo '</' . esc_attr($args['tag']) . '>';
            }

            do_action('wpme_after_display_tag', $args);
        }

        /**
         *
         * @see $self::display_tag()
         *
         * @return string Returns a html tag as string
         *
         */
        public function generate_tag($tag_args = array()) {

            ob_start();

            $this->display_tag($tag_args);

            return ob_get_clean();
        }

        /**
         * Generates html options tags string
         *
         * @param $options The associative array to generate the options
         * @param $selected_options The values to know which options will be selected
         *
         * @return string The generated options string
         *
         */
        public function generate_options($options, $selected_options = array()) {

            //Initializing the selected options
            $selected_options = is_scalar($selected_options) ? array($selected_options) : $selected_options;

            //Initialzing the options string
            $generated_options = '';

            foreach ($options as $option_value => $option_label) {

                //Initializing the option attributes
                $option_attributes = array('value' => $option_value);

                //Checking if the option will have the "selected" attribute
                if (in_array($option_value, $selected_options)) {
                    $option_attributes[] = 'selected';
                }

                //Generating the option
                $generated_options .= $this->generate_tag(array(
                    'tag' => 'option',
                    'attributes' => $option_attributes,
                    'content' => $option_label
                ));
            }

            return $generated_options;
        }

        public function get_menu_options() {

            $default_options = array('' => __('None', 'wp-menu-effects'));

            $nav_menus = wp_get_nav_menus();

            $nav_menu_options = wp_list_pluck($nav_menus, 'name', 'term_id');

            return $default_options + $nav_menu_options;
        }

        public function get_effects($type = 'options') {

            if ($type === 'options') {

                $options = array('' => __('Select effect', 'wp-menu-effects'));

                foreach ($this->menu_effects as $effect_key => $effect) {
                    $options[$effect_key] = $effect['label'];
                }

                return apply_filters('wpme_effects_' . $type, $options);
            }


            if ($type === 'data') {
                return apply_filters('wpme_effects_' . $type, $this->menu_effects);
            }

            return array();
        }

        public function add_effects() {

            $effects_files_path = WPME_PATH . 'frontend/effects';

            $effects_files = scandir($effects_files_path);

            foreach ($effects_files as $effect_file) {

                $file_pieces = explode('.', $effect_file);

                if (end($file_pieces) !== 'php') {
                    continue;
                }

                $effect = require_once $effects_files_path . '/' . $effect_file;

                if (!is_array($effect)) {
                    continue;
                }

                $this->menu_effects[$effect['key']] = $effect;
            }
        }

        public function init() {
            $this->menu_effects = array();
            $this->add_effects();
        }

    }

}

if (!function_exists('wpme_helpers')) {

    function wpme_helpers() {

        return WPME_Helpers::get_instance();
    }

}