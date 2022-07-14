<?php

namespace App\repo\interfaces;


interface copon{


    public function getAllCopon();
    public function store($request);

    public function find($id);
    public function paginate($number);

    public function update($request);
    public function delete($id);
}
