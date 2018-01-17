<!-- modal ajuda -->
<div class="modal carousel" >
    <div class="carousel carousel-slider center" data-indicators="true" style="max-height: 80%">
        <div class="carousel-fixed-item center">
            <a class="btn waves-effect white grey-text darken-text-2">button</a>
        </div>
        <div class="carousel-item red white-text" href="#one!">
            <h2>First Panel</h2>
            <p class="white-text">This is your first panel</p>
        </div>
        <div class="carousel-item amber white-text" href="#two!">
            <h2>Second Panel</h2>
            <p class="white-text">This is your second panel</p>
        </div>
        <div class="carousel-item green white-text" href="#three!">
            <h2>Third Panel</h2>
            <p class="white-text">This is your third panel</p>
        </div>
        <div class="carousel-item blue white-text" href="#four!">
            <h2>Fourth Panel</h2>
            <p class="white-text">This is your fourth panel</p>
        </div>
    </div>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
</div>

<!-- Fim modal ajuda -->

<!-- Modal cadastro -->
<div id="cadastro" class="modal">
    <div class="modal-content">
        <div class="row">

            <form class="col s12" method="POST" action="controllers\registrar.php">

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input  id="first_name" type="text" class="validate">
                        <label for="first_name">Primeiro nome</label>
                    </div>
                    <div class="input-field col s5">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Último nome</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">location_city</i>
                        <select class="dropdown" name="estados" required>
                            <option value="">Selecione</option>
                            <option value="1">Acre</option>
                            <option value="2">Alagoas</option>
                            <option value="3">Amapá</option>
                            <option value="4">Amazonas</option>
                            <option value="5">Bahia</option>
                            <option value="6">Ceará</option>
                            <option value="7">Distrito Federal</option>
                            <option value="8">Espirito Santo</option>
                            <option value="9">Goiás</option>
                            <option value="10">Maranhão</option>
                            <option value="11">Mato Grosso do Sul</option>
                            <option value="12">Mato Grosso</option>
                            <option value="13">Minas Gerais</option>
                            <option value="14">Pará</option>
                            <option value="15">Paraíba</option>
                            <option value="16">Paraná</option>
                            <option value="17">Pernambuco</option>
                            <option value="18">Piauí</option>
                            <option value="19">Rio de Janeiro</option>
                            <option value="20">Rio Grande do Norte</option>
                            <option value="21">Rio Grande do Sul</option>
                            <option value="22">Rondônia</option>
                            <option value="23">Roraima</option>
                            <option value="24">Santa Catarina</option>
                            <option value="25">São Paulo</option>
                            <option value="26">Sergipe</option>
                            <option value="27">Tocantins</option>
                        </select>
                    </div>

                    <div class="input-field col s6">
                        <input type="text" id="municipio" class="validade">
                        <label for="municipio">Munícipio</label>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input type="email" id="e-mail" class="validate">
                            <label for="e-mail">E-mail</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock_outline</i>
                            <input type="password" id="senha" class="validate">
                            <label for="senha">Senha</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="password" id="senha2" class="validate">
                            <label for="senha2">Confirmar Senha</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="modal-action modal-close waves-effect waves-teal btn-flat" name="send">
                            Cadastrar   <i class="material-icons right">create</i>
                        </button>

                        <button href="#!" class="modal-action modal-close waves-effect waves-teal btn-flat">
                            Cancelar    <i class="material-icons right">cancel</i>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>


</div>

<!-- Fim modal cadastro-->

<!-- Modal login -->

<div id="login" class="modal">
    <div class="modal-content">
        <div class="row">
            <form class="col s12">
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

            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect waves-teal btn-flat">
            Login      <i class="material-icons right">chevron_right</i>
        </button>

        <button type="#!" class="modal-action modal-close waves-effect waves-teal btn-flat">
            Cancelar    <i class="material-icons right">cancel</i>
        </button>
    </div>
</div>

<!-- Fim modal login-->

