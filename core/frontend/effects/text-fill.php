<?php ob_start() ?>
<style>
    /* Effect 11: text fill based on Lea Verou's animation http://dabblet.com/gist/6046779 */
    .cl-effect-11 a {
        padding: 10px 0;
        border-top: 2px solid normal_text_color;
        color: normal_text_color;
        text-shadow: none;
    } 

    .cl-effect-11 a::before {
        position: absolute;
        top: 0;
        left: 0;
        overflow: hidden;
        padding: 10px 0;
        max-width: 0;
        border-bottom: 2px solid hover_text_color;
        color: hover_text_color;
        content: attr(data-hover);
        -webkit-transition: max-width 0.5s;
        -moz-transition: max-width 0.5s;
        transition: max-width 0.5s !important;
		white-space: nowrap;
    }

    .cl-effect-11 a:hover::before,
    .cl-effect-11.current-menu-item a::before,
    .cl-effect-11 a:focus::before {
        max-width: 100%;
    }

</style>
<?php

return array(
	'key' => 'text_fill',
	'label' => __('Text fill', 'wp-menu-effects'),
	'html' => ob_get_clean(),
	'effect_number' => 11,
	'settings' => array(
		'normal_text_color' => '#000000',
		'hover_text_color' => '#FFFFFF'
	)
);

