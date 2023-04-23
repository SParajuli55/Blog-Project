<?php

namespace Modules\Blog\Http\Controllers;

use App\Repository\ImageRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Repository\BlogRepository;
use Modules\Category\Repository\CategoryRepository;

class BlogController extends Controller
{

    private $blogRepository;
    private $categoryRepository;
    private $imageRepository;

    public function __construct(BlogRepository $blogRepository, CategoryRepository $categoryRepository, ImageRepository $imageRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
        $this->imageRepository = $imageRepository;
    }

    public function show($id)
    {
        $blog =  $this->blogRepository->find($id);
        return view('blog::blogs.show-blogs', compact('blog'));
    }


    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('blog::blogs.create-blogs', compact('categories'));
    }


    public function store(Request $request)
    {
        // dd($request);

        try {
            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $this->imageRepository->saveImage($request, 'image', 'blogs')

            ];

             $this->blogRepository->create($data);


            return redirect()->route('blogs.view')->with('success', 'Added Successfully');
        } catch (\Exception $e) {

            return redirect()->route('blogs.view')->with('success', 'Unable to add');
        }
    }



    public function view(Request $request)
    {
        // dd($request);
        try{
        if (isset($request->search)) {
            $searches = $request->search;
            $blogs = $this->blogRepository->searchblogs($searches);
            return view('blog::blogs.view-blog', compact('blogs', 'searches'));
        } else {
            $blogs = $this->blogRepository->withcategory();
            return view('blog::blogs.view-blog', compact('blogs'));
        // dd($blogs);

        }
    }
        catch(\Exception $e){
            return $e->getMessage();

        }

    }



    public function edit($id)
    {
        $blog = $this->blogRepository->getcategories($id);
        $categories = $this->categoryRepository->all();
        return view('blog::blogs.edit-blogs', compact('blog', 'categories'));
    }



    public function update(Request $request, $id)
    {

        try {
            $blog = $this->blogRepository->find($id);
            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,

            ];


            if ($request->hasFile('image')) {
                if ($blog->image) {
                    $this->imageRepository->removeImage($blog, 'image', 'blogs');
                }
                $data['image'] = $this->imageRepository->saveImage($request, 'image', 'blogs');
            }
            $this->blogRepository->update($data, $request->id);

            return redirect()->route('blogs.view')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $blog = $this->blogRepository->find($id);
            $this->blogRepository->delete($blog->id);
            return redirect()->route('blogs.view')->with('success', "Deleted successfully.");
        } catch (\Exception $e) {
            return redirect()->route('blogs.view')->with('error', "Unable to delete.");
        }
    }
}
