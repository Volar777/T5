linksList
<?php
function linksList_contacts($id)
{
    $subdomain = 'new58d8caf8e3923'; #Наш аккаунт - поддомен
    $link = 'https://new58d8caf8e3923.amocrm.ru/private/api/v2/json/contacts/links?deals_link=' . $id; //контакты для сделки

    $out = initialization($link);//выполненеие запроса

    $Response = json_decode($out, true);
    $Response = $Response['response']['links'];

    $name_contakt = '';
    if (isset($Response)) {

        foreach ($Response as $v) {
            $link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/contacts/list?id=' . $v['contact_id']; //
            //запрос
            $out = initialization($link);//выполненеие запроса
            //дешифровка
            $Response = json_decode($out, true); //конвертация из json
            $Response = $Response['response'];// весь массив

            $col_contacts = count($Response['contacts']);
            $name_contakt .= $Response['contacts'][0]['name'] . ", ";

        }
    }else { $name_contakt = "NO";}

return $name_contakt;
}
