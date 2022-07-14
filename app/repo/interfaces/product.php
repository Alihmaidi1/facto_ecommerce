<?php

namespace App\repo\interfaces;

interface product{


    public function store($request);

    public function find($id);
    public function getAllProduct();
    public function paginate($number);
    public function update($request);
    public function delete($id);



}
