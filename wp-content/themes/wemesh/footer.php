<?php
defined('ABSPATH') || exit;
?>
<footer>
	<div class="container">
    <!-- <div class="row d-none d-md-flex p-4">
      <div class="col-md-3">11</div>
      <div class="col-md-3">22</div>
      <div class="col-md-3">33</div>
      <div class="col-md-3">44</div>
    </div> -->
		<div class="row">
			<div class="col-md-12">
				<nav class="nav-footer">
					<?php wp_nav_menu(['theme_location' => 'secondary', 'depth' => 1]); ?>
				</nav>
				<div class="copyright-footer">
					<p class="copyright">
						© <?php echo date('Y') ?> 青岛中仁物业管理有限公司 版权所有
					</p>
				</div>
				<div class="credits">
					基于 <a href="https://www.wemesh.cn" target="_blank">WeMesh&reg; 技术驱动</a>
          <p><a target="_blank" href="https://www.freepik.com/photos/house">部分图片素材来自 www.freepik.com</a></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<div id="toolbar" class="d-none d-lg-flex">
  <a href="mailto:<?php echo get_theme_mod('email') ?>"><i class="far fa-envelope"></i></a>
  <a href="tel:<?php echo get_theme_mod('phone') ?>"><i class="fa fa-phone-alt"></i></a>
  <a href="javascript:void(0);" id="showQrBtn"><i class="fab fa-weixin"></i></a>
  <a href="#top" id="scrollTop"><i class="fa fa-arrow-up"></i></a>
  <div class="hide-element" id="qr">
    <img src="<?php echo wp_get_attachment_url(get_theme_mod('wechat')); ?>" alt="公众号二维码">
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>

