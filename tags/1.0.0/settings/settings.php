<h2>Flying Scripts by WP Speed Matters Settings</h2>

<?php
    include('scripts.php');
    include('faq.php');
    include('optimize-more.php');

    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : "scripts";

    if (isset($_POST['submit'])) {
        echo '<div class="notice notice-success is-dismissible"><p>Settings have been saved! Please clear cache if you\'re using a cache plugin</p></div>';
    }
?>

<h2 class="nav-tab-wrapper">
    <a href="?page=flying-scripts&tab=scripts" class="nav-tab <?php echo $active_tab == 'scripts' ? 'nav-tab-active' : ''; ?>">Scripts</a>
    <a href="?page=flying-scripts&tab=faq" class="nav-tab <?php echo $active_tab == 'faq' ? 'nav-tab-active' : ''; ?>">FAQ</a>
    <a href="?page=flying-scripts&tab=optimize-more" class="nav-tab <?php echo $active_tab == 'optimize-more' ? 'nav-tab-active' : ''; ?>">Optimize More!</a>
</h2>

<?php
    switch ($active_tab) {
        case 'scripts':
            flying_scripts_settings_scripts();
            break;
        case 'faq':
            flying_scripts_settings_faq();
            break;
        case 'optimize-more':
            flying_scripts_settings_optimize_more();
            break;
        default:
            flying_scripts_settings_optimize_more();
    }
?>