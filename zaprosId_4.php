zaprosId_4
<?php

function zaprosId($id){// вывод списока id

    $subdomain='new58d8caf8e3923'; #Наш аккаунт - поддомен

    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/list?id='.$id;// =id запрос id
    //$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/list?id=3420041';// =id запрос id

    $out=initialization($link);//выполненеие запроса

    $Response=json_decode($out,true); //конвертация из json
    $Response=$Response['response'];// весь массив

    $name_leads=$Response['leads'][0]['name'];//имя сделки

    $name_contakt=linksList_contacts($id);// вывод контактов лоя сделки

    $time=$Response['leads'][0]['last_modified'];   //время последней правки
    $time= DATE("d-m-Y H:i:s",$time);//дата последней записи

    $tags=$Response['leads'][0]['tags'];//теги

    $tTags="";// строка тегов
    foreach($tags as $v){//перебор массива тегов
        $tTags.= $v['name'].",";//запихиваем в массив тегов теги
    }

    $leads_arr=$custom_fields=$Response['leads'];//весь массив custom_fields

    $cCustom_fields="";// инициализация переменной - строка всех полей
    // перебор id
    global $id_custom_fields;
    foreach( $id_custom_fields as $vid) {

        //перебор всех мульти полей
        foreach( $leads_arr as $v) {//перебор всех сделок

            foreach ($v['custom_fields'] as $v1) {// перебор содержимое                //   echo('<br>$varr1--');print_r($varr1);

                if ($vid == $v1['id']) {
                    foreach ($v1['values'] as $v) {//перебор всех мульти значений
                        $cCustom_fields .= $v['value'] . ",";//запихиваем в строку значения
                    }
                }
            }
        }
        $cCustom_fields .= ';';
    }

    $id_name_contakt=$Response['leads'][0]['main_contact_id'];//id  контакта
    $Id_name_company=$Response['leads'][0]['linked_company_id'];//id компании

    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/company/list?id='.$Id_name_company;
    //запрос
    $out=initialization($link);//выполненеие запроса
    //дешифровка
    $Response=json_decode($out,true); //конвертация из json
    $Response=$Response['response'];// весь массив

    $name_company='';
    $col_name_company=count($Response['contacts']);

    if($col_name_company!=1 ){
        $name_company="NO";
    }else{
        for($i=0;$i<$col_name_company;$i++){
            $name_company.=$Response['contacts'][$i]['name'];
        }
    }

    $answer="$name_leads;$name_contakt;$name_company;$time;$tTags;$cCustom_fields;"."\r";

    return $answer;
}