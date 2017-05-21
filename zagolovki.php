zagolovki
<?php
function zagolovki(){

    $subdomain='new58d8caf8e3923'; #Наш аккаунт - поддомен
    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/accounts/current';

    $out=initialization($link);//выполненеие запроса

    $Response=json_decode($out,true); //конвертация из json
    $Response=$Response['response'];// весь массив

    $name_leads=$Response['account']['custom_fields']['leads'];//имя сделки

    global $id_custom_fields;
    global $name_custom_fields;

    $id_custom_fields=[];
    $name_custom_fields=[];

    foreach($name_leads as $v){
                 $id_custom_fields[] = $v['id'];
            $name_custom_fields[] = $v['name'];

    }
}