<table class="table">
   <thead>
        <tr>
            <th style="width:50px">ID</th>
            <th>Tên Slider</th>
            <th>Sắp Xếp</th>
            <th>Đường dẫn</th>
            <th>Hình Ảnh</th>
            <th style="width:150px">Kích Hoạt</th>
            <th style="width:200px">Ngày Cập Nhật</th>
            <th style="width:50px">Sửa</th>
            <th style="width:50px">Xóa</th>
        </tr>
   </thead>
   <tbody>
      <?php

use App\Helper\Helper;

 if($slider->num_rows > 0){
              while($row = $slider->fetch_assoc()){
        ?>
         <tr>
             <td><?php echo $row['id']?></td>
             <td><?php echo $row['name']?></td>
             <td><?php echo $row['sort_by']?></td>
             <td><?php echo $row['url']?></td>
             <td>
                 <a href="<?php echo $row['file']?>"><img src="<?php echo $row['file']?>" target="_blank" width="100px"></a>
             </td>
             <td><?php echo Helper::active($row['active'])?></td>
             <td><?php echo $row['update_at']?></td>
             <td style="width:50px"><a href="/admin/slider/edit/<?php echo $row['id']?>"><i class="far fa-edit"></i></a></td>
            <td style="width:50px"><a href="#" onclick="deleteRow(<?php echo $row['id']?>, '/admin/slider/delete')" ><i class="fas fa-trash-alt"></i></a></td>
         </tr>
      <?php }}?>
   </tbody>
</table>