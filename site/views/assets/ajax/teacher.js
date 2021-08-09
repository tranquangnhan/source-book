filterOb = [
    { 'type': [1, 2] },
    { 'class': [] },
    { 'category': [] }
];

obj.sachmem = 1;
obj.filterOb = filterOb;


var what = $('#what_').val();
if (what == 1) {
    obj.pageTeacher = true;
}

obj.sachmem  = true;
var classe = 0;

function getDataSupportResource(classhe, form) {
    var dataSend = new FormData();
    classe = classhe;
    dataSend.append('class', classhe);
    dataSend.append('form', form);
    dataSend.append('action', 'getDataSpResources');

    var url = `${baseUrlSite}/site/controllers/ajax/product.php`;

    getDataSpResourceClass(dataSend, url);
}

function getDataSpResourceClass(data, url) {
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        success: function(response) {
            if ($('.notice-h3')) {
                $('.notice-h3').remove();
                $('.pagina-box').show();
            }

            if ($('.ftco-loader').hasClass('show') == true) {
                $('.ftco-loader').removeClass('show');
            }

            if (response[1] > 0) {
                response[0].forEach(element => {
                    var ResourcesItem = htmlResourcesItem(element);
                    $('.spre').append(ResourcesItem);
                });

                if (checkReloadPage == true) {
                    var page = (response[1] / 9);
                    pageNumber = Math.ceil(page);
                    reloadPage();
                    checkReloadPage = false;
                }
            } else {
                var html = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
                $('.spre').prepend(html);
                $('.pagina-box').hide();
            }
        },
        error: function(e) {
            // Swal.fire({
            //     timer: 3000,
            //     type: 'error',
            //     title: 'Có lỗi xảy ra trong quá trình xử lý dữ liệu. Vui lòng tải lại trang !.',
            //     showConfirmButton: false,
            //     showCancelButton: false,
            // });
            alert('Đã xảy ra lỗi khi tải tài nguyên hỗ trợ');
        }
    });
}

function htmlResourcesItem(data) {
    // if (data['class'] == 0) {
    //     var classz = 'Mầm non';
    // } else {
    //     var classz = 'Lớp ' + data['class'];
    // }
    var html = `
    <div class="col-md-4 Resources-item d-flex align-items-stretch ftco-animate fadeInUp ftco-animated">
        <div class="project-wrap text-center sprs">
            <a href="${data['link']}" class="img" style="background-image: url('${baseUrlSite}/uploads/${data['img']}');">
            </a>
            <div class="text p-4 text-center">
                <h3><a href="${data['link']}">${data['name']}</a></h3>
            </div>
        </div>
    </div>
    `;

    return html;
}