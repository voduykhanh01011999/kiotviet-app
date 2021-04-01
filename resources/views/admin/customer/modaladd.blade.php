<div class="modal fade" id="AddCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{url('/customer/create')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="modal-header bg-success" style="color:#fff;">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-users"></i> Thêm Khách Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="code">Mã khách hàng</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã khách hàng">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Tên khách hàng</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên khách hàng">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="contactNumber">Số điện thoại</label>
                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Nhập số điện thoại">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birthDate">Ngày sinh</label>
                    <input type="date" class="form-control" id="birthDate" name="birthDate">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="email">Email khách hàng</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                </div>
            </div>
            <div class="form-group">
                <label for="">Giới tính</label>
                <div class="form-check">
                    <input class="form-check-input" name="gender" type="radio" id="gridCheck" value="true">
                    <label class="form-check-label" for="gridCheck">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="gender" type="radio" id="gridCheck" value="false">
                    <label class="form-check-label" for="gridCheck">
                        Nữ
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="locationName">Nhập khu vực</label>
                <input type="text" class="form-control" id="locationName" name="locationName" placeholder="Nhập khuc vực VD: Tỉnh - Huyện">
            </div>
            <div class="form-group">
                <label for="locationName">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" >
            </div>
           
            <div class="form-group">
                <label for="comments">Ghi chú</label>
                <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Chọn chi nhánh</label>
                <select class="form-control" id="branchId" name="branchId">
                     <option value="0">Chọn chi nhánh</option>
                    @foreach($ShowBranches as $Bc)
                        <option value="{{$Bc['id']}}">{{$Bc['branchName']}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
            <button  type="submit" class="btn btn-success"><i class="far fa-save"></i> Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>