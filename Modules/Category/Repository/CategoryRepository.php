<?php

namespace Modules\Category\Repository;

use App\Repository\BaseRepository;
use Modules\Category\Entities\Category;

class CategoryRepository extends BaseRepository{

    protected $model;
    public function __construct(Category $model)
    {
      parent::__construct($model);
    }

    public function create(array $attributes){
        try {

            $this->model->create($attributes);
            return true;
        } catch (\Exception $e) {
             dd($e->getMessage());
        }
    }

    public function update(array $attributes,$id){
        try {
            $data=$this->find($id);
           $data->update($attributes);
           return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function getallcategories()
    {
        return $this->model->orderBy('updated_at', 'desc')->paginate(15);
    }

    public function getallcategorieswithpaginaton($val)
    {
        return $this->model->orderBy('updated_at', 'desc')->paginate($val);
    }

    public function searchcategory($search)
    {
        return $this->model->where('name', 'like', '%' . $search . '%')->paginate(15);
    }
}
