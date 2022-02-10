<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$config = [
    // ip адрес сервера, с которого будем копировать базу
    'ip'              => 'localhost',
    // Путь до папки в которой будут лежать дампы баз
    'path'            => '/var/www/html/skud.asu/backup_bd',
    // Шаблон имени файла дампа базы. Вместо <date> подставится дата в формате 2015-04-19
    'filenamePattern' => 'dump_<date>.sql',
    // Максимальное количество дампов, хранящихся на сервере
    'maxFilesCount'   => 5,
    // Настройка подключения к БД
    'db' => [
        'name'     => 'SKUD',
        'user'     => 'phpmyadmin',
        'password' => 'Cuz%^msch87',
    ],
];
 
$ip = !empty($config['ip']) ? "-h $config[ip]" : '';
$filename = str_replace('<date>', '$(date +%Y-%m-%d)', $config['filenamePattern']);
$command = "mysqldump $ip -u {$config['db']['user']} -p{$config['db']['password']} --extended-insert=false {$config['db']['name']} > {$config['path']}/$filename";
 
exec($command);
 
if (!empty($config['maxFilesCount'])) {
    cleanDirectory($config['path'], $config['maxFilesCount']);
}
 
/**
 * Clears the directory of the files, leaving no more than $maxFilesCount number of files
 *
 * @param string $dir
 * @param string $maxFilesCount
 */
function cleanDirectory($dir, $maxFilesCount)
{
    $filenames = [];
 
    foreach(scandir($dir) as $file) {
        $filename = "$dir/$file";
        if (is_file($filename)) {
            $filenames[] = $filename;
        }
    }
 
    if (count($filenames) <= $maxFilesCount) {
        return;
    }
 
    $freshFilenames = array_reverse($filenames);
    array_splice($freshFilenames, $maxFilesCount);
    $oldFilenames = array_diff($filenames, $freshFilenames);
 
    foreach ($oldFilenames as $filename) {
        unlink($filename);
    }
}
