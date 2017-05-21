Muliy
<?php
//
function mull (){
  //  echo(__FUNCTION__),"<br>";
    $fields['request']['fields']['add']=array(
    array(
        'name'=>'Мульти-31-21',
        'type'=> 5,
        'disabled'=> 0,
        'element_type'=>'2',
         "origin"=> "528d0285c1f9180911159a9dc6f759b3_zendesk_widget",
        'enums'=>['one','tho','three',22,23,100]
         )
    );

    $subdomain='new58d8caf8e3923'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/fields/set';

    $out=initialization($link,$fields,"POST","J");

    $Response=json_decode($out,true);
    $Response=$Response['response']['fields']['add'];

    $output='';
    foreach($Response as $v)
        if(is_array($v)) {
            $output .= $v['id'];
        }
    return $output;
}