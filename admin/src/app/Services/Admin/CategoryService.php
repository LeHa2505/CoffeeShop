<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryList()
    {
        return $this->categoryRepository->getCategoryList();
    }
}
