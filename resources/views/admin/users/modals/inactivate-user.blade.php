<!-- Modal único para Inativar Usuário -->
<div class="modal fade inputForm-modal" id="inactivateUserModal" tabindex="-1" role="dialog"
    aria-labelledby="inactivateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light dark:bg-dark">

            <form id="inactivateUserForm" action="{{ route('user.inactivate') }}" method="POST" novalidate>
                @csrf
                
                <div class="modal-header" id="inactivateUserModalLabel">
                    <h5 class="modal-title" id="modal-user-action-title">
                        Inativar <b class="text-primary">Usuário</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body" id="modal-body">
                    <p class="h5">Tem certeza que deseja inativar o usuário <br/><br/><strong id="modal-user-name" class="fw-bold">...</strong>?</p>
                    <input type="hidden" name="user_id" id="user_id">
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

<script>
const inactivateUserModal = document.getElementById('inactivateUserModal');

inactivateUserModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    const userId = button.getAttribute('data-user-id');
    const userName = button.getAttribute('data-user-name');
    const userAtivo = button.getAttribute('data-user-ativo'); // novo

    // Preenche os campos ocultos e o nome
    document.getElementById('user_id').value =  userId;
    document.getElementById('modal-user-name').textContent = userName;

    // Atualiza o título conforme status do usuário
    const title = document.getElementById('modal-user-action-title');
    const action = userAtivo === '1' ? 'Inativar' : 'Ativar';
    title.innerHTML = `${action} <b class="text-primary">Usuário</b>`;

    // Também pode atualizar a pergunta, se quiser:
    const question = document.querySelector('#modal-body p.h5');
    if (question) {
        question.innerHTML = `Tem certeza que deseja ${action.toLowerCase()} o usuário <br/><br/><strong class="fw-bold">${userName}</strong>?`;
    }
});

</script>
