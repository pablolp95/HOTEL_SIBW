<?php
namespace App;

abstract class Model {
    protected static abstract function all();
    protected static abstract function find($id);
    protected static abstract function delete($id);
    protected static abstract function update();
    protected static abstract function save($model);

}