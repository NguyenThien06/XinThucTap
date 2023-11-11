<!-- /.card-header -->
<!-- form start -->
<form action="/admin/menu/update/<?php echo $data['id']?>" method="POST">
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php echo Core\Helper::decodeSafe($data['name'])?>">
                </div>
                <div class="col-md-6">
                    <label>Danh Mục</label>
                    <select name="parent_id" class="form-control">
                        <option value ="0">Danh Mục Cha</option>
                        <?php if($menu->num_rows >0){ 
                               while($row = $menu->fetch_assoc()){
                            ?>
                             <option value="<?php echo $row['id']?>" <?php echo $row['id'] == $data['parent_id'] ? 'selected' : ''?> >
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
        <div class="form-group">
            <label>Vị trí</label>
            <input type="number" class="form-control" name="order_by" value="<?php echo $data['order_by']?>">
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value ="1" type="radio" id="customRadio1" 
                name="active" <?php echo $data['active'] == 1 ? 'checked' : ''?>>
                <label for="customRadio1" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="customRadio2" 
                name="active" <?php echo $data['active'] ==0 ?'checked' : ''?>>
                <label for="customRadio2" class="custom-control-label">Không</label>
            </div>

        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Danh Mục</button>
    </div>
</form>