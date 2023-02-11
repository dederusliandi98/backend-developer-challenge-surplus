<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponse;
use App\Services\Contracts\MasterData\ProductInterface as ProductService;
use App\Http\Resources\MasterData\ProductResource;
use App\Http\Requests\MasterData\ProductRequest;

class ProductController extends Controller
{
    use JsonResponse;

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $products = $this->productService->getAllPaginatedWithParams($request);
            return $this->sendResponse(ProductResource::collection($products), 'list of all product products');

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
    public function store(ProductRequest $request)
    {
        try {
            #store
            $product = $this->productService->create($request);
            return $this->sendResponse(new ProductResource($product), 'product created successfully');

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
            if(!$this->productService->find($id)) {
                return $this->sendError('product data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            return $this->sendResponse(new ProductResource($this->productService->find($id)), 'product detail');

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
            if(!$this->productService->find($id)) {
                return $this->sendError('product data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }
            
            return $this->sendResponse(new ProductResource($this->productService->find($id)), 'product detail edit');

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
    public function update(ProductRequest $request, $id)
    {
        try {
            if(!$this->productService->find($id)) {
                return $this->sendError('product data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            #update
            $product = $this->productService->update($request, $id);
            return $this->sendResponse(new ProductResource($product), 'product updated successfully');

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
            if(!$this->productService->find($id)) {
                return $this->sendError('product data not found', 404, config('constants.STATUS.SUCCESS.FALSE'));
            }

            #delete
            $this->productService->delete($id);
            return $this->sendResponse([], 'product deleted successfully');

        } catch(\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
