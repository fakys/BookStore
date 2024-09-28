$(document).ready(function (){
    $('.index-page').each(function (){
        $('.search-input-header').keyup(function (){

            let search = $(this).val()
            let products = $('.name-products');
            if(search){
                for (let i of products){
                    if(Number($(i).text().indexOf(search))<=0){
                        $('.product-'+$(i).data('key')).addClass('d-none');
                    }
                    if ((Number($(i).text().indexOf(search))>=0)){
                        $('.product-'+$(i).data('key')).removeClass('d-none');
                    }
                }
            }else{
                $('.product-block').removeClass('d-none')
            }

        })


    })
})