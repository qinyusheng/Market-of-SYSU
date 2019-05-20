<?php
    session_start();

    include('Class_Users.php');
    $user=new Users();

    if(!isset($_SESSION['Passed'])){
         $_SESSION['Passed'] = false;
    }

    if(isset($_POST['username'])){
        $username=$_POST['username'];
        if(!$user->is_user_name($username)){
            $_SESSION['Passed']=true;
        }
        else{
            $_SESSION['Passed']=false;
            $errmsg="该用户名已注册";
        }
    }

    if(isset($_POST['password1'])){
        $password=$_POST['password1'];
    }

    if(isset($_POST['email'])){
        $email=$_POST['email'];
        if($user->is_user_email($email)){
            $_SESSION['Passed']=false;
            $errmsg="该邮箱已注册";
        }
    }
    
       if($_SESSION['Passed']==false){
?>
<!doctype html>
<style>
    html, body {
        height: 100%;
    }


    #login {
        background-image: url(img/%E7%9B%90%E7%B3%BB%E6%98%9F%E7%90%83%E8%83%8C%E6%99%AF%E5%9B%BE1.jpg);
        height: 330px;
        width: 400px;
        margin: -150px 0 0 -230px;
        padding: 30px;
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 0;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: 0 0 2px rgba(0, 0, 0, 0.2), 0 1px 1px rgba(0, 0, 0, .2), 0 3px 0 #fff, 0 4px 0 rgba(0, 0, 0, .2), 0 6px 0 #fff, 0 7px 0 rgba(0, 0, 0, .2);
        -moz-box-shadow: 0 0 2px rgba(0, 0, 0, 0.2), 1px 1px 0 rgba(0, 0, 0, .1), 3px 3px 0 rgba(255, 255, 255, 1), 4px 4px 0 rgba(0, 0, 0, .1), 6px 6px 0 rgba(255, 255, 255, 1), 7px 7px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.2), 0 1px 1px rgba(0, 0, 0, .2), 0 3px 0 #fff, 0 4px 0 rgba(0, 0, 0, .2), 0 6px 0 #fff, 0 7px 0 rgba(0, 0, 0, .2);
    }

        #login:before {
            content: '';
            position: absolute;
            z-index: -1;
            border: 1px dashed #ccc;
            top: 5px;
            bottom: 5px;
            left: 5px;
            right: 5px;
            -moz-box-shadow: 0 0 0 1px #fff;
            -webkit-box-shadow: 0 0 0 1px #fff;
            box-shadow: 0 0 0 1px #fff;
        }

    h1 {
        text-shadow: 0 1px 0 rgba(255, 255, 255, .7), 0px 2px 0 rgba(0, 0, 0, .5);
        text-transform: uppercase;
        text-align: center;
        color: #666;
        margin: 0 0 30px 0;
        letter-spacing: 4px;
        font: normal 26px/1 Verdana, Helvetica;
        position: relative;
    }

        h1:after, h1:before {
            background-color: #777;
            content: "";
            height: 1px;
            position: absolute;
            top: 15px;
            width: 120px;
        }

        h1:after {
            background-image: -webkit-gradient(linear, left top, right top, from(#777), to(#fff));
            background-image: -webkit-linear-gradient(left, #777, #fff);
            background-image: -moz-linear-gradient(left, #777, #fff);
            background-image: -ms-linear-gradient(left, #777, #fff);
            background-image: -o-linear-gradient(left, #777, #fff);
            background-image: linear-gradient(left, #777, #fff);
            right: 0;
        }

        h1:before {
            background-image: -webkit-gradient(linear, right top, left top, from(#777), to(#fff));
            background-image: -webkit-linear-gradient(right, #777, #fff);
            background-image: -moz-linear-gradient(right, #777, #fff);
            background-image: -ms-linear-gradient(right, #777, #fff);
            background-image: -o-linear-gradient(right, #777, #fff);
            background-image: linear-gradient(right, #777, #fff);
            left: 0;
        }

    fieldset {
        border: 0;
        padding: 0;
        margin: 0;
    }

    #inputs input {
        background: #f1f1f1 url(http://www.srcfans.com/jscode/img/201506/images/login-sprite.png) no-repeat;
        padding: 15px 15px 15px 30px;
        margin: 0 0 10px 0;
        width: 353px; /* 353 + 2 + 45 = 400 */
        border: 1px solid #ccc;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
        box-shadow: 0 1px 1px #ccc inset, 0 1px 0 #fff;
    }

    #username {
        background-position: 5px -2px !important;
    }

    #password {
        background-position: 5px -52px !important;
    }

    #inputs input:focus {
        background-color: #fff;
        border-color: #e8c291;
        outline: none;
        -moz-box-shadow: 0 0 0 1px #e8c291 inset;
        -webkit-box-shadow: 0 0 0 1px #e8c291 inset;
        box-shadow: 0 0 0 1px #e8c291 inset;
    }

    #actions {
        margin-top: 0px;
    }

    #submit {
        background-color: #ffb94b;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#fddb6f), to(#ffb94b));
        background-image: -webkit-linear-gradient(top, #fddb6f, #ffb94b);
        background-image: -moz-linear-gradient(top, #fddb6f, #ffb94b);
        background-image: -ms-linear-gradient(top, #fddb6f, #ffb94b);
        background-image: -o-linear-gradient(top, #fddb6f, #ffb94b);
        background-image: linear-gradient(top, #fddb6f, #ffb94b);
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        text-shadow: 0 1px 0 rgba(255,255,255,0.5);
        -moz-box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;
        -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;
        border-width: 1px;
        border-style: solid;
        border-color: #d69e31 #e3a037 #d5982d #e3a037;
        float: left;
        height: 35px;
        padding: 0;
        width: 400px;
        cursor: pointer;
        font: bold 15px Arial, Helvetica;
        color: #8f5a0a;
    }

        #submit:hover, #submit:focus {
            background-color: #fddb6f;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#ffb94b), to(#fddb6f));
            background-image: -webkit-linear-gradient(top, #ffb94b, #fddb6f);
            background-image: -moz-linear-gradient(top, #ffb94b, #fddb6f);
            background-image: -ms-linear-gradient(top, #ffb94b, #fddb6f);
            background-image: -o-linear-gradient(top, #ffb94b, #fddb6f);
            background-image: linear-gradient(top, #ffb94b, #fddb6f);
        }

        #submit:active {
            outline: none;
            -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
            -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
        }

        #submit::-moz-focus-inner {
            border: none;
        }

    #actions a {
        color: #3151A2;
        float: left ;
        line-height: 35px;
        margin-left: 10px;
    }

    #back {
        display: block;
        text-align: center;
        position: relative;
        top: 60px;
        color: #999;
    }
	input::-webkit-input-placeholder {
        /* placeholder颜色  */
        color: #aab2bd;
        /* placeholder字体大小  */
        font-size: 12px;
        /* placeholder位置  */
        text-align: left;
    }
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>中大“黑市”——注册</title>
    <style type="text/css">
        body {
            background-image: url(img/盐系星球背景图.jpg);
            height: 500px;
            margin: 0px
        }

        #head {
            height: 30px;
            background-color: #9F4300;
            color: #FFFFFF;
            filter: opacity(70%);
            padding-top: 2px;
            padding-left: 70%;
            font-size: 24px;
            font-family: "方正寂地简体";
        }

        #banner {
            width: 1280px;
            height: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        #content1 {
            filter: opacity(70%);
            width: 1280px;
            height: 650px;
            margin-left: auto;
            margin-right: auto;
            background-color: #FFFFFF;
            text-align: center;
            padding-top: 100px;
        }
    </style>
<script type="text/javascript">
	function check(){
		var psw1=document.getElementById("password1");
		var psw2=document.getElementById("password2");
		if(psw1.value!=psw2.value){
			psw2.setCustomValidity("密码不一致，请重新输确认");
		}
		else
			psw2.setCustomValidity("");
	}
</script>
</head>


<body>
    <div id="head">Let's start a shopping !</div>
    <form id="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <h1>注册账号</h1>
        <fieldset id="inputs">
			<input id="username" type="text" placeholder="Username" name="username" autofocus required/>
			<input id="email" type="text" placeholder="Email" name="email" autofocus required/>
			<input id="password1" type="password" placeholder="Password" name="password1" required/>
			<input id="password2" type="password" placeholder="Confirm Password" name="password2" required/>
		</fieldset>
        <fieldset id="actions">
            <input type="submit" id="submit" value="Create account" onClick="check()"/>
        </fieldset>
    </form>
    <br><br>
    <div style="text-align:center;clear:both">
    </div>
</body>

</html>



<?php
        if(isset($errmsg)){
            echo "<script>alert('$errmsg')</script>";
        }
        exit("");
       } // 如果通过的话
       else{
        $user->set_user_name($username);
        $user->set_user_email($email);
        $user->set_user_password($password);
        
        if($user->register_insert()){
         $_SESSION['user_name'] = $user->get_user_name();
         $_SESSION['user_id'] = $user->get_user_id();
         
         header('content-type:text/html;charset=utf-8');
         $url='index.php';
         echo "<script>window.location.href='$url';</script>;"; 
        }
        else{
            echo "fail";
        }
       }
?>


