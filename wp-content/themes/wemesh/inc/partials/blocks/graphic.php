<?php
/**
 * 编辑器内多行多列图文块模板
 */
$id = 'highlight-block-'.$block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// 创建 css className 及其它
$className = 'graphic-block';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}

$cols = intval(get_field('cols'))?:2;
$graphics = get_field('graphics');
$rows = ceil(count($graphics)/$cols);
$chunks = array_chunk($graphics, $cols);
?>
<div class="<?php echo esc_attr($className) ?>">

    <?php foreach($chunks as $chunk) :?>
  <div class="row mb-3 wow slideInUp">
    <?php foreach($chunk as $item) :?>
     <div class="col-md-<?= 12/$cols ?> py-3">
          <div class="widget gsc-icon-box text-dark left margin-bottom-2">
            <div class="highlight-icon">
            <span class="icon-image"><img src="<?= $item['image']?>" alt="images"> </span>
            </div>
            <div class="highlight_content">
            <div class="title"><?= $item['title'];?></div>
            <div class="desc"><?=$item['content'];?></div>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>
</div>