@extends('layouts.master')

@section('content')

<label for=""> Tạo mới danh mục</label>
<div class="col-lg-4">
    <form action="{{ route('postEdit', $category->id) }}" method="post">
    @csrf
        <div class="form-group">        
            <label for="">Tên danh mục <span class="require">*</span></label>
            <input type="text" name="name" value="{{ $category->name}}" class="form-control" placeholder="Tên danh mục">
            @if($errors->has('name'))
                <div class="error" style="color:red">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group form-check">
            <input type="checkbox" value="1" class="form-check-input" name="active" id="" @if($category->status == 1) checked @endif>
            <label class="form-check-label" for="">Active</label>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <a class="btn btn-secondary" href="{{ route('listCategory') }}">Cancel</a>
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </div>
    </form>
</div>

@endsection