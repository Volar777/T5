cont
<?php

function cont($n1=200)
{
   // echo(__FUNCTION__),"<br>";
    global $sdel;
    $AA=[];
    for ($i=0;$i<$n1;$i++){
        $AA[]=["name" => "Kontakt $i",
            'linked_leads_id'=>$sdel[$i]
        ];
    }

    $contacts['request']['contacts']['add'] = $AA;

    $subdomain = 'new58d8caf8e3923'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/contacts/set';

    $out=initialization($link,$contacts,"POST","J");
    //  obrab_error($code);//обработка ошибок

    $Response = json_decode($out, true);
    $Response = $Response['response']['contacts']['add'];

    sleep(1);
    //   return $output;
}