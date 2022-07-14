<?php


namespace App\repo\interfaces;


interface currency{


    public function paginate($number);
    public function getAllCurrency();
    public function getactivecurrency();
    public function store($request);
    public function change_default($request);
    public function update($request);
    public function delete($id);
}
