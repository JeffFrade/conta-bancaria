<?php

    require __DIR__ . '/src/Services/AccountService.php';

    $account1 = new AccountService();
    $account2 = new AccountService();

    echo $account1->openAccount('Fulano', 123, 'cc', 150);
    echo '<br/>';
    echo $account2->openAccount('Ciclano', 321, 'cp', 100);

    echo '<br/><hr/>';

    echo $account1->deposit(50);
    echo '<br/>';
    echo $account2->deposit(100);

    echo '<br/><hr/>';

    echo $account1->balance();
    echo '<br/>';
    echo $account2->balance();

    echo '<br/><hr/>';

    echo $account1->draft(200);
    echo '<br/>';
    echo $account2->draft(200);

    echo '<br/><hr/>';

    echo $account1->closeAccount();
    echo '<br/>';
    echo $account2->closeAccount();

