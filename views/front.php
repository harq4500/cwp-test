<div class="cwp-content-wrap">
    <?php if($this->options['cwp_text_field'] && !empty($text_custom_field)): ?>
    <p class="cwp-text"><?php echo $text_custom_field; ?></p>
    <?php endif; ?>
    <?php if($this->options['cwp_date_field'] && !empty($date_custom_field)): ?>
    <p class="cwp-date"><?php echo $date_custom_field; ?></p>
    <?php endif; ?>
    <?php if($this->options['cwp_image_field'] && !empty($image_attributes)): ?>
    <p class="cwp-image">
        <img src="<?php echo $image_attributes[0]; ?>" />
    </p>
    <?php endif; ?>
</div>