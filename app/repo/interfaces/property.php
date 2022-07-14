<?php

namespace App\repo\interfaces;


interface property{


    public function paginate($number);
    public function getAllproperty();
    public function store($request);
    public function update($request);
    public function delete($id);
    public function value_store($request);
    public function update_value($request);
    public function delete_value($id);


}
