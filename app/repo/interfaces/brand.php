<?php

namespace App\repo\interfaces;


interface brand{

    public function paginate($number);
    public function getAllBrand();
    public function store($request);
    public function update($request);
    public function delete($id);

}
