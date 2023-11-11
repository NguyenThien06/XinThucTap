<!-- /.card-header -->
<!-- form start -->
<form action="/admin/slider/update/<?php echo $data['id']?>" method="POST">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Tên Slider</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php echo \Core\Helper::decodeSafe($data['name'])?>"placeholder="Enter email">
                </div>
                <div class="col-md-6">
                    <label>Sắp Xếp</label>
                    <input type="number" name="sort_by" value="<?php echo $data['sort_by']?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Đường dẫn</label>
            <input type="text" class="form-control" value="<?php echo Core\Helper::decodeSafe($data['url'])?>" name="url">
        </div>
    
        
        <div class="form-group">
            <label>Chon File Ảnh Slider</label>
            <input type="file"  id="upload"class="form-control">
            <div id="thumb">
                <a href="<?php echo $data['file']?>"><img src="<?php echo $data['file']?>" width="100px"></a>
            </div>
            <input type="hidden" name= "file" id="file_url"value="<?php echo $data['file']?>">
        </div>
        <div class="form-group">
            <div class="form-group"> 
                <label>Kích Hoạt</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="1" id="customRadio1" name="active"
                 <?php echo $data['active'] == 1 ? 'checked' : '';?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active"
                 <?php echo $data['file'] == 0 ? 'checked' : ''?> 
                >
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>

        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhât Slider</button>
    </div>
</form>