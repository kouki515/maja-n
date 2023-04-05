<?php

namespace Constant;

class DbConst
{
    const DSN = 'mysql:host=db;dbname=
mahjong;charset=utf8mb4';
    const USERNAME = Env::dbPassword['db_username'];
    const PASSWORD = Env::dbPassword['db_password'];
}
