<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\MasterData\ImageInterface as ImageService;
use App\Http\Resources\MasterData\ImageResource;
use App\Http\Requests\MasterData\ImageRequest;

class ImageController extends Controller
{
    use JsonResponse;

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $images = $this->imageService->getAllPaginatedWithParams($request);
            return $this->sendResponse(ImageResource::collection($images), 'list of all images');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        try {
            #store
            $image = $this->imageService->create($request);
            return $this->sendResponse(new ImageResource($image), 'image created successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if(!$this->imageService->find($id)) {
                return $this->sendError('image data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            return $this->sendResponse(new ImageResource($this->imageService->find($id)), 'image detail');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
       try {
            if(!$this->imageService->find($id)) {
                return $this->sendError('image data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }
            
            return $this->sendResponse(new ImageResource($this->imageService->find($id)), 'image detail edit');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, $id)
    {
        try {
            if(!$this->imageService->find($id)) {
                return $this->sendError('image data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            #update
            $image = $this->imageService->update($request, $id);
            return $this->sendResponse(new ImageResource($image), 'image updated successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if(!$this->imageService->find($id)) {
                return $this->sendError('image data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            #delete
            $this->imageService->delete($id);
            return $this->sendResponse([], 'image deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
