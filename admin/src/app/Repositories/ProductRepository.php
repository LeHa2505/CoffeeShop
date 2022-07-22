<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{

    public function model()
    {
        return Product::class;
    }

    public function getProductList()
    {
        return $this->model->with('category');
    }

    public function getProductListOrderByCategory()
    {
        return $this->model->orderBy('id', 'ASC')->with('category')->get();
    }

    public function getProductByCategory($category_id)
    {
        return $this->model->whereCategoryId($category_id)->get();
    }

    public function getFavoriteProduct()
    {
        return $this->model->orderBy('id', 'ASC')->whereFavorite(Product::FAVORITE)->get();
    }

    public function getProduct()
    {
        return $this->model->whereStatus(Product::STATUS_ACTIVE)->select([
            'id',
            'product_code',
            'title',
            'link_image',
            'price',
            'reduced_price'
        ])->get();
    }
}
