<?php ob_start() ?>
<style data-style_key="second_text_and_borders" data-span_required="1">
    /* Effect 9: second text and borders */
    .cl-effect-9 a {
        margin: 0 20px;
        padding: 18px 20px;
        color: normal_text_color;
    }

    .cl-effect-9 a::before,
    .cl-effect-9 a::after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;     
        background: normal_text_color;
        content: '';
        opacity: 0.2;
        -webkit-transition: opacity 0.3s, height 0.3s;
        -moz-transition: opacity 0.3s, height 0.3s;
        transition: opacity 0.3s, height 0.3s;
    }

    .cl-effect-9 a::after {
        top: 100%;
        opacity: 0;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    .cl-effect-9 a span:first-child {
        z-index: 2;
        display: block;       
        font-weight: 300;
    }

    .cl-effect-9 a span:last-child {
        z-index: 1;
        display: block;
        padding: 8px 0 0 0;
        color: hover_text_color;        
        text-shadow: none;
        text-transform: none;
        font-style: italic;
        font-size: 0.75em;
        font-family: Palatino, "Palatino Linotype", "Palatino LT STD", "Book Antiqua", Georgia, serif;
        opacity: 0;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        -webkit-transform: translateY(-100%);
        -moz-transform: translateY(-100%);
        transform: translateY(-100%);
    }

    .cl-effect-9 a:hover::before,
    .cl-effect-9.current-menu-item a::before,
    .cl-effect-9 a:focus::before {
        height: 6px;       
    }

    .cl-effect-9 a:hover::before,
    .cl-effect-9 a:hover::after,
    .cl-effect-9.current-menu-item a::before,
    .cl-effect-9.current-menu-item a::after,
    .cl-effect-9 a:focus::before,
    .cl-effect-9 a:focus::after {
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        transform: translateY(0px);
    }

    .cl-effect-9 a:hover span:last-child,
    .cl-effect-9.current-menu-item a span:last-child,
    .cl-effect-9 a:focus span:last-child {
        opacity: 1;   
        -webkit-transform: translateY(0%);
        -moz-transform: translateY(0%);
        transform: translateY(0%);
    }
</style>
<?php

return array(
	'key' => 'second_text_and_borders',
	'label' => __('Second text and borders', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 9,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'hover_text_color' => '#000000'
	)
);

