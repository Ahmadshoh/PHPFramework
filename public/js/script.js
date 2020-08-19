$(document).ready(function () {
    $('.cabinet').on('click', function () {
        $('.cabins-items').toggle(250);
    });

    $(".tab_item").not(":first").hide();
    $(".product-infos .tab").click(function () {
        $(".product-infos .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");

    $(".owl-carousel").owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true
    });

    function totalPrice() {
        let getTotalPrice = document.getElementsByClassName("itemPrice");
        let itemTotalPriceText = new Array();
        for (var i = 0; i < getTotalPrice.length; i++) {
            itemTotalPriceText.push(getTotalPrice[i].innerText);
        }
        let totalPrice = 0;

        function priceSum(array) {
            for (let i = 0; i < array.length; i++) {
                totalPrice += parseInt(array[i]);
            }
        }
        priceSum(itemTotalPriceText);
        $("#totalPrice").html(totalPrice);
        $("#allTotalPrice").val(totalPrice);
    }

    $(".itemCount").change(function () {
        let id = $(this).attr('data-id');
        let currentQty = $(this).attr('data-current');
        let newCount = $("#itemCount_" + id).val();
        let itemPrice = $("#itemPrice_" + id).attr('value');
        let itemTotalPrice = newCount * itemPrice;
        let qty;
        if(newCount > currentQty){
            qty = 1;
        } else {
            qty = -1;
        }

        $.ajax({
            url: 'cart/addToCart',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function(){
                $("#itemPrice_" + id).html(itemTotalPrice);
                $(".productTotalPrice_" + id).val(itemTotalPrice);
                $(".count_" + id).val(newCount);
                totalPrice();
            },
            error: function(){
                alert('Ошибка! Попробуйте позже');
            }
        })
    });

    $("#buying-type").on("change", function () {
        let option = this.value;
        if (option == "Доставка") {
            $("#remove").removeClass("col-sm-12");
            $("#remove").addClass("col-sm-6");
            $("#addressBlock").css("display", "block");
        } else {
            $("#remove").removeClass("col-sm-6");
            $("#remove").addClass("col-sm-12");
            $("#addressBlock").css("display", "none");
        }
    });

    $(".addToBookmark").on("click", function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: 'bookmark/addToBookmark',
            data: {id: id},
            type: 'GET',
            success: function(res){
                $("#myModal").modal();
                $(".modal-title").html("Добавлен товар в закладки!");
                $(".modal-body").html(res);
            },
            error: function(){
                alert('Ошибка! Попробуйте позже');
            }
        });
    });

    $(".addToCart").on("click", function (e) {
        e.preventDefault();
        var id = $(this).data('id'), qty = $('#qty').val() ? $('#qty').val() : 1;
        $.ajax({
            url: 'cart/addToCart',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function(res){
                $("#myModal").modal();
                $(".modal-title").html("Добавлен товар в корзину!");
                $(".modal-body").html(res);
            },
            error: function(){
                alert('Ошибка! Попробуйте позже');
            }
        });
    });

    $("#recount").on("click", function (e) {
        e.preventDefault();
        location.reload();
    });

    $("#password_btn").on("click", function (e) {
        e.preventDefault();

        var x = document.getElementById("profile_password");
        if (x.type === "password") {
            x.type = "text";
            $("#fa-visible").removeClass("fa-eye");
            $("#fa-visible").addClass("fa-eye-slash");
        } else {
            x.type = "password";
            $("#fa-visible").removeClass("fa-eye-slash");
            $("#fa-visible").addClass("fa-eye");
        }
    });
});