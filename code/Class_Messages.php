<?php
    class Messages{
        var $conn;
        private $message_id;
        private $message_type;
        private $message_index;
        private $message_text;
        private $message_date;
        private $message_state;
        private $message_change;
    
        // 构造函数与析构函数
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


        // get 函数
        function get_message_id(){return $this->message_id;}
        function get_message_type(){return $this->message_type;}
        function get_message_index(){return $this->message_index;}
        function get_message_text(){return $this->message_text;}
        function get_message_date(){return $this->message_date;}
        function get_message_state(){return $this->message_state;}
        function get_message_change(){return $this->message_change;}

        // set函数
        //function set_message_id($s){$this->message_id = $s;}
        function set_message_type($s){$this->message_type = $s;}
        function set_message_index($s){$this->message_index = $s;}
        function set_message_text($s){$this->message_text = $s;}
        function set_message_date($s){$this->message_date = $s;}
        function set_message_state($s){$this->message_state = $s;}
        function set_message_change($s){$this->message_change = $s;} 


        // 将数据插入数据库
        function insert_message(){
            if($this->message_id == null) return FALSE;
            if($this->message_type == null) return FALSE;
            if($this->message_index == null) return FALSE;
            
            // 设计sql语句
            if($this->message_change != null){
                $sql = "insert into 
                        messages (message_id, message_type, message_index, message_change)
                        values ($this->message_id, $this->get_message_type, $this->message_index, $this->message_change);";
            }else{
                $sql = "insert into 
                        messages (message_id, message_type, message_index)
                        values ($this->message_id, $this->get_message_type, $this->message_index);";
            }
            //插入数据
            $this->conn->query($sql);
            //成功插入返回True
            return true;
        }

        // 返回搜索的结果集
        function get_all_messages(){
            $sql = "select * from messages;";
            $result = $this->conn->query($sql);
            
            return $result;
        }
        

        // 管理员管理操作
        // 同意申请
        function message_admin_agree($id){
            $sql = "update messages
                    set message_state = 1
                    where message_id = $id";
            $this->conn->query($sql);
            return true;
        }
        // 用户确认消息
        function message_user_agree($id){
            $sql = "update messages
                    set message_state = 1
                    where message_id = $id";
            $this->conn->query($sql);

            return true;
        }
    }
?>