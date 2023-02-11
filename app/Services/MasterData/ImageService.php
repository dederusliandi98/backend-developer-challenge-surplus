<?php

namespace App\Services\MasterData;

use App\Repositories\Contracts\MasterData\ImageInterface as ImageRepo;
use App\Services\Contracts\MasterData\ImageInterface;
use App\Models\MasterData\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DataTables;
use App\Traits\Uploadable;

class ImageService implements ImageInterface
{    
    use Uploadable;

    protected $imageRepo;

    protected $image_path = 'upload_files/images';

    public function __construct(ImageRepo $imageRepo)
    {
        $this->imageRepo = $imageRepo;
    }

    public function getAllPaginatedWithParams($params, $limit = 10)
    {
       return $this->imageRepo->getAllPaginatedWithParams($params, $limit);
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
        return $this->imageRepo->find($id);
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
            if($request->hasFile('file')){
                $file = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);

                $filename = $this->uploadFile($request->file('file'), $filename, $this->image_path);
                $input['file'] = $filename;
            }
            return $this->imageRepo->create($input);
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
            $image = $this->find($id);
            if($request->hasFile('file')){
                $this->deleteFile($image->file, $this->image_path);
                $file = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $filename = $this->uploadFile($request->file('file'), $filename, $this->image_path);
                $input['file'] = $filename;
            } else {
                $input['file'] = $image->file;
            }
            return $this->imageRepo->update($input, $id);
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
        $image = $this->find($id);
        $this->deleteFile($image->file, $this->image_path);
        return $this->imageRepo->delete($id);
    }
}
