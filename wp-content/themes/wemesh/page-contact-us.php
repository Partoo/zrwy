<?php /* Template Name: 联系我们 */
defined('ABSPATH') || exit;
define('WPCF7_AUTOP', false);
get_header();
get_banner();
?>
<div class="container my-5">
	<div class="row">
		<div class="col-3">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-contact')): ?>
			<?php endif; ?>
		</div>
		<div class="col-9">
			<div class="form">
				<?php if (have_posts()) : while (have_posts()) : the_post();
					the_content();
				endwhile;
				else: ?>
					<p>暂无文章</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
