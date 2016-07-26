<?php

namespace Grace\Pdo;

interface PdoInterface
{
    public function query();
    public function getAll();
    public function getRow();
    public function getMap();
    public function getCol();
    public function getOne();
    public function close();
    public function autoExecute();
}
