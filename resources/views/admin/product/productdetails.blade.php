@extends('admin.layout.index')
@section('title')
    Product Details
@endsection
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" id="alert">
            @foreach($errors->All() as $err)
                {{$err}} <br>
            @endforeach
        </div>
    @endif
<div class="card mb-4">
                            <div class="card-header bg-success" style="color:#fff;">
                                <i class="fas fa-table mr-1"></i>
                               DANH SÁCH CHI TIẾT
                            </div>
                            <div class="card-body">
                                <div class="card" style="width: 65rem;">
                                    <div class="card-header bg-success" style="color:#fff;">
                                        CHI TIẾT SẢN PHẨM : <span class="badge badge-success">{{$details['name']}}</span>
                                    </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Id / Code sản phẩm: <span class="badge badge-success">{{$details['id']}}</span> </li>
                                            <li class="list-group-item">Tên: <span class="badge badge-success">{{$details['name']}}</span></li>
                                            <li class="list-group-item">Tên đầy đủ: <span class="badge badge-success">{{$details['fullName']}}</span></li>
                                            <li class="list-group-item">Id danh mục: <span class="badge badge-success">{{$details['categoryId']}}</span></li>
                                            <li class="list-group-item">Tên danh mục: <span class="badge badge-success">{{$details['categoryName']}}</span></li>
                                            <li class="list-group-item">Trạng thái bán: 
                                                @if($details['allowsSale']==true)
                                                        <span class="badge badge-success">{{('Cho phép bán')}}</span>
                                                    @else
                                                        <span class="badge badge-success">{{('Không cho phép')}}</span>
                                                @endif   
                                            </li>
                                            <li class="list-group-item">Mô tả:
                                            @if(empty($details['description']))
                                                    <span class="badge badge-success">{{('NULL')}}</span>
                                                @else
                                                    <span class="badge badge-success">{{$details['description']}}</span>
                                            @endif
                                            
                                            </li>
                                            <li class="list-group-item">Ghi chú:
                                            @if(empty($details['orderTemplate']))
                                                    <span class="badge badge-success">{{('NULL')}}</span>
                                                @else
                                                    <span class="badge badge-success">{{$details['orderTemplate']}}</span>
                                            @endif          
                                            </li>
                                            <li class="list-group-item">Đơn vị qui đổi:
                                                @if(empty($details['conversionValue']))
                                                        <span class="badge badge-success">{{('NULL')}}</span>
                                                    @else
                                                        <span class="badge badge-success">{{$details['conversionValue']}}</span>
                                                @endif
                                              </li>
                                            <li class="list-group-item">Ngày khởi tạo: <span class="badge badge-success">{{$details['createdDate']}}</span></li>
                                            @if(empty($details['inventories']))
                                                <span class="badge badge-success">{{('NULL')}}</span>
                                             @else
                                                @foreach($details['inventories'] as $ivt)
                                                    <li class="list-group-item">Tên chi nhánh: <span class="badge badge-success">{{$ivt['branchName']}}</span></li>
                                                    <li class="list-group-item">Code: <span class="badge badge-success">{{number_format($ivt['cost'])}}</span></li>
                                                    <li class="list-group-item">On hand:  <span class="badge badge-success">{{$ivt['onHand']}}</span></li>
                                                @endforeach
                                             @endif
                                             @php $stt=0; @endphp
                                             @foreach($details['images'] as $img)
                                             @php $stt++; @endphp
                                                <li class="list-group-item">Hình ảnh {{$stt}}: <img src="{{$img}}" style="width:100px;" alt=""></li>
                                            @endforeach
                                        </ul>
                                 </div>                       
                            </div>
                        </div>
@endsection

