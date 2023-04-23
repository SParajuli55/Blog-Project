<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Repository\CategoryRepository;
use Modules\Blog\Repository\BlogRepository;

class CategoryController extends ApiBaseController
{

    private $categoryRepository;
    private $blogRepository;

public function __construct(CategoryRepository $categoryRepository, BlogRepository $blogRepository){
    $this->categoryRepository = $categoryRepository;
    $this->blogRepository = $blogRepository;
}

public function allCategories(Request $request)
{
    try {
        if($request->limit==null){

            $category = $this->categoryRepository->getallcategories();
        }
           else{
            $category = $this->categoryRepository-> getallcategorieswithpaginaton($request->limit);

           }

       $data=[
            "category" => $category,
       ];
       //return $data;
       return $this->successData('Category fetched successfully',$data,200);
    } catch (\Exception$e) {
        $exception = $e->getMessage();
        return $this->errorData("Unable to fetch category!",$exception,500);
    }
}
public function categoryDetail($id)
{
    try{
        $category=$this->categoryRepository->find($id);
        $data = [
            "category" => $category,
        ];
        return $this->successData('Category fetched Successfully', $data, 200);
    }
        catch(\Exception$e)
        {
            $exception = $e->getMessage();
            return $this->errorData("Unable to fetch category.", $exception, 500);
        }


}



}
