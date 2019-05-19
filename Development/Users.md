# User类

以类的形式对数据库进行操作（如果会的话，先面向过程也行）

* 成员变量：
      * user_id
      * user_name
      * user_password
      * user_email

* 成员函数：
      * is_user_name(username)
      * is_email(email)
      * land(username , password)
      * register(username , email , password)
      * register_insert(username, email , password)

## 登陆功能详解

1. 输入信息：用户ID/用户名/学号，联系方式，密码
2. 判断登陆是否成功：land(username , password)
   * 搜寻是否有该用户邮箱（email）/用户名(user_name)，找到返回用户ID，否则返回0-->登陆失败（）
     * is_user_name(username)
     * is_email(username)
   * 根据用户ID查找密码，与输入的密码(password)比较，如果相同，返回true，如果不相同返回false
       * Is_password(id , password)
   * 查看该用户是否被冻结。（暂时不需要）
   * 上述两步全部成功，返回0。在第一步失败，返回1；第二步失败，返回2；第三部失败，返回3。

## 注册功能详解

1. 输入信息：
   * 用户名（username）
   * 中大邮箱（email）
   * 密码（password）
   * 重复密码（password_2）
*检查两次输入的密码是否相同（JavaScript 表单检测功能）*
2. 判断能否注册成功register(username , email , password)
   * 查找该用户名是否已经被使用（调用，is_user_name(username)）
   * 查找该是否邮箱已经注册过（调用，is_email(email)）
   * 发送验证消息（暂不考虑）
   * 将注册信息插入到数据库中。
*register_insert(username , email , password)*
   * 全部成功返回0，第一步失败返回1，第二步失败返回2。

# 数据库设计

~~~mysql
create table Users(
        user_id int auto_increment primary key not null,
        user_name varchar(50) not null,
        user_password varchar(50) not null,
        user_email varchar(50) not null,
        user_style bit default 0,
        user_time timestamp NULL DEFAULT CURRENT_TIMESTAMP
)
~~~