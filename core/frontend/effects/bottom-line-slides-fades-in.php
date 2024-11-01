<?php ob_start() ?>
<style>
    /* Effect 3: bottom line slides/fades in */
    .cl-effect-3 a {
        padding: 8px 0;
        color: normal_text_color
    }

    .cl-effect-3 a::after {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 4px;
        background: normal_text_color;
        content: '';
        opacity: 0;
        -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
        -moz-transition: opacity 0.3s, -moz-transform 0.3s;
        transition: opacity 0.3s, transform 0.3s;
        -webkit-transform: translateY(10px);
        -moz-transform: translateY(10px);
        transform: translateY(10px);
    }

    .cl-effect-3.current-menu-item a::after,
    .cl-effect-3 a:hover::after,
    .cl-effect-3 a:focus::after {
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        transform: translateY(0px);
    }
</style>
<?php

return array(
	'key' => 'bottom_line_slides_fades_in',
	'label' => __('Bottom line slides/fades in', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 3,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

