<?php ob_start() ?>
<style>
    /* Effect 6: same word slide in and border bottom */
    .cl-effect-6 a {
        margin: 0 10px;
        padding: 10px 20px;
        color: normal_text_color;
    }

    .cl-effect-6 a::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: normal_text_color;
        content: '';
        -webkit-transition: top 0.3s;
        -moz-transition: top 0.3s;
        transition: top 0.3s;
    }

    .cl-effect-6 a::after {
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 2px;
        background: normal_text_color;
        content: '';
        -webkit-transition: height 0.3s;
        -moz-transition: height 0.3s;
        transition: height 0.3s;
    }

    .cl-effect-6 a:hover::before,
    .cl-effect-6.current-menu-item a::before {
        top: 100%;
        opacity: 1;
    }

    .cl-effect-6 a:hover::after ,
    .cl-effect-6.current-menu-item a::after {
        height: 100%;
    } 
</style>
<?php

return array(
	'key' => 'same_word_slide_in_and_border_bottom',
	'label' => __('Same word slide in and border bottom', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 6,
	'settings' => array(
		'normal_text_color' => '#FFFFFF'
	)
);

