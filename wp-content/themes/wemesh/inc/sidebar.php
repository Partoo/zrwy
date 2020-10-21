<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;


add_action('widgets_init', 'partoo_register_sidebars');

if (!function_exists('partoo_register_sidebars')) {
	/**
	 * Initializes themes widgets.
	 */
	// SIDEBAR
	function partoo_register_sidebars()
	{

		$sidebars = (array)apply_filters(
			'partoo_sidebars',
			array(
				'sidebar-1' => array(
					'name' => '栏目页边栏',
					'description' => '栏目页边栏',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				),
				'sidebar-2' => array(
					'name' => '内容页边栏',
					'description' => '内容页边栏',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				),
				'sidebar-about' => array(
					'name' => '关于我们页面边栏',
					'description' => '关于我们页面的边栏',
					'before_widget' => '<aside class="mt-4" id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
        ),
        'sidebar-contact' => array(
					'name' => '联系页面边栏',
					'description' => '联系页面的边栏',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				),
				'footer-1' => array(
					'name' => '页脚',
					'description' => '所有页面页脚',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				),
//				'footer-2' => array(
//					'name' => esc_html__('Footer 2', 'partoo'),
//					'description' => esc_html__('This sidebar is the second column of the footer widget area.', 'partoo'),
//					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//					'after_widget' => '</aside>',
//					'before_title' => '<h4 class="widget-title">',
//					'after_title' => '</h4>',
//				),
				'home-focus' => array(
					'name' => '首页焦点轮换图',
					'description' => '首页导焦点轮换图位置',
					// 'before_widget' => '<section id="dataUs" class="bg-white"><div class="container py-5">',
					// 'after_widget' => '</div></section>',
					// 'before_title' => '<div class="title mb-5"><h2>',
					// 'after_title' => '</div></h2>',
				),
				// 'home-under-focus' => array(
					// 'name' => '首页焦点轮换图下方通栏',
					// 'description' => '首页导航下方焦点位置',
					// 'before_widget' => '<section id="dataUs" class="bg-white"><div class="container py-5">',
					// 'after_widget' => '</div></section>',
					// 'before_title' => '<div class="title mb-5"><h2>',
					// 'after_title' => '</div></h2>',
				// ),
				'home-fluid-area-grey' => array(
					'name' => '首页灰色背景水平通栏',
					'description' => '首页中心横幅位置',
					'before_widget' => '',
					'after_widget' => '',
					'before_title' => '<div class="title mb-5"><h2>',
					'after_title' => '</div></h2>',
				),
				'home-half-left' => array(
					'name' => '首页半块左侧',
					'description' => '用在两栏同时等高时',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h5 class="title">',
					'after_title' => '</h5>',
				),
				'home-half-right' => array(
					'name' => '首页半块右侧',
					'description' => '用在两栏同时等高时',
					'before_widget' => '',
					'after_widget' => '',
					'before_title' => '',
					'after_title' => '',
				),
				'home-primary-color-area' => array(
					'name' => '首页主色背景水平通栏',
					'description' => '首页主色背景水平通栏',
//					'before_widget' => '<div id="%1$s" class="widget %2$s bg-success text-white p-5 text-center">',
//					'after_widget' => '</div>',
//					'before_title' => '<div class="title mb-5"><h2>',
//					'after_title' => '</div></h2>',
				),
				// 'home-container-left' => array(
				// 	'name' => '首页下方固定宽度左侧',
				// 	'description' => '首页下方固定宽度左侧',
				// 	'before_widget' => '<div id="%1$s" class="widget %2$s">',
				// 	'after_widget' => '</div>',
				// 	'before_title' => '<h5 class="title">',
				// 	'after_title' => '</h5>',
				// ),
				// 'home-container-right' => array(
				// 	'name' => '首页下方固定宽度右侧',
				// 	'description' => '首页下方固定宽度右侧',
				// 	'before_widget' => '<div id="%1$s" class="widget %2$s">',
				// 	'after_widget' => '</div>',
				// 	'before_title' => '<h5 class="title">',
				// 	'after_title' => '</h5>',
				// ),
			)
		);

		foreach ($sidebars as $id => $args) {
			register_sidebar(array_merge(array('id' => $id), $args));
		}
	}

} // endif function_exists( 'partoo_widgets_init' ).
