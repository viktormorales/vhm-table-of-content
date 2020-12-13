<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://viktormorales.com
 * @since      1.0.0
 *
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="<?php echo $this->plugin_name; ?>" class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <form action="options.php" method="post">
        <?php settings_fields( $this->plugin_name ); ?>

        <div id="<?php echo $this->plugin_name; ?>-non-amazon-description"><p><?php _e( 'Please change the settings accordingly.', $this->plugin_name ); ?></p></div>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo $this->plugin_name; ?>_title">Title</label>
                    </th>
                    <td>
                        <input type="text" name="<?php echo $this->plugin_name; ?>_title" id="<?php echo $this->plugin_name; ?>_title" class="regular-text" value="<?php echo get_option($this->plugin_name . '_title'); ?>" placeholder="">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo $this->plugin_name; ?>_element"><?php _e('Element', $this->plugin_name); ?></label>
                    </th>
                    <td>
                        <input type="text" name="<?php echo $this->plugin_name; ?>_element" id="<?php echo $this->plugin_name; ?>_element" class="regular-text" value="<?php echo get_option($this->plugin_name . '_element'); ?>" placeholder="">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo $this->plugin_name; ?>_list_class"><?php _e('List class', $this->plugin_name); ?></label>
                    </th>
                    <td>
                        <input type="text" name="<?php echo $this->plugin_name; ?>_list_class" id="<?php echo $this->plugin_name; ?>_list_class" class="regular-text" value="<?php echo get_option($this->plugin_name . '_list_class'); ?>" placeholder="">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo $this->plugin_name; ?>_first_item_class"><?php _e('First item class', $this->plugin_name); ?></label>
                    </th>
                    <td>
                        <input type="text" name="<?php echo $this->plugin_name; ?>_first_item_class" id="<?php echo $this->plugin_name; ?>_first_item_class" class="regular-text" value="<?php echo get_option($this->plugin_name . '_first_item_class'); ?>" placeholder="">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo $this->plugin_name; ?>_each_item_class"><?php _e('Each item class', $this->plugin_name); ?></label>
                    </th>
                    <td>
                        <input type="text" name="<?php echo $this->plugin_name; ?>_each_item_class" id="<?php echo $this->plugin_name; ?>_each_item_class" class="regular-text" value="<?php echo get_option($this->plugin_name . '_each_item_class'); ?>" placeholder="">
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>
    </form>
</div>