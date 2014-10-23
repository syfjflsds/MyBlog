<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>zstar的博客</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/javascript.js"></script>
</head>
<body>
<div class="navContainer">
    <div id="nav" class="nav">
            <span>
                <img src="img/zl.jpg" width="50px" height="50px" class="roundImageFrame">
            </span>
            <span id="navItem" class="navItem">
                <ul>
                    <li><a href="index.html">主页</a></li>
                    <li><a href="change.html">变更</a></li>
                    <li><a href="study.html">学习</a></li>
                    <li><a href="author.html">作者</a>
                    </li>
                    <li><a href="leave_message.php" style="background-color:#191919;color:white;">留言</a></li>
                </ul>
            </span>
    </div>
</div>
<div class="whiteContainer" style = "margin-top: 20px;" id="container">
    <div class="content">
        <div class="changeContent">
            <div>
                <a href="javascript:void(0);" class="grayBtn" style="margin-top:10px;" onclick="showLeaveMessageInput()">给我留言</a>
            </div>
            <?php
                require("php/mysql.php");
                $conn = &MySQL::getConnection();
                $res = $conn->query("SELECT * FROM leave_message order by time desc");
                while($row = $res->fetch_array())
                {
                    print('<div class="info">');
                    print('<h3>' . $row["username"] . '&nbsp' . $row["time"] . '</h3><p>');
                    $filename = "leave_message/" . $row["path"];
                    $handle = fopen($filename, "r");
                    $contents = fread($handle, filesize($filename));
                    fclose($handle);
                    print($contents . '</p></div>');
                }
                $res->close();
                MySQL::disconnect();
            ?>
            <br>
        </div>
    </div>
</div>
<div id="leave_message_dialog" style="display:none;">
  <form method="post" action="php/leave_message_action.php">
      <div class="grayFrame" style="margin:auto;position:absolute;top:100px;left:500px">
              <div class="grayGradientTitle" style="text-align:center;line-height:40px">
              <span style="margin-left: 30px; color:white; font-weight:bold;">欢迎留言</span><a href="javascript:void(0);"
              style="text-decoration:none;color:white;float:right;width:30px;height:30px;line-height:33px;margin-right:8px;margin-top:4px;font-size:25px;"
              onclick="hideLeaveMessageInput()">×</a>
              </div>
              <div style="text-align:center;">
              <h7 style="font-size: 15px;font-weight: bold; margin-left: 8px;">昵称:</h7>
              <input type="text" name="username" value="昵称^_^" class="roundEdit" style="margin-top:10px; height:30px;width:325px;"></input>
              <br>
                    <textarea class="roundEdit" name="leave_message" style="width:370px; height:200px;margin-top: 10px;">这里是内容哦！</textarea>
              </div>
              <div style="height:40px">
                  <input type="submit" class="grayBtn" value="提交留言" style="width:200px;margin:auto;margin-top:10px;"></input>
              </div>
      </div>
  </form>
</div>
<script>
        e = document.getElementById("container");
        slowAppear(e, 5, 0.98);
</script>
</body>
</html>