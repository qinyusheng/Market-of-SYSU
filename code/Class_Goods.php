<!-- 
    商品种类：0——书籍 1——电子产品 2——学习工具 3——生活用品 4——其他
    $type = array('书籍','电子产品','学习用品','生活用品','其他');
-->
<?php
    class Goods{
        var $conn;
        var $arr; // 用来容纳获取到的商品
        private $good_id; // 商品ID
        private $type_id; // 商品类型
        private $good_name; // 商品名称
        private $good_describe; // 商品描述
        private $good_image; // 商品图片链接
        private $good_price; // 商品价格
        private $start_time; // 商品发布时间
        private $end_time; // 商品结束时间
        private $old_new; // 商品新旧程度
        private $good_state; // 商品状态
        private $click_time; // 商品点击次数
        private $good_owner; // 商家姓名
        private $good_contact; // 商家联系方式
        private $good_address; // 商品所在地

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
        
        // get函数
        function get_good_id(){return $this->good_id;}
        function get_type_id(){return $this->type_id;}
        function get_good_name(){return $this->good_name;}
        function get_good_describe(){return $this->good_describe;}
        function get_good_image(){return $this->good_image;}
        function get_good_price(){return $this->good_price;}
        function get_start_time(){return $this->start_time;}
        function get_end_time(){return $this->end_time;}
        function get_old_new(){return $this->old_new;}
        function get_good_state(){return $this->good_state;}
        function get_click_time(){return $this->click_time;}
        function get_good_owner(){return $this->good_owner;}
        function get_good_contact(){return $this->good_contact;}
        function get_good_address(){return $this->good_address;}
        // set函数
        //function set_good_id($s){$this->good_id = $s;}
        function set_type_id($s){$this->type_id = $s;}
        function set_good_name($s){$this->good_name = $s;}
        function set_good_describe($s){$this->good_describe = $s;}
        function set_good_image($s){$this->good_image = $s;}
        function set_good_price($s){$this->good_price = $s;}
        function set_start_time($s){$this->start_time = $s;}
        function set_end_time($s){$this->end_time = $s;}
        function set_old_new($s){$this->old_new = $s;}
        function set_good_state($s){$this->good_state = $s;}
        function set_click_time($s){$this->click_time = $s;}
        function set_good_owner($s){$this->good_owner = $s;}
        function set_good_contact($s){$this->good_contact = $s;}
        function set_good_address($s){$this->good_address = $s;}


        // 从数据库中扒下信息
        function find_good_by_id($good_id){
            $sql = "select * from goods where good_id = $good_id";
            $result = $this->conn->query($sql);//执行sql
            if($array = $result->fetch_array()){
                // 把数据保存近变量中
                $this->good_id = $array['good_id'];
                $this->type_id = $array['type_id'];
                $this->good_name = $array['good_name'];
                $this->good_describe = $array['good_describe'];
                $this->good_image = $array['good_image'];
                $this->good_price = $array['good_price'];
                $this->start_time = $array['start_time'];
                $this->end_time = $array['end_time'];
                $this->old_new = $array['old_new'];
                $this->good_state = $array['good_state'];
                $this->click_time = $array['click_time'];
                $this->good_owner = $array['good_owner'];
                $this->good_contact = $array['good_contact'];
                $this->good_address = $array['good_address'];
                // 说明成功赋值
                return True;
            }
            // 没有找到这个商品
            return False;
        }
        
        // 插入新的商品
        function insert_goods(){
            if($this->good_name == null) return FALSE;
            if($this->good_describe == null) return FALSE;
            if($this->good_image == null) return FALSE;
            if($this->good_price == null) return FALSE;
            if($this->start_time == null) return FALSE;
            if($this->end_time == null) return FALSE;
            if($this->old_new == null) return FALSE;
            if($this->good_state == null) return FALSE;
            if($this->good_owner == null) return FALSE;
            if($this->good_contact == null) return FALSE;
            if($this->good_address == null) return FALSE;
            
            // 设计sql语句      
            $sql = "insert into goods (type_id , good_name, good_describe , good_image, good_price, start_time, end_time,
                    old_new, good_state, good_owner, good_contact, good_address,click_time) 
                    values($this->type_id ,'$this->good_name','$this->good_describe', '$this->good_image', $this->good_price, '$this->start_time', '$this->end_time',
                    '$this->old_new', $this->good_state, '$this->good_owner', '$this->good_contact', '$this->good_address', 0)";
            //插入数据
            if($this->conn->query($sql)){
                return true;
            }
            //成功插入返回True
            return false;
        }

        // 找到用户发布的商品
        function find_good_by_user_name($name){
            // 设计sql
            $sql = "SELECT * from goods WHERE good_owner = '$name'";
            
            // 查找商品
            if($this->arr = $this->conn->query($sql)){
                return true;
            }
            return false;
        }

        // 增加点击次数
        function be_click(){
            $this->click_time = $this->click_time + 1;
            // 更新点击次数
            $sql = "UPDATE goods set click_time = $this->click_time WHERE good_id = $this->good_id;";
            if($this->conn->query($sql)){
                return true;
            }
            return false;
        }

        function find_new_goods($num){
            // 获取$num行数据
            $sql = "SELECT * FROM goods WHERE good_state = 1 ORDER BY good_id DESC LIMIT $num";
            if(!$this->arr = $this->conn->query($sql)){
                return false;
            }
            return true;
        }

        function find_goods_by_type_id($id){
            // 设计sql语句
            $sql = "SELECT * from goods WHERE type_id = $id and good_state = 1 ORDER BY click_time DESC";
            // 成功获取商品则返回True
            if($this->arr = $this->conn->query($sql)){
                return true;
            }
            return false;
        }

        function fetch_next_good(){
            // 获取下一个商品信息
            if($array = $this->arr->fetch_array()){
                // 把数据保存近变量中
                $this->good_id = $array['good_id'];
                $this->type_id = $array['type_id'];
                $this->good_name = $array['good_name'];
                $this->good_describe = $array['good_describe'];
                $this->good_image = $array['good_image'];
                $this->good_price = $array['good_price'];
                $this->start_time = $array['start_time'];
                $this->end_time = $array['end_time'];
                $this->old_new = $array['old_new'];
                $this->good_state = $array['good_state'];
                $this->click_time = $array['click_time'];
                $this->good_owner = $array['good_owner'];
                $this->good_contact = $array['good_contact'];
                $this->good_address = $array['good_address'];
                // 说明成功赋值
                return True;
            }
            // 失败，没有商品了
            return False;
        }

        function delete_good_by_id($id){
            // 设计sql语句
            $sql = "DELETE from goods WHERE good_id = $id";
            if($this->conn->query($sql)){
                return true;
            }
            return false;
        }
    }
?>