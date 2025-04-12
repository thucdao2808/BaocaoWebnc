<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;




class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('project_1.admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project_1.admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        
        try {
            DB::transaction(function () use($request) {
            
                $dataBlog = [
                    'title' => $request->title,
                    'content' => $request->content,
                    'author' => $request->author
                ];
    
                if($request->file('image_path')) {
                    $dataBlog['image_path'] = Storage::disk('public')->put('blogs', $request->file('image_path'));
                }
    
                Blog::create($dataBlog);
            });
            return redirect()->route('blogs.create')->with('success', 'Thêm thành công');
            
        } catch (\Throwable $th) {
            return redirect()->route('blogs.create')->with('error', $th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
        return 1;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('project_1.admin.blogs.update', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {
            DB::transaction(function () use($request, $blog) {
                $blogupdate = [
                    'title'     => $request->title,
                    'content'   => $request->content,
                    'author'    => $request->author
                ];
                if($request->hasFile('image_path') && Storage::disk('public')->exists($blog->image_path)) {
                    Storage::disk('public')->delete($blog->image_path);
                }

                $blogupdate['image_path'] = Storage::disk('public')->put('blogs',$request->file('image_path'));
    
                $blog->update($blogupdate);
    
    
            });
            return redirect()->route('blogs.index')->with('success', 'Sửa thành công');

        } catch (\Throwable $th) {
            return redirect()->route('blogs.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $image = $blog->image_path;
            DB::transaction(function () use($blog) {
                $blog->delete();
    
            });
    
            if($image && Storage::disk('public')->exists($blog->image_path)) {
                Storage::disk('public')->delete($blog->image_path);
            }   
            return redirect()->route('blogs.index')->with('success', 'Xóa thành công');
    
        } catch (\Throwable $th) {
            return redirect()->route('blogs.index')->with('error', $th->getMessage());
        }


    }
}
