<?php

abstract class BaseModel
{
    abstract public function view($id);

    abstract public function list();

    abstract public function create();

    abstract public function update();

    abstract public function delete();
}