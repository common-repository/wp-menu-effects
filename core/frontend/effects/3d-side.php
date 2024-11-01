<?php ob_start() ?>
<style data-span_required="1">
    /* Effect 19: 3D side */
    .cl-effect-19 a {    
        line-height: 2em;
        margin: 15px;
        -webkit-perspective: 800px;
        -moz-perspective: 800px;
        perspective: 800px;
        width: 200px;
    }

    .cl-effect-19 a span {
        color: normal_text_color; 
        text-align: center;
        position: relative;
        display: inline-block;
        width: 100%;
        padding: 0 14px;
        background: normal_background_color;
        -webkit-transition: -webkit-transform 0.4s, background 0.4s;
        -moz-transition: -moz-transform 0.4s, background 0.4s;
        transition: transform 0.4s, background 0.4s;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform-origin: 50% 50% -100px;
        -moz-transform-origin: 50% 50% -100px;
        transform-origin: 50% 50% -100px;
    }

    .csstransforms3d .cl-effect-19 a span::before {
        color: hover_text_color;
        position: absolute;
        top: 0;
        left: 100%;
        width: 100%;
        height: 100%;
        background: /*#232b2b*/ hover_background_color;   
        content: attr(data-hover);
        -webkit-transition: background 0.4s;
        -moz-transition: background 0.4s;
        transition: background 0.4s;
        -webkit-transform: rotateY(90deg);
        -moz-transform: rotateY(90deg);
        transform: rotateY(90deg);
        -webkit-transform-origin: 0 50%;
        -moz-transform-origin: 0 50%;
        transform-origin: 0 50%;
        pointer-events: none;
    }

    .cl-effect-19.current-menu-item a span,
    .cl-effect-19 a:hover span,
    .cl-effect-19 a:focus span {
        background: normal_background_color;       
        -webkit-transform: rotateY(-90deg);
        -moz-transform: rotateY(-90deg);
        transform: rotateY(-90deg);
    }

    .csstransforms3d .cl-effect-19.current-menu-item a span::before,
    .csstransforms3d .cl-effect-19 a:hover span::before,
    .csstransforms3d .cl-effect-19 a:focus span::before {
        background: hover_background_color;   
    }
</style>
<?php

return array(
	'key' => '3d_side',
	'label' => __('3D side', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 19,
	'span_required' => true,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'hover_text_color' => '#FFFFFF',
		'normal_background_color' => '#000000',
		'hover_background_color' => '#232b2b'
	)
);

