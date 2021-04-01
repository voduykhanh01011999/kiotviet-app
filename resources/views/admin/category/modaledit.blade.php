<div class="modal fade" id="EditCategory{{$stt}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{url('/categories/update/'.$ctg['categoryId'])}}" method="post">
    @csrf
      <div class="modal-header bg-success" style="color:#fff;">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cart-plus"></i> Thêm danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="categoryName">Tên danh mục</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" value="{{$ctg['categoryName']}}">
                <input type="hidden" class="form-control" id="retailerId" name="retailerId" aria-describedby="emailHelp" value="{{$retailerid}}">
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