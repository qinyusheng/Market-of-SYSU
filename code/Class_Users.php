<?php
    class Users{
        var $conn;
        var $arr;
        private $user_id;
        private $user_name;
        private $user_password;
        private $user_email;
        private $user_style;
        private $user_time; // 为冻结用户提供方便
/*         private $user_real_name;
        private $user_Department;
        private $user_major;
        private $user_grade;
        private $user_contact;
        private $user_sign;
 */     

        function __construct() {
            $server="localhost";//主机
            $db_username="root";//数据库用户名
            $db_password="qin";//数据库密码
            $db_name='market';//数据库的名字
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

        function get_user_name(){return $this->user_name;}
        function get_user_email(){return $this->user_email;}
        function get_user_id(){return $this->user_id;}

        function set_user_name($s){$this->user_name = $s;}
        function set_user_email($s){$this->user_email = $s;}
        function set_user_password($s){$this->user_password = $s;}

        function is_user_name($username){
            $sql = "select * from users where user_name = '$username'";
            if($result = $this->conn->query($sql)){//执行sql
                $array = $result->fetch_array();
                $this->user_name = $array['user_name'];
                $this->user_email = $array['user_email'];
                $this->user_password = $array['user_password'];
                $this->user_id = $array['user_id'];
                $this->user_style = $array['user_style'];
                $this->user_time = $array['use_time'];
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
                $this->user_style = $array['user_style'];
                $this->user_time = $array['use_time'];
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

        function register_insert(){
            $this->user_time = time();
            $sql = "insert into Users(user_id,user_name,user_password,user_email,user_time) values ('$this->user_name','$this->user_password','$this->user_email',$this->user_time)";
            if($this->conn->query($sql)){//执行sql
                return true;
            }
            return false;
        }

        function update_time(){
            $cur_time = time();
            if($cur_time > $this->user_time){
                $this->user_time = $cur_time;
                $sql = "update users set user_id = $this->user_time";
                $this->conn->query($sql);
            }
        }
    }
?>
