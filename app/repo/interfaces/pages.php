<?php

namespace App\repo\interfaces;

interface pages{



    public function store($request);
    public function paginate($number);
    public function update($request);
    public function delete($id);

}
