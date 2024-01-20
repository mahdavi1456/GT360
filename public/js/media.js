$("#file").change(function() {
    $("#selected_filename").text($("#file")[0].files[0].name);
    $(".filename").text($("#file")[0].files[0].name);
    console.log($("#file")[0].files[0].name);
});

$(document).on("click", "#upload", function() {
    $(".loading").css("display", "block");
    $(".loader").css("display", "block");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // Get the selected file
    var files = $("#file")[0].files;
    var type = $(this).data("type");
    if (files.length > 0) {
        var fd = new FormData();

        // Append data
        fd.append("file", files[0]);
        fd.append("type", type);
        // Hide alert
        $('#responseMsg').hide();
        var URL = "https://barez.org/";
        var APP_URL = $("meta[name='_base_url']").attr("content");
        // AJAX request
        $.ajax({
            url: APP_URL + "/upload",
            method: "post",
            data: fd,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                $("#loading_icon").removeClass("fa fa-circle-o-notch fa-spin");
                // Hide error container
                $("#err_file").removeClass("d-block");
                $("#err_file").addClass("d-none");

                if(response.data.success == 1) { // Uploaded successfully
                    if(type == "media") {
                        $(".media-table-view").html(response.html);
                    }
                    swal({
                        title: "پیوست فایل",
                        text: "فایل با موفقیت پیوست شد.",
                        timer: 2000,
                        buttons: false,
                        type: "success",
                        icon: "success",
                    })
                    // File preview
                    $("#filepath").val(response.data.filepath);
                    $("#filename").val(response.data.name);
                    $(".url").show();
                    $("#fileUrl").val(URL + response.data.fileurl);
                    $("#filepreview").show();
                    $("#filepreview img,#filepreview a").hide();
                    if (response.data.extension == "jpg" || response.data.extension == "jpeg" || response.data.extension == "png") {
                        $('#filepreview img').attr("src", URL + response.data.filepath);
                        $('#filepreview img').show();
                        $('#filepreview button').show();
                    } else {
                        $('#filepreview a').attr("href", URL + response.data.filepath).show();
                        $('#filepreview a').show();
                    }
                } else if (response.data.success == 2) {
                    // File not uploaded
                    swal({
                        title: "پیوست فایل",
                        text: "فایل پیوست نشد. دوباره سعی کنید.",
                        timer: 2000,
                        buttons: false,
                        type: "error",
                        icon: "error",
                    })
                } else {
                    swal({
                        title: "پیوست فایل",
                        text: response.data.error,
                        timer: 2000,
                        buttons: false,
                        type: "error",
                        icon: "error",
                    })
                }
            },
            error: function (response) {
                console.log("error: " + JSON.stringify(response));
            }
        });
    } else {
        swal({
            title: "پیوست فایل",
            text: "فایل مورد نظر را انتخاب کنید.",
            timer: 2000,
            buttons: false,
            type: "warning",
            icon: "warning",
        })
    }
    $(".loading").css("display", "none");
    $(".loader").css("display", "none");
});

$(document).on("click", ".removePhoto", function() {
    var id = $(this).data("id");
    event.preventDefault();
    swal({
        title: "حذف فایل",
        text: "آیا از انجام عملیات اطمینان دارید؟",
        icon: "warning",
        dangerMode: true,
        buttons: ["خیر", "بله"]
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    }
                });
                var formData = {
                    id: id,
                    type: "attachment",
                };
                var type = "DELETE";
                var APP_URL = $('meta[name="_base_url"]').attr('content');
                var ajaxurl = APP_URL + "/media/" + id;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: "json",
                    success: function (data) {
                        swal({
                            title: "حذف",
                            text: "مورد با موفقیت حذف شد.",
                            timer: 2000,
                            buttons: false,
                            type: "success",
                            icon: "success"
                        })
                        $("#updated_photo_" + id).remove();
                    }
                });
            }
        });
});

$(document).on("change", ".global-file", function() {
    var id = $(this).data("id");
    $("#selected_filename_" + id).text($("#file_" + id)[0].files[0].name);
});

$(document).on("click", ".select-file", function() {
    var id = $(this).data("id");
    console.log(id);
    $("#file_" + id).click();
});

$(document).on("click", ".global-upload", function() {
    var id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        }
    });
    // Get the selected file
    var files = $("#file_" + id)[0].files;
    var filename = $(this).data("filename");
    if (files.length > 0) {
        var fd = new FormData();

        // Append data
        fd.append("file", files[0]);
        fd.append("filename", filename);
        // Hide alert
        var URL = "https://barez.org/";
        var APP_URL = $("meta[name='_base_url']").attr("content");
        // AJAX request
        $.ajax({
            url: APP_URL + "/global-upload",
            method: "post",
            data: fd,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                $("#loading_icon").removeClass("fa fa-circle-o-notch fa-spin");
                // Hide error container
                $("#err_file_" + id).removeClass("d-block");
                $("#err_file_" + id).addClass("d-none");
                console.log(response)
                if (response.data.success == 1) {
                    // Uploaded successfully
                    swal({
                        title: "پیوست فایل",
                        text: "فایل با موفقیت پیوست شد.",
                        timer: 2000,
                        buttons: false,
                        type: "success",
                        icon: "success",
                    })
                    // File preview
                    $("#" + id).val(response.data.filepath);
                    $("#filepreview_" + id).show();
                    $("#link_" + id).attr("href", URL + response.data.filepath).show();
                    $("#link_" + id).show();
                } else if (response.data.success == 2) { // File not uploaded
                    swal({
                        title: "پیوست فایل",
                        text: "فایل پیوست نشد. دوباره سعی کنید.",
                        timer: 2000,
                        buttons: false,
                        type: "error",
                        icon: "error",
                    })
                } else {
                    swal({
                        title: "پیوست فایل",
                        text: response.data.error,
                        timer: 2000,
                        buttons: false,
                        type: "error",
                        icon: "error",
                    })
                }
            },
            error: function (response) {
                console.log("error: " + JSON.stringify(response));
            }
        });
    } else {
        swal({
            title: "پیوست فایل",
            text: "فایل مورد نظر را انتخاب کنید.",
            timer: 2000,
            buttons: false,
            type: "warning",
            icon: "warning",
        })
    }
});

$("#fileUploadForm").ajaxForm({
    beforeSend: function () {
        var percentage = "0";
        $(".submit-btn").prop("disabled", true);
    },
    uploadProgress: function (event, position, total, percentComplete) {
        var percentage = percentComplete;
        $(".progress .progress-bar").css("width", percentage + "%", function() {
            return $(this).attr("aria-valuenow", percentage) + "%";
        })
    },
    complete: function (xhr) {
        $(".submit-btn").prop("disabled", false);
        var type = $("#type").val();
        var URL = "https://barez.org/";
        if(xhr.responseJSON.data.success == 1) { // Uploaded successfully
            if(type == "media") {
                $(".media-table-view").html(xhr.responseJSON.html);
            }
            swal({
                title: "پیوست فایل",
                text: "فایل با موفقیت ثبت شد.",
                timer: 2000,
                buttons: false,
                type: "success",
                icon: "success",
            })
            // File preview
            $("#filepath").val(xhr.responseJSON.data.filepath);
            $("#filename").val(xhr.responseJSON.data.name);
            $(".url").show();
            $("#fileUrl").val(xhr.responseJSON.data.fileurl);
            $("#filepreview").show();
            $("#filepreview img,#filepreview a").hide();
            if(xhr.responseJSON.data.extension == "jpg" || xhr.responseJSON.data.extension == "jpeg" || xhr.responseJSON.data.extension == "png") {
                $("#filepreview img").attr("src", URL + xhr.responseJSON.data.filepath);
                $("#filepreview img").show();
            } else {
                $('#filepreview a').attr("href", URL + xhr.responseJSON.data.filepath).show();
                $('#filepreview a').show();
            }
        } else if (xhr.responseJSON.data.success == 2) {
            // File not uploaded
            swal({
                title: "پیوست فایل",
                text: "فایل مورد نظر را انتخاب کنید.",
                timer: 2000,
                buttons: false,
                type: "error",
                icon: "error",
            })
        } else {
            swal({
                title: "پیوست فایل",
                text: xhr.responseJSON.data.error,
                timer: 2000,
                buttons: false,
                type: "error",
                icon: "error",
            })
        }
    }
});
