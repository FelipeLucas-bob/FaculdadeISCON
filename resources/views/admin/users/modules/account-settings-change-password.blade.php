<div class="tab-pane fade {{ $menu == 'alterar-senha' ? 'show active' : '' }}" id="animated-underline-password" role="tabpanel" aria-labelledby="animated-underline-password-tab">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            <form class="section general-info" action="{{ route('user.updateSenha', $user->id) }}" method="POST" id="form-alterar-propria-senha">
                @csrf
                @method('PUT')
                <div class="info">
                    <h6 class="">Alterar Senha</h6>
                    <div class="row">
                        <div class="col-xl-10 col-md-12 mt-md-0 mt-4">
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="old-password">Senha Atual</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <i class="bi bi-pass-fill text-info fs-5 mt-1"></i>
                                                </span>
                                                <input type="password" class="form-control" id="old-password" name="old-password" placeholder="********" maxlength="20" value="{{!empty($fieldValueList['old-password']) ? $fieldValueList['old-password'] : ''}}">
                                            </div>
                                                <div class="mb-4 text-danger {{empty($fieldErrorList['old-password']) ? 'hide-default' : ''}}" id="error-old-password">
                                                    {{empty($fieldErrorList['old-password']) ? '' :implode(', ', $fieldErrorList['old-password'])}}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="new-password">Senha Nova</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <i class="bi bi-pass-fill text-info fs-5 mt-1"></i>
                                                </span>
                                                <input type="password" class="form-control" id="new-password" name="new-password" placeholder="********" maxlength="20" value="{{!empty($fieldValueList['new-password']) ? $fieldValueList['new-password'] : ''}}">
                                            </div>
                                                <div class="mb-4 text-danger {{empty($fieldErrorList['new-password']) ? 'hide-default' : ''}}" id="error-new-password">
                                                    {{empty($fieldErrorList['new-password']) ? '' : implode(', ', $fieldErrorList['new-password'])}}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Senha</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">
                                                    <i class="bi bi-pass-fill text-info fs-5 mt-1"></i>
                                                </span>
                                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="********" maxlength="20" value="{{!empty($fieldValueList['confirm-password']) ? $fieldValueList['confirm-password'] : ''}}">
                                            </div>
                                                <div class="mb-4 text-danger {{empty($fieldErrorList['confirm-password']) ? 'hide-default' : ''}}" id="error-confirm-password">
                                                    {{empty($fieldErrorList['confirm-password']) ? '' : implode(', ', $fieldErrorList['confirm-password'])}}
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                            <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect"
                                data-bs-dismiss="modal">Limpar</button>
                            <button type="submit" class="btn btn-success mt-3">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
class FormAlterarPropriaSenha {
    constructor() {
        this.fieldList = {}
        this.fieldList.senhaAtual = document.querySelector('[name="old-password"]')
        this.fieldList.senhaNova = document.querySelector('[name="new-password"]')
        this.fieldList.senhaConfirmacao = document.querySelector('[name="confirm-password"]')

        this.errorLabelList = {}
        this.errorLabelList.senhaAtual = document.querySelector('#error-old-password')
        this.errorLabelList.senhaNova = document.querySelector('#error-new-password')
        this.errorLabelList.senhaConfirmacao = document.querySelector('#error-confirm-password')

        this.erroList = {}
        this.erroList.senhaAtual = []
        this.erroList.senhaNova = []
        this.erroList.senhaConfirmacao = []

        this.form = document.querySelector('#form-alterar-propria-senha')
    }
    interrompoer(e) { e.preventDefault() }
    resumir() { this.form.submit() }
    reiniciarErros() {
        this.erroList = {}
        this.erroList.senhaAtual = []
        this.erroList.senhaNova = []
        this.erroList.senhaConfirmacao = []
    }
    possuiErros(){
        if(this.erroList.senhaAtual.length > 0) {
            return true
        }
        if(this.erroList.senhaNova.length > 0) {
            return true
        }
        if(this.erroList.senhaConfirmacao.length > 0) {
            return true
        }
        return false
    }
    exibirErros(){
        for (const i in this.errorLabelList) {
            const errorLabel = this.errorLabelList[i]
            errorLabel.innerHTML = ''
            errorLabel.classList.add('hide-default')
        }
        for (const i in this.erroList) {
            const erroList = this.erroList[i];
            if (erroList.length > 0) {
                this.errorLabelList[i].innerHTML = erroList[0]
                this.errorLabelList[i].classList.remove('hide-default')
            }
        }
    }
    _validarCampoSenha(campoIndex, nomeCampo){
        const senha = this.fieldList[campoIndex].value
        if (!senha) {
            this.erroList[campoIndex]
                .push(`${nomeCampo} deve ser preenchida`)
        }
        if (senha.length < 8) {
            this.erroList[campoIndex]
                .push(`${nomeCampo} deve conter 8 caracteres ou mais`)
        }
        if (senha.length > 20) {
            this.erroList[campoIndex]
                .push(`${nomeCampo} deve conter 20 caracteres ou menos`)
        }
        if (!/[A-Z]/.test(senha)) {
            this.erroList[campoIndex]
                .push("A senha deve conter pelo menos uma letra maiúscula.");
        }
        if (!/[a-z]/.test(senha)) {
            this.erroList[campoIndex]
                .push("A senha deve conter pelo menos uma letra minúscula.");
        }
        if (!/[0-9]/.test(senha)) {
            this.erroList[campoIndex]
                .push("A senha deve conter pelo menos um número.");
        }
        if (!/[@#$%&*!]/.test(senha)) {
            this.erroList[campoIndex]
                .push("A senha deve conter pelo menos um caractere especial (@#$%&*!).");
        }
    }

    validacarCamposCriterioSenha(){
        this._validarCampoSenha('senhaAtual', 'Senha Atual')
        this._validarCampoSenha('senhaNova', 'Senha Nova')
        this._validarCampoSenha('senhaConfirmacao', 'Confirmar Senha')
    }

    validarCamposNovaSenhaConfirmaSenha() {
        if (this.fieldList.senhaNova.value != this.fieldList.senhaConfirmacao.value) {
            this.erroList.senhaNova
                .push('Senha Nova deve ser igual à Confirmar Senha')
            this.erroList.senhaConfirmacao
                .push('Confirmar Senha deve ser igual à Senha Nova')
        }
    }

    validarCamposSenhaAntigaSenhaNova() {
        if (this.fieldList.senhaAtual.value == this.fieldList.senhaNova.value) {
            this.erroList.senhaAtual
                .push('Senha Atual deve ser diferente da Senha Nova')
            this.erroList.senhaNova
                .push('Senha Nova deve ser diferente da Senha Atual')
        }
    }
}

setTimeout(() => {
    const form = new FormAlterarPropriaSenha()

    function validar() {
        form.reiniciarErros()
        form.validacarCamposCriterioSenha()
        form.validarCamposSenhaAntigaSenhaNova()
        form.validarCamposNovaSenhaConfirmaSenha()

        form.exibirErros()
        if (form.possuiErros()) {
            return false
        }

        return true
    }
    form.form
        .addEventListener('submit', function (e) {
            form.interrompoer(e)
            const validacaoOk = validar(e)
            if (validacaoOk) {
                form.resumir()
            }
        })
    for (const i in form.fieldList) {
        const field = form.fieldList[i];
        field.addEventListener('input', function() {
            const validacaoOk = validar()
        })
    }
}, 0);
</script>
