<?php $this->load->view('clients/fixed_files/header'); ?>
<br>
<br>
<section class="log-reg container">
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-home"></i></a></li>
            <li class="active" style="color: #940f14;font-weight: 600;">Entrar / Cadastrar</li>
        </ul>
    </div>
    <div class="row">
        <!--Login-->
        <div class="col-lg-5 col-md-5 col-sm-5">
            <h4>Entrar na Minha Conta</h4>
            <form method="post" class="login-form" novalidate="novalidate">
                <div class="form-group group">
                    <label for="log-email2">E-mail</label>
                    <input style="padding: 5%;" type="email" class="form-control" name="log-email2" id="log-email2"
                           placeholder="Digite seu E-mail" required="">
                    <a class="help-link" href="#">Esqueceu seu E-mail?</a>
                </div>
                <div class="form-group group">
                    <label for="log-password2">Senha</label>
                    <input style="padding: 5%;" type="text" class="form-control" name="log-password2" id="log-password2"
                           placeholder="Digite sua Senha" required="">
                    <a class="help-link" href="#">Esqueceu sua Senha?</a>
                </div>
                <input class="btn btn-success" type="submit" value="Login">
            </form>
        </div>
        <!--Registration-->
        <div class="col-lg-7 col-md-7 col-sm-7">
            <h4 style="padding: 0 0 0 14.5%;">Cadastre-se</h4>
            <form method="post" action="http://127.0.0.1:8080/projects/petri/CadastroForm" class="registr-form"
                  id="registr-form" novalidate="novalidate">
                <div class="form-group group">
                    <label for="rf-email">Nome Completo</label>
                    <input style="padding: 4%;" type="text" class="form-control" name="nome" id="rf-nome"
                           placeholder="Informe seu Nome Completo"
                           required="">
                </div>
                <div class="form-group group">
                    <label for="rf-email">Email</label>
                    <input style="padding: 4%;" type="email" class="form-control" name="email" id="rf-email"
                           placeholder="Informe seu E-mail"
                           required="">
                </div>

                <div class="form-group group">
                    <label for="rf-email">Telefone</label>
                    <input style="padding: 4%;" type="tel" class="form-control" name="sobrenome" id="rf-lastname"
                           placeholder="(00) 0000-0000" required="">
                </div>
                <div class="form-group group">
                    <label for="rf-password">Senha</label>
                    <input style="padding: 4%;" type="password" class="form-control" name="senha" id="rf-password"
                           placeholder="*********" required="">
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="terms">

                        Concordo com os <a href="#">Termos e condições</a>.</label><br>
                    <b></b>
                </div>
                <input class="btn btn-success" type="submit" value="Register">


            </form>
        </div>
    </div>
</section>
<?php $this->load->view('clients/fixed_files/footer'); ?>
