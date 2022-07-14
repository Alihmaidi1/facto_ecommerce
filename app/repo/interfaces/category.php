<?php


namespace App\repo\interfaces;

interface category{

    public function getOrderAll($type);
    public function getMaincategory();
    public function find($id);
    public function paginate($number);
    public function getAllCategory();
    public function store($request);
    public function delete($id);
    public function update($request);
    public function show_in_header();

}
