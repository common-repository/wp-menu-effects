<?php ob_start() ?>
<style>
    /* Effect 21: borders slight translate */
    .cl-effect-21 a {
        padding: 10px;
        color: normal_text_color;
        font-weight: 700;
        text-shadow: none;
        -webkit-transition: color 0.3s;
        -moz-transition: color 0.3s;
        transition: color 0.3s;
    }

    .cl-effect-21 a::before,
    .cl-effect-21 a::after {
        position: absolute;
        left: 0;
        width: 100%;
        height: 2px;
        background: hover_text_color;
        content: '';
        opacity: 0;
        -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
        -moz-transition: opacity 0.3s, -moz-transform 0.3s;
        transition: opacity 0.3s, transform 0.3s;
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    .cl-effect-21 a::before {
        top: 0;
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    .cl-effect-21 a::after {
        bottom: 0;
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        transform: translateY(10px);
    }

    .cl-effect-21.current-menu-item a,
    .cl-effect-21 a:hover,
    .cl-effect-21 a:focus {
        color: hover_text_color;
    }

    .cl-effect-21.current-menu-item a::before,
    .cl-effect-21 a:hover::before,
    .cl-effect-21 a:focus::before,
    .cl-effect-21 a:hover::after,
    .cl-effect-21.current-menu-item a::after,
    .cl-effect-21 a:focus::after {
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        transform: translateY(0px);
    }

</style>
<?php

return array(
	'key' => 'borders_slight_translate',
	'label' => __('Borders slight translate', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 21,
	'settings' => array(
		'normal_text_color' => '#000000',
		'hover_text_color' => '#FFFFFF'
	)
);

