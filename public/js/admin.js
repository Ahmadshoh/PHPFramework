$(document).ready(function () {
    $(".tab_item").not(":first").hide();
    $(".editProduct .tab").click(function () {
        $(".editProduct .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");

    $("#description").summernote({
        lang: 'ru-RU',
        height: 300,
        minHeight: 120,
        maxHeight: 400,
        focus: true,
        popover: false
    });

    $(".saveCategory").on("click", function () {
        $("#category").css("display", "inline");
        $("#addCategory").css("display", "none");
        $("#saveCategory").css("display", "inline-block");

        let id = $(this).attr("data-id");
        $.ajax({
            url: "category/edit?id=" + id,
            success: function (data) {
                let name = JSON.parse(data);
                $("#name").val(name[id]["name"]);
                $("#id").val(name[id]["id"]);
            }
        });
    })

    $("#addButton").on("click", function () {
        $("#category").css("display", "inline");
        $("#addButton").css("display", "none");
        $("#saveCategory").css("display", "none");
        $("#id").val("");
        $("#name").val("");

        $("#addCategory").css("display", "inline-block");
    });

    $(".removeCategory").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            url: "category/removeCategory?id=" + id,
            success: function (data) {
                let success = JSON.parse(data);

                $(".success").css("display", "block");
                $(".successText").html(success['success']);
                $("#category_" + id).css("display", "none");
            }
        })
    });

    $(".saveBrand").on("click", function () {
        $("#brand").css("display", "inline");
        $("#addBrand").css("display", "none");
        $("#saveBrand").css("display", "inline-block");
        $("#removeBrand").css("display", "inline-block");
        $("#addButton").css("display", "inline-block");

        let id = $(this).attr("data-id");
        $.ajax({
            url: "brand/edit?id=" + id,
            success: function (data) {
                let name = JSON.parse(data);
                $("#name").val(name[id]["name"]);
                $("#id").val(name[id]["id"]);
            }
        });
    });

    $("#addButton").on("click", function () {
        $("#brand").css("display", "inline");
        $("#addButton").css("display", "none");
        $("#saveBrand").css("display", "none");
        $("#id").val("");
        $("#name").val("");

        $("#addBrand").css("display", "inline-block");
    });

    $(".removeBrand").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            url: "brand/removeBrand?id=" + id,
            success: function (data) {
                let success = JSON.parse(data);

                $(".success").css("display", "block");
                $(".successText").html(success['success']);
                $("#brand_" + id).css("display", "none");
            }
        })
    });

    $(".removeImage").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            url: "slider/removeImage?id=" + id,
            success: function (data) {
                let success = JSON.parse(data);

                $(".success").css("display", "block");
                $(".successText").html(success['success']);
                $("#img_" + id).css("display", "none");
            }
        });
    });

    $(".saveEdit").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");
        let visible;

        if($("#product_" + id + " #visible_" + id).prop("checked")) {
            visible = 1;
        } else {
            visible = 0;
        }

        let recommended;

        if($("#product_" + id + " #recommended_" + id).prop("checked")) {
            recommended = 1;
        } else {
            recommended = 0;
        }

        let price = $("#product_" + id + " #price").val();
        let amount = $("#product_" + id + " #amount").val();

        $.ajax({
            url: "product/saveEdit?id=" + id + "&visible=" + visible + "&recommended=" + recommended + "&price=" + price + "&amount=" + amount,
            success: function (data) {
                alert("Продукт успешно изменён!");
            }
        })
    });

    $(".removeProduct").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");

        $.ajax({
            url: "product/removeProduct?id=" + id,
            success: function (data) {
                let success = JSON.parse(data);

                $(".success").css("display", "block");
                $(".successText").html(success['success']);
                $("#product_" + id).css("display", "none");
            }
        });
    });
});