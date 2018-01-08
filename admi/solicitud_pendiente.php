<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
?>    

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

<?php
include_once '../plantilla/pie.php';
?>