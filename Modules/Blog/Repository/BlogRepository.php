<?php

namespace Modules\Blog\Repository;

use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Blog;

class BlogRepository extends BaseRepository{

    protected $model;
    public function __construct(Blog $model)
    {
      parent::__construct($model);

    }
    public function create(array $attributes)
    {

        try {

         $this->model->create($attributes);
            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(array $attributes,$id):Model
    {
        try {
            DB::beginTransaction();
            $data = $this->model->find($id);
            $return_data = $data->update($attributes);
            DB::commit();
            return $data;
        }
        catch (\Exception $e)
        {
            DB::rollback();
            echo $e->getMessage();
        }
    }


    public function withcategory()
    {
        // dd("hlo");
        return $this->model->with('categories')->orderBy('updated_at', 'desc')->paginate(15);
    //    dd( $Blogs);
    }

    public function withcategorypagination($val)
    {
        return $this->model->with('categories')->paginate($val);
    }

    public function getblog($id)
    {
        return $this->model->with('categories')->where('category_id', $id)->get();

    }
    public function getcategories($id)
    {
        return $this->model->with('categories')->where('id', $id)->first();
    }

    public function searchblogs($searches){
        return $this->model
        ->where('name', 'like', '%' . $searches . '%')
        ->orWhere('description', 'like', '%' . $searches . '%')
        ->paginate(15);

     }
}

