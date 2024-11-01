<?php ob_start() ?>
<style>
    /* Effect 18: cross */
    .cl-effect-18 {
        position: relative;
        z-index: 1;
    }

    .cl-effect-18 a{
        padding: 0 5px;
        color: normal_text_color;
        font-weight: 700;
        -webkit-transition: color 0.3s;
        -moz-transition: color 0.3s;
        transition: color 0.3s;
    }

    .cl-effect-18 a::before,
    .cl-effect-18 a::after {
        position: absolute;
        width: 100%;
        left: 0;
        top: 50%;
        height: 2px;
        margin-top: -1px;
        background: normal_text_color;
        content: '';
        z-index: -1;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        pointer-events: none;
    }

    .cl-effect-18 a::before {
        -webkit-transform: translateY(-20px);
        -moz-transform: translateY(-20px);
        transform: translateY(-20px);
    }

    .cl-effect-18 a::after {
        -webkit-transform: translateY(20px);
        -moz-transform: translateY(20px);
        transform: translateY(20px);
    }

    .cl-effect-18 a:hover,
    .cl-effect-18.current-menu-item a,
    .cl-effect-18 a:focus {
        color: hover_text_color;
    }

    .cl-effect-18 a:hover::before,
    .cl-effect-18 a:hover::after,
    .cl-effect-18.current-menu-item a::before,
    .cl-effect-18.current-menu-item a::after,
    .cl-effect-18 a:focus::before,
    .cl-effect-18 a:focus::after {
        opacity: 0.7;
    }

    .cl-effect-18 a:hover::before,
    .cl-effect-18.current-menu-item a::before,
    .cl-effect-18 a:focus::before {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .cl-effect-18 a:hover::after,
    .cl-effect-18.current-menu-item a::after,
    .cl-effect-18 a:focus::after {
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .cl-effect-18 a:hover::before,
    .cl-effect-18.current-menu-item a::before,
    .cl-effect-18 a:focus::before,
    .cl-effect-18 a:hover::after,
    .cl-effect-18.current-menu-item a::after,
    .cl-effect-18 a:focus::after {
        width: 50px;
        left: calc(50% - 25px);
    }


</style>
<?php

return array(
	'key' => 'cross',
	'label' => __('Cross', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 18,
	'settings' => array(
		'normal_text_color' => '#000000',
		'hover_text_color' => '#FFFFFF'
	)
);

