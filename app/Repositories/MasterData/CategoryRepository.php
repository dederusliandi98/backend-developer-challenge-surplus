<?php

namespace App\Repositories\MasterData;

use App\Models\MasterData\Category;
use App\Repositories\Contracts\MasterData\CategoryInterface;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getAllPaginatedWithParams($params, $limit = 10)
    {
        $categories = $this->model->query();
        if(isset($params->search) && !empty($params->search)) $categories->where('name', 'like', '%' . $params->search . '%');
        $categories = $categories->orderBy('created_at', 'DESC')->simplePaginate($limit);
        return $categories;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}
