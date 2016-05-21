<?php


abstract class model
{
    protected static abstract function all();
    protected static abstract function find($id);
    protected static abstract function delete($id);
    protected static abstract function update($request);
    protected static abstract function save($model);
}?>