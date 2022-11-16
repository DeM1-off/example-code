<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Service\Product\ProductServiceInterface;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{


    /**
     * @var ProductServiceInterface
     */
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return BaseController
     */
    public function index()
    {
        return $this->productService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductResource $request
     * @return BaseController
     */
    public function store(ProductResource $request)
    {
        return $this->productService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BaseController
     */
    public function show($id)
    {
        return $this->productService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return BaseController
     */
    public function update(ProductRequest $request, Product $product)
    {
        return $this->productService->update($request->all(), $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return BaseController
     */
    public function destroy(Product $product)
    {
        return $this->destroy($product);
    }
}
