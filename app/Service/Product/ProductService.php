<?php

namespace App\Service\Product;

use App\Helper\ResponseWords;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService extends BaseController implements ProductServiceInterface
{

    /**
     * @return BaseController
     */
    public function index()
    {
        return $this->sendResponse(ProductResource::collection(Product::all()), ResponseWords::PRODUCT_OK);
    }

    /**
     * @param $request
     * @return BaseController
     */
    public function store($request)
    {
        return $this->sendResponse(
            new ProductResource(Product::create($request->all())),
            ResponseWords::PRODUCT_CREATE);
    }

    /**
     * @param $id
     * @return BaseController|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->sendError(ResponseWords::PRODUCT_NOT_FOUND);
        }

        return $this->sendResponse(new ProductResource($product), ResponseWords::PRODUCT_OK);
    }

    /**
     * @param $request
     * @param $product
     * @return BaseController
     */
    public function update($request, $product)
    {
        $product->name = $request['name'];
        $product->detail = $request['detail'];
        $product->save();

        return $this->sendResponse(new ProductResource($product), ResponseWords::PRODUCT_UPDATE);
    }

    /**
     * @param $product
     * @return BaseController
     */
    public function destroy($product)
    {
        $product->delete();

        return $this->sendResponse([], ResponseWords::PRODUCT_DELETE);
    }
}
