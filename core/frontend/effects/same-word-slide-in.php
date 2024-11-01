<?php ob_start() ?>
<style data-span_required="1">
    .cl-effect-5 a {
        overflow: hidden;
        padding: 0 4px;
        height: 1em;
        text-align: center;
        line-height: 1;
        color: normal_text_color;
    }

    .cl-effect-5 a span {
        position: relative;
        display: inline-block;
        -webkit-transition: -webkit-transform 0.3s;
        -moz-transition: -moz-transform 0.3s;
        transition: transform 0.3s;
    }

    .cl-effect-5 a span::before {
        position: absolute;
        top: 100%;
        content: attr(data-hover);
        font-weight: 700;
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
        line-height: 1;
    }

    .cl-effect-5 a:hover span,
    .cl-effect-5.current-menu-item a span,
    .cl-effect-5 a:focus span {
        -webkit-transform: translateY(-100%);
        -moz-transform: translateY(-100%);
        transform: translateY(-100%);
    }
</style>
<?php

return array(
	'key' => 'same_word_slide_in',
	'label' => __('Same word slide in', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 5,
	'span_required' => true,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

