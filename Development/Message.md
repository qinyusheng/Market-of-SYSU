# 关于申请信息功能详解

该功能主要用于管理员与用户之间进行交互，用户将申请信息发送到这上面，由管理员进行审核

## Messages 库

### 成员变量

1. message_id:主键，自增
2. message_type:信息类型，决定如何处理其他数据内容
3. message_index:需处理的对象的ID
4. message_text:申请/反馈文本
5. message_date:时间戳
6. message_state:该信息的状态，暂时分为（0-未处理，1-管理员已处理，2-用户已阅读）
7. message_change:需要做出的修改

### 成员函数