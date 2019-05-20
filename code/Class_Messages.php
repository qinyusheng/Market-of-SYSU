<!-- 
    信息类型：1 -> 密码修改；2 -> 商品发布；3 -> 操作记录
 -->
<?php
    class Messages{
        var $conn;
        var $arr;
        private $message_id;
        private $message_type;
        private $message_subject;
        private $message_object;
        private $message_text;
        private $message_date;
        private $message_state;
        private $message_result;
    
        // 构造函数与析构函数
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


        // get 函数
        function get_message_id(){return $this->message_id;}
        function get_message_type(){return $this->message_type;}
        function get_message_subject(){return $this->message_subject;}
        function get_message_object(){return $this->message_object;}
        function get_message_text(){return $this->message_text;}
        function get_message_date(){return $this->message_date;}
        function get_message_state(){return $this->message_state;}
        function get_message_result(){return $this->message_result;}

        // set函数
        //function set_message_id($s){$this->message_id = $s;}
        function set_message_type($s){$this->message_type = $s;}
        function set_message_subject($s){$this->message_subject = $s;}
        function set_message_object($s){$this->message_object = $s;}
        function set_message_text($s){$this->message_text = $s;}
        function set_message_date($s){$this->message_date = $s;}
        function set_message_state($s){$this->message_state = $s;}
        function set_message_result($s){$this->message_result = $s;} 


        // 将数据插入数据库(待修改)
        function insert_message(){
            if($this->message_id == null) return FALSE;
            if($this->message_type == null) return FALSE;
            if($this->message_subjet == null) return FALSE;
            
            
            //插入数据
            $this->conn->query($sql);
            //成功插入返回True
            return true;
        }

        // 获取操作记录
        function get_operation_record($num){
            if($num == 0){
                $sql = "SELECT * from messages ORDER BY message_id DESC WHERE message_type = 0";
            }else{
                $sql = "SELECT * from messages WHERE message_type = 3 ORDER BY message_id DESC LIMIT $num";
            }
            if($this->arr = $this->conn->query($sql)){
                return false;
            }
            return true;
        }

        function get_good_post_message($num){
            if($num == 0){
                $sql = "SELECT * from messages ORDER BY message_id DESC WHERE message_type = 2";
            }else{
                $sql = "SELECT * from messages ORDER BY message_id DESC WHERE message_type = 2 and message_state = 0";
            }
            if($this->arr = $this->conn->query($sql)){
                return false;
            }
            return true;
        }

        function get_password_change_message($num){
            if($num == 0){
                $sql = "SELECT * from messages ORDER BY message_id DESC WHERE message_type = 1";
            }else{
                $sql = "SELECT * from messages ORDER BY message_id DESC WHERE message_type = 1 and message_state = 0";
            }
            if($this->arr = $this->conn->query($sql)){
                return false;
            }
            return true;
        }

        function fetch_next_message(){
            if($array = $this->arr->fetch_array()){
                $this->message_id = $array['message_id'];
                $this->message_object = $array['message_object'];
                $this->message_subject = $array['message_subject'];
                $this->message_date = $array['message_date'];
                $this->message_type = $array['message_type'];
                $this->message_result = $array['message_result'];
                $this->message_state = $array['message_state'];
                $this->message_text = $array['message_text'];
            
                // 成功赋值
                return true;
            }
            // 失败，没有信息了
            return false;
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

        function message_insert(){
            echo "0";
            if($this->message_type == null) return false;
            echo "1";
            if($this->message_subject == null) return false;
            echo "2";
            if($this->message_object == null) return false;
            echo "3";

            $sql = "insert into messages(message_type, message_subject, message_object, message_text, message_result)
                value($this->message_type, '$this->message_subject', '$this->message_object', '$this->message_text', '$this->message_result');";
            
            if($this->conn->query($sql)){
                return true;
            }
            return false;
        }
    }
?>