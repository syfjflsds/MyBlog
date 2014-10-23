<?php

date_default_timezone_set('PRC');
$username = $_POST["username"];
$leave_message = $_POST["leave_message"];
$now = date('Y-m-d H:i:s');

$ip = $_SERVER["REMOTE_ADDR"];

require("mysql.php");
$conn = &MySQL::getConnection();

//查询出message_index的最大值来插入
$res = $conn->query("SELECT MAX(message_index) from leave_message");
if($res)
{
    $row = $res->fetch_array();

    //将message_index + 1后生成留言文件内容
    $index = $row[0] + 1;
    $path = $index . ".txt";
    $outfile = fopen("../leave_message/" . $path, "w");
    if($outfile)
    {
        fwrite($outfile, $leave_message);
    }
    fclose($outfile);
    $res->close();
}

//数据库插入留言信息数据
$stmt = $conn->prepare("INSERT INTO leave_message(path, username, ip, time, message_index) values(?, ?, ?, ?, ?)");
$stmt->bind_param('ssssi', $path, $username, $ip, $now, $index);
if($stmt->execute())
{
    header("Content-type: text/html; charset=utf-8");
    echo "<script language=\"JavaScript\">\r\n";
    echo "alert(\"留言成功\");\r\n";
    echo "location.href='".$_SERVER["HTTP_REFERER"]."'";
    echo "</script>";
}
else
{
    header("Content-type: text/html; charset=utf-8");
    echo "<script language=\"JavaScript\">\r\n";
    echo "alert(\"留言失败\");\r\n";
    echo "location.href='".$_SERVER["HTTP_REFERER"]."'";
    echo "</script>";
}
$stmt->close();
$conn->close();

?>