function categoria(tipo,page) {

    $("#Loading").html('<h1 style="left: 40%;top: 50%;position: fixed;z-index: 10;">Carregando...</h1>');



    $.ajax({
        type: "POST",
        url: 'usercontroller/produtoshome',
        data: {tipo: tipo,page:page},
        success: function (result) {
            $("#produtos").html(result);
            $("#Loading").html('');

        },
        error: function (result) {
            alert('erro');

        }
    });

    $('body,html').animate({
        scrollTop: 600
    }, 800);
    return false;
}