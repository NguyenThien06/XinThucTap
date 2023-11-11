function ChangeToSlug(title)
{
    var  slug;
    slug = title.toLowerCase();
 
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    
    slug = slug.replace(/ /gi, "-");
    
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    
    return slug;
}
function loadMoreProduct()
{
    const page = parseInt($('#page').val());
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page },
        url : '/service/product',
        success : function(result){
            if(result.error == false){
            var html ='<div class="row isotope-grid">';
            var data = result.data;
                for(i in data ){
                    html +='<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">'+
                    
                    '<div class="block2">'+
                        '<div class="block2-pic hov-img0">'+
                            '<img src="'+data[i].file+'" alt="IMG-PRODUCT">'+
            
                        '<a onclick="showModelInfo('+data[i].id+')" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">'+
                                'Quick View'+
                            '</a>'+
                        '</div>'+
            
                        '<div class="block2-txt flex-w flex-t p-t-14">'+
                            '<div class="block2-txt-child1 flex-col-l ">'+
                                '<a href="/san-pham/'+ChangeToSlug(data[i].name)+'-id-'+data[i].id+'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">'+data[i].name+'</a>'+
            
                                '<span class="stext-105 cl3">'+data[i].price+'</span>'+
                            '</div>'+
            
                        
                        '</div>'+
                    '</div>'+
                '</div>';
               }
                html +='</div>';
                $('#loadProduct').append(html);
                $('#page').val(page + 1);
             }else{
                alert('đã load hết sản phẩm');
             }
       }
  });

}
function showModelInfo(id =0)
{
    $('.js-modal1').addClass('show-modal1');
    $.ajax({
        type: 'POST',
        dataType : 'JSON',
        data : {id},
        url : '/service/product-show',
        success: function(result){
            if(result.error == false){
             $('#data_thumb').attr('data-thumb',result.data.file);// thay đổi thuộc tính data-thumb bằng result.data.file
             $('#detail_img').attr('src', result.data.file);
             $('#href_img').attr('href', result.data.file);
             $('#detail_h4').html(result.data.name);
             $('#detail_price').html(result.data.price);
             $('#detail_description').html(result.data.description);
            }
            else{
                $('.js-modal1').removeClass('show-modal1');
            }
        }
    });
}