<?php
defined('ABSPATH') || exit;
get_header();
?>
<?php if (is_front_page() && is_home()) : ?>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-focus')): ?>
  <?php endif; endif; ?>
  <section id="dataUs" class="bg-white">
    <div class="container py-5">
        <ul class="row p-0 text-center wow fadeInUp" id="counterBox" data-box="countUp">
      <li class="col-md-4 col-sm-12">
        <h1><i class="fa fa-chart-line"></i></h1>
        <h4><span class="counter" data-count="10">1</span><span><sup>+</sup></span>年稳健发展</h4>
        <p>从2009年至今,依托集团公司的综合优势,中仁物业几经磨砺已实现规模化发展，成为物业管理行业的一面旗帜。</p>
      </li>
      <li class="col-md-4 col-sm-12">
       <h1><i class="fa fa-user-tie"></i> </h1>
        <h4><span class="counter" data-count="100">90</span><span><sup>+</sup></span>名专业管理人员</h4>
        <p>团队始终以“一切以业主为中心，诚实守信、高效服务”为理念，为业主提供优质物业管理服务。</p>
      </li>
      <li class="col-md-4 col-sm-12">
        <h1><i class="fa fa-street-view"></i> </h1>
        <h4><span class="counter" data-count="10000">9900</span><span><sup>+</sup></span>平方米精英社区</h4>
        <p>奉行“为开发商提升楼盘形象，为业主房产保值增值”的经营方针，服务覆盖万余平米,现为几万名业主专注服务。</p>
      </li>
    </ul>
    </div>
  </section>
<?php if (!function_exists('home-half-left') || !function_exists('home-half-right')): ?>
<section class="py-5 bg-light">
	<div class="container">
		<div class="row wow fadeInRight">
			<div class="col-xl-6 col-lg-12 d-none d-xl-block">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-half-left')): ?>
				<?php endif; ?>
			</div>
			<div class="col-xl-6 col-lg-12 post-list">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-half-right')): ?>
				<?php endif; ?></div></div>
	</div>
</section>
<?php endif; ?>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-fluid-area-grey')): ?>
<?php endif; ?>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-fluid-area')): ?>
<?php endif; ?>
  <section class="bg-blue">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-primary-color-area')): ?>
<?php endif; ?>
</section>
<?php get_footer(); ?>
