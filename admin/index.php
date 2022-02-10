<?php

require_once '../includeSKUD.php';

if(!$_SESSION['user']['priv'] == 1){
    header("Location: ".SITE_ROOT."/");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$getPost = $_POST;
$errors = [];

//all table from users

$ed = $db->query("SELECT * FROM `users`");
$viewUsers = $ed->fetchall();

//all table from groupname

$edi = $db->query("SELECT * FROM `groupName` ORDER BY `group_from_zup_name`");
$viewGroupName = $edi->fetchall();

$edip = $db->query("SELECT * FROM `information_systems` ORDER BY `system_name`");
$viewInfSys = $edip->fetchall();

// data validations 

if(!empty($getPost)){
    if($getPost['userPlace'] == "Create"){
        if($getPost['name'] == ""){

            $errors['name'] = "Имя не заполнено";
        }
        //добавить валидацию на уникальность логина
        if($getPost['surname'] == ""){

            $errors['surname'] = "Фамилиля не заполнена";

        }
        if($getPost['user'] == ""){
            $errors['user'] = "Логин не указан";
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/", $getPost['user'])){

            $errors['user'] = "Логин может состоять только из букв английского алфавита и цифр";
        }
        if($getPost['user'] != ""){
           foreach ($viewUsers as $elem){
                if($getPost['user'] == $elem['user']){
                    $errors['user'] = "Логин уже существует";
                }
            } 
        }       
        
        if($getPost['password'] == ""){
            $errors['password'] = "Укажите пароль";
        }
        if(iconv_strlen($getPost['password']) <= 5 && iconv_strlen($getPost['password']) >= 1){
            $errors['password'] = "Пароль должен содержать больше 5 символов";
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/", $getPost['password'])){

            $errors['password'] = "Пароль может состоять только из букв английского алфавита и цифр";

        }
        
    }
    if($getPost['group_from_zup_name'] == "" && $getPost['groupPlace'] == "Create"){
        
        $errors['group_from_zup_name'] = "Заполните данное поле";
    }
    if($getPost['group_from_zup_name'] != "" && $getPost['groupPlace'] == "Create"){
        foreach ($viewGroupName as $element){
            if($getPost['group_from_zup_name'] == $element['group_from_zup_name']){
                $errors['group_from_zup_name'] = "Группа уже существует";
            }
        }
    }
    
    if($getPost['system_name'] == "" && $getPost['infoPlace'] == "Create"){
        
        $errors['system_name'] = "Заполните данное поле";
    }
    if($getPost['system_name'] != "" && $getPost['infoPlace'] == "Create"){
        foreach ($viewInfSys as $element1){
            if($getPost['system_name'] == $element1['system_name']){
                $errors['system_name'] = "Группа уже существует";
            }
        }
    }
    
}
//insert tabs

if(empty($errors) && !empty($getPost)){
   if($getPost['userPlace'] == "Create") {
       $pass = $getPost['password'].'14asu56ib';
       $password = md5($pass);
       $name =  htmlspecialchars(trim($getPost['name']));
       $surname =  htmlspecialchars(trim($getPost['surname']));
       $user =  htmlspecialchars(trim($getPost['user']));
       $priv =  htmlspecialchars(trim($getPost['priv']));
       $annot =  htmlspecialchars(trim($getPost['annot']));
       
       $userQuery = $db->query("INSERT INTO `users` (`priv`, `user`, `password`, `surname`, `name`, `annot`) VALUES ('$priv', '$user', '$password', '$surname', '$name', '$annot')");  
       
       if(isset($userQuery)){
           header("Location: ".SITE_ROOT."/admin/index.php");
       }
       /*
        unset($getPost);
        $voice = "Запись успешно создана и имеет ID = " . $userQuery;
        header("Location: /skud.asu/admin/index.php");  */
   }
   if($getPost['groupPlace'] == "Create") {
       $group_from_zup_name =  htmlspecialchars(trim($getPost['group_from_zup_name']));
       $groupQuery = $db->query("INSERT INTO `groupName` (`group_from_zup_name`) VALUES ('$group_from_zup_name')"); 
       
       if(isset($groupQuery)){
           header("Location: ".SITE_ROOT."/admin/index.php");
       }
       
       /*
       unset($getPost);
       $voice = "Запись успешно создана и имеет ID = " . $groupQuery;
       header("Location: /skud.asu/admin/index.php");  */
   }
   if($getPost['infoPlace'] == "Create") {
       $system_name = htmlspecialchars(trim($getPost['system_name']));
       $infoQuery = $db->query("INSERT INTO `information_systems` (`system_name`) VALUES ('$system_name')"); 
       
       if(isset($infoQuery)){
           header("Location: ".SITE_ROOT."/admin/index.php");
       }
       
       /*
       unset($getPost);
       $voice = "Запись успешно создана и имеет ID = " . $groupQuery;
       header("Location: /skud.asu/admin/index.php");  */
   }
}

?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Header.php';?>


<div style="margin-left: 10px;"><Br>
    <a href="<?php echo SITE_ROOT?>"><button>На главную</button></a>
</div><br>
<!--Таблица по созданию пользователя-->
<div style="margin-left: 10px; display: flex;"><Br>
    <div>
        <h2>Создать пользователя</h2><br>
        
        <form class="filterform" method="post"> 
            <p><b>Привелегия</b><Br>
                <input type="radio" name="priv" checked value="0"> Простой пользователь<Br>
                <input type="radio" name="priv" value="1"> Админ<Br>            
            </p>
            <span><b>Укажите логин</b></span><Br> 
            <input type="text" name="user" placeholder="Логин" maxlength="200">  <Br>
            <span style="color: red;"><?php echo $errors['user'];?></span><Br>
            <span><b>Укажите пароль</b></span><Br>
            <input type="text" name="password" placeholder="Пароль" maxlength="200"><Br>
            <span style="color: red;"><?php echo $errors['password'];?></span><Br>
            <span><b>Укажите Фамилию</b></span><Br>
            <input type="text" name="surname" placeholder="Фамилия" maxlength="200"><Br>
            <span style="color: red;"><?php echo $errors['surname'];?></span><Br>
            <span><b>Укажите Имя</b></span><Br>
            <input type="text" name="name" placeholder="Имя" maxlength="200"> <Br>
            <span style="color: red;"><?php echo $errors['name'];?></span><Br>
            <span><b>Комментарий</b></span><Br>
            <input type="text" name="annot" placeholder="Комментарий" column="20" row="3"> <Br><Br>
            <input type="submit" name="userPlace" value="Create">    <Br>
        </form><Br>
    </div>
    <div style="margin-left: 10px;">
        <h2>Список пользователей</h2>
       <table border="1">
   
   <tr>
        <th>Фамилия
        </th>
        <th>Имя
        </th>
        <th>Привелегия
        </th>
        <th>Логин
        </th>
        <th>Комментарий
        </th>
        <th>Удалить
        </th>
        
   </tr>
       <?php foreach ($viewUsers as $key):?>  
   <tr>
       <td><?php echo $key['surname'];?></td>
       <td><?php echo $key['name'];?></td>
       <td><?php echo $key['priv'];?></td>
       <td><?php echo $key['user'];?></td>
       <td><?php echo $key['annot'];?></td>
       <td><?php if($key['ID'] != 1):?>
           <a href="<?php echo SITE_ROOT?>/admin/delete.php?table=users&id=<?php echo $key['ID'];?>" onClick="javascript:return confirm('Вы уверены, что хотите удалить запись пользователя - <?php echo $key['surname']." ".$key['name'];?>?');">
               <button type="submit">ID = <?php echo $key['ID'];?></button>
          </a><?php endif;?>
       </td>       
    </tr>
       <?php endforeach;?>
  </table>
    </div>
    
</div>  
    
<div style="margin-left: 10px; display: flex;">
    <!--Таблица по группам по ЗУП-->
    <div style="display: flex;">
        <div>
            <h2>Создать новую группу по ЗУП</h2><br>
            <form class="filterform" method="post">            
                <input type="text" name="group_from_zup_name" placeholder="Группа по ЗУП" column="20" row="3"> <Br><Br>
                 <span style="color: red;"><?php echo $errors['group_from_zup_name'];?></span><Br>
                <input type="submit" name="groupPlace" value="Create">    <Br>
            </form><Br>
        </div>
        <div style="margin-left: 10px;">
          <h2>Группы по зуп</h2><br>
            <table border="1">

                <tr>
                     <th>Группа по ЗУП
                     </th>

                     <th>Удалить
                     </th>

                </tr>
                    <?php foreach ($viewGroupName as $key):?>  
                <tr>       
                    <td><?php echo $key['group_from_zup_name'];?></td>
                    <td>
                         <a href="<?php echo SITE_ROOT?>/admin/delete.php?table=groupName&id=<?php echo $key['ID'];?>" onClick="javascript:return confirm('Вы уверены, что хотите удалить - <?php echo $key['group_from_zup_name'];?>?');">
                            <button type="submit">ID = <?php echo $key['ID'];?></button>
                         </a>
                    </td>       
                </tr>   
                    <?php endforeach;?>
            </table>
        </div>
    </div>
    <!--Таблица по Информационным системам-->
    <div style="display: flex; margin-left: 30px;">
        <div>
            <h2>Создать информационную систему</h2><br>
            <form class="filterform" method="post">            
                <input type="text" name="system_name" placeholder="Инфо система" column="20" row="3"> <Br><Br>
                 <span style="color: red;"><?php echo $errors['system_name'];?></span><Br>
                <input type="submit" name="infoPlace" value="Create">    <Br>
            </form><Br>
        </div> 
        <div style="margin-left: 10px;">
            <div style="margin-left: 10px;">
                <h2>Информационная система</h2><br>
                  <table border="1">

                    <tr>
                         <th>Информационная система
                         </th>

                         <th>Удалить
                         </th>

                    </tr>
                        <?php foreach ($viewInfSys as $key):?>  
                    <tr>       
                        <td><?php echo $key['system_name'];?></td>
                        <td>
                             <a href="<?php echo SITE_ROOT?>/admin/delete.php?table=system_name&id=<?php echo $key['ID'];?>" onClick="javascript:return confirm('Вы уверены, что хотите удалить - <?php echo $key['system_name'];?>?');">
                                <button type="submit">ID = <?php echo $key['ID'];?></button>
                             </a>
                        </td>       
                    </tr>   
                        <?php endforeach;?>
                </table>
          </div>
        </div>
    </div>
</div>



<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Footer.php';?>