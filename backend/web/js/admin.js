$(document).ready(function (){
    $('.add-order').on('click', function (){
        let parent = $(this).parent()
        let url = parent.data('url')
        let key = parent.data('key')
        $.ajax({
            url:url,
            method:'POST',
            data:{
                design:true,
                key:key
            },
            success:function (suc){
                $('.sent-tr-'+key).remove()
                if($('.sent-tr').length === 0){
                    $('.sent_orders').addClass('d-none')
                }
            },
            error:function (err){
                console.log(err)
            }
        })
    })

    $('.came-order').on('click', function (){
        let parent = $(this).parent()
        let url = parent.data('url')
        let key = parent.data('key')
        $.ajax({
            url:url,
            method:'POST',
            data:{
                design:true,
                key:key
            },
            success:function (suc){
                $('.came-tr-'+key).remove()
                if($('.came-tr').length === 0){
                    $('.came_orders').addClass('d-none')
                }
            },
            error:function (err){
                console.log(err)
            }
        })
    })
})