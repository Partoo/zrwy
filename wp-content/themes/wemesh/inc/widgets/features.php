<?php

class PartooFeatures extends WP_Widget
{
    /**
     * Widget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'partoo_features', // id
            'Partoo::企业优势展示', // name
            [
                'description' => '用来水平展示企业优势的小组件',
                'classname' => '',
            ]
        );
    }

    // Front-end display of widget
    public function widget($args, $instance)
    {
        $id = 'widget_' . $args['widget_id'];
        $rows = get_field('features', $id);?>
        <section id="dataUs" class="bg-white"><div class="container py-5">
        <ul class="row p-0 text-center">
          <?php foreach ($rows as $key => $row): ?>
      <li class="col-md-4 wow animate fadeInUp fast">
        <h1><i class="fa fa-<?php echo $row['icon']?>"></i></h1>
        <?php echo $row['title']?>
        <p><?php echo $row['intro']?></p>
      </li>
        <?php endforeach; ?>
    </ul>
    </div></section>
		<?php
    }

    // Back-end widget form
    public function form($instance)
    {

    }

    // Sanitize widget form values as they are saved
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        // $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('PartooFeatures');
});
