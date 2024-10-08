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
                console.log(suc)
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
            },
            error:function (err){
                console.log(err)
            }
        })
    })
    $('.return-order').on('click', function (){
        let parent = $(this).parent()
        let url = parent.data('url')
        let key = parent.data('key')
        let condition = $('.condition-book-'+key).val()
        $.ajax({
            url:url,
            method:'POST',
            data:{
                design:true,
                key:key,
                condition:condition
            },
            success:function (suc){
                if(suc){
                    $('.return-tr-'+key).remove()
                }
            },
            error:function (err){
                console.log(err)
            }
        })
    })

    $('.issued_order').on('click', function (){
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
                $('.issued_tr-'+key).remove()
                console.log(suc)
            },
            error:function (err){
                console.log(err)
            }
        })
    })
})