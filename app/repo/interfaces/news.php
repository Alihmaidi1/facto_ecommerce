<?php

namespace App\repo\interfaces;

interface news{


    public function getAllnews();
    public function paginate($numbeer);
    public function store($request);
    public function find($id);
    public function update($request);
    public function delete($id);
}
