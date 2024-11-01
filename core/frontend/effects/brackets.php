<?php ob_start() ?>
<style>
    /* Effect 1: Brackets */
    .cl-effect-1 a{
        color: normal_text_color
    }

    .cl-effect-1 a::before,
    .cl-effect-1 a::after {
        display: inline-block;
        opacity: 0;        
        -webkit-transition: -webkit-transform 0.3s, opacity 0.2s;
        -moz-transition: -moz-transform 0.3s, opacity 0.2s;
        transition: transform 0.3s, opacity 0.2s;
    }

    .cl-effect-1 a::before {
        margin-right: 10px;
        content: '[';
        -webkit-transform: translateX(20px);
        -moz-transform: translateX(20px);
        transform: translateX(20px);
    }

    .cl-effect-1 a::after {
        margin-left: 10px;
        content: ']';
        -webkit-transform: translateX(-20px);
        -moz-transform: translateX(-20px);
        transform: translateX(-20px);
    }

    .cl-effect-1 a:hover::before,
    .cl-effect-1 a:hover::after,
    .cl-effect-1.current-menu-item a::before,
    .cl-effect-1.current-menu-item a::after,
    .cl-effect-1 a:focus::before,
    .cl-effect-1 a:focus::after {
        opacity: 1;
        -webkit-transform: translateX(0px);
        -moz-transform: translateX(0px);
        transform: translateX(0px);
    }
</style>
<?php

return array(
	'key' => 'brackets',
	'label' => __('Brackets', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 1,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

