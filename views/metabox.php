<table class="form-table" role="presentation">
    <tbody>
        <?php if(get_option('cwp_text_field')):  ?>
        <tr>
            <td>
                <p style="font-weight: 500; margin-bottom: 5px">
                    <label for="cwp_text_custom_field"><?php echo  __('Text',CWP_TXT_DOMAIN); ?></label>
                </p>			
                <input type="text" id="cwp_text_custom_field" name="cwp_text_custom_field" placeholder="" value="<?php echo $text_custom_field; ?>" style="width: 100%">
                <?php echo sprintf('<p class="description">CWP Custom <strong>%s</strong> %s</p>',__('text',CWP_TXT_DOMAIN), __('field',CWP_TXT_DOMAIN)); ?>
            </td>
        </tr>
        <?php endif;  ?>
        <?php if(get_option('cwp_date_field')):  ?>
        <tr>
            <td>
                <p style="font-weight: 500; margin-bottom: 5px">
                    <label for="cwp_date_custom_field"><?php echo  __('Date',CWP_TXT_DOMAIN); ?></label>
                </p>
                <input type="date" id="cwp_date_custom_field" name="cwp_date_custom_field" placeholder="" value="<?php echo $date_custom_field; ?>" style="width: 100%">
                <?php echo sprintf('<p class="description">CWP Custom <strong>%s</strong> %s</p>',__('date',CWP_TXT_DOMAIN), __('field',CWP_TXT_DOMAIN)); ?>
            </td>
        </tr>
        <?php endif;  ?>
        <?php if(get_option('cwp_image_field')):  ?>
        <tr>
            <td>
                <p style="font-weight: 500; margin-bottom: 5px">
                    <label for="cwp_image_custom_field"><?php echo  __('Image',CWP_TXT_DOMAIN); ?></label>
                </p>
                
                <div>
                    <?php if($display == 'none'): ?>
                        <a href="#" class="cwp_upload_image_button button"><?php echo  __('Upload image',CWP_TXT_DOMAIN);?> </a>
                    <?php else: ?>
                        <a href="#" class="cwp_upload_image_button button">
                            <img src="<?php echo $image_attributes[0]; ?>" style="max-width:95%;display:block;" />
                        </a>
                    <?php endif; ?>
                    <input type="hidden" name="cwp_image_custom_field" id="'cwp_image_custom_field" value="<?php echo $image_custom_field; ?>" />
                    <a href="#" class="cwp_remove_image_button" style="display:inline-block;display:<?php echo $display;?>"> <?php echo  __('Remove image',CWP_TXT_DOMAIN);?></a>
                </div>
                <?php echo sprintf('<p class="description">CWP Custom <strong>%s</strong> %s</p>',__('image',CWP_TXT_DOMAIN), __('field',CWP_TXT_DOMAIN)); ?>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>