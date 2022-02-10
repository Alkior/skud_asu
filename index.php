<?php

require_once 'includeSKUD.php';


 /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$search = $_GET;

$quote = 'SELECT * FROM `mainData` ORDER BY start_date DESC LIMIT 15';
$speach = 'Последние 15 записей';

$pod0 = $db->query("SELECT * FROM `groupName`");
$podrazdeleniye= $pod0->fetchall(); // 	group_from_zup_name 

$pod1 = $db->query("SELECT * FROM `information_systems`");
$infoSystem= $pod1->fetchall(); //  system_name

if(!empty($search)&&$search['search'] != ""){
    $filter = $search['search'];    
    $quote =  "SELECT * FROM `mainData` WHERE `surname` LIKE '%$filter%' OR `name` LIKE '%$filter%' OR `who_give_id` LIKE '%$filter%' ORDER BY start_date DESC";
    $speach = "Поиск выполнен по фразе: " ."'" .$search['search']."'";
}
if(!empty($search)&&$search['start_date'] != ""){
    $start_date = $search['start_date'];
    $end_date = $search['end_date'];
    if($end_date != ""){
        $quote = "SELECT * FROM `mainData` WHERE `start_date` BETWEEN '$start_date%' AND '$end_date%' ORDER BY start_date DESC";
        $speach = "Поиск выполнен по диапозону дат между ".$start_date." и ". $end_date;
    }
    if($end_date == '') {
        $quote = "SELECT * FROM `mainData` WHERE `start_date` LIKE '$start_date%' ORDER BY start_date DESC";
        $speach = "Поиск выполнен по дате открытия доступа";
    }
}
if(!empty($search)&&$search['group'] != ""){
    
    $grFrZup = htmlspecialchars($search['group']);
    if($search['group']){
        $quote = "SELECT * FROM `mainData` WHERE `group_from_zup` = '$grFrZup' ORDER BY start_date DESC";
        $speach = "Поиск выполнен по Подразделению по ЗУП";
    }
}
if(!empty($search)&&$search['resname'] != ""){
    
    $resName = htmlspecialchars($search['resname']);
    if($search['resname']){
        $quote = "SELECT * FROM `mainData` WHERE `res_name` = '$resName' ORDER BY start_date DESC";
        $speach = "Поиск выполнен по Наименованию ресурса";
    }
}


$puh = $db->query($quote);
$pluh = $puh->fetchall();

?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].SITE_ROOT.'/view/Header.php';?>

<?php require_once $_SERVER['DOCUMENT_ROOT']. SITE_ROOT.'/view/search_index.php';?>
    <div class="d-flex">
        <div class="margin">
            <form class="filterform" method="get" > 
                <p>Фамилия или Имя или Исполнитель</p>
                <input class="input input-block input-search search-in-page-input filterinput" type="text" name="search" placeholder="Фамилия,Имя или Исполнитель" maxlength="200"> 
                <button>Тык</button>
            </form>
        </div>
        <div class="margin">
            <form method="get">
                <p>Выбрать дату или диапозон дат</p>
                <input type="date" name="start_date">
                <input type="date" name="end_date">
                <button type="submit">Тык</button>
            </form>
        </div>
        <div class="margin">
            <form class="filterform" method="get" > 
                <p>Подразделение по ЗУП</p>
                <select name="group">
                    <option selected value=""></option>
                    <?php foreach ($podrazdeleniye as $podr):?>
                    <option value="<?php echo $podr['group_from_zup_name']?>"><?php echo $podr['group_from_zup_name']?></option>
                    <?php endforeach;?>                     
                </select>
                <button type="submit">Тык</button>          
                
            </form>
        </div>
        <div class="margin">
            <form class="filterform" method="get" > 
                <p>Наименование ресурса</p>
                <select name="resname">
                    <option selected value=""></option>
                    <?php foreach ($infoSystem as $podr):?>
                    <option value="<?php echo $podr['system_name']?>"><?php echo $podr['system_name']?></option>
                    <?php endforeach;?>                     
                </select>
                <button type="submit">Тык</button>          
                
            </form>
        </div>
    </div><br>
<div class="d-flex">
    <div>
        <a href="<?php echo SITE_ROOT . '/insert/';?>">
            <button class="form-button">Добавить запись</button>
        </a>
    </div>  <br>
    
    
</div>    <br>  
    
        <div>
            <h2><?php echo $speach;?></h2><br>
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
       <?php foreach ($pluh as $key):?>  
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


