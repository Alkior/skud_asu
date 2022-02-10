<?php
require_once '../includeSKUD.php';


/* 
 * При масштабировании проекта переделать всё нахер на классовую систему
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$editPost = $_POST;
$editGet = $_GET;
$errors = array();

//Выгрузка таблицы

$id = $editGet['id'];
$ed = $db->query("SELECT * FROM `mainData` WHERE id='$id'");
$edit = $ed->fetch();

$surename = $edit['surname'];
$name = $edit['name'];
$lastname = $edit['lastname'];
$group_from_zup = $edit['group_from_zup'];
$res_name = $edit['res_name'];
$who_give_id = $edit['who_give_id'];
$why_give = $edit['why_give'];
$attributes = $edit['attributes'];
$note = $edit['note'];

$pod3 = $db->query("SELECT * FROM `mainData` WHERE `surname` = '$surename' ORDER BY start_date DESC");
$mainForm = $pod3->fetchall();
/*
 * DB info segment
 */

$pod0 = $db->query("SELECT * FROM `groupName`");
$podrazdeleniye= $pod0->fetchall(); // 	group_from_zup_name 

$pod1 = $db->query("SELECT * FROM `information_systems`");
$infoSystem= $pod1->fetchall(); //  system_name

$pod2 = $db->query("SELECT * FROM `users`");
$usersFio= $pod2->fetchall(); //  surname name

//copy path

if($editPost['copy'] == "true" && $editPost['submit'] == "true"){ 
    
    $insert = $db->insert("INSERT INTO `mainData` (`surname`, `name`, `lastname`, `group_from_zup`, `res_name`, `who_give_id`, `why_give`, `attributes`, `note`) VALUES ('$surename','$name','$lastname','$group_from_zup','$res_name','$who_give_id','$why_give','$attributes','$note')");
    
    unset($editPost);
    $id = $insert;
    header("Location: ".SITE_ROOT."/edit/index.php?id=$id");
        
}
if($editPost['copy'] == "true"){
    unset($editPost);
}

//Верификация полей:    

if(!empty($editPost)){     
    $table = implode(array_keys($editPost));
    $content = htmlspecialchars(implode($editPost));
    //if($table == 'attributes'){$content = md5($content);}
    
    if($content != ""){
        $pEdit = $db->query("UPDATE `mainData` SET `$table`='$content' WHERE `id`='$id'");
        unset($editPost);
        header("Location: ".SITE_ROOT."/edit/index.php?id=$id");    
    }
    else{
        $errors[$table] = 'Введите значение';
    }
}
    
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Header.php';?>
<br>
    <div style="display: flex;">
        <div>
            <a href="<?php echo SITE_ROOT;?>">
                <input type="button" value="На главную"/>
            </a>
        </div>
        <div style="margin-left: 150px;">
            <form method="post">
                <span>Изволите скопировать?</span>
                <input type="checkbox" name="submit" value="true"/>
                <button type="submit" name="copy" value="true" style="margin-left:15px">Copy</button>
            </form>            
        </div>
    </div>
<br>
<br>

<table border="2">
   
    <tr>
         <th>Фамилия
         </th>
         <td><?php echo $edit['surname'];?></td>
         <td><form method="post"><input type="text" name="surname" style="width:300px"><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['surname'];?></span></td>
    </tr>
    <tr>
         <th>Имя
         </th>
         <td><?php echo $edit['name'];?></td>
         <td><form method="post"><input type="text" name="name" style="width:300px"><button type="submit" width="20px">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['name'];?></span></td>
    </tr>
    <tr>
         <th>Отчество
         </th>
         <td><?php echo $edit['lastname'];?></td>
         <td><form method="post"><input type="text" name="lastname"style="width:300px"><button type="submit" width="20px">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['lastname'];?></span></td>
    </tr>
    <tr>
         <th>Подразделение по ЗУП
         </th>
         <td><?php echo $edit['group_from_zup'];?></td>
         <td><form method="post">
                <select name="group_from_zup">
                    <option selected value="<?php echo $valuesPost['group_from_zup']?>"><?php echo $valuesPost['group_from_zup']?></option>
                    <?php foreach ($podrazdeleniye as $podr):?>
                    <option value="<?php echo $podr['group_from_zup_name']?>"><?php echo $podr['group_from_zup_name']?></option>
                    <?php endforeach;?>                     
                </select>
                <button type="submit">Тык</button>
             </form>
         </td>
                <td><span style="color: red"><?php echo $errors['group_from_zup'];?></span></td>
    </tr>
    <tr>
         <th>Наименование ресурса
         </th>
         <td><?php echo $edit['res_name'];?></td>
         <td><form method="post">
                <select name="res_name">
                    <option selected value="<?php echo $valuesPost['res_name']?>"><?php echo $valuesPost['res_name']?></option>
                    <?php foreach ($infoSystem as $podr):?>
                    <option value="<?php echo $podr['system_name']?>"><?php echo $podr['system_name']?></option>
                    <?php endforeach;?>                     
                </select>
                 <button type="submit">Тык</button>
             </form>
         </td>
         <td><span style="color: red"><?php echo $errors['res_name'];?></span></td>
    </tr><?php if($_SESSION['user']['priv'] == 1):?>
    <tr>
         <th>Дата предоставления доступа
         </th>
         <td><?php echo $edit['start_date'];?></td>
         <td><form method="post"><input type="datetime-local" name="start_date"><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['start_date'];?></span></td>
    </tr>
    <tr>
         <th>Исполнитель предоставления доступа АСУ
         </th>
         <td><?php echo $edit['who_give_id'];?></td>
         <td><form method="post">
                <select name="who_give_id">
                    <option selected value="<?php echo $valuesPost['who_give_id']?>"><?php echo $valuesPost['who_give_id']?></option>
                    <?php foreach ($usersFio as $podr):?>
                    <option value="<?php echo $podr['surname'].' ' . $podr['name']?>"><?php echo $podr['surname'].' ' . $podr['name']?></option>
                    <?php endforeach;?>
                </select> 
                <button type="submit">Тык</button>
             </form>
         </td>
                <td><span style="color: red"><?php echo $errors['who_give_id'];?></span></td>
    </tr><?php endif;?>
    <tr>
         <th>Основание предоставления доступа
         </th>
         <td><?php echo $edit['why_give'];?></td>
         <td><form method="post"><textarea name="why_give" cols="40" rows="2"></textarea><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['why_give'];?></span></td>
    </tr>
    <tr>
         <th>Аттрибуты доступа
         </th>
         <td><?php echo $edit['attributes'];?></td>
         <td><form method="post"><textarea name="attributes" cols="40" rows="2"></textarea><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['attributes'];?></span></td>
    </tr>
    <tr>
         <th>Дата закрытия доступа
         </th>
         <td><?php echo $edit['end_date'];?></td>
         <td><form method="post"><input type="datetime-local" name="end_date"><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['end_date'];?></span></td>
    </tr>
    <tr>
         <th>Исполнитель закрытия доступа АСУ
         </th>
         <td><?php echo $edit['who_close_id'];?></td>
         <td><form method="post">
                <select name="who_close_id">
                    <option selected value="<?php echo $valuesPost['who_give_id']?>"><?php echo $valuesPost['who_give_id']?></option>
                    <?php foreach ($usersFio as $podr):?>
                    <option value="<?php echo $podr['surname'].' ' . $podr['name']?>"><?php echo $podr['surname'].' ' . $podr['name']?></option>
                    <?php endforeach;?>
                </select>
                <button type="submit">Тык</button></form></td>
                <td><span style="color: red"><?php echo $errors['who_close_id'];?></span></td>
    </tr>
    <tr>
         <th>Основание закрытия доступа
         </th>
         <td><?php echo $edit['why_close'];?></td>
         <td><form method="post"><textarea name="why_close" cols="40" rows="2"></textarea><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['why_close'];?></span></td>
    </tr>
    <tr>
         <th>Примечание
         </th>
         <td><?php echo $edit['note'];?></td>
         <td><form method="post"><textarea name="note" cols="40" rows="2"></textarea><button type="submit">Тык</button></form></td>
         <td><span style="color: red"><?php echo $errors['note'];?></span></td>
    </tr>
</table>
<span>Дата последнего изменения записи: <?php echo $edit['update_date']?></span><br>
<br>
<span><h2><b>Формы соответствующие полю "Фамилия":</b></h2></span><br>
 <table border="1">
   
   <tr>
        <th>Фамилия
        </th>
        <th>Имя
        </th>
        <th>Отчество
        </th>
        <th>Подразделение по ЗУП
        </th>
        <th>Наименование ресурса
        </th>
        <th>Дата предоставления доступа
        </th>
        <th>Исполнитель предоставления доступа АСУ
        </th>
        <th>Основание предоставления доступа
        </th>
        <th>Аттрибуты доступа
        </th>
        <th>Дата закрытия доступа
        </th>
        <th>Исполнитель закрытия доступа АСУ
        </th>
        <th>Основание закрытия доступа
        </th>
        <th>Примечание
        </th>
        <th>Редактировать
        </th>
   </tr>
       <?php foreach ($mainForm as $key):?>  
   <tr>
       <td><?php echo $key['surname'];?></td>
       <td><?php echo $key['name'];?></td>
       <td><?php echo $key['lastname'];?></td>
       <td><?php echo $key['group_from_zup'];?></td>
       <td><?php echo $key['res_name'];?></td>
       <td><?php echo $key['start_date'];?></td>
       <td><?php echo $key['who_give_id'];?></td>
       <td><?php echo $key['why_give'];?></td>
       <td><?php echo $key['attributes'];?></td>
       <td><?php echo $key['end_date'];?></td>
       <td><?php echo $key['who_close_id'];?></td>
       <td><?php echo $key['why_close'];?></td>
       <td><?php echo $key['note'];?></td>
       <td><a href="<?php echo SITE_ROOT?>/edit/index.php?id=<?php echo $key['id'];?>"><button>ID=<?php echo $key['id'];?></button></a></td>
   </tr>   
       <?php endforeach;?>
</table>



<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Footer.php';?>