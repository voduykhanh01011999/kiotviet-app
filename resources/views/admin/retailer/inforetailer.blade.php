@extends('admin.layout.index')
@section('title')
    List Product
@endsection
@section('content')
<div class="card mb-4">
                            <div class="card-header bg-success" style="color:#fff">
                                <i class="fas fa-table mr-1"></i>
                               THÔNG TIN CỬA HÀNG
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="text-align:center;font-size:8pt;">
                                                <th>Id cửa hàng</th>
                                                <th>Tên cửa hàng</th>
                                                <th>Ngày tạo cửa hàng</th>
                                                <th>Thời hạn sử dụng</th>
                                                <th>Địa chỉ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($info as $if) 
                                            <tr style="text-align:center;font-size:10pt;">
                                            <td>{{$if['retailerId']}}</td>
                                            <td>{{$retailer}}</td>
                                            <td>{{\Carbon\Carbon::parse($if['createdDate'])->format('d/m/Y H:i:s')}}</td>
                                            <td>{{('15 ngày')}}</td>
                                            <td>{{$if['address']}}</td>
                                            </tr>
                                        @endforeach
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection