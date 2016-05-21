<?php


abstract class Controllers
{
    abstract protected function index();
    abstract protected function create();
    abstract protected function store($request);
    abstract protected function show();
    abstract protected function edit();
    abstract protected function update();
    abstract protected function delete();
    abstract protected function silentSave($model,$request);

}?>