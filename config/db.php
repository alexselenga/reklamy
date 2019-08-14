<?php

/**
 * Текущее подключение - sqlite.
 * Автоинкремент (+10) для MySQL:
 * поменять dsn (см. ниже), применить rekl.sql (в корне проекта), раскомментировать 'on afterOpen'.
 *
 * Вариант 1 (как здесь):
 * SET @@auto_increment_increment=10;
 *
 * Вариант 2:
 * my.ini / my.cnf
 * auto_increment_increment=10;
 */
return [
    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=localhost;dbname=rekl',
    'dsn' => 'sqlite:@app/data/sqlite.db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
//    'on afterOpen' => function($event) {
//        $event->sender->createCommand("SET @@auto_increment_increment=10;")->execute();
//    },

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
