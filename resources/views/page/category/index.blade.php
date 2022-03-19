@extends('layouts.master')

@section('content')

<div class="container">
<div class="row">
    <div class="col-lg-6">
        <label for="" class="label-size"><strong>Danh sách danh mục</strong></label>
    </div>
    <div class="col-lg-6">
    <a class="btn btn-success" href="{{ route('addCategory') }}"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
    </div>
</div>
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Hoạt động</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $item)
    <tr>
        <th scope="row">{{ $item->id }}</th>
        <td>{{ $item->name }}</td>
        @if($item->status == 1)
            <td style="color: green">Active</td>
        @else
            <td>Inactive</td>
        @endif
        <td>
            <a style="color: blue" href="{{ route('editCategory', $item->id) }}"><u>Sửa</u></a>
            <a style="color: red" href="{{ route('deleteCategory', $item->id) }}"><u>Xóa</u></a>
        </td>
    </tr>
    @endforeach      
  </tbody>
</table>
</div>
</div>
@endsection