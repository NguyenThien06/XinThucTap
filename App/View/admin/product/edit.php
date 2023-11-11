<!-- /.card-header -->
<!-- form start -->
<form action="/admin/product/update/<?php echo $data['id']?>" method="POST">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php echo $data['name']?>">
                </div>
                <div class="col-md-6">
                    <label>Danh Mục</label>
                    <select name="menu_id" class="form-control">
                        
                        <?php if($menu->num_rows >0){ 
                               while($row = $menu->fetch_assoc()){
                            ?>
                             <option value="<?php echo $row['id']?>" <?php echo $row['id'] == $data['menu_id'] ? 'selected' : ''?>>
                                <?php echo $row['name']?>
                             </option>

                        <?php }}?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea class="form-control" name="description"><?php echo Core\Helper::decodeSafe($data['description'])?></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Giá Gốc</label>
                    <input type="number" class="form-control"  value="<?php echo $data['price']?>" name="price">
                 </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Giá Giảm</label>
                    <input type="number" class="form-control"  value="<?php echo $data['price_sale']?>" name="price_sale">
                </div>
            </div>
        </div>

        <div class="form-group">
           <label>Chi tiết Sản Phẩm</label>
           <textarea class="form-control" ic="content" name="content"><?php echo Core\Helper::decodeSafe($data['content'])?></textarea>
        </div>

        <div class="form-group">
            <label>File ảnh </label>
            <input type="file" id="upload" class="form-control">
            <div id="thumb">
              <a href="<?php echo $data['file']?>"><img src="<?php echo $data['file']?>" width="100px"></a>
            </div>
            <input type="hidden" name="file" value="<?php echo $data['file']?>" id="file_url">
        </div>
        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="1"id="customRadio1" 
                name="active" <?php echo $data['active']==1 ? 'checked' : ''?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="active"
                  <?php echo $data['active'] == 0 ? 'checked' : ''?> >
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>

        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Sản phẩm</button>
    </div>
</form>