<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Sản phẩm</th>
            <th>Danh Mục</th>
            <th>Hình Ảnh</th>
            <th style="width: 150px">Trạng Thái</th>
            <th style="width: 200px">Ngày Cập Nhật</th>
            <th style="width: 50px">Sửa</th>
            <th style="width: 50px">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php

use App\Helper\Helper;

 if($data->num_rows > 0){
              while ($row = $data->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['MenuName']?></td>
                <td>
                    <a href="<?php echo $row['file']?>"><img src="<?php echo $row['file']?>" width="100px">
                    </a>
                </td>
                <td><?php echo Helper::active($row['active']) ?></td>
                <td><?php echo $row['update_at']?></td>
                <td><a href="/admin/product/edit/<?php echo $row['id']?>"><i class="fas fa-user-edit"></i></a></td>
                <td><a href="#" onclick="deleteRow(<?php echo $row['id']?>, '/admin/product/delete')"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php }}?>
    </tbody>
</table>
<div><?php echo page($sumPage, $page,'/admin/product/list')?></div>