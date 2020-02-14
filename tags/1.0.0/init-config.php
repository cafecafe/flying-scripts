<?php
// Set default config on plugin load if not set
function flying_scripts_set_default_config() {

    if (FLYING_SCRIPTS_VERSION !== get_option('FLYING_SCRIPTS_VERSION')) {
        
        // Group 1
        if (get_option('flying_scripts_group_1_delay') === false)
            update_option('flying_scripts_group_1_delay', 1);

        if (get_option('flying_scripts_group_1_include_list') === false)
            update_option('flying_scripts_group_1_include_list', []);

        // Group 2
        if (get_option('flying_scripts_group_2_delay') === false)
            update_option('flying_scripts_group_2_delay', 3);

        if (get_option('flying_scripts_group_2_include_list') === false)
            update_option('flying_scripts_group_2_include_list', []);

        // Group 3
        if (get_option('flying_scripts_group_3_delay') === false)
            update_option('flying_scripts_group_3_delay', 5);

        if (get_option('flying_scripts_group_3_include_list') === false)
            update_option('flying_scripts_group_3_include_list', []);
            
        update_option('FLYING_SCRIPTS_VERSION', FLYING_SCRIPTS_VERSION);
    }
}

add_action('plugins_loaded', 'flying_scripts_set_default_config');
