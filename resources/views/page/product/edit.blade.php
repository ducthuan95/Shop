@extends('layouts.master')

@section('content')

<label for=""> Tạo mới danh mục</label>
<div class="col-lg-4">
    <form action="{{ route('editProduct', $product->id) }}" method="post" enctype='multipart/form-data'>
    @csrf
        <div class="form-group">        
            <label for="">Tên sản phẩm <span class="require">*</span></label>
            <input type="text" name="product" value="{{ $product->name }}" class="form-control" placeholder="Tên sản phẩm">
            @if($errors->has('product'))
                <div class="error" style="color:red">{{ $errors->first('product') }}</div>
            @endif
        </div>
        <div class="form-group">        
            <label for="">Danh mục <span class="require">*</span></label>
            <select class="custom-select" name="category" id="">
            <option value="{{ $category[0]->id }}" selected>@if($category[0]->name) {{ $category[0]->name }} @else Choose... @endif</option> 
                @foreach($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            @if($errors->has('category'))
                <div class="error" style="color:red">{{ $errors->first('category') }}</div>
            @endif
        </div>
        <div class="form-group row">        
            <div class="col-lg-6">
                <label for="">Giá</label>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Giá">
            </div>
            <div class="col-lg-6">
                <label for="">Số lượng</label>
                <input type="text" name="amount" value="{{ $product->amount }}" class="form-control" placeholder="Số lượng">
            </div>
        </div>
        <div class="form-group ">   
            <label for="">Ảnh sản phẩm</label>
            <input type="file" name="image">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" value="{{ $product->status }}" class="form-check-input" name="active" id="" @if($product->status == 1) checked @endif>
            <label class="form-check-label" for="">Active</label>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <a class="btn btn-secondary" href="{{ route('listProduct') }}">Cancel</a>
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
    </form>
</div>

@endsection