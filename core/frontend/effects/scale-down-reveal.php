<?php ob_start() ?>
<style>
    /* Effect 15: scale down, reveal */
    .cl-effect-15 a {
        color: rgba(0,0,0,0.2);
        font-weight: 700;
        text-shadow: none;
    }

    .cl-effect-15 a::before {
        color: normal_text_color;
        content: attr(data-hover);
        position: absolute;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -moz-transition: -moz-transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
    }

    .cl-effect-15 a:hover::before,
    .cl-effect-15.current-menu-item a::before,
    .cl-effect-15 a:focus::before {
        -webkit-transform: scale(0.9);
        -moz-transform: scale(0.9);
        transform: scale(0.9);
        opacity: 0;
    }

</style>
<?php

return array(
	'key' => 'scale_down_reveal',
	'label' => __('Scale down, reveal', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 15,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

