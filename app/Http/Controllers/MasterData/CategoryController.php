<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\MasterData\CategoryInterface as CategoryService;
use App\Http\Resources\MasterData\CategoryResource;
use App\Http\Requests\MasterData\CategoryRequest;

class CategoryController extends Controller
{
    use JsonResponse;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $categories = $this->categoryService->getAllPaginatedWithParams($request);
            return $this->sendResponse(CategoryResource::collection($categories), 'list of all categories');

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
    public function store(CategoryRequest $request)
    {
        try {
            #store
            $productCategory = $this->categoryService->create($request);
            return $this->sendResponse(new CategoryResource($productCategory), 'category created successfully');

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
            if(!$this->categoryService->find($id)) {
                return $this->sendError('category data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            return $this->sendResponse(new CategoryResource($this->categoryService->find($id)), 'category detail');

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
            if(!$this->categoryService->find($id)) {
                return $this->sendError('category data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }
            
            return $this->sendResponse(new CategoryResource($this->categoryService->find($id)), 'category detail edit');

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
    public function update(CategoryRequest $request, $id)
    {
        try {
            if(!$this->categoryService->find($id)) {
                return $this->sendError('category data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            #update
            $productCategory = $this->categoryService->update($request, $id);
            return $this->sendResponse(new CategoryResource($productCategory), 'category updated successfully');

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
            if(!$this->categoryService->find($id)) {
                return $this->sendError('category data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            #delete
            $this->categoryService->delete($id);
            return $this->sendResponse([], 'category deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
