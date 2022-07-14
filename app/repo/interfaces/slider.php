<?php

namespace App\repo\interfaces;


interface slider{

    public function paginte($number);
    public function store($request);
    public function update($request);
    public function delete($id);
    public function getAllSliders();
    public function getAllOrder($type);

}
