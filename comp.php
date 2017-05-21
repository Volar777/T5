comp
<?php

function comp($n1=200){
    //  echo(__FUNCTION__),"<br>";
    $AA=[];
    for ($i=0;$i<$n1;$i++) {
        $AA[]=["name" => "Компания $i"];
    }

    $contacts['request']['contacts']['add'] = $AA;
    $subdomain='new58d8caf8e3923'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/company/set';

    $out=initialization($link,$contacts,"POST","J");

    $Response=json_decode($out,true);
    $Response=$Response['response']['contacts']['add'];

    global $comp;
    $comp=[];
    foreach($Response as $v) {
        if (is_array($v))
            $comp[] = $v['id'];
    }
    sleep(1);
    // return $output;
}