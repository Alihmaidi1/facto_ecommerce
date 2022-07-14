<?php

namespace App\repo\interfaces;


interface country{

    public function paginate($number);
    public function store($request);
    public function update($reuqest);
    public function delete($id);
    public function getallCountry();

}
