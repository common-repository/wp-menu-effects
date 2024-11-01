jQuery(function ($) {

    function menu_effects_handler() {

        var handler = {
            span_required: false,
            style: '',
            init: function () {

                if ($('#wpme-style').length <= 0) {
                    return;
                }

                this.span_required = Boolean($('#wpme-style').data('span_required'));
                this.style = $('#wpme-style').data('style_key');
                this.submenus_detected = $('.wpme-selected-menu .sub-menu').length > 0;
                console.log('submenus detected', this.submenus_detected);
                this.add_hover_data_to_links();

            },
            add_hover_data_to_links: function () {

                var $items = $('.wpme-item a');

                //console.log($items);

                $items.toArray().forEach(item => {

                    var $item = $(item);
                    //console.log(item);
                    var submenu_exists = $item.parent().find('.sub-menu').length > 0;
                    //console.log('submenu exists: ', submenu_exists);
                    //var $paremt  = $item.closest('.wpme-item');

                    var text = /*$item.text() ? $item.text() : */$item.parent().find(':not(:has(*))').text();

                    //console.log($item.contents().toArray());
                    if (submenu_exists && this.span_required) {
                        var first_node_is_span = $item.contents().eq(0).is('span');
                        console.log('submenu exists');
                        console.log('es span', $item.contents().eq(0).is('span'));
                        if (!first_node_is_span) {
                            text = $item.contents().toArray()[0].data;
                            $item.contents().eq(0).remove();
                            $item.children().before($(document.createElement('span')).text(text));
                        }

                    }

                    var has_span = Boolean($item.find('span').length);

                    $item.attr({'data-hover': text});

                    if (!has_span && this.span_required) {

                        var $span = $(document.createElement('span')).attr({'data-hover': text}).text(text);

                        var $append = this.style === 'second_text_and_borders' ? [$span, $span.clone()] : $span;

                        $item.empty().append($append);
                        return;
                    }

                    if (has_span) {
                        var $span = $item.find('span');
                        $span.attr({'data-hover': text});
                        if (this.style === 'second_text_and_borders') {
                            $span.after($span.clone());
                        }
                        return;
                    }

                });

            }

        }

        handler.init();

        return handler;

    }

    menu_effects_handler();

});

