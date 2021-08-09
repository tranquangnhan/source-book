$(document).ready(function() {
    $('#table_product').DataTable();
});

function submitForm() {

    // let message = document.getElementById("ErrorColor");
    // let valColor = $('#color').val();
    // if (valColor == "") {
    //     message.innerHTML = "";
    //     return true
    // } else {

    //     let arr = valColor.split(",")
    //     console.log(arr.length);
    //     for (let i = 0; i < arr.length; i++) {
    //         if (arr[i].charAt(0) != '#') { message.innerHTML = "Định dạng hợp lệ là #000, #fff, ..."; return false; } else { message.innerHTML = ""; }
    //         if (arr[i].slice(1).length != 3) { message.innerHTML = "Định dạng hợp lệ là #000, #fff, ..."; return false; } else { message.innerHTML = ""; }
    //     }

    // }
}

function checkDelete(link) {
    console.log(link);
    Swal.fire({
        title: 'Xóa?',
        text: "Bạn chắc chắn muốn xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link;
        }
    })
}

function checkDeleteCate(link, idcate) {
    Swal.fire({
        title: 'Xóa?',
        text: "Bạn chắc chắn muốn xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'Hủy',
    }).then(async(result) => {
        if (result.isConfirmed) {
            let checkStatus = new FormData();

            checkStatus.append('idcate', idcate);
            checkStatus.append('action', 'checkProductIssetByCategoryId');
            await $.ajax({
                type: 'POST',
                url: 'controllers/ajax/order.php',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: checkStatus,
                success: async function(response) {
                    if (response == 0) {
                        await Swal.fire({
                            timer: 1500,
                            type: 'success',
                            title: 'Xóa thành công !',
                            showConfirmButton: false,
                            showCancelButton: false,
                            icon: "success"
                        });
                        window.location.href = link

                    } else if (response > 0) {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops.',
                            text: 'Danh mục này chứa sản phẩm! không thể xóa!',
                            showConfirmButton: true,
                            showCancelButton: false,
                            icon: "error"
                        });
                    } 
                }, error: function(e) {
                    console.log(e);
                }
            });
        }
    })
}

function checkStatus(iddh) {
    Swal.fire({
        title: 'Cập nhật?',
        text: "Bạn chắc chắn?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oke!',
        cancelButtonText: 'No',
    }).then(async(result) => {
        if (result.isConfirmed) {
            let checkStatus = new FormData();

            checkStatus.append('iddh', iddh); //gửi lên user và pass để kiểm tra
            // checkStatus.append('Remember', remember);
            checkStatus.append('Action', 'updateStatus');
            await $.ajax({
                type: 'POST',
                url: 'controllers/ajax/order.php',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: checkStatus,
                success: async function(response) {
                    if (response.StatusCode == 0) {
                        await Swal.fire({
                            timer: 2000,
                            type: 'success',
                            title: 'Yeah',
                            showConfirmButton: false,
                            showCancelButton: false,
                            icon: "success"
                        });
                        window.location.href = "?ctrl=order"
                    } else if (response.StatusCode === 1) {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops.',
                            showConfirmButton: true,
                            showCancelButton: false,
                            icon: "error"
                        });

                    }
                }
            });
        }

    })

}
$(document).ready(function() {


    jQuery(function($) {
            $("#clear").click(function(event) {
                event.preventDefault();
                $("#inputhinh").replaceWith('<input type="file" class="imagefet" name="img[]" id="inputhinh" accept="image/png, image/jpg, image/jpeg" multiple="multiple" style="display: none">');
                $("div.output-fet").replaceWith('<div class="output-fet"><output id="list"></output></div>');
                $(".boxshowimg").addClass("hidden");
            });
        })
        // $('#list img').css("width", "300px");
    jQuery(function($) {

        var count = 0;

        function handleFileSelect(evt) {
            var $fileUpload = $(".imagefet");
            count = count + parseInt($fileUpload.get(0).files.length);

            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();

                reader.onload = (function(theFile) {
                    return function(e) {
                        var span = document.createElement('span');
                        span.innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                        document.getElementById('list').insertBefore(span, null);
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }

        $('.imagefet').change(function(evt) {
            handleFileSelect(evt);
            $(".boxshowimg").removeClass("hidden");
        });

    })

    $("input[name='checkabout']").change(function(){
        var val = $(this).val();
        console.log(val);
        if (val == 0) {
            $("#editor1").removeAttr('disabled');
            $("#iplink").attr("disabled", 'disabled');
        }
        if (val == 1) {
            $("#editor1").attr("disabled", 'disabled');
            $("#iplink").removeAttr('disabled');       
        }
    }); 
    

    $('#anhienAbout').change(function () {        
        var attr = $('#thutu').attr('disabled');
        
        if (typeof attr == 'undefined' || attr == false) {
            $("#thutu").attr("disabled", 'disabled');            
        } else {
            $("#thutu").removeAttr("disabled");            
        }                   
    });

    $('#class_sprs').on('change', function (e) {
        var optionSelected  = $("option:selected", this);
        var valueSelected   = this.value;
        var ordinalCurrent  = $('#ordinalCurrent').val();
        ordinalCurrent      = parseInt(ordinalCurrent);
        let classData       = new FormData();
        classData.append('valueSelected', valueSelected); 
        classData.append('action', 'getOrdinalByClass');
        
        $.ajax({
            type: 'POST',
            url: 'controllers/ajax/order.php',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: classData,
            success: function(response) {   
                $('#thutu option').remove();
             
                var o = new Option('Giữ', ordinalCurrent);
                $('#thutu').append(o);
                for (let i = 0; i < response.length; i++) {
                    if (response[i]['ordinal'] != ordinalCurrent) {
                        if (response[i]['class'] == 0) {
                            var classe = 'Mầm non';
                        } else {
                            var classe = response[i]['class'];
                        }
                        o = new Option(classe + ' - ' + response[i]['name'], response[i]['ordinal']);
                        $('#thutu').append(o);
                    }                    
                }
            }, error: function () {

            }
        });
    });
});

