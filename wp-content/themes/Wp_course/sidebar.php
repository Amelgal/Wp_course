<?php
//if ( ! is_active_sidebar( 'sidebar-1' ) ) {
//	return;
//}
//?>
<!---->
<!--<aside id="secondary" class="widget-area">-->
<!--	--><?php //dynamic_sidebar( 'sidebar-1' ); ?>
<!--</aside> #secondary -->

<div class="sidebar">
    <h2><?php _e('Categories'); ?></h2>
    <ul>
        <?php wp_list_categories('sort_column=name&optioncount=1&hierarchial=0'); ?>
    </ul>
    <h2><?php _e('Archives'); ?></h2>
    <ul>
        <?php wp_get_archives('type=monthly'); ?>
    </ul>
</div>