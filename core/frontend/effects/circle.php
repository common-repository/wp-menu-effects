<?php ob_start() ?>
<style>
    /* Effect 12: circle */
    .cl-effect-12 a{
        color: normal_text_color;
    }

    .cl-effect-12 a::before,
    .cl-effect-12 a::after {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100px;
        height: 100px;
        border: 2px solid rgba(0,0,0,0.1);
        border-radius: 50%;
        content: '';
        opacity: 0;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        -webkit-transform: translateX(-50%) translateY(-50%) scale(0.2);
        -moz-transform: translateX(-50%) translateY(-50%) scale(0.2);
        transform: translateX(-50%) translateY(-50%) scale(0.2);
    }

    .cl-effect-12 a::after {
        width: 90px;
        height: 90px;
        border-width: 6px;
        -webkit-transform: translateX(-50%) translateY(-50%) scale(0.8);
        -moz-transform: translateX(-50%) translateY(-50%) scale(0.8);
        transform: translateX(-50%) translateY(-50%) scale(0.8);
    }

    .cl-effect-12 a:hover::before,
    .cl-effect-12 a:hover::after,
    .cl-effect-12.current-menu-item a::before,
    .cl-effect-12.current-menu-item a::after,
    .cl-effect-12 a:focus::before,
    .cl-effect-12 a:focus::after {
        opacity: 1;
        -webkit-transform: translateX(-50%) translateY(-50%) scale(1);
        -moz-transform: translateX(-50%) translateY(-50%) scale(1);
        transform: translateX(-50%) translateY(-50%) scale(1);
    }

</style>
<?php

return array(
	'key' => 'circle',
	'label' => __('Circle', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 12,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

