# 关于申请信息功能详解

该功能主要用于管理员与用户之间进行信息传递，用户将申请信息发送到这上面，由管理员进行审核

---

## Messages 库

### 成员变量

1. $message_id:主键，自增
2. $message_type:信息类型 ($mes_type = array('操作记录','修改密码','商品发布'))
3. $message_subject：操作执行主体
4. $message_object：操作执行对象
5. $message_text:申请/反馈文本
6. $message_date：时间戳
7. $message_state：该信息的状态，暂时分为（0-未处理，1-管理员已处理，2-用户已阅读）
8. $message_result：操作执行结果
9. $conn：连接变量，与数据库的接口

### 成员函数

1. 构造函数：链接数据库
2. 析构函数：关闭数据库
3. set/get函数：接口

---

## 功能实现

### 用户修改密码申请

1. 信息存储方式：
   * message_subject：用户ID
   * message_object：修改前的密码
   * message_result：修改后的密码
   * message_date：用户申请发送时间
   * message_type：类型ID（1 -> 密码修改)
   * message_state：还未通过时为0，通过后为1
   * message_text：null

### 商品发布申请

1. 信息存储方式：
   * message_subject：用户ID
   * message_object：商品ID
   * message_result：发布时长
   * message_date：用户申请发送时间
   * message_type：类型ID（2 -> 商品发布)
   * message_state：还未通过时为0，通过后为1
   * message_text：null

### 系统记录

1. 信息存储方式：
   * message_subject：管理员ID
   * message_object：信息ID
   * message_result：通过/拒绝
   * message_date：处理时间
   * message_type：类型ID（0 -> 操作记录)
   * message_state：设置为1
   * message_text：操作名称

### 功能流程

1. 用户提交的需要由管理员审核的信息都讲发送到这个数据库里，并被设置为还**未处理**的状态
2. 管理员在管理员界面可以查看并处理这些最新的未处理信息。处理结束后，将这条信息设置为**已处理**状态
3. 用户可以在自己的消息界面收到来自管理员的**处理结果**信息以及管理员的相关**反馈**

### 前端设计

主要设计:

1. 在管理员界面设置消息栏，当有新的消息还未处理时，在左侧功能栏点亮一个提升灯*红*
2. 消息栏内的消息旁同样设置一个提示灯，消息处于不同状态时，提示灯颜色不同
3. 处理完成的消息显示为灰色

其他功能(暂不考虑)：

   1. 管理员点击拒绝申请以后，都会弹出一个文本窗口，通过这个向用户说明拒绝理由

### 后端设计

用户发送申请信息：  

   1. 用户填写完相应表单后，点击申请键发送申请
   2. 创建一个**Messages**变量，将表单上的相应信息储存到该对象的成员变量中
   3. 使用**insert()**函数将成员变量中的信息添加到**Messages 库**中

管理员处理申请：

   1. 管理员在点击同意以后，运行成员函数**message_agree()**,改变信息状态
   2. 点击拒绝以后，运行成员函数**message_refuse()**

### 数据库设计

~~~ mysql
CREATE table messages(
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    message_type INT NOT null,
    message_subject VARCHAR(50) not null,
    message_object VARCHAR(50) not null,
    message_text text,
    message_date timestamp not NULL DEFAULT CURRENT_TIMESTAMP,
    message_state int not null default 0,
    message_result  VARCHAR(80)
)
~~~