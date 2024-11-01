<?php ob_start() ?>
<style>
    /* Effect 16: fall down */
    .cl-effect-16 a {
        color: normal_text_color;
        text-shadow: 0 0 1px rgba(111,134,134,0.3);
    }

    .cl-effect-16 a::before {
        color: hover_text_color;
        content: attr(data-hover);
        position: absolute;
        opacity: 0;
        text-shadow: 0 0 1px rgba(255,255,255,0.3);
        -webkit-transform: scale(1.1) translateX(10px) translateY(-10px) rotate(4deg);
        -moz-transform: scale(1.1) translateX(10px) translateY(-10px) rotate(4deg);
        transform: scale(1.1) translateX(10px) translateY(-10px) rotate(4deg);
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        pointer-events: none;
    }

    .cl-effect-16 a:hover::before,
    .cl-effect-16.current-menu-item a::before,
    .cl-effect-16 a:focus::before {
        -webkit-transform: scale(1) translateX(0px) translateY(0px) rotate(0deg);
        -moz-transform: scale(1) translateX(0px) translateY(0px) rotate(0deg);
        transform: scale(1) translateX(0px) translateY(0px) rotate(0deg);
        opacity: 1;
    }
</style>
<?php

return array(
	'key' => 'fall_down',
	'label' => __('Fall down', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 16,
	'settings' => array(
		'normal_text_color' => '#000000',
		'hover_text_color' => '#FFFFFF'
	)
);

