<?php

ob_start();
?>
<style data-span_required="1">
    /* Effect 2: 3D rolling links, idea from http://hakim.se/thoughts/rolling-links */

    .cl-effect-2 a span {
        color: normal_text_color;
        text-align: center;
        position: relative;
        display: inline-block;
        padding: 0 14px;
        background: normal_background_color;
        -webkit-transition: -webkit-transform 0.3s;
        -moz-transition: -moz-transform 0.3s;
        transition: transform 0.3s;
        -webkit-transform-origin: 50% 0;
        -moz-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .csstransforms3d .cl-effect-2 a span::before {
        position: absolute;
        color: hover_text_color;
        top: 100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: hover_background_color;;
        content: attr(data-hover);
        -webkit-transition: background 0.3s;
        -moz-transition: background 0.3s;
        transition: background 0.3s;
        -webkit-transform: rotateX(-90deg);
        -moz-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
        -webkit-transform-origin: 50% 0;
        -moz-transform-origin: 50% 0;
        transform-origin: 50% 0;
    }

    .cl-effect-2.current-menu-item a span,
    .cl-effect-2 a:hover span,
    .cl-effect-2 a:focus span {
        -webkit-transform: rotateX(90deg) translateY(-22px);
        -moz-transform: rotateX(90deg) translateY(-22px);
        transform: rotateX(90deg) translateY(-22px);
    }

    .csstransforms3d .cl-effect-2.current-menu-item a span::before,
    .csstransforms3d .cl-effect-2 a:hover span::before,
    .csstransforms3d .cl-effect-2 a:focus span::before {
        background: hover_background_color;
    }
</style>
<?php

return array(
	'key' => '3d_rolling_links',
	'label' => __('3D rolling links', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 2,
	'span_required' => true,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'hover_text_color' => '#FFFFFF',
		'normal_background_color' => '#000000',
		'hover_background_color' => '#232b2b'
	)
);

