<?php
// 文件路径，用于存储访问量和日期
$file_path = 'visits.txt';

// 检查文件是否存在
if (!file_exists($file_path)) {
    // 如果文件不存在，创建文件并写入当前日期和访问量1
    file_put_contents($file_path, date('Y-m-d') . ":1");
}

// 从文件中获取当前日期和访问量
list($saved_date, $saved_count) = explode(":", file_get_contents($file_path));

// 获取今天的日期
$today = date('Y-m-d');

if ($saved_date === $today) {
    // 如果日期匹配，增加访问量
    $saved_count++;
} else {
    // 如果是新的一天，重置访问量为1
    $saved_date = $today;
    $saved_count = 1;
}

// 将更新后的日期和访问量写回文件
file_put_contents($file_path, $saved_date . ":" . $saved_count);

// 显示今日访问量
echo "今日访问量为 " . $saved_count;
?>
