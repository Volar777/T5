index
<?php
require "lib.php";//Библиотека функций+
require "in.php";//Авторизация+
//require "cont.php";//создание сонтакта+
//require "sdel.php";//создание сделки+
//require "comp.php";//создание компании+
//require "Muliy.php";// Добавляет кастомное поле типа мультисписок
//require "Refresh500.php";//список сделок по $i*500 со смещением 500 (для sdelRevVarr.php)
//require "sdelRevVarr.php";//установка значения у мультисписок
require "zaprosId_4.php";//запрос ID
require "zagolovki.php";//заголовки мульти полей
require "linksList.php";//связи
//require "zaprosHeder.php";//запрос ID

ini_set('max_execution_time', 1500);//изменение времени работы php файла

echo Authorization();//Авторизация

zagolovki();

$str_custom_fields = implode(";", $name_custom_fields);// перевод масива в строку имен для помещения в заголовок

header('Access-Control-Allow-Origin: https://new58d8caf8e3923.amocrm.ru');

$convert=(array_keys($_POST));// ключей массива из ПОСТа
$text=$convert[0];// формирование строки
$mass= explode(",", $text); // перевод стороки в массив id выделеных сделок

//делается попытка создать его
$fp = fopen("f.csv", "w");
//$answer="$name;$time;$tTags;$cCustom_fields"."\r";
$heder="name;contact;company;last_modified;tags;".$str_custom_fields."\r";// заголовок файла!!!!!!!!!!!!!!!
// записываем в файл текст

fwrite($fp, ($heder));
foreach($mass as $v){
    $answer= zaprosId((int)$v); //запрос id
        fwrite($fp, ($answer));// запись в файл
}
fclose($fp);

/*
$count_cont=1000;//число записей
$n = floor($count_cont / 200);

for ($i = 0; $i < $n; $i++) {//колличество полных циклов по 200
    comp();//создание компаний
    sdel();//создание сделки
    cont();//создание контакта
}

$n1=$count_cont%200; // остаток от деления на 200
if($n1) {
    comp($n1);//создание компаний
    sdel($n1);//создание сделки
    cont($n1);//создание контакта
}

$id_fields=mull();// Добавляет кастомное поле типа мультисписок ($id_fields id добавленного поля)

$n2=ceil($count_cont/500);
$arr=[];
for($i=0;$i<$n2;$i++) {
    $arr[$i]=ref500($i);
    //$arr=array_merge($arr,ref500($i));
    }
//print_r($arr);

for($i=0;$i<$n2;$i++) {
    echo sdelRevArr($arr,$i,$id_fields);// обновление записи мульти Массива
}
*/
echo "Все сделано!!!";
