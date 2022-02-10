<?php
require_once '../includeSKUD.php';
if(!$_SESSION['user']){
    header("Location: ".SITE_ROOT."/login/");
}
/*
 * Создание новых записей
 * 
 * 
 * 
 */

$errors = []; //array with errors
$valuesPost = $_POST;

/*
 * DB info segment
 */
$pod0 = $db->query("SELECT * FROM `groupName`");
$podrazdeleniye= $pod0->fetchall(); // 	group_from_zup_name 

$pod1 = $db->query("SELECT * FROM `information_systems`");
$infoSystem= $pod1->fetchall(); //  system_name

$pod2 = $db->query("SELECT * FROM `users`");
$usersFio= $pod2->fetchall(); //  surname name

$pod3 = $db->query("SELECT * FROM `mainData` ORDER BY start_date DESC LIMIT 5");
$mainForm = $pod3->fetchall();

//form validation
if(!empty($valuesPost)){
    if($valuesPost['surname']== "")
    {
        $errors['surname'] = 'Фамилия не заполнена';
    }
    if($valuesPost['name']== "")
    {
        $errors['name'] = 'Имя не заполнено';
    }
    if($valuesPost['lastname']== "")
    {
        $errors['lastname'] = 'Отчество не заполнено';
    }
    if($valuesPost['group_from_zup']== "")
    {
        $errors['group_from_zup'] = 'Подразделение по ЗУП не выбрано';
    }
    if($valuesPost['res_name']== "")
    {
        $errors['res_name'] = 'Наименование ресурса не выбрано';
    }
    
    if($valuesPost['who_give_id']== "")
    {
        $errors['who_give_id'] = 'Исполнитель предоставления доступа АСУ не выбран';
    }
    if($valuesPost['why_give']== "")
    {
        $errors['why_give'] = 'Основание предоставления доступа не указано';
    }
    
    $surename = htmlspecialchars($valuesPost['surname']);
    $name = htmlspecialchars($valuesPost['name']);
    $lastname = htmlspecialchars($valuesPost['lastname']);
    $group_from_zup = htmlspecialchars($valuesPost['group_from_zup']);
    $res_name = htmlspecialchars($valuesPost['res_name']);
    //$start_date = $_POST['start_date'];
    $who_give_id = htmlspecialchars($valuesPost['who_give_id']);
    $why_give = htmlspecialchars($valuesPost['why_give']);
    $attributes = htmlspecialchars($valuesPost['attributes']);    
    $note = htmlspecialchars($valuesPost['note']);
    
}
        
    

/*
 * isert segment
 */    
   

    if(empty($errors) && !empty($valuesPost)){
    
    
        $insert = $db->query("INSERT INTO `mainData` (`surname`, `name`, `lastname`, `group_from_zup`, `res_name`, `who_give_id`, `why_give`, `attributes`, `note`) VALUES ('$surename','$name','$lastname','$group_from_zup','$res_name','$who_give_id','$why_give','$attributes','$note')");
        
        if(isset($insert))
        {
            //unset($valuesPost);       
            //$voice = "Запись успешно создана и имеет ID = " . $insert; 
            header("Location: ".SITE_ROOT."/insert/");
        }
    }

    


?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT . '/view/Header.php';?>
<style>
    body{
        margin-left: 10px;
    }
    #body{
        margin-left: 15px;
    }
    .error{
        color: red;
    }
</style>
    <div>
        <br>
        <a href="<?php echo SITE_ROOT?>"><button>На главную</button></a>
        <br>
        <div id="body">            
            <form method="post">
                <br>
                <span><h1>Заполните форму</h1></span>
                <br>                              
                
                <br>
                <div class="d-flex">
                    <div style="margin-right: 15px;">
                        <span>Фамилия</span><br>
                        <input type="text" name="surname" value="<?php echo $valuesPost['surname']?>"><br>
                        <span class="error"><?php echo $errors['surname']?></span>
                        <br>
                        <span>Имя</span><br>
                        <input type="text" name="name" value="<?php echo $valuesPost['name']?>"><br>
                        <span class="error"><?php echo $errors['name']?></span>
                        <br>
                        <span>Отчество</span><br>
                        <input type="text" name="lastname" value="<?php echo $valuesPost['lastname']?>"><br>
                        <span class="error"><?php echo $errors['lastname']?></span>
                        <br>
                        <span>Подразделение по ЗУП</span> <br>              
                        <select name="group_from_zup">
                            <option selected value="<?php echo $valuesPost['group_from_zup']?>"><?php echo $valuesPost['group_from_zup']?></option>
                            <?php foreach ($podrazdeleniye as $podr):?>
                            <option value="<?php echo $podr['group_from_zup_name']?>"><?php echo $podr['group_from_zup_name']?></option>
                            <?php endforeach;?>                     
                        </select>
                        <br>
                        <span class="error"><?php echo $errors['group_from_zup']?></span>
                        <br>
                        <span>Наименование ресурса</span> <br>               
                        <select name="res_name">
                            <option selected value="<?php echo $valuesPost['res_name']?>"><?php echo $valuesPost['res_name']?></option>
                            <?php foreach ($infoSystem as $podr):?>
                            <option value="<?php echo $podr['system_name']?>"><?php echo $podr['system_name']?></option>
                            <?php endforeach;?>                     
                        </select>
                        <br>
                        <span class="error"><?php echo $errors['res_name']?></span>
                        <br>                
                        <span>Исполнитель предоставления доступа АСУ</span> <br>            
                        <select name="who_give_id">
                            <option selected value="<?php echo $valuesPost['who_give_id']?>"><?php echo $valuesPost['who_give_id']?></option>
                            <?php foreach ($usersFio as $podr):?>
                            <option value="<?php echo $podr['surname'].' ' . $podr['name']?>"><?php echo $podr['surname'].' ' . $podr['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <br>
                        <span class="error"><?php echo $errors['who_give_id']?></span>                
                        <br>
                    </div>
                    <div>
                        <span>Основание предоставления доступа</span><br>                
                        <textarea name="why_give" cols="40" rows="4"><?php echo $valuesPost['why_give']?></textarea><br>
                        <span class="error"><?php echo $errors['why_give']?></span>
                        <br>
                        <span>Аттрибуты доступа</span><br>
                        <textarea name="attributes" cols="40" rows="4"><?php echo $valuesPost['attributes']?></textarea><br>               
                        <br>
                        <span>Примечание</span> <br>  
                        <textarea name="note" cols="40" rows="4"><?php echo $valuesPost['note']?></textarea><br> 
                        <br> 
                    </div>
                </div>
                <input type="submit" value="Сделать запись"><br>

                
            </form><br>
        </div><br>
        <span><h2>Последние 5 созданных форм</h2></span><br>
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
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Footer.php';?>

