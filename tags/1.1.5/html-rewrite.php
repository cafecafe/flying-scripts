<?php
include('lib/dom-parser.php');

function flying_scripts_is_keyword_included($content, $keywords) {
    foreach($keywords as $keyword) {
        if (strpos($content, $keyword) !== false) return true;
    }
    return false;
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

        $include_list = get_option('flying_scripts_include_list');

        foreach ($newHtml->find("script[!type],script[type='text/javascript']") as $script) {
            if(flying_scripts_is_keyword_included($script->outertext, $include_list)) {
                $script->setAttribute("data-type","lazy");
                if($script->getAttribute("src")) {
                    $script->setAttribute("data-src", $script->getAttribute("src"));
                    $script->removeAttribute("src");
                }
                else {
                    $script->setAttribute("data-src", "data:text/javascript;base64,".base64_encode($script->innertext));
                    $script->innertext="";
                }
            }
        }
        
        return $newHtml;

    } catch (Exception $e) {
        return $html;
    }
}

if (!is_admin()) ob_start("flying_scripts_rewrite_html");
