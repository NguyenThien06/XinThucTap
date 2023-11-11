<table class="table">
    <thead>
        <tr>
            <th style="width:50px">ID</th>
            <th>Tên Danh Mục</th>
            <th style="width:100px">Vị Trí</th>
            <th style="width:150px">Kích Hoạt</th>
            <th style="width:200px">Ngày Cập Nhật</th>
            <th style="width:50px">Sửa</th>
            <th style="width:50px">Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php echo \App\Helper\Helper::menuShow($menu)?>
    </tbody>
</table>