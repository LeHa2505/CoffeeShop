<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\BaseService;
use App\Services\FileService;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    protected $productRepository;
    protected $fileService;

    const PATH_PHOTO_PRODUCTS = '/public/image/products';

    public function __construct(
        ProductRepository $productRepository,
        FileService $fileService
    )
    {
        $this->productRepository = $productRepository;
        $this->fileService = $fileService;
    }

    public function getProductList()
    {
        return $this->productRepository->getProductList();
    }

    public function create($data)
    {
        $pathProfileImage = $this->fileService->updateFile($data->file('image'), self::PATH_PHOTO_PRODUCTS);
        $product = $this->productRepository->create([
            'title' => $data->title,
            'link_image' => str_replace('public', '', $pathProfileImage),
            'description' => $data->description,
            'price' => preg_replace('/\D/', '', $data->price),
            'reduced_price' => preg_replace('/\D/', '', $data->reduced_price),
            'category_id' => $data->category
        ]);

        $product = $this->productRepository->update([
            'product_code' => str_pad($product->id,8,"0", STR_PAD_LEFT)
        ], $product->id);

        return $product;
    }

    public function delete($data)
    {
        $product = $this->productRepository->find($data->id);
        $url = $this->fileService->delete(str_replace("/image","image", $product->link_image));
        $this->productRepository->delete($data->id);
        return $url;
    }

    public function updateStatus($data)
    {
        $status = $data['status'] ? Product::STATUS_BLOCKED : Product::STATUS_ACTIVE;
        return $this->productRepository->update(['status' => $status], $data->id);
    }

    public function edit($data)
    {
        $product = $this->productRepository->update([
            'title' => $data->title,
            'description' => $data->description,
            'price' => preg_replace('/\D/', '', $data->price),
            'reduced_price' => preg_replace('/\D/', '', $data->reduced_price),
        ], $data->id);

        if($data->file('image')) {
            $pathImage = $this->fileService->updateFile($data->file('image'), self::PATH_PHOTO_PRODUCTS);
            $this->fileService->delete(str_replace("/image","image", $product->link_image));

            $this->productRepository->update([
                "link_image" => $pathImage
            ], $product->id);

            $product['link_image'] = $pathImage;
        }

        return $product;
    }
}
