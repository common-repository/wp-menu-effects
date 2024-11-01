<?php ob_start() ?>
<style data-span_required="1">
    /*Effect 10: reveal, push out */
    .cl-effect-10  {
        position: relative;
        z-index: 1;
    }

    .cl-effect-10 a {
        overflow: hidden;
        margin: 0 15px;
    }

    .cl-effect-10 a span {
        color: normal_text_color;
        display: block;
        padding: 10px 20px;
        background: normal_background_color;
        -webkit-transition: -webkit-transform 0.3s;
        -moz-transition: -moz-transform 0.3s;
        transition: transform 0.3s;
    }

    .cl-effect-10 a::before {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        padding: 10px 20px;
        width: 100%;
        height: 100%;
        background: hover_background_color;
        color: hover_text_color;
        content: attr(data-hover);
        -webkit-transition: -webkit-transform 0.3s;
        -moz-transition: -moz-transform 0.3s;
        transition: transform 0.3s;
        -webkit-transform: translateX(-25%);
    }

    .cl-effect-10 a:hover span,
    .cl-effect-10.current-menu-item a span,
    .cl-effect-10 a:focus span {
        -webkit-transform: translateX(100%);
        -moz-transform: translateX(100%);
        transform: translateX(100%);
    }

    .cl-effect-10 a:hover::before,
    .cl-effect-10.current-menu-item a::before,
    .cl-effect-10 a:focus::before {
        -webkit-transform: translateX(0%);
        -moz-transform: translateX(0%);
        transform: translateX(0%);
    }
</style>
<?php

return array(
	'key' => 'reveal_push_out',
	'label' => __('Reveal, push out', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 10,
	'span_required' => true,
	'settings' => array(
		'normal_text_color' => '#FFFFFF',
		'normal_background_color' => '#000000',
		'hover_text_color' => '#000000',
		'hover_background_color' => '#FFFFFF'
	)
);

