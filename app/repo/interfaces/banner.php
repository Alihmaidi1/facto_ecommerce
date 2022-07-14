<?php

namespace App\repo\interfaces;


interface banner{



    public function paginate($number);

    public function find($id);
    public function store($request);
    public function update($request);
    public function delete($id);



}
