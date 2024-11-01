<?php ob_start() ?>
<style>
    /* Effect 13: three circles */
    .cl-effect-13 a {
        color: normal_text_color;
        -webkit-transition: color 0.3s;
        -moz-transition: color 0.3s;
        transition: color 0.3s;
    }

    .cl-effect-13 a::before {
        position: absolute;
        top: 100%;
        left: 50%;
        color: transparent;
        content: '•';
        text-shadow: 0 0 transparent;
        font-size: 1.2em;
        -webkit-transition: text-shadow 0.3s, color 0.3s;
        -moz-transition: text-shadow 0.3s, color 0.3s;
        transition: text-shadow 0.3s, color 0.3s;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        transform: translateX(-50%);
        pointer-events: none;
    }

    .cl-effect-13 a:hover::before,
    .cl-effect-13.current-menu-item a::before,
    .cl-effect-13 a:focus::before {
        color: normal_text_color;
        text-shadow: 10px 0 normal_text_color, -10px 0 normal_text_color;
    }

    .cl-effect-13 a:hover,
    .cl-effect-13.current-menu-item a,
    .cl-effect-13 a:focus {
        color: hover_text_color;
    }

</style>
<?php

return array(
	'key' => 'three_circles',
	'label' => __('Three circles', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 13,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'hover_text_color' => '#000000'
	)
);

