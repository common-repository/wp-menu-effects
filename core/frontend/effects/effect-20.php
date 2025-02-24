<?php ob_start() ?>
<style data-span_required="1">
    /* Effect 20: */
    .cl-effect-20 a {
        color: normal_text_color;
        text-align: center;
        line-height: 2em;
        -webkit-perspective: 800px;
        -moz-perspective: 800px;
        perspective: 800px;
    }

    .cl-effect-20 a span {
        position: relative;
        display: inline-block;
        padding: 3px 15px 0;
        background: normal_background_color;
        box-shadow: inset 0 3px normal_border_color;
        -webkit-transition: background 0.6s;
        -moz-transition: background 0.6s;
        transition: background 0.6s;
        -webkit-transform-origin: 50% 0;
        -moz-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform-origin: 0% 50%;
        -moz-transform-origin: 0% 50%;
        transform-origin: 0% 50%;
    }

    .cl-effect-20 a span::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: hover_background_color;
        color: hover_text_color;
        content: attr(data-hover);
        -webkit-transform: rotateX(270deg);
        -moz-transform: rotateX(270deg);
        transform: rotateX(270deg);
        -webkit-transition: -webkit-transform 0.6s;
        -moz-transition: -moz-transform 0.6s;
        transition: transform 0.6s;
        -webkit-transform-origin: 0 0;
        -moz-transform-origin: 0 0;
        transform-origin: 0 0;
        pointer-events: none;
    }

    .cl-effect-20 a:hover span,
    .cl-effect-20.current-menu-item a span,
    .cl-effect-20 a:focus span {
		background: #2f4351;
    }

    .cl-effect-20 a:hover span::before,
    .cl-effect-20.current-menu-item a span::before,
    .cl-effect-20 a:focus span::before {
        -webkit-transform: rotateX(10deg);	
        -moz-transform: rotateX(10deg);
        transform: rotateX(10deg);
    }
</style>
<?php

return array(
	'key' => 'effect_20',
	'label' => __('Effect 20', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 20,
	'span_required' => true,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'normal_background_color' => '#505050',
		'normal_border_color' => '#000000',
		'hover_text_color' => '#000000',
		'hover_background_color' => '#FFFFFF'
	)
);

