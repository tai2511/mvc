jQuery(document).ready(function($){
    $("#upload_avt").on('change', function(){
        let file        = this.files[0];
        let ajax_url    = $('header').data("domain")+"/product/ajaxUploadAvatar";
        var fd          = new FormData();
        fd.append('file0', file);
        $.ajax({
            url: ajax_url,
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success(response){
                if(response == "true"){
                    let url_images = $('header').data("domain")+"/public/images/"+ file["name"];
                    if($('.preview img').length > 0){
                        $('.preview img').attr("src",url_images)
                    }else{
                        $('.preview').append("<img src='"+url_images+"'>")
                    }
                    $(".file_url").val(url_images)
                }else{
                    alert("Please try again!")
                }
            }
        })
    })
})