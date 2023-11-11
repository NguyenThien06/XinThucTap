<!-- /.card-header -->
<!-- form start -->
<form action="/admin/product/store" method="POST">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="col-md-6">
                    <label>Danh Mục</label>
                    <select name="menu_id" class="form-control">
                        
                        <?php if($menu->num_rows >0){ 
                               while($row = $menu->fetch_assoc()){
                            ?>
                             <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

                        <?php }}?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Giá Gốc</label>
                    <input type="number" class="form-control" name="price">
                 </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Giá Giảm</label>
                    <input type="number" class="form-control" name="price_sale">
                </div>
            </div>
        </div>

        <div class="form-group">
           <label>Chi tiết Sản Phẩm</label>
           <textarea class="form-control" id="content" name="content"></textarea>
        </div>

        <div class="form-group">
            <label>File ảnh </label>
            <input type="file" id="upload" class="form-control">
            <div id="thumb"></div>
            <input type="hidden" name="file" value="" id="file_url">
        </div>
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="1"id="customRadio1" name="active" checked="">
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
        <button type="submit" class="btn btn-primary">Thêm Sản phẩm</button>
    </div>
</form>