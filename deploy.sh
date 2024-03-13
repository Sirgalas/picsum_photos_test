#!/bin/sh

cd $(dirname $0)

cp ./.env.example .env


cp ./config/db.example.php  ./config/db.php
cp ./config/params.example.php  ./config/params.php

chmod 777 .env
chmod 777 ./config/db.php
chmod 777 ./config/params.php

make install

mkdir ./web/assets