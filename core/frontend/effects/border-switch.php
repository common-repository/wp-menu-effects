<?php ob_start() ?>
<style>
    /* Effect 14: border switch */
    .cl-effect-14 a {
        padding: 0 20px;
        height: 45px;
        line-height: 45px;
        color: normal_text_color;
    }

    .cl-effect-14 a::before,
    .cl-effect-14 a::after {
        position: absolute;
        width: 45px;
        height: 2px;
        background: normal_text_color;
        content: '';
        opacity: 0.2;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        pointer-events: none;
    }

    .cl-effect-14 a::before {
        top: 0;
        left: 0;
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        transform: rotate(90deg);
        -webkit-transform-origin: 0 0;
        -moz-transform-origin: 0 0;
        transform-origin: 0 0;
    }

    .cl-effect-14 a::after {
        right: 0;
        bottom: 0;
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        transform: rotate(90deg);
        -webkit-transform-origin: 100% 0;
        -moz-transform-origin: 100% 0;
        transform-origin: 100% 0;
    }

    .cl-effect-14.current-menu-item a::before,
    .cl-effect-14.current-menu-item a::after,
    .cl-effect-14 a:hover::before,
    .cl-effect-14 a:hover::after,
    .cl-effect-14 a:focus::before,
    .cl-effect-14 a:focus::after {
        opacity: 1;
    }

    .cl-effect-14.current-menu-item a::before,
    .cl-effect-14 a:hover::before,
    .cl-effect-14 a:focus::before {
        left: 50%;
        -webkit-transform: rotate(0deg) translateX(-50%);
        -moz-transform: rotate(0deg) translateX(-50%);
        transform: rotate(0deg) translateX(-50%);
    }

    .cl-effect-14.current-menu-item a::after,
    .cl-effect-14 a:hover::after,
    .cl-effect-14 a:focus::after {
        right: 50%;
        -webkit-transform: rotate(0deg) translateX(50%);
        -moz-transform: rotate(0deg) translateX(50%);
        transform: rotate(0deg) translateX(50%);
    }
</style>
<?php

return array(
	'key' => 'border_switch',
	'label' => __('Border switch', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 14,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

