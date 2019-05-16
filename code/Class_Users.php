<?php
    class Users{
        var $conn;
        public $user_id;
        public $user_name;
        public $user_password;
        public $user_email;
        public $user_real_name;
        public $user_Department;
        public $user_major;
        public $user_grade;
        public $user_contact;
        public $user_style;
        public $user_sign;
        public $user_time;
        public $user_record;

        function __construct() {
            $server="localhost";//主机
            $db_username="root";//数据库用户名
            $db_password="qin";//数据库密码
            $db_name='test';//数据库的名字
            $this->conn = mysqli_connect($server,$db_username,$db_password);//链接数据库
            if(!$this->conn){
            die("we can't connect bro".mysqli_error($this->conn));//如果链接失败输出错误 die()退出脚本
            }
            mysqli_select_db($this->conn , $db_name);//选择数据库(数据库名)

            //不知道在干什么，似乎是让数据库能识别中文编码
            mysqli_query($this->conn , "SET NAMES utf-8");
        }

        function __destruct(){
            // 关闭数据库
            mysqli_close($this->conn);
        }

        function is_user_name($username){
            $sql = "select * from users where user_name = '$username'";
            $result = $this->conn->query($sql);//执行sql
            if($array = $result->fetch_array()){
                $this->user_name = $array['user_name'];
                $this->user_email = $array['user_email'];
                $this->user_password = $array['user_password'];
                return true;
            }
            return false;
        }

        function is_user_email($useremail){
            $sql = "select * from users where user_email = '$useremail'";
            $result = $this->conn->query($sql);
            if($array = $result->fetch_array()){
                $this->user_name = $array['user_name'];
                $this->user_email = $array['user_email'];
                $this->user_password = $array['user_password'];
                $this->user_id = $array['user_id'];
                return true;
            }
            return false;
        }

        function is_user_password($password){
            if($password == $this->user_password){
                return true;
            }
            else{
                return false;
            }
        }

        function insert(){

        }
    }
?>
