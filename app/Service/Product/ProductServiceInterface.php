<?php

namespace App\Service\Product;

interface ProductServiceInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param $request
     * @return mixed
     */
    public function store($request);

    /**
     * @param $id
     * @return mixed
     */
    public function show($id);

    /**
     * @param $request
     * @param $product
     * @return mixed
     */
    public function update($request, $product);

    /**
     * @param $product
     * @return mixed
     */
    public function destroy($product);

}
