jQuery(function($){
    
    function settings_handler(){
        
        var handler = {
            gifs_url: '',
            no_effect_selected_message: '',
            effects: {},
            init: function(){
             
                var preview_data = $('#wpme_effect_preview').data();
                var effects_data = $('#wpme_hover_effect').data('effects');
                
                this.gifs_url                   = preview_data.gifs_url;
                this.no_effect_selected_message = preview_data.empty_message;
                this.effects                    = effects_data ? effects_data : {};
           
                $('.wpme-effect-setting').wpColorPicker();
                $('#wpme_hover_effect').change({ handler: this }, this.handle_effect_change);
                                            
            },
            handle_effect_change: function(event){
                
                var handler = event.data.handler;                
                var $select = $(this);
                
                handler.change_preview_gif($select.val());
                handler.show_effect_settings($select.val());
                
            },
            change_preview_gif: function(selected_effect) {                
                
                var selected_effect = selected_effect;
                var gif_pieces      = [ this.gifs_url, selected_effect.replace(/_/g, '-'), '.gif' ];                
                var preview_gif     = selected_effect ? gif_pieces.join('') : '';
                
                if(preview_gif){
                    $('#wpme_effect_preview').attr({ src: preview_gif });
                    this.show_preview();
                }
                else{
                    this.show_no_effect_selected_message();
                }              
             
            },
            show_effect_settings: function(selected_effect){
                
                var $effect               = this.effects[selected_effect];                
                var $effect_settings_keys = $effect && $effect.settings ? Object.keys($effect.settings) : [];                
                var $settings             = $('.wpme-effect-setting').toArray();
                
                $settings.forEach(item => {
                    
                    var $setting   = $(item);
                    var setting_id = $setting.attr('id').replace('wpme_', '');
                    if($effect_settings_keys.indexOf(setting_id) > -1){ 
                        $setting.closest('tr').removeClass('wpme_hidden');
                        $setting.prop('disabled', false);
                        $setting.val($effect.settings[setting_id]);
                        $setting.trigger('change');
                    }else{
                        $setting.closest('tr').addClass('wpme_hidden');
                        $setting.prop('disabled', true);                       
                    }
                    
                });
                
            },
            show_no_effect_selected_message: function(){                
                var $preview = $('#wpme_effect_preview').addClass('wpme_hidden');
                $preview.parent().find('p').removeClass('wpme_hidden');                               
            },
            show_preview: function(){
                var $preview = $('#wpme_effect_preview').removeClass('wpme_hidden');
                $preview.parent().find('p').addClass('wpme_hidden');  
            }
            
        };
        
        handler.init();
        
        return handler;
        
    }
    
    settings_handler();
    
});
