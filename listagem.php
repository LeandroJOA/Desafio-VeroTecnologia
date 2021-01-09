<?php
    // Captura dos dados de usuario
    $usersNamesRAW = file_get_contents('http://191.252.93.122/users.php');
    $usersNamesRAW  = json_decode($usersNamesRAW , true);

    // Separação dos numeros de ramal dos usuarios
    $cont = 0;
    foreach ($usersNamesRAW  as $userNameRaw) {
        $usersNames[$cont] = strtok($userNameRaw['name'], '@');
        $cont++;
    }

    // Ordenação de forma crescente
    sort($usersNames);

    // Captura dos dados de usuarios online
    $usersOnlineRAW = file_get_contents('http://191.252.93.122/usersonline.php');
    $usersOnlineRAW =  json_decode($usersOnlineRAW, true);

    // Separação do numero de ramal
    $cont = 0;
    foreach ($usersOnlineRAW  as $userOnlineRAW) {
        $usersOnline[$cont] = $userOnlineRAW['reg_user'];
        $cont++;
    }

    // Captura das agendas dos usurarios
    $usersAgenda = file_get_contents('http://191.252.93.122/addressbook.php');
    $usersAgenda = json_decode($usersAgenda, true);

    // Percorrendo os usuarios encontrados
    foreach ($usersNames as $userName) {
        foreach ($usersOnline as $userOnline) {
            // Verificando se o usuario está online ou offline
            if ($userOnline == $userName) {
                $class = "userOnline";
                break;
            } else {
                $class = "userOffline";
            }
        }
        //Verificando se o usuario possui agenda
        $userHasAgenda = false;
        foreach ($usersAgenda as $userAgenda) {
            if (array_key_exists($userName, $usersAgenda)) {
                $userHasAgenda = true;
                echo "<div class='col-md-1'><div class='user $class'>" . $usersAgenda[$userName] . " (" . $userName . ")</div></div>";
                break;
            }
        }
        if (!$userHasAgenda)
            echo "<div class='col-md-1'><div class='user $class'>" . $userName. "</div></div>";

    }
?>