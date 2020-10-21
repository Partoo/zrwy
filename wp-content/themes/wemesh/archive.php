<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
get_banner();
?>
<div class="container my-5">
	<div class="row">
		<div class="col-md-9 wow fadeInRight">
			<?php get_template_part('inc/partials/loop'); ?>
			<?php wemesh_pagination(); ?>
		</div>
      <div class="col-md-3 d-none d-md-block wow fadeInLeft">
		<div class="sticky-top">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')): ?>
			<?php endif; ?>
		</div>
    </div>
	</div>
</div>
<?php get_footer(); ?>
