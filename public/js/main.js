jQuery(document).ready(function($){
    const domain = $(".navbar-brand").attr("href");
    $("#login").on('click',function(){
        $.ajax({
            url: "./login/checkLogin",
            type: "POST",
            data:{
                username: $('.username').val(),
                password: $('.password').val(),
            },
            success(response){
                let resultCheck = JSON.parse(response);
                if(resultCheck == true){
                    location.reload();
                }else{
                    alert("The account not correct");
                }
            }
        })
    })
    $('.username_register').on('keyup', function(){
        $.ajax({
            url: "./register/checkUserLogin",
            type: "POST",
            data:{
                username: $('.username_register').val()
            },
            success(response){
                let resultUser = JSON.parse(response);
                let checkName = true;
                resultUser.forEach(value => {
                    if(value == $('.username_register').val()){
                        checkName = false;
                        return checkName;
                    }
                });
                if(checkName == false){
                    $('.notice-name').fadeIn(200)
                    $(".register").css("pointer-events","none")
                }else{
                    $('.notice-name').fadeOut(200)
                    $(".register").css("pointer-events","all")
                }
            }
        })
    })
    $('.register').on('click',function(e){
        let check_input_array = $('input').map(function(){
            return $(this).val(); 
        }).get()
        let check_infor = true;
        check_input_array.forEach(element => {
            if(element == ""){
                check_infor = false
            }
        });
        if(check_infor == false){
            e.preventDefault();
            alert("Please fill out all information")
        }
    })
    $('.add-to-cart').on('click',function(){
        $.ajax({
            url: domain+"/cart/addToCart",
            type: "POST",
            data:{
                user: $('.product-id').attr('user'),
                product_id: $('.product-id').attr('product_id'),
                quatity: $('.quantity').val()
            },
            success(response){
                console.log(response)
                if(response == 1){
                    if (window.confirm('Product has been added to your cart. View cart?')) 
                    {
                        window.location.href=domain+'/cart';
                    };
                }else{
                    alert("Please try again!")
                }
            }
        })
    })
    $('.remove-cart').on('click',function(){
        let $this = $(this)
        $.ajax({
            url: domain+"/cart/removeCart",
            type: "POST",
            data:{
                product_id:$this.attr('product-id')
            },
            success(response){
                if(response == 1){
                    $this.closest('.cart-item').remove()
                    $('.notice-remove').fadeIn().delay(1000).fadeOut('slow');
                }else{
                    alert("Please try again")
                }
            }
        })
    })
    $('.check-out-submit').on('click',function(e){
        let check_infor = true;
        let check_input_array = $('.order-md-1 input').map(function(){
            return $(this).val(); 
        }).get()
        let check_select_array = $('.order-md-1 select').map(function(){
            return $(this).val(); 
        }).get()

        check_input_array.forEach(element => {
            if(element == ""){
                check_infor = false
            }
        });
        check_select_array.forEach(element => {
            if(element == ""){
                check_infor = false
            }
        });
        if(check_infor == false){
            e.preventDefault();
            alert("Please fill out all information")
        }
    })
    $('#update_infor').on('click', function(e){
        if($('.new_password').val() != $('.confirm_password').val() ){
            e.preventDefault();
            alert("The password does not match")
        }
        if(($('.new_password').val() != "" || $('.confirm_password').val() != "") && $('.curent_password').val() == "" ){
            e.preventDefault();
            alert("The password does not match")
        }
    })
    $('.curent_password').on('keyup',function(){
        if($(this).val() != ""){
            $.ajax({
                url: domain+"/myaccount/checkPass",
                type: "POST",
                data:{
                    password:$('.curent_password').val()
                },
                success(response){
                    if(response == 2){
                        $('#update_infor').addClass('disable')
                    }else{
                        $('#update_infor').removeClass('disable')
                    }
                }
            })
        }else{
            $('#update_infor').removeClass('disable')
        }
    })  

})