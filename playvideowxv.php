<?php
// 1. 获取 wxv 地址并调用解析接口
$getID = 'wxv_1935868526267793409';
$url = "https://api.ka721.top/api/vxjson?id=" . $getID;
$response = file_get_contents($url);
$data = json_decode($response, true);

// 2. 校验解析结果
if (isset($data['url'])) {
    $videoUrl = $data['url'];
} else {
    die("视频解析失败，请检查 wxv 地址有效性或接口状态");
}

// 3. 输出包含播放器的 HTML 页面
?>
<!DOCTYPE html>
<html>
<head>
    <title>微信视频播放器</title>
</head>
<body>
    <video 
        id="videoPlayer" 
        controls 
        autoplay 
        playsinline 
        x5-playsinline 
        webkit-playsinline 
        style="width: 100%; max-width: 800px;"
        src="<?php echo htmlspecialchars($videoUrl); ?>"
    >
        您的浏览器不支持视频播放
    </video>
</body>
</html>
