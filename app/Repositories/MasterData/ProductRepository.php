<?php

namespace App\Repositories\MasterData;

use App\Models\MasterData\Product;
use App\Repositories\Contracts\MasterData\ProductInterface;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getAllPaginatedWithParams($params, $limit = 10)
    {
        $products = $this->model->query();
        if(isset($params->search) && !empty($params->search)) $products->where('name', 'like', '%' . $params->search . '%');
        $products = $products->with(['categories'])->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $products;
    }

    public function find($id)
    {
        return $this->model->with(['categories'])->find($id);
    }
}
