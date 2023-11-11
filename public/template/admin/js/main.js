setTimeout(1200, function deleteRow(){});
function deleteRow(id = 0, url = ''){
    if(confirm('Bạn có chắc là xóa. Xóa mà không thể khôi phục')){
        $.ajax({
          type : 'POST',
          dataType : 'JSON',
          data : {id},
          url : url,
          success : function(result){
             alert(result.message);
             if(result.error == false){
                location.reload();
             }
          }
        });
    }

}
/** Upload File */

$('#upload').change(function(){
      var file = $(this)[0].files[0];
      var formData = new FormData();
      formData.append('fileName', file);
      
      $.ajax({
         processData: false,
         contentType: false,
         type : 'POST',
         dataType : 'JSON',
         data : formData,
         url : '/admin/upload/add',
         success : function(result){
            if(result.error == false){
               $('#file_url').val('/' + result.url);
               var html = '<a href="/'+ result.url + '"><img src="/'+result.url+'" width="100px"></a>';
               $('#thumb').html(html);
            }
         }
      })
});