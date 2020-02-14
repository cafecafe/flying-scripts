<?php
function flying_scripts_format_list($list) {
    $list = trim($list);
    $list = $list ? array_map('trim', explode("\n", str_replace("\r", "", $list))) : [];
    return $list;
}

function flying_scripts_settings_scripts() {

    if (isset($_POST['submit'])) {
        update_option('flying_scripts_group_1_delay', sanitize_text_field($_POST['flying_scripts_group_1_delay']));
        update_option('flying_scripts_group_2_delay', sanitize_text_field($_POST['flying_scripts_group_2_delay']));
        update_option('flying_scripts_group_3_delay', sanitize_text_field($_POST['flying_scripts_group_3_delay']));

        update_option('flying_scripts_group_1_include_list', flying_scripts_format_list($_POST['flying_scripts_group_1_include_list']));
        update_option('flying_scripts_group_2_include_list', flying_scripts_format_list($_POST['flying_scripts_group_2_include_list']));
        update_option('flying_scripts_group_3_include_list', flying_scripts_format_list($_POST['flying_scripts_group_3_include_list']));
    }

    $group_1_delay = get_option('flying_scripts_group_1_delay');
    $group_2_delay = get_option('flying_scripts_group_2_delay');
    $group_3_delay = get_option('flying_scripts_group_3_delay');

    $group_1_include_list = get_option('flying_scripts_group_1_include_list');
    $group_2_include_list = get_option('flying_scripts_group_2_include_list');
    $group_3_include_list = get_option('flying_scripts_group_3_include_list');

    ?>
<form method="POST">
    <?php wp_nonce_field('flying-scripts', 'flying-scripts-settings-form'); ?>
    <table class="form-table" role="presentation">
    <tbody>
        <tr>
            <th scope="row"><label>Group 1 Delay</label></th>
            <td>
                <select name="flying_scripts_group_1_delay" value="<?php echo $group_1_delay; ?>">
                    <option value="1" <?php if ($group_1_delay == 1) {echo 'selected';} ?>>1s</option>
                    <option value="2" <?php if ($group_1_delay == 2) {echo 'selected';} ?>>2s</option>
                    <option value="3" <?php if ($group_1_delay == 3) {echo 'selected';} ?>>3s</option>
                    <option value="4" <?php if ($group_1_delay == 4) {echo 'selected';} ?>>4s</option>
                    <option value="5" <?php if ($group_1_delay == 5) {echo 'selected';} ?>>5s</option>
                    <option value="6" <?php if ($group_1_delay == 6) {echo 'selected';} ?>>6s</option>
                    <option value="7" <?php if ($group_1_delay == 7) {echo 'selected';} ?>>7s</option>
                    <option value="8" <?php if ($group_1_delay == 8) {echo 'selected';} ?>>8s</option>
                    <option value="9" <?php if ($group_1_delay == 9) {echo 'selected';} ?>>9s</option>
                    <option value="10" <?php if ($group_1_delay == 10) {echo 'selected';} ?>>10s</option>
                </select>
            <td>
        </tr>
        <tr>
            <th scope="row"><label>Group 1 Include Keywords</label></th>
            <td>
                <textarea name="flying_scripts_group_1_include_list" rows="4" cols="50"><?php echo implode('&#10;', $group_1_include_list); ?></textarea>
            </td>
        </tr>
        <td></td>
        <tr>
            <th scope="row"><label>Group 2 Delay</label></th>
            <td>
                <select name="flying_scripts_group_2_delay" value="<?php echo $group_2_delay; ?>">
                    <option value="1" <?php if ($group_2_delay == 1) {echo 'selected';} ?>>1s</option>
                    <option value="2" <?php if ($group_2_delay == 2) {echo 'selected';} ?>>2s</option>
                    <option value="3" <?php if ($group_2_delay == 3) {echo 'selected';} ?>>3s</option>
                    <option value="4" <?php if ($group_2_delay == 4) {echo 'selected';} ?>>4s</option>
                    <option value="5" <?php if ($group_2_delay == 5) {echo 'selected';} ?>>5s</option>
                    <option value="6" <?php if ($group_2_delay == 6) {echo 'selected';} ?>>6s</option>
                    <option value="7" <?php if ($group_2_delay == 7) {echo 'selected';} ?>>7s</option>
                    <option value="8" <?php if ($group_2_delay == 8) {echo 'selected';} ?>>8s</option>
                    <option value="9" <?php if ($group_2_delay == 9) {echo 'selected';} ?>>9s</option>
                    <option value="10" <?php if ($group_2_delay == 10) {echo 'selected';} ?>>10s</option>
                </select>
            <td>
        </tr>
        <tr>
            <th scope="row"><label>Group 2 Include Keywords</label></th>
            <td>
                <textarea name="flying_scripts_group_2_include_list" rows="4" cols="50"><?php echo implode('&#10;', $group_2_include_list); ?></textarea>
            </td>
        </tr>
        <td></td>
        <tr>
            <th scope="row"><label>Group 3 Delay</label></th>
            <td>
                <select name="flying_scripts_group_3_delay" value="<?php echo $group_3_delay; ?>">
                    <option value="1" <?php if ($group_3_delay == 1) {echo 'selected';} ?>>1s</option>
                    <option value="2" <?php if ($group_3_delay == 2) {echo 'selected';} ?>>2s</option>
                    <option value="3" <?php if ($group_3_delay == 3) {echo 'selected';} ?>>3s</option>
                    <option value="4" <?php if ($group_3_delay == 4) {echo 'selected';} ?>>4s</option>
                    <option value="5" <?php if ($group_3_delay == 5) {echo 'selected';} ?>>5s</option>
                    <option value="6" <?php if ($group_3_delay == 6) {echo 'selected';} ?>>6s</option>
                    <option value="7" <?php if ($group_3_delay == 7) {echo 'selected';} ?>>7s</option>
                    <option value="8" <?php if ($group_3_delay == 8) {echo 'selected';} ?>>8s</option>
                    <option value="9" <?php if ($group_3_delay == 9) {echo 'selected';} ?>>9s</option>
                    <option value="10" <?php if ($group_3_delay == 10) {echo 'selected';} ?>>10s</option>
                </select>
            <td>
        </tr>
        <tr>
            <th scope="row"><label>Group 3 Include Keywords</label></th>
            <td>
                <textarea name="flying_scripts_group_3_include_list" rows="4" cols="50"><?php echo implode('&#10;', $group_3_include_list); ?></textarea>
            </td>
        </tr>
    </tbody>
    </table>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>
<?php
}
