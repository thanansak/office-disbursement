function confirmdelete(url){
    Swal.fire({
        title: 'ต้องการลบใช่หรือไม่',
        text: 'หากลบข้อมูล ข้อมูลอื่นๆที่เกี่ยวข้องจะถูกลบทั้งหมด',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: 'JSON',
                success: function(response) {
                    if (response.status === true) {
                        Swal.fire({
                            title: response.msg,
                            icon: 'success',
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            title: response.msg,
                            icon: 'error',
                            toast: true,
                            position: 'top-right',
                            timer: 2000,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    }
                }
            });

        }
    });
}

function publish(url) {
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            if (response.status === true) {
                    Swal.fire({
                        position: 'top-right',
                        title: response.msg,
                        icon: 'success',
                        timer: 2000,
                        toast: true,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    table.ajax.reload();
            } else {
                Swal.fire({
                    position: 'top-right',
                    title: response.msg,
                    icon: 'error',
                    timer: 2000,
                    toast: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
            }
        }
    });
}

function sort(ele,url){
    var frmdata = {
        'data': ele.value
    };
    $.ajax({
        type: 'get',
        url: url,
        data: frmdata,
        success: function (response){
            if (response.status === true) {
                Swal.fire({
                    position: 'top-right',
                    icon: 'success',
                    title: response.message,
                    toast: true,
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false
                })
            } else {
                Swal.fire({
                    position: 'top-right',
                    icon: 'error',
                    title: response.message,
                    toast: true,
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false
                })
            }
        }
    })
}

function confirmReset(url){
    Swal.fire({
        title: 'ต้องการรีเซ็ตข้อมูลใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    if (response.status === true) {
                            Swal.fire({
                                position: 'top-right',
                                title: response.msg,
                                icon: 'success',
                                timer: 2000,
                                toast: true,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            table.ajax.reload();
                    } else {
                        Swal.fire({
                            position: 'top-right',
                            title: response.msg,
                            icon: 'error',
                            timer: 2000,
                            toast: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    }
                }
            });
        }
    });
}

function confirmAllow(url){
    Swal.fire({
        title: 'ยืนยันการอนุมัติใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    if (response.status === true) {
                            Swal.fire({
                                position: 'top-right',
                                title: response.msg,
                                icon: 'success',
                                timer: 2000,
                                toast: true,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            table.ajax.reload();
                    } else {
                        Swal.fire({
                            position: 'top-right',
                            title: response.msg,
                            icon: 'error',
                            timer: 2000,
                            toast: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    }
                }
            });
        }
    });
}

function confirmFollowStatus(url){
    Swal.fire({
        title: 'ยืนยันการแก้ไขใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    if (response.status === true) {
                            Swal.fire({
                                position: 'top-right',
                                title: response.msg,
                                icon: 'success',
                                timer: 2000,
                                toast: true,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            table.ajax.reload();
                    } else {
                        Swal.fire({
                            position: 'top-right',
                            title: response.msg,
                            icon: 'error',
                            timer: 2000,
                            toast: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    }
                }
            });
        }
    });
}

function editData(url){
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            requestData(response);
        }
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function submitData(url,formdata){
    // Display the key/value pairs
    // for (var pair of formdata.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]);
    // }

    Swal.fire({
        title: 'ต้องการยืนยันใช่หรือไม่ ?',
        icon: 'question',
        backdrop: true,
        padding: '1em',
        showCancelButton: true,
        reverseButtons: true,
        // confirmButtonColor: '#ffc107',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'post',
                url: url,
                traditional:true,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (response) {
                    if (response.status === true) {
                        Swal.fire({
                            title: response.msg,
                            icon: 'success',
                            timer: 2000,
                            toast: true,
                            position: 'top-right',
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            title: response.msg,
                            icon: 'error',
                            timer: 2000,
                            toast: true,
                            position: 'top-right',
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    }
                }
            });
        }
    })
}

function fileValidation(ele) {
    var fileInput = ele;
    var filePath = fileInput.value;

    // Allowing file type
    var allowedExtensions = /(\.gif|\.png|\.jpeg|\.jpg)$/i;

    if (!allowedExtensions.exec(filePath)) {
        Swal.fire({
            icon: 'error',
            title: 'ผิดพลาด',
            text: 'ไฟล์ที่นำเข้าต้องเป็นไฟล์รูปภาพเท่านั้น',
            timer: 2000,
        })
        fileInput.value = '';
        return false;
    } else {
        previewImg(fileInput);
    }
}
