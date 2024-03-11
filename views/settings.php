<div class="wrap">
    <h1><?php echo __('Settings', CWP_TXT_DOMAIN) ; ?></h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'cwp_option_group' ); ?>
        <?php do_settings_sections( 'cwp_option_group' ); ?>

        <h2 class="title"><?php echo __('Custom fields to show', CWP_TXT_DOMAIN) ; ?></h2>
        <p><?php echo __('These options will affect both the dashboard and the front end.', CWP_TXT_DOMAIN) ; ?></p>

        <table class="form-table">

            <tr valign="top">
                <td>
                    <label>
                        <input type="checkbox" name="cwp_text_field"  value="true" <?php echo (get_option('cwp_text_field') ? 'checked' : '');  ?> />
                        <?php echo __('Text field', CWP_TXT_DOMAIN) ; ?>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <label>
                        <input type="checkbox" name="cwp_date_field" value="true" <?php echo (get_option('cwp_date_field') ? 'checked' : '');  ?> />
                        <?php echo __('Date field', CWP_TXT_DOMAIN) ; ?>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <label>
                        <input type="checkbox" name="cwp_image_field" value="true" <?php echo (get_option('cwp_image_field') ? 'checked' : '');  ?> />
                        <?php echo __('Image field', CWP_TXT_DOMAIN) ; ?>
                    </label>
                </td>
            </tr>
        </table>

        <h2 class="title"><?php echo __('Where to show field', CWP_TXT_DOMAIN) ; ?></h2>
        <p><?php echo __('These options will affect the front end only.', CWP_TXT_DOMAIN) ; ?></p>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <label for="cwp_scope_option"><?php echo __('Scope', CWP_TXT_DOMAIN) ; ?></label>
                </th>
                <td>
                    <select name="cwp_scope_option" id="cwp_scope_option">
                        <option value="before_content" <?php echo (get_option('cwp_scope_option') == 'before_content' ? "selected" : ""); ?>><?php echo __('Before the content', CWP_TXT_DOMAIN) ; ?></option>
                        <option value="after_content" <?php echo (get_option('cwp_scope_option') == 'after_content' ? "selected" : ""); ?>><?php echo __('After the content', CWP_TXT_DOMAIN) ; ?></option>
                    </select>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>

    </form>
</div>