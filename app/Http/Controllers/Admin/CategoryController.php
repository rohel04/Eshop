<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use PHPUnit\Framework\Constraint\FileExists;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            
        ]);

        $category=new Category();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }
        $category->name=$request->Input('name');
        $category->slug=$request->Input('slug');
        $category->description=$request->Input('description');
        $category->status=$request->Input('status')==TRUE ? '1':'0';
        $category->popular=$request->Input('popular')==TRUE? '1':'0';
        $category->meta_title=$request->Input('meta_title');
        $category->meta_keywords=$request->Input('meta_keywords');
        $category->meta_descrip=$request->Input('meta_description');
        $category->save();
        return redirect('/categories')->with('status',"Category added succesfully");
    }
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update($id,Request $request)
    {
        $category=Category::find($id);
        if($request->hasFile('image'))
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image=$filename;

        }
        $category->name=$request->Input('name');
        $category->slug=$request->Input('slug');
        $category->description=$request->Input('description');
        $category->status=$request->Input('status')==TRUE ? '1':'0';
        $category->popular=$request->Input('popular')==TRUE? '1':'0';
        $category->meta_title=$request->Input('meta_title');
        $category->meta_keywords=$request->Input('meta_keywords');
        $category->meta_descrip=$request->Input('meta_description');
        $category->update();

        return redirect('/categories')->with('status','Category Updated Successfully');

    }
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category->image)
        {
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $category->delete();
        }
        return redirect('categories')->with('status','Category Deleted Successfully');
    }
}
