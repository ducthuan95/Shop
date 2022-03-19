<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryControler extends Controller
{
    public function index() 
    {
        $getData['categories'] = Category::select('*')->get();
        return view('page.category.index', $getData);
    }

    public function create() 
    {
        return view ('page.category.create');
    }

    public function postCreate(CategoryRequest $request)
    {
        if ($request->active != null) 
        {
            $checkbox = 1;
        } else {
            $checkbox = 0;
        }
        $arr = array(
            'name'=>$request->name,
            'status'=>$checkbox
        );
        if(Category::create($arr)){
            return redirect()->back()->with('success','Thêm thành công');
        }else{
            return redirect()->back()->with('error','Thêm thất bại');
        }

    }

    public function edit($id) 
    {
        $data['category'] = Category::find($id);
        return view ('page.category.edit', $data);
    }

    public function postEdit(CategoryRequest $request, $id)
    {
        if ($request->active != null) 
        {
            $checkbox = 1;
        } else {
            $checkbox = 0;
        }
        $arr = array(
            'name'=>$request->name,
            'status'=>$checkbox
        );
        if(Category::where('id', $id)->update($arr)){
            return redirect()->back()->with('success','Cập nhập thành công');
        }else{
            return redirect()->back()->with('error','Cập nhập thất bại');
        }
    }

    public function destroy($id)
    {
        $check = Category::find($id);
        $id = Product::select('id')->where('category_id', $id)->first();
        if ($check->status == 1 || $id != null){
            return redirect()->back()->with('error','Xoá thất bại');
        } else {
            $check->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}
