@extends('admin.layout.index')
@section('title')
    List Category
@endsection
@section('content')
<div class="card mb-4">
                            <div class="card-header bg-success" style="color:#fff;">
                                <i class="fas fa-table mr-1"></i>
                               DANH SÁCH DANH MỤC
                            </div>
                            <div class="card-body">
                                <div class="text-left mb-2">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddCategory">
                                    <i class="fas fa-cart-plus"></i> Thêm danh mục
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="text-align:center;font-size:8pt;">
                                                <th>ID danh mục</th>
                                                <th>Tên danh mục</th>
                                                <th>Id cửa hàng</th>
                                                <th>Ngày tạo</th>
                                                <th colspan="2">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0; @endphp
                                        @foreach($category as $ctg) 
                                            @php $stt++; @endphp
                                            <tr style="text-align:center;font-size:10pt;">
                                                <td>{{$ctg['categoryId']}}</td>
                                                <td>{{$ctg['categoryName']}}</td>
                                                <td>{{$ctg['retailerId']}}</td>
                                                <td>{{\Carbon\Carbon::parse($ctg['createdDate'])->format('d/m/Y H:i:s')}}</td>
                                                <td><a class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#EditCategory{{$stt}}"><i class="fas fa-pen-square"></i> Sửa</a></td>
                                                <td><a class="btn btn-success btn-sm" onclick="return Xoa()" href="{{url('/categories/delete/'.$ctg['categoryId'])}}"><i class="fas fa-trash-alt"></i> Xóa</a></td>
                                                @include('admin.category.modaledit')
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

@include('admin.category.modaladd')
@endsection