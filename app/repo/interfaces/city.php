<?php

namespace App\repo\interfaces;

interface city{


    public function paginate($number);
    public function store($request);
    public function update($request);
    public function delete($id);
}
