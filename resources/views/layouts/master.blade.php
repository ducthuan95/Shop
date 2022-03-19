<!DOCTYPE html>
<html lang="en">

@include ('layouts.head')
<div class="container-fuild">
<div class="d-flex" style="background-color: black;">
    <a class="btn btn-secondary" href="{{ route('listCategory') }}">QUẢN LÝ DANH MỤC</a>
    <a class="btn btn-secondary" href="{{ route('listProduct') }}">QUẢN LÝ SẢN PHẨM</a>
</div>
            @if(Session::has('success'))
                    <div class="pull-right" style="margin-right: 280px; margin-top: 10px;" >
                        <div class="alert alert-block alert-success" style="width: 300px;height: 60px; position: absolute;z-index: 99">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <p> {{session('success')}} </p>
                        </div>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="pull-right" style="margin-right: 280px; margin-top: 10px;" >
                        <div class="alert alert-block alert-danger" style="width: 300px;height: 60px;position: absolute;z-index: 99">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <p> {{session('error')}} </p>
                        </div>
                    </div>
            @endif

    @yield('content')

</div>
@include ('layouts.footer')
</body>

</html> 