<?php
/*数据库连接的类*/

class MySQL
{
    private static $conn = null;
    /*
    *  $isOn2HostingServer变量用来标记是否在网站的数据库上，正式发布时需要将其置为true
    */
    private static $isOn2HostingServer = true;
    //单例模式的MySQL
    private function __construct()
    {
    }
    //get connection在调用时记得需要使用&来获取引用
    public static function &getConnection()
    {
        if(self::$conn == null)
        {
            if(!self::$isOn2HostingServer)
            {
            }
            else
            {
            }
            self::$conn = mysqli_connect($hostname, $user, $passwd, $database);
            if(empty(self::$conn))
            {
                die("mysql_connect failed: " . mysqli_connect_error());
            }
            //print "connect to" . mysqli_get_host_info(self::$conn) . "<br>";
        }
        return self::$conn;
    }
    public function __clone()
    {
        trigger_error('Clone is not allowed!', E_USER_ERROR);
    }
    //数据库连接关闭
    public static function disconnect()
    {
        if(self::$conn)
            self::$conn->close();
        self::$conn = null;
    }
    /*如果外面获取对象之后的disconnect;
    public static function closeConnection($con)
    {
        $con->close();
        $con = null;
        self::$conn = null;
    }*/
}

?>
