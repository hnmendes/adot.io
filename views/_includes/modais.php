<!-- Modal cadastro -->
<div id="cadastro" class="modal">
    <div class="modal-content">
        <div class="row">

            <form class="col s12" id="formulario" method="POST" action="/cadastro">

                <div class="row" style="/*bottom:80px;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input  id="nome" name="nome" type="text" class="validate" required>
                        <label for="nome">* Nome completo</label>
                    </div>
                </div>

                <div class="row" style="/*position: relative; /*top: -40px;">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">location_city</i>
                        <select class="dropdown validate" name="estado" id="estado" required>
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
                    
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="municipio" name="municipio" class="validade" required>
                            <label for="municipio">* Munícipio</label>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <input type="email" id="email" name="email" class="validate" required>
                            <label for="email">* E-mail</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock_outline</i>
                            <input type="password" id="senha" name="senha" class="validate" required>
                            <label for="senha">*Senha</label>
                        </div>
                    </div>

                    <div class="row" style="/*top: -5px; position: relative">
                        
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn waves-effect waves-teal" style="margin-right: 300px;" >
                        Cadastrar   <i class="material-icons right">create</i>
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
            <form name="login" class="col s12" method="post" action="/login" onsubmit="//validaLogin();">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="lemail" id="login-email" class="validate" required>
                        <label for="login-email">E-mail</label>
                        <div class="input-field col s12" style="margin-left: 35px; margin-top: -30px;">
                            <p style="color:red;" id="erroLogin"> 
                            
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock_outline</i>
                        <input type="password" name="lsenha" id="login-senha" class="validate" required>
                        <label for="login-senha">Senha</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col s6">
                    <button type="submit" style="margin-right: -100px; margin-bottom: -100;" class=" waves-effect waves-teal btn-flat btn" name="submit" >
                        Login      <i class="material-icons right">chevron_right</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Fim modal login-->

<!-- Validação do Login -->

<script type="text/javascript">

    function validaCadastro(){
        
        var senha = document.formulario.senha.value;
        var senha2 = document.formulario.senha2.value;
        var email = document.formulario.email.value;

        if(email == ''){
            document.formulario.email.focus();
            alert("Digite algo no email");
            return false;
        }else{
            return true;
        }

        if(senha != senha2){
            alert("Senhas não coincidem.");
            return false;
        }else{
            return true;
        }

        

    

    

</script>