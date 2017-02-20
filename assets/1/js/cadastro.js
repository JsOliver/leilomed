$(document).ready(function(){
    $('#cadastro_form').validate({
        rules: {
            nome: { required: true, minlength: 2 },
            termos: { required: true},
            emailcad: { required: true, email: true },
            passcad: { required: true,  minlength: 4 },
            telefone: { required: true,  minlength: 10 }
        },
        messages: {
            nome: { required: 'Preencha o campo nome', minlength: 'No mínimo 2 letras' },
            emailcad: { required: 'Informe o seu email', email: 'Ops, informe um email válido' },
            passcad: { required: 'Informe sua senha', email: 'No mínimo 4 caracteres' },
            telefone: { required: 'Informe seu telefone', email: 'Telefone inválido' },
            termos: { required: 'Aceite os termos para continuar'}

        },
        submitHandler: function( form ){
            var dados = $( form ).serialize();

            $.ajax({
                type: "POST",
                url: "ajaxcontroler/ajaxCadastro",
                data: dados,
                success: function( data )
                {
                    if(data == 11){
                        window.location.reload();

                    }else{

                        $("#errorcad").html(data);
                    }
                }
            });

            return false;
        }
    });
});