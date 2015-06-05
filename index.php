<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>睿欧 - 文件管理器</title>
  <link rel="stylesheet" href="assets-filemanage/css/amazeui.min.css">
  <link rel="stylesheet" href="assets-filemanage/css/app.css">
</head>
<body>
<!-- Header -->
<header data-am-widget="header" class="am-header am-header-default">
  <h1 class="am-header-title">
    <a href="#">睿欧 - 文件管理器</a>
  </h1>
</header>
<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <!--列表标题-->
  <div class="am-list-news-hd am-cf">
    <!--带更多链接-->
    <a href="#">
      <h2><span class="am-icon-file-o"></span> 当前路径：
        <?php 
        if(isset($_GET["dir"])){
          echo $_GET["dir"];
        }else{
          echo "/";
        }
      
      ?></h2>
    </a>
  </div>
  <div class="am-list-news-bd">
    <ul class="am-list">
    <?php
    error_reporting(E_ALL & ~E_NOTICE);
$path=".".$_GET["dir"];
    $prevpath=dirname($path);
    $files=scandir($path);
    foreach ($files as $file){
        if($file!="." && $file!=".."&&$file!="index.php"&&$file!="assets-filemanage") {
            $filename=$file;         
            if(is_dir("./".$_GET["dir"].'/'.$filename)){
              $dirarr[]=$filename;
            }else if(is_file("./".$_GET["dir"].'/'.$filename)){ 
              $filearr[]=$filename;
            }
        }
    }
    foreach ($dirarr as $filename){
            echo'<li class="am-g">
                  <a href="?dir='.urlencode($_GET["dir"])."/".urlencode($filename).'" class="am-list-item-hd"><span class="am-icon-folder"></span> '.$filename.'</a>
                </li>';
              }
    foreach ($filearr as $filename){
                echo'<li class="am-g">
                  <a href="'.$_GET["dir"]."/".$filename.'" class="am-list-item-hd">'.subext($filename).' '.$filename.'</a>
                </li>';  
              }


    function subext($files){
      $name=substr(strrchr($files, '.'), 1);
      switch ($name) {
        case 'mp4':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'mkv':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'rm':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'mpg':
          return '<span class="am-icon-video-camera"></span>';
          break;     
        case 'mpeg':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'asf':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'mov':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'wmv':
          return '<span class="am-icon-video-camera"></span>';
          break;
        case 'mp3':
          return '<span class="am-icon-file-audio-o">';
          break;
        case 'wav':
          return '<span class="am-icon-file-audio-o">';
          break;
        case 'm4v':
          return '<span class="am-icon-file-audio-o">';
          break;
        case 'aac':
          return '<span class="am-icon-file-audio-o">';
          break;
        case 'jpg':
          return '<span class="am-icon-file-picture-o">';
          break; 
        case 'jpeg':
          return '<span class="am-icon-file-picture-o">';
          break;
        case 'gif':
          return '<span class="am-icon-file-picture-o">';
          break;
        case 'png':
          return '<span class="am-icon-file-picture-o">';
          break;
        case 'bmp':
          return '<span class="am-icon-file-picture-o">';
          break;                  
        default:
          return '<span class="am-icon-file"></span>';
          break;
      }
    }
?>
    </ul>
  </div>
</div>

<!-- Navbar -->
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default">
  <ul class="am-navbar-nav am-cf am-avg-sm-4">
    <li>
      <a href="<?php
      if(isset($_GET["dir"])){
        $str=substr($_GET["dir"],0,strrpos($_GET["dir"],"/"));
          if($str==""){
              echo "/";
          }else{
              echo "?dir=".$str;
          }
      }
       ?>">
        <span class="am-icon-arrow-left"></span>
        <span class="am-navbar-label">上一级</span>
      </a>
    </li>
    <li>
      <a href="/">
        <span class="am-icon-home"></span>
        <span class="am-navbar-label">首页</span>
      </a>
    </li>
  </ul>
</div>

<script src="assets-filemanage/js/jquery.min.js"></script>
<script src="assets-filemanage/js/amazeui.min.js"></script>
</body>
</html>
