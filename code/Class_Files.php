<?php
    class Images{
        private $upload_dir; // 图片保存地址
        private $filename; // 图片名字
        private $address; // 图片绝对地址
        private $position; // 图片相对地址,必须存进数据库再取出才有用

        function __construct()
        {
            // 设置上传文件目录
            $this->upload_dir = getcwd()."\\upload\\images\\";
            $this->position = "upload\\\\images\\\\";
        
            //检查目录是否存在，不存在就创建一个
            if(!is_dir($this->upload_dir)){
                mkdir($this->upload_dir);
            }
        }

        // 数据获取接口
        function get_dir(){return $this->upload_dir;}
        function get_address(){return $this->address;}
        function get_filename(){return $this->filename;}
        function get_position(){return $this->position;}

        // 用来生成文件在本地的特定文件名
        function make_filename(){
            // 先获取一个随机数
            $randint = rand(100 , 999);
            //获取系统时间
            $curtime = time();
            // 组合起来作为文件的名字
            $filename = $curtime.$randint.".jepg";

            return $filename;
        }

        function find_address(){
            // 为图片生成文件名
            $this->filename = $this->make_filename();
            // 图片相对于当前位置的位置
            $this->position = $this->position.$this->filename;
            // 图片在本地保存的地址
            $this->address = $this->upload_dir.$this->filename;
            return $this->address;
        }
    }

?>