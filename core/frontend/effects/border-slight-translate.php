<?php ob_start() ?>
<style>
    /* Effect 8: border slight translate */
    .cl-effect-8 a {
        color: normal_text_color;
        padding: 10px 20px;
    }

    .cl-effect-8 a::before,
    .cl-effect-8 a::after  {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 3px solid normal_border_color;
        content: '';
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
    }

    .cl-effect-8 a::after  {
        border-color: hover_border_color;
        opacity: 0;
        -webkit-transform: translateY(-7px) translateX(6px);
        -moz-transform: translateY(-7px) translateX(6px);
        transform: translateY(-7px) translateX(6px);
    }

    .cl-effect-8.current-menu-item a::before,
    .cl-effect-8 a:hover::before,
    .cl-effect-8 a:focus::before {
        opacity: 0;
        -webkit-transform: translateY(5px) translateX(-5px);
        -moz-transform: translateY(5px) translateX(-5px);
        transform: translateY(5px) translateX(-5px);
    }

    .cl-effect-8.current-menu-item a::after,
    .cl-effect-8 a:hover::after,
    .cl-effect-8 a:focus::after  {
        opacity: 1;
        -webkit-transform: translateY(0px) translateX(0px);
        -moz-transform: translateY(0px) translateX(0px);
        transform: translateY(0px) translateX(0px);
    }
</style>
<?php

return array(
	'key' => 'border_slight_translate',
	'label' => __('Border slight translate', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 8,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'normal_border_color' => '#000000',
		'hover_border_color' => '#FFFFFF'
	)
);

