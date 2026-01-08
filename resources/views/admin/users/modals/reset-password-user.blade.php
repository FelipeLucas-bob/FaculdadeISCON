<!-- Modal único para Inativar Usuário -->
<div class="modal fade inputForm-modal" id="resetPasswordUserModal" tabindex="-1" role="dialog"
    aria-labelledby="resetPasswordUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light dark:bg-dark">

            <form id="resetPasswordUserModal" action="{{ route('user.reset.password') }}" method="POST" novalidate>
                @csrf                
                <div class="modal-header" id="resetPasswordUserModalLabel">
                    <h5 class="modal-title-2" id="modal-user-action-title-2">
                        Resetar Senha do <b class="text-primary">Usuário</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <p class="h5">Senha Padrão: <b>Password@2025</b></p>
                    <input type="hidden" name="user_id" id="modal-user-id" value="{{ $user->id }}">
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-danger mt-2 mb-2 btn-no-effect"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </form>

        </div>
    </div>
</div>
