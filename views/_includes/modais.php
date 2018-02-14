<!-- Modal cadastro -->
<div id="cadastro" class="modal">
    <div class="modal-content">
        <div class="row">

            <form class="col s12" id="formulario" method="POST" action="controllers/cadastro.php" onsubmit="validaCadastro();">

                <div class="row" style="bottom:80px;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input  id="nome" name="nome" type="text" class="validate"  required>
                        <label for="nome">* Nome completo</label>
                    </div>
                </div>

                <div class="row" style="position: relative; top: -40px;">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">location_city</i>
                        <select class="dropdown" name="estados" id="estados" required>
                            <option value="">* Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>

                    <div class="input-field col s6">
                        <input type="text" id="municipio" name="municipio" class="validade">
                        <label for="municipio">* Munícipio</label>
                    </div>

                    <div class="row" >
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input type="email" id="email" name="email" class="validate" required>
                            <label for="email">* E-mail</label>
                        </div>
                    </div>

                    <div class="row" style="top: -5px; position: relative">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock_outline</i>
                            <input type="password" id="senha" name="senha" class="validate" required minlength="8">
                            <label for="senha">* Senha</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="password" id="senha2" name="senha2" class="validate" required minlength="8">
                            <label for="senha2">* Confirmar Senha</label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn waves-effect waves-teal">
                        Cadastrar   <i class="material-icons right">create</i>
                    </button>

                    <button href="#!" class="modal-action modal-close waves-effect waves-teal btn">
                        Cancelar    <i class="material-icons right">cancel</i>
                    </button>
                </div>
            </form>

        </div>

    </div>

</div>

<!-- Fim modal cadastro-->

<!-- ***************************************************************************************************************************** -->

<!-- Modal login -->

<div id="login" class="modal">
    <div class="modal-content">
        <div class="row">
            <form name="login" class="col s12" method="post" action="/logado">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" id="login-email" class="validate">
                        <label for="login-email">E-mail</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input type="password" id="login-senha" class="validate">
                        <label for="login-senha">Senha</label>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect waves-teal btn-flat">
            Login      <i class="material-icons right">chevron_right</i>
        </button>

        <button type="#!" class="modal-action modal-close waves-effect waves-teal btn-flat">
            Cancelar    <i class="material-icons right">cancel</i>
        </button>
        </form>
    </div>
</div>

<!-- Fim modal login-->

