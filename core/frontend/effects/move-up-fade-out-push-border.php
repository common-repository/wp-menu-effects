<?php ob_start() ?>
<style>
    /* Effect 17: move up fade out, push border */
    .cl-effect-17 a {  
        text-shadow: none;
        padding: 10px 0;
    }

    .cl-effect-17 a::before {
        color: normal_text_color;
        text-shadow: 0 0 1px rgba(255,255,255,0.3);
        content: attr(data-hover);
        position: absolute;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        pointer-events: none;
    }

    .cl-effect-17 a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: normal_text_color;
        opacity: 0;
        -webkit-transform: translateY(5px);
        -moz-transform: translateY(5px);
        transform: translateY(5px);
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        pointer-events: none;
    }

    .cl-effect-17 a:hover::before,
    .cl-effect-17.current-menu-item a::before,
    .cl-effect-17 a:focus::before {
        opacity: 0;
        -webkit-transform: translateY(-2px);
        -moz-transform: translateY(-2px);
        transform: translateY(-2px);
    }

    .cl-effect-17 a:hover::after,
    .cl-effect-17.current-menu-item a::after,
    .cl-effect-17 a:focus::after {
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        transform: translateY(0px);
    }

</style>
<?php

return array(
	'key' => 'move_up_fade_out_push_border',
	'label' => __('Move up fade out, push border', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 17,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

