<!-- Modal único para Inativar Usuário -->
<div class="modal fade inputForm-modal" id="updateProfileUserModal" tabindex="-1" role="dialog"
    aria-labelledby="updateProfileUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light dark:bg-dark">

            <form id="updateProfileUserModal" action="{{ route('user.profile.update') }}" method="POST" novalidate>
                @csrf
                
                <div class="modal-header" id="updateProfileUserModalLabel">
                    <h5 class="modal-title-1" id="modal-user-action-title-1">
                        Alterar Perfil do <b class="text-primary">Usuário</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="user_id" id="modal-user-id">
                    <select id="profileSelect" name="profile_id" class="form-select">
                        <option value="">Selecione</option>
                    </select>
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
