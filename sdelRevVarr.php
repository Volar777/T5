sdelRevVarr
<?php

function sdelRevArr ($arr,$i,$id_fields){
  //  echo(__FUNCTION__),"<br>";
/*
    print_r("******************<br>");
    print_r($id_fields);
    print_r($i);
    print_r($arr);
*/
    $BB=[];
    $arrr=$arr[$i];
    foreach($arrr as $v) {
        $time1=time();
        $BB[]=[
                'id' => "$v",
                'name' => 'Keep Calm443',
                'last_modified' => "$time1",
                'custom_fields' => array(
                    array(
                        #Нестандартное дополнительное поле типа "мультисписок", которое мы создали
                        'id' => (int)$id_fields,
                        "values" => ["tho"]
                    )
                )
                ];
     }
    $leads['request']['leads']['update']=$BB;

    $subdomain='new58d8caf8e3923'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
    $out=initialization($link,$leads,"POST","J");
}