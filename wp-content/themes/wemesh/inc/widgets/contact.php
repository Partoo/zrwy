<?php

class PartooContact extends WP_Widget
{
    /**
     * Widget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'partoo_contact', // id
            'Partoo::联系方式', // name
            [
                'description' => '联系方式小组件',
                'classname' => 'contact-us-widget',
            ]
        );
    }

    // Front-end display of widget
    public function widget($args, $instance)
    {
        $id = 'widget_' . $args['widget_id'];
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            if (!empty($instance['icon'])) {
                if (!empty($instance['position'])) {
                    if ($instance['position'] == 'before') {
                        echo $args['before_title'] . "<i class='fa fa-" . $instance['icon'] . "'></i> " . apply_filters('widget_title', $instance['title']) . $args['after_title'];
                    } else {
                        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . " <i class='fa fa-" . $instance['icon'] . "'></i>" . $args['after_title'];
                    }
                }
            } else {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']);
            }
        }
        echo $args['after_widget'];?>
		<div class="textwidget custom-html-widget">
			<ul class="mt-0 mb-3 p-0">
				<li class="mb-1"><i class="fa text-muted fa-map-marker mr-1"></i> 青岛市胶州市香港路1号</li>
				<li class="mb-1"><i class="fa text-muted fa-phone mr-1"></i><a
						href="tel:0532-85269929">0532-85269929</a></li>
				<li class="mb-1"><i class="fa  text-muted fa-envelope mr-1"></i> <a href="mailto:qdshh0603@163.com"
																					class="mr-1">qdshh0603@163.com</a>
				</li>
			</ul>
		</div>
	<?php
    }

    // Back-end widget form
    public function form($instance)
    {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $key = esc_attr($instance['key']);
            $coordination = esc_attr($instance['coordination']);
        } else {
            $title = '';
            $key = '';
            $coordination = '';
        } ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
				   name="<?php echo $this->get_field_name('title'); ?>" type="text"
				   value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('key'); ?>">
				<?php echo '地图key' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('key'); ?>"
				   name="<?php echo $this->get_field_name('key'); ?>" type="text"
				   value="<?php echo esc_attr($key); ?>">

		</p>
		<p>
			<label for="<?php echo $this->get_field_id('coordination'); ?>">
				<?php echo '地图中心经纬度坐标' ?>
			</label>
			<input type="text" name="<?php echo $this->get_field_name('coordination'); ?>"
				   value=" <?php echo esc_attr($coordination); ?>" j
			<?php echo '地图中心经纬度坐标' ?>
		</p>
		<?php
    }

    // Sanitize widget form values as they are saved
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : null;
        $instance['key'] = (!empty($new_instance['key'])) ? strip_tags($new_instance['key']) : null;
        $instance['coordination'] = (!empty($new_instance['coordination'])) ? strip_tags($new_instance['coordination']) : null;
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('PartooContact');
});
