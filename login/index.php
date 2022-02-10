<?php

require_once '../includeSKUD.php';
if($_SESSION['user']){  
    header("Location: ".SITE_ROOT."/");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
$loginPost = $_POST;

$login = htmlspecialchars($loginPost['login']);
$loginPost['password'] = $loginPost['password'].'14asu56ib';
$pass = md5($loginPost['password']);
$submit = $loginPost['remember'];

$err;
if(!empty($loginPost)&&$loginPost['auth']=='enter'){
    
    if($loginPost['login'] == ""){
        $err['login'] = "Введите логин";
    }
    if($loginPost['password'] == ""){
        $err['password'] = "Введите пароль";
    }
    if(empty($err)){
        

        $rl = $db->query("SELECT * FROM `users` WHERE `user`= '$login'"); // AND `password` = '$pass' 
        $readLogin = $rl->fetch();        
        if($readLogin['password'] !== $pass){
            $err['password'] = "Пароль не верен!";
        }

        if(!$readLogin){
            $err['login'] = "Пользователь не найден";
        }

        $persName = $readLogin['surname']. " ". $readLogin['name']; 

        if($readLogin['password'] == $pass){
            $_SESSION['user'] = [
                "id"=>$readLogin['ID'],
                "fullname"=>$persName,
                "priv"=>$readLogin['priv'],
                "auth"=>"true"
            ]; 

            if($submit == "true"&&empty($err)){

                setcookie("auth", "true", time()+3600*12);
                setcookie("name", $persName, time()+3600*12);  
                setcookie("user", $readLogin['user'], time()+3600*12);
                setcookie("password", md5($readLogin['password']."cookie56msch"), time()+3600*12);
            }
            header("Location: ".SITE_ROOT."/");
       } 
    }
}


?>

<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Header.php';?>
<style>
    form{
        display: flex;
        flex-direction: column;
        width: 400px;
    }
    input{
        margin: 10px;
        padding: 10px;
        border: unset;
        border-bottom: 2px solid #e3e3e3;
        
    }
    button{
        padding: 10px;
        background: #e3e3e3;
        border: unset;
        cursor: pointer;
    }    
    .buttn{
        display: flex;
        flex-direction: line;
        
    }
    .buttn button{
        margin-right: 50px;
    }
</style>

<div style="margin-left: 150px;">
    <form method="post">

            Логин<br>
            <input type="text" name="login" value="<?php echo $loginPost['login']?>"><br>
            <span style="color: red"><?php echo $err['login']; unset($err['login']);?></span><br>
            Пароль<br>
            <input type="password" name="password"><br>
            <span style="color: red"><?php echo $err['password']; unset($err['password']);?></span><br>
            <div class="buttn">
                <p>Запомнить меня</p>
                <input class="pointer" type="checkbox" name="remember" value="true">
            </div>
            <button type="submit" value="enter" name="auth">Войти</button>
    </form><br>
    
</div>

<br>
<br>
<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Footer.php';?>
