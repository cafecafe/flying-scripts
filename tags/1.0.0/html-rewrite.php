<?php
include('lib/dom-parser.php');

function flying_scripts_is_keyword_included($content, $keywords) {
    foreach($keywords as $keyword) {
        if (strpos($content, $keyword) !== false) return true;
    }
    return false;
}

function flying_scripts_delayed_script($script, $delay) {
    $delay = $delay * 1000;
    return "setTimeout(function(){{$script}},{$delay});";
}

function flying_scripts_rewrite_html($html) {
    try {
        // Detect non-HTML
        if (!isset($html) || trim($html) === '' || strcasecmp(substr($html, 0, 5), '<?xml') === 0 || trim($html)[0] !== "<") {
            return $html;
        }

        // Parse HTML
        $newHtml = str_get_html($html);

        // Not HTML, return original
        if (!is_object($newHtml)) return $html;


        $group_1_delay = get_option('flying_scripts_group_1_delay');
        $group_2_delay = get_option('flying_scripts_group_2_delay');
        $group_3_delay = get_option('flying_scripts_group_3_delay');

        $group_1_include_list = get_option('flying_scripts_group_1_include_list');
        $group_2_include_list = get_option('flying_scripts_group_2_include_list');
        $group_3_include_list = get_option('flying_scripts_group_3_include_list');

        foreach ($newHtml->find('script[!src]') as $script) {
            // Group 1
            if(flying_scripts_is_keyword_included($script->outertext, $group_1_include_list)) {
                $script->innertext = flying_scripts_delayed_script($script->innertext, $group_1_delay);
                continue;
            }

            // Group 2
            if(flying_scripts_is_keyword_included($script->outertext, $group_2_include_list)) {
                $script->innertext = flying_scripts_delayed_script($script->innertext, $group_2_delay);
                continue;
            }

            // Group 3
            if(flying_scripts_is_keyword_included($script->outertext, $group_3_include_list)) {
                $script->innertext = flying_scripts_delayed_script($script->innertext, $group_3_delay);
                continue;
            }
        }
        
        return $newHtml;

    } catch (Exception $e) {
        return $html;
    }
}

if (!is_admin()) ob_start("flying_scripts_rewrite_html");
