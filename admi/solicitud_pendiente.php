<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
?>    
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.1/jquery.inputmask.bundle.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $("#telefone").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", ],
                keepStatic: true
            });

            $("#celular").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", ],
                keepStatic: true
            });

            $("#data").inputmask({
                mask: ["99/99/9999", "99/99/9999", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#cnpj").inputmask({
                mask: ["99.999.999/9999-99", "99.999.999/9999-99", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#cpf").inputmask({
                mask: ["999.999.999-99", "999.999.999-99", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#rg").inputmask({
                mask: ["99.999.999-9", "99.999.999-9", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#agencia").inputmask({
                mask: ["9999-9", "9999-9", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#conta").inputmask({
                mask: ["99.999-9", "99.999-9", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#cep").inputmask({
                mask: ["99999-999", "99999-999", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#certificadoreservista").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", {
                    placeholder: "teste",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#tituloeleitor").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });

            $("#passaporte").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", {
                    placeholder: "",
                    clearMaskOnLostFocus: true
                }],
                keepStatic: true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // pular campos, mais simplificado, dá para usar também, mas o de baixo tá funcionando...
            /*                $('#tabela').on('keyup', 'input', function(event) {
                                if (event.which == 13) {
                                    var generico = $("#tabela").find('input:visible');
                                    var indice = generico.index(event.target) + 1;
                                    var seletor = $(generico[indice]).focus();

                                    if (seletor.length == 0) {
                                        event.target.focus();
                                    }
                                }
                            });*/
            // Método para pular campos teclando ENTER
            $('.pulacampos').on('keypress', function(e) {
                var tecla = (e.keyCode ? e.keyCode : e.which);

                if (tecla == 13) {
                    campo = $('.pulacampos');
                    indice = campo.index(this);

                    if (campo[indice + 1] != null) {
                        proximo = campo[indice + 1];
                        proximo.focus();
                        e.preventDefault(e);
                        return false; // impede o envio do formulario
                    }
                }
            });
            // Método para consultar o CEP
            $('#cep').on('blur', function() {

                if ($.trim($("#cep").val()) != "") {

                    $("#infocep").html('Aguarde, estamos consultando seu CEP ...');
                    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" + $("#cep").val(), function() {

                        if (resultadoCEP["resultado"]) {
                            $("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
                            $("#bairro").val(unescape(resultadoCEP["bairro"]));
                            $("#cidade").val(unescape(resultadoCEP["cidade"]));
                            $("#estado").val(unescape(resultadoCEP["uf"]));
                        }
                        $("#infocep").html('');
                    });
                }
            });
        });
    </script>
    <style>
        .error .error:after {
            color: red;
            font-size: 12px;
            font-family: "Glyphicons Halflings";
            content: "\e080";
        }
    </style>

    <div class="container" style="padding-top: 40px;">
        <div class="col-md-6 col-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">VALIDACAO EM TEMPO REAL COM MASCARAS</div>
                <div class="panel-body">
                    <form action="" method="post" id="form_contato" class="form">

                        <div class="" style="background-color: #f2f2f2; padding: 30px;">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" required minlength="5" class="form-control pulacampos">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" id="telefone" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" name="celular" id="celular" required class="form-control pulacampos"></input>
                            </div>
                        </div>
                        <hr>

                        <div class="" style="background-color: #e7c5ff; padding: 30px;">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <div class="text-success" id="infocep"></div>
                                <input type="text" name="cep" id="cep" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="rua">Rua</label>
                                <input type="text" name="rua" id="rua" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" required class="form-control pulacampos"></input>
                            </div>
                        </div>
                        <hr>

                        <div class="" style="background-color: #c8e9ed; padding: 30px;">
                            <div class="form-group">
                                <br>
                                <label for="usuario">Usuario</label>
                                <input type="text" name="usuario" id="usuario" required class="form-control pulacampos"></input>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" required class="form-control pulacampos"></input>
                            </div>

                            <div class="form-group">
                                <label for="senhaconfirma">Senha Confirma</label>
                                <input type="password" name="senhaconfirma" id="senhaconfirma" required class="form-control pulacampos"></input>
                            </div>
                            <hr>

                            <div class="form-group text-center">
                                <label for="termos">Termos</label>
                                <br>
                                <input type="checkbox" name="termos" id="termos" required class=""> Voce aceita todos os termos neste cadastro?</input>
                            </div>
                            <div class="form-group">
                                <label for="mensagem">Mensagem</label>
                                <textarea type="text" name="mensagem" rows="5" id="mensagem" required class="form-control"></textarea>
                            </div>
                        </div>
                        <hr>

                        <div>
                            <input type="submit" class="btn btn-success btn-block" value="ENVIAR" /> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid",
        });
        $("#form_contato").validate({
            // FAZ A VALIDAÇÃO EM TEMPO REAL"
            onkeyup: function(element) {
                this.element(element);
            },
            onfocusout: function(element) {
                this.element(element);
            },
            rules: {
                nome: {
                    required: true,
                    minlength: 7,
                    maxlength: 25
                },
                email: {
                    required: true,
                    email: true,
                    minlength: 10
                },
                telefone: {
                    required: true,
                    number: true

                },
                celular: {
                    required: true,
                    number: true
                },
                endereco: {
                    required: true,
                    rangelength: [10, 250]
                },
                estado: {
                    required: true,
                    minlength: 2
                },
                cidade: {
                    required: true,
                    minlength: 10
                },
                cep: {
                    required: true,
                    number: true,
                    minlength: 9,
                    maxlength: 9
                },
                usuario: {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
                senha: {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
                senhaconfirma: {
                    required: true,
                    equalTo: "#senha"
                },
                termos: {
                    required: true
                },
                mensagem: {
                    rangelength: [50, 1050],
                }
            },
            messages: {
                nome: {
                    required: "Digite corretamente seu nome ",
                    minlength: "Mínimo de caracteres permitidos 7",
                    maxlength: "Maxímo de caracteres permitidos 25"
                },
                celular: {
                    required: "Digite corretamente seu celular",
                    minlength: "Mínimo de caracteres permitidos 10",
                    maxlength: "Maxímo de caracteres permitidos 11"
                },
                email: {
                    required: "Digite um email válido",
                },
                telefone: {
                    required: "Digite corretamente seu telefone",
                    minlength: "Mínimo de caracteres permitidos 10",
                    maxlength: "Maxímo de caracteres permitidos 11"
                },
                endereco: {
                    required: "Digite corretamente seu endereço",
                    minlength: "Mínimo de caracteres permitidos 10",
                    maxlength: "Maxímo de caracteres permitidos 50"
                },
                cidade: {
                    required: "Digite corretamente sua cidade",
                    minlength: "Mínimo de caracteres permitidos 10",
                    maxlength: "Maxímo de caracteres permitidos 20"
                },
                estado: {
                    required: "Digite corretamente seu estado",
                    minlength: "Mínimo de caracteres permitidos 2",
                    maxlength: "Maxímo de caracteres permitidos 20"
                },
                cep: {
                    required: "Digite corretamente seu cep",
                    minlength: "Mínimo de caracteres permitidos 9",
                    maxlength: "Maxímo de caracteres permitidos 9"
                },
                usuario: {
                    required: "Digite corretamente seu nome de usuário",
                    minlength: "Mínimo de caracteres permitidos 8",
                    maxlength: "Maxímo de caracteres permitidos 20"
                },
                senha: {
                    required: "Digite corretamente sua senha",
                    minlength: "Mínimo de caracteres permitidos 8",
                    maxlength: "Maxímo de caracteres permitidos 20"
                },
                senhaconfirma: {
                    equalTo: "As senhas não conferem, redigite!"
                },
                termos: {
                    required: "Por gentileza, aceite os termos para prosseguir"
                },
                mensagem: {
                    required: "D",
                    minlength: "Mínimo de caracteres permitidos 50",
                    maxlength: "Maxímo de caracteres permitidos 1050"
                },
            }
        });
    </script>
    

<?php
include_once '../plantilla/pie.php';
?>