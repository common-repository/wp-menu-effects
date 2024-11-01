<?php ob_start() ?>
<style>
    /* Effect 7: second border slides up */
    .cl-effect-7 a {
        padding: 12px 10px 10px;
        color: normal_text_color;
        text-shadow: none;
        font-weight: 700;
    }

    .cl-effect-7 a::before,
    .cl-effect-7 a::after {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 3px;
        background: normal_text_color;
        content: '';
        -webkit-transition: -webkit-transform 0.3s;
        -moz-transition: -moz-transform 0.3s;
        transition: transform 0.3s;
        -webkit-transform: scale(0.85);
        -moz-transform: scale(0.85);
        transform: scale(0.85);
    }

    .cl-effect-7 a::after {
        opacity: 0;
        -webkit-transition: top 0.3s, opacity 0.3s, -webkit-transform 0.3s;
        -moz-transition: top 0.3s, opacity 0.3s, -moz-transform 0.3s;
        transition: top 0.3s, opacity 0.3s, transform 0.3s;
    }

    .cl-effect-7 a:hover::before,
    .cl-effect-7 a:hover::after,
    .cl-effect-7.current-menu-item a::before,
    .cl-effect-7.current-menu-item a::after,
    .cl-effect-7 a:focus::before,
    .cl-effect-7 a:focus::after {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        transform: scale(1);
    }

    .cl-effect-7 a:hover::after,
    .cl-effect-7.current-menu-item a::after,
    .cl-effect-7 a:focus::after {
        top: 0%;
        opacity: 1;
    }
</style>
<?php

return array(
	'key' => 'second_border_slides_up',
	'label' => __('Second border slides up', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 7,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

