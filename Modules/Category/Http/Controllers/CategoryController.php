<?php

namespace Modules\Category\Http\Controllers;

// use App\Mail\BlogMail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Category\Repository\CategoryRepository;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Repository\BlogRepository;

class CategoryController extends Controller
{
    private $categoryRepository;
    private $blogRepository;

public function __construct(CategoryRepository $categoryRepository, BlogRepository $blogRepository){
    $this->categoryRepository = $categoryRepository;
    $this->blogRepository = $blogRepository;
}

    public function index(Request $request)
    {
        try{
        if(isset($request->search)){
            $search = $request->search;
            $categories = $this->categoryRepository->searchcategory($search);
            return view('category::categories.index-category', compact('categories', 'search'));
            }

        else{
        $categories= $this->categoryRepository->getallcategories();
        return view('category::categories.index-category', compact('categories'));
        }
    }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }


    public function create()
    {

        return view('category::categories.create-category');
    }


    public function store(Request $request)
    {
        try{
            $data=[
                'name'=>$request->name,


            ];
            $this->categoryRepository->create($data);
            // $email = "sanchiparajuli55@gmail.com";
            // Mail::to($email)->send(new BlogtMail());

            // Mail::to('sanchiparajuli55@gmail.com')->send(new BlogMail());



            return redirect()->route('category.index')->with('Success', 'Category is created.');
            }

        catch(\Exception $e)
        {

        return redirect()->route('category.index')->with('error', 'Category is Not Created. Please check the error.');

        }

    }


    public function show($id)
    {
        $blogs= $this->blogRepository->getblog($id);
        return view('category::categories.show-category', compact('blogs'));
    }


    public function edit($id)
    {
        $category= $this->categoryRepository->find($id);
        return view('category::categories.edit-category', compact('category'));
    }


    public function update(Request $request, $id)
    {
        try{
            $category = $this->categoryRepository->find($id);

            $data=[
                'name'=>$request->name

            ];
            $this->categoryRepository->update($data, $category->id);

           return redirect()->route('category.index')->withwith('Success', 'Successfully Updated');
        }
        catch(\Exception $e)
        {

        return redirect()->route('category.index')->with('error', 'Can not update');
        }
    }


    public function destroy($id)
    {

        try{
        $category= $this->categoryRepository->find($id);
        $this->categoryRepository->delete($category->id);
        return redirect()->route('category.index')->with('success','Deleted the categrory.');
        }
        catch(\Exception $e)
        {
            return redirect()->route('category.index')->with('error', 'Cannot delete category.');
        }


    }
}
