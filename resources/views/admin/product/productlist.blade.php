@extends('admin.layout.index')
@section('title')
    List Product
@endsection
@section('content')
<div class="card mb-4">
                            <div class="card-header bg-success" style="color:#FFF;">
                                <i class="fas fa-table mr-1"></i>
                               DANH SÁCH SẢN PHẨM
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="text-align:center;font-size:8pt;">
                                                <th>ID/Code sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Danh mục</th>
                                                <th>Giá bán chính thức</th>
                                                <th>Đơn vị tính</th>
                                                <th>Hình ảnh</th>
                                                <th>Thời gian tạo</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $pd) 
                                            <tr style="text-align:center;font-size:10pt;">
                                            <td>{{$pd['id']}} / {{$pd['code']}}</td>
                                            <td>{{$pd['name']}}</td>
                                            <td>{{$pd['categoryName']}}</td>
                                            <td>{{number_format($pd['basePrice'])}} VNĐ</td>
                                            <td>
                                            @if(empty($pd['unit']))
                                                    <span class="badge badge-danger">{{('NULL')}}</span>
                                                @else
                                                    {{$pd['unit']}}
                                            @endif
                                            </td>
                                            <td>
                                            @foreach($pd['images'] as $img)
                                                <img src="{{$img}}" style="width:50px;" alt="">
                                            @endforeach
                                            </td>
                                            <td>{{\Carbon\Carbon::parse($pd['createdDate'])->format('d/m/Y  H:i:s')}}</td>
                                            <td><a class="btn btn-success btn-sm" href="{{url('/product/details/'.$pd['id'])}}"><i class="fas fa-eye"></i> Chi tiết</a></td>
                                            </tr>
                                        @endforeach
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection