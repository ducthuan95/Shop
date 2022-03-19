<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $getData['product'] = Product::select('*')->get();
        return view('page.product.index', $getData);
    }
    public function create()
    {
        $getData['categories'] = Category::select('name', 'id')->get();
        return view('page.product.create', $getData);
    }

    public function postCreate(ProductRequest $request)
    {
        if ($request->active != null) 
        {
            $checkbox = 1;
        } else {
            $checkbox = 0;
        }

        if(isset($request->image))
        {
            $imageName = $request->file('image')->getClientOriginalName().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else 
        {
            $imageName = 'NULL';
        }

        $arr = array(
            'name'=>$request->product,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'amount'=>$request->amount,
            'image'=>$imageName,
            'status'=>$checkbox
        );
        if(Product::create($arr)){
            return redirect()->back()->with('success','Thêm thành công');
        }else{
            return redirect()->back()->with('error','Thêm thất bại');
        }
    }

    public function edit($id) 
    {
        $data['product'] = Product::find($id);
        $category_id = $data['product']->category_id;
        $data['category'] = Category::where('id', $category_id)->get();

        $data['categories'] = Category::select('name', 'id')->get();
        return view ('page.product.edit', $data);
    }

    public function postEdit(ProductRequest $request, $id)
    {
        $imageName = Product::select('image')->where('id', $id)->get();
        if ($request->active != null) 
        {
            $checkbox = 1;
        } else {
            $checkbox = 0;
        }
        if(isset($request->image))
        {
            $imageName = $request->file('image')->getClientOriginalName().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        } else 
        {
            $imageName = $imageName[0]->image;
        }
        
        $arr = array(
            'name'=>$request->product,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'amount'=>$request->amount,
            'image'=>$imageName,
            'status'=>$checkbox
        );

        if(Product::where('id', $id)->update($arr)){
            return redirect()->back()->with('success','Cập nhập thành công');
        }else{
            return redirect()->back()->with('error','Cập nhập thất bại');
        }
    }

    public function destroy($id)
    {
        $check = Product::find($id);
        if ($check->status == 1){
            return redirect()->back()->with('error','Xoá thất bại');
        } else {
            $check->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}
