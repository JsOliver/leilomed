function categoria(tipo,page,scroll,bpg,resutblock,keyword,pg1) {
    if(scroll == 1) {
        $("#Loading").html('<h1 style="left: 40%;top: 50%;position: fixed;z-index: 100;">Carregando...</h1>');
    }


    $.ajax({
        type: "POST",
        url: 'ajaxcontroler/'+bpg,

        data: {tipo: tipo,page:page,resutblock:resutblock,keyword:keyword,pg1:pg1},
        success: function (result) {
            $("#"+resutblock+"").html(result);
            $("#Loading").html('');

        },
        error: function (result) {
            alert('erro');

        }
    });

    if(scroll == 1){

        if(tipo == 21 || tipo == 22 || tipo == 23 || tipo == 11){
            $('body,html').animate({
                scrollTop: 200
            }, 100);
        }

        if(tipo == 31)
        {
            $('body,html').animate({
                scrollTop: 200
            }, 800);

        }
        if(tipo == 41)
        {
            $('body,html').animate({
                scrollTop: 200
            }, 800);

        }

        else{

            $('body,html').animate({
                scrollTop: 400
            }, 800);
        }

    }


    return false;
}