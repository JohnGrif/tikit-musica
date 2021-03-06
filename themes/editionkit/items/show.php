<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>

<h1>
	<?php echo metadata('item', array('Dublin Core', 'Title')); ?>
</h1>

<div id="primary">
     
    <?php echo all_element_texts('item'); ?>
    
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div><!-- end primary -->

<aside id="sidebar">

    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
    <div class="element">
        <h2><?php echo __('Files'); ?></h2>
        <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
        </div>
    <?php endif; ?>
    
    <!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
    <div id="itemfiles" class="element">
        <h2><?php echo __('Files'); ?></h2>
        <?php echo item_image_gallery(); ?>
    </div>
    <?php endif; ?>

    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (metadata('item', 'Collection Name')): ?>
    <div id="collection" class="element">
        <h2><?php echo __('Collection'); ?></h2>
        <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
    </div>
    <?php endif; ?>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item', 'has tags')): ?>
    <div id="item-tags" class="element">
        <h2><?php echo __('Tags'); ?></h2>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>
	
	<?php if(!empty($item)) : ?>
    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h2><?php echo __('How to quote'); ?></h2>
        <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>
    <?php endif; ?>

</aside>

<?php fire_plugin_hook('verovio_viewer', array('view' => $this, 'item' => $item)); ?>

<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>

<?php echo foot(); ?>
