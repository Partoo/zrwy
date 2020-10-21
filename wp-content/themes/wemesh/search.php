<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
get_banner();
?>
<div class="container my-5">
	<div class="row">
		<div class="col-md-8 wow fadeInLeft">
			<?php get_template_part('inc/partials/search_result'); ?>
			<?php wemesh_pagination(); ?>
		</div>
		<div class="col-md-4 fadeInRight">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1')): ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
