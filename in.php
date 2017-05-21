in
<?php
function Authorization (){
    #Массив с параметрами, которые нужно передать методом POST к API системы
    $user = array(
        'USER_LOGIN' => '****@team.amocrm.com', #Ваш логин (электронная почта)
        'USER_HASH' => '****b3' #Хэш для доступа к API (смотрите в профиле пользователя)
    );

    $subdomain = '************23'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/auth.php?type=json';

    $out=initialization($link,$user,"POST","J");

    $Response = json_decode($out, true);
    $Response = $Response['response'];
    if (isset($Response['auth'])) {#Флаг авторизации доступен в свойстве "auth"
        return 'Авторизация прошла успешно';
        return 'Авторизация не удалась';
    }
}