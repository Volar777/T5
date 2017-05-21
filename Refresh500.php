Refresh500
<?php
function ref500($i){// вывод списока id
    //  echo(__FUNCTION__),"<br>";
  //  print_r($i);
    $subdomain='new58d8caf8e3923'; #Наш аккаунт - поддомен

    $limit_rows1=$i*500;
  $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/list?limit_rows='.$limit_rows1.'&limit_offset=500';
  //  $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/list?limit_rows=0&limit_offset=500';

        $out=initialization($link);

    $Response=json_decode($out,true);
    $Response=$Response['response']['leads'];
    //print_r($Response);
   // echo "<br>";
    $varId=[];
           foreach($Response as $v) {
               if (is_array($v))
                   $varId[] = $v['id'];
           }
          // print_r($varId);
    return $varId;
}