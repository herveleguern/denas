<?php
$mdpU = "123456";
//fonction crypt
for ($i = 0; $i < 5; $i++) {
    $mdpCrypt = crypt($mdpU, "sel");
    echo $mdpCrypt, "\n";
    $pwdForm = '123456';
    if (password_verify($pwdForm, $mdpCrypt)) {
        echo 'Password is valid!', "\n";
    } else {
        echo 'Invalid password.', "\n";
    }
}
//fonction password_hash
for ($i = 0; $i < 5; $i++) {
    $mdpCrypt = password_hash($mdpU, PASSWORD_DEFAULT);
    echo $mdpCrypt, "\n";
    $pwdForm = '123456';
    if (password_verify($pwdForm, $mdpCrypt)) {
        echo 'Password is valid!', "\n";
    } else {
        echo 'Invalid password.', "\n";
    }
}
