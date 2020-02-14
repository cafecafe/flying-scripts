<?php
// Inject JavaScript code for lazy loading

function flying_scripts_inject_js() {

  $timeout = get_option('flying_scripts_timeout');

    ?>
<script type="text/javascript" id="flying-scripts">
const loadScriptsTimer = setTimeout(loadScripts, <?php echo $timeout ?>*1000);
const events = ["mouseover", "scroll", "keydown", "touchmove", "touchstart"];
events.forEach(function(event) {
  window.addEventListener(event, triggerScriptLoader, { passive: true });
});

function triggerScriptLoader() {
  loadScripts();
  clearTimeout(loadScriptsTimer);
  events.forEach(function(event) {
    window.removeEventListener(event, triggerScriptLoader, { passive: true });
  });
}

function loadScripts() {
  document.querySelectorAll("script[type='lazy']").forEach(function(elem) {
    elem.setAttribute("type", "text/javascript");
    elem.setAttribute("src", elem.getAttribute("data-src"));
  });
}
</script>
    <?php
}

add_action( 'wp_print_footer_scripts', 'flying_scripts_inject_js');