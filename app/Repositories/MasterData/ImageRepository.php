<?php

namespace App\Repositories\MasterData;

use App\Models\MasterData\Image;
use App\Repositories\Contracts\MasterData\ImageInterface;
use App\Repositories\BaseRepository;

class ImageRepository extends BaseRepository implements ImageInterface
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Image $image)
    {
        $this->model = $image;
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
