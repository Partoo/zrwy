<?php /* Template Name: 关于我们 */
defined('ABSPATH') || exit;
define('WPCF7_AUTOP', false);
get_header();
get_banner();
?>
<div class="container my-5">
	<div class="row">
		<div class="col-md-3 wow fadeInLeft">
    <div class="sticky-top">
        <?php
       if ($post->post_parent) {
    $children = wp_list_pages([
        'title_li' => '',
        'child_of' => $post->post_parent,
        'echo' => 0
    ]);
    $title = get_the_title($post->post_parent);
} else {
    $children = wp_list_pages([
        'title_li' => '',
        'child_of' => $post->ID,
        'echo' => 0
    ]);
    $title = get_the_title($post->ID);
}
if ($children) : ?>
    <ul class="sidebar-page-list p-0">
        <?php echo $children; ?>
    </ul>
<?php endif; ?>
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-about')): ?>
			<?php endif; ?>
    </div>
		</div>
		<div class="col-md-9 wow fadeInRight">
			<div class="post-content">
				<?php if (have_posts()) : while (have_posts()) : the_post();
					the_content();
				endwhile;
				else: ?>
					<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>
      </div>

		</div>
	</div>
</div>
<?php get_footer(); ?>
