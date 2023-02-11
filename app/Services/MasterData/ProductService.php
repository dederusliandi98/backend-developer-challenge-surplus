<?php

namespace App\Services\MasterData;

use App\Repositories\Contracts\MasterData\ProductInterface as ProductRepo;
use App\Services\Contracts\MasterData\ProductInterface;
use App\Models\MasterData\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use Auth;

class ProductService implements ProductInterface
{    
    protected $productRepo;

    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAllPaginatedWithParams($params, $limit = 10)
    {
       return $this->productRepo->getAllPaginatedWithParams($params, $limit);
    }

     /**
     * Find data by id
     *
     * @param $id
     * @param array $columns
     * 
     * @return mixed
     */
    public function find($id)
    {
        return $this->productRepo->find($id);
    }
    
    /**
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function create($request)
    {
        $permissions = DB::transaction(function () use ($request) {
            $input = $request->all();
            $productCreated = $this->productRepo->create($input);
            $this->productRepo->sync($productCreated->id, 'categories', $request->category_ids);
            return $productCreated;
        });

        return $permissions;
    }

     /**
     * @param $id
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
    */
    public function update($request, $id)
    {
        $permissions = DB::transaction(function () use ($request, $id) {
            $input = $request->except('_token','_method');
            $this->productRepo->sync($id, 'categories', $request->category_ids);
            return $this->productRepo->update($input, $id);
        });

        return $permissions;
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->productRepo->delete($id);
    }
}
