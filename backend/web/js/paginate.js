$(document).ready(function (){
    $('.admin-table-show-page').each(function () {
        let pages = [];
        let context_page = 0
        let rows = $('.row-object');
        let paginate_btn = []
        let context_paginate = 0

        if (rows.length > 15) {
            let num_page = -1
            for (let i = 0; i <= rows.length - 1; i++) {
                if (i === 0 || i % 15 === 0) {
                    pages.push([$('.row-object')[i]]);
                    num_page += 1;
                } else {
                    pages[num_page].push(rows[i])
                }

            }
        } else {
            pages.push($('.row-object'))
            $('.pagination').addClass('d-none')
        }
        let num_btn = -1
        for (let i = 0; i <= pages.length - 1; i++) {
            if (i === 0 || i % 3 === 0) {
                let page_item = $("<li class='page-item page-link pagination-page-item'>")
                page_item.text(i + 1)
                paginate_btn.push([page_item])
                num_btn += 1
            } else {
                let page_item = $("<li class='page-item page-link pagination-page-item'>")
                page_item.text(i + 1)
                paginate_btn[num_btn].push(page_item)
            }
        }

        function update_table(pages, context_page) {
            if (pages.length > context_page && 0 <= context_page) {
                for (let i of $('.active-row')) {
                    i.classList.remove('active-row')
                }
                for (let i of pages[context_page]) {
                    i.classList.add('active-row')
                }
            }

        }

        function has_paginate() {
            let num = context_page + 1
            for (let i = 0; i <= paginate_btn.length - 1; i++) {
                for (let elem = 0; elem <= paginate_btn[i].length - 1; elem++) {
                    if (paginate_btn[i][elem].text() == num) {
                        return {'page': i, 'id': elem};
                    }
                }
            }
            return {};
        }

        function update_paginate() {
            let bnt_data = has_paginate();

            if (bnt_data.page !== context_paginate) {

                for (let i of paginate_btn[context_paginate]) {
                    i.addClass('d-none')
                }
                for (let i of paginate_btn[bnt_data.page]) {
                    i.removeClass('d-none')
                }
            }
            context_paginate = bnt_data.page
            for (let i = 0; i <= paginate_btn.length - 1; i++) {
                for (let page of paginate_btn[i]) {
                    if (page.text() == context_page + 1) {
                        $('.active-paginate').removeClass('active-paginate')
                        page.addClass('active-paginate')
                    }
                    if (bnt_data.page !== i) {
                        page.addClass('d-none')
                    }
                    $('.pages-items').append(page)
                }


            }
        }

        update_table(pages, context_page)
        update_paginate()


        //События
        $('.pagination-page-item').on('click', function () {
            context_page = Number($(this).text()) - 1
            update_table(pages, context_page)
            update_paginate()
        })

        $('.pagination-prev').on('click', function () {
            if (context_page >= 1) {
                context_page -= 1;
                update_table(pages, context_page)
                update_paginate()
            }
        })
        $('.pagination-next').on('click', function () {
            if (context_page < pages.length - 1) {
                context_page += 1;
                update_table(pages, context_page)
                update_paginate()
            }
        })

    })
})
