<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin table Examples</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php echo view('html.header');?>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <?php echo view('html.env');?>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
      </div>

      <hr>
<form method="get" action="last">
      <div class="am-g">
<!--        <div class="am-u-sm-12 am-u-md-6" style="width:25%">-->
<!--          <div class="am-btn-toolbar">-->
<!--            <div class="am-btn-group am-btn-group-xs">-->
<!--              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>-->
<!--              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>-->
<!--              <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>-->
<!--              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
        <div class="am-u-sm-12 am-u-md-3" style="width:60%">
          <div class="am-form-group" style="margin-left:0px;">
            <select name="store">
              <option value="0">--选择库--</option>
              <?php foreach($store as $k => $v):?>
                <option value="<?php echo $k; ?>"><?php echo $v;?></option>
              <?php endforeach;?>
            </select>

            <select name="itemsid">
              <option value="0">--选择品项--</option>
              <?php foreach($items as $k => $v):?>
                <option value="<?php echo $k; ?>"><?php echo $v;?></option>
              <?php endforeach;?>
            </select>

            <select name="itemsid">
              <option value="0">--选择出入库--</option>
                <option value="1">入库</option>
                <option value="2">出库</option>
            </select>

           <input type="datetime-local" name="cdate" class="am-form-field am-input-sm" placeholder="时间" style="width:200px;float: right;">
           <input type="datetime-local" name="bdate" class="am-form-field am-input-sm" placeholder="时间"  style="width:200px;float: right;margin-right: 30px;">
          </div>
        </div>

        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
          </div>
        </div>
      </div>
</form>
      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">品项</th><th class="table-type">数量</th><th class="table-type">库</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($list as $k => $v):?>
              <tr>
                <td><input type="checkbox" /></td>
                <td><?php echo $k;?></td>
                <td><a href="#"><?php echo $v['pname'];?></a></td>
                <td><a href="#"><?php echo $v['s'];?></a></td>
                <td><a href="#"><?php echo $store[$v['store']];?></a></td>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
<!--            <div class="am-cf">-->
<!--              共 15 条记录-->
<!--              <div class="am-fr">-->
<!--                <ul class="am-pagination">-->
<!--                  <li class="am-disabled"><a href="#">«</a></li>-->
<!--                  <li class="am-active"><a href="#">1</a></li>-->
<!--                  <li><a href="#">2</a></li>-->
<!--                  <li><a href="#">3</a></li>-->
<!--                  <li><a href="#">4</a></li>-->
<!--                  <li><a href="#">5</a></li>-->
<!--                  <li><a href="#">»</a></li>-->
<!--                </ul>-->
<!--              </div>-->
<!--            </div>-->
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
