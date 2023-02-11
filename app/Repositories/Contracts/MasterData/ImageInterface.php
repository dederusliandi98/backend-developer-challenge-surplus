<?php

namespace App\Repositories\Contracts\MasterData;

interface ImageInterface
{
    public function all();
    
    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);
    
    public function delete($id);
}
