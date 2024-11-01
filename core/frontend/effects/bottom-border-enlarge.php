<?php ob_start() ?>
<style>
    /* Effect 4: bottom border enlarge */
    .cl-effect-4 a {
        padding: 0 0 10px;
        color: normal_text_color
    }

    .cl-effect-4 a::after {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        height: 1px;
        background: normal_text_color;
        content: '';
        opacity: 0;
        -webkit-transition: height 0.3s, opacity 0.3s, -webkit-transform 0.3s;
        -moz-transition: height 0.3s, opacity 0.3s, -moz-transform 0.3s;
        transition: height 0.3s, opacity 0.3s, transform 0.3s;
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
        transform: translateY(-10px);
    }

    .cl-effect-4.current-menu-item a::after,
    .cl-effect-4 a:hover::after,
    .cl-effect-4 a:focus::after {
        height: 5px;
        opacity: 1;
        -webkit-transform: translateY(0px);
        -moz-transform: translateY(0px);
        transform: translateY(0px);
    }
</style>
<?php

return array(
	'key' => 'bottom_border_enlarge',
	'label' => __('Bottom border enlarge', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 4,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

