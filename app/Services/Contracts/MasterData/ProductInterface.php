<?php

namespace App\Services\Contracts\MasterData;

interface ProductInterface
{
    public function find($id);
    
    public function create($request);

    public function update($request, $id);

    public function delete($id);
}
