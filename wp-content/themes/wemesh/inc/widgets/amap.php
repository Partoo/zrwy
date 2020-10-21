<?php

class PartooAMap extends WP_Widget
{
    /**
     * Widget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'partoo_amap', // id
            'Partoo::高德地图', // name
            [
                'description' => '高德地图容器',
                'classname' => 'amap',
            ]
        );
    }

    // Front-end display of widget
    public function widget($args, $instance)
    {
        // var_dump($instance);
        $id = 'widget_' . $args['widget_id'];
        $key = $instance['key'];

        $height = $instance['height'];
        $markers = get_field('markers', $id);
        // var_dump($markers);
        $final = [];
        foreach ($markers as $value) {
          $exploded = explode(',',$value['marker_coordinate']);
          $value['lng']  = $exploded[0];
          $value['lat']  = $exploded[1];
          array_push($final, $value);
        }
        $final = json_encode($final, true);
        add_action('wp_footer', function () use ($key, $final) {
            $this->amap($key, $final);
        }); ?>
		<div id="map" style="height:<?php echo $height ?>px; width:100%"></div>
		<?php
    }

    public function amap($key, $markers) {?>

    <script type="text/javascript">
        window.onLoad = function() {
          var map = new AMap.Map('map', {
            resizeEnable: true, //是否监控地图容器尺寸变化
            animateEnable: false,
            zoom:19, //初始化地图层级
            mapStyle: 'amap://styles/whitesmoke',
            center: [119.978393,36.268287]
          })
      map.clearMap();
      var markers = <?php echo $markers ?>;
    //   var markers = [{
    //     id: 1,
    //     name: '清华·凤凰园',
    //     icon: 'https://static.wemesh.cn/img/amap/marker/red/0.png',
    //     position: [120.024953,36.236777],
    //     info: {
    //       intro: '清华·凤凰园坐落于胶州行政重点发展中轴线南侧,临近千亩青年湖,区内教育资源丰富。',
    //       area: '5.2万平方米',
    //       population: '5000人',
    //       tel: '0532-8003221'
    //     }
    // }, {
    //     id: 2,
    //     name: '澜山悦府',
    //     icon: 'https://static.wemesh.cn/img/amap/marker/red/0.png',
    //     position: [120.065633,36.291592],
    //     info: {
    //       intro: '澜山悦府坐落于胶东国际空港核心区,由香港贝尔高林设计。',
    //       area: '19万平方米',
    //       population: '2000人',
    //       tel: '0532-8003221'
    //     }
    // }, {
    //     id: 3,
    //     name: '惠东府邸',
    //     icon: 'https://static.wemesh.cn/img/amap/marker/red/0.png',
    //     position: [119.977288,36.268482],
    //     info: {
    //       intro: '惠东府邸位于胶州市扬州路与亳州路交汇处,社区实现人车分流。',
    //       area: '2000平方米',
    //       population: '2000人',
    //       tel: '0532-8003221'
    //     }
    // }, {
    //     id: 4,
    //     name: '少海澜山',
    //     icon: 'https://static.wemesh.cn/img/amap/marker/red/0.png',
    //     position: [120.066312,36.244664],
    //     info: {
    //      intro: '少海澜山为青岛地区首座纯正徽派建筑群,结合千年徽派文化与现代徽派建筑于一身。',
    //       area: '2000平方米',
    //       population: '2000人',
    //       tel: '0532-8003221'
    //     }
    // }];
      markers.forEach(function(marker, index) {
        var m = makeMarker(marker, index);
    });

    openRandomInfoWindow();

    function makeMarker(marker, index) {
      var m = new AMap.Marker({
            map: map,
            icon: new AMap.Icon({
              image: 'https://static.wemesh.cn/img/amap/marker/red/0.png',
              imageSize: new AMap.Size(25, 35)
            }),
            position: [marker.lng, marker.lat],
            offset: new AMap.Pixel(-13, -30),
            extData: index
        });
        m.setLabel({
           content: "<h5><span class='badge' style='color:#816015;'>"+marker.marker_name+"</span></h5>",
           direction: 'bottom'
        })

        m.on('click', function(e) {
          var target = e.target;
          openInfoWindow(target)
        })
       return m;
    }
    function openRandomInfoWindow() {
      // var index = parseInt(Math.random() * (markers.length ), 10);
      // var m = makeMarker(markers[index], index);
      var m = makeMarker(markers[2], 2);
      openInfoWindow(m);
    }

    function openInfoWindow(target) {
      var index = target.getExtData();
          var info = [];
          // console.log(target);
          var marker = markers[index];
          var start = "<div style='width:300px;'>";
          var end = "</div>";
          var intro = "<p>"+marker.marker_info+"</p>";
          var title = "<h5 class='text-warning mb-3'>"+marker.marker_name+"</h5>";
          var area = "<p><i class='fa fa-chart-area text-muted'></i> 建筑面积:<span class='ml-2'>"+marker.area+"</span>平方米</p>";
          var population = "<p><i class='fa fa-user-friends text-muted'></i> 社区住户:<span class='ml-2'>"+marker.family+"</span>户</p>";
          var tel = "<p><i class='fa fa-phone-alt text-muted'></i> 联系电话:<a class='ml-2' href='tel:"+marker.tel+"'>"+marker.tel+"</a></a></p>"
          info.push(start);
          info.push(title);
          info.push(intro);
          info.push(area);
          info.push(population);
          info.push(tel);
          info.push(end);
          var infoWindow = new AMap.InfoWindow({
            anchor: 'middle-left',
            offset: new AMap.Pixel(30, 0),
            content: info.join('')
          })
          infoWindow.open(map, target.getPosition());
    }
        map.setFitView();
     }
      var url = "https://webapi.amap.com/maps?v=2.0&key=<?php echo $key ?>&callback=onLoad";
      var jsapi = document.createElement('script');
      jsapi.charset = 'utf-8';
      jsapi.src =url;
      document.head.appendChild(jsapi);

    </script>
  <?php }

    // Back-end widget form
    public function form($instance)
    {
        if ($instance) {
            $key = esc_attr($instance['key']);
            $height = esc_attr($instance['height']);
        } else {
            // $title = '';
            // $icon = '';
            $coordinate = '';
        }
      ?>
    <p>
			<label for="<?php echo $this->get_field_id('key'); ?>">
				<?php echo '高德地图授权Key' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('key'); ?>"
				   name="<?php echo $this->get_field_name('key'); ?>" type="text"
				   value="<?php echo esc_attr($key); ?>">
    </p>
    <p>
			<label for="<?php echo $this->get_field_id('height'); ?>">
				<?php echo '地图高度' ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>"
           name="<?php echo $this->get_field_name('height'); ?>" type="number"
				   value="<?php echo esc_attr($height); ?>">
    </p>

		<?php
    }
    // Sanitize widget form values as they are saved
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['key'] = (!empty($new_instance['key'])) ? strip_tags($new_instance['key']) : null;
        $instance['height'] = (!empty($new_instance['height'])) ? strip_tags($new_instance['height']) : null;
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('PartooAMap');
});
