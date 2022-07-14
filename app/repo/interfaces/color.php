<?php

namespace App\repo\interfaces;


interface color{


    public function paginate($number);
    public function getAllcolor();
    public function store($request);
    public function update($request);

}
