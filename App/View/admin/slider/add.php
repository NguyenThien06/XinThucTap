<!-- /.card-header -->
<!-- form start -->
<form action="/admin/slider/store" method="POST">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Tên Slider</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="col-md-6">
                    <label>Sắp Xếp</label>
                    <input type="number" name="sort_by" value="1" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Đường dẫn</label>
            <input type="text" class="form-control" name="url">
        </div>
    
        
        <div class="form-group">
            <label>Chon File Ảnh Slider</label>
            <input type="file"  id="upload"class="form-control" >
            <div id="thumb"></div>
            <input type="hidden" name= "file" id="file_url" value="">
        </div>
        <div class="form-group">
            <div class="form-group"> 
                <label>Kích Hoạt</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="1" id="customRadio1" name="active" checked="">
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active">
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>

        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
    </div>
</form>