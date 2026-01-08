<!-- Modal único para Inativar Usuário -->
<div class="modal fade bd-example-modal-lg" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-light dark:bg-dark">

        <form id="viewUserModal" action="{{ route('user.inactivate') }}" method="POST" novalidate>
            @csrf

            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-primary  d-flex align-items-center gap-2">
                    <i class="bi bi-person-circle text-info fs-5"></i>
                    Informações do Usuário
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="user_id" id="modal-user-id">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex gap-3 mt-3">
                        <i class="bi bi-person text-info fs-5 mt-1"></i>
                        <div class="col-lg-8">
                            <small class="text-info  fs-6">Nome</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-name">{{ $user->name }}</p>
                        </div>
                        <i class="bi bi-check-circle text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Status:</small>
                            <p class="fw-semibold mb-0 text-success fw-bold fs-6" id="modal-user-profile">ATIVO</p>
                        </div>
                    </li>

                    <li class="list-group-item d-flex  gap-3 mt-3">
                        <i class="bi bi-envelope text-info fs-5 mt-1"></i>
                        <div class="col-lg-7">
                            <small class="text-info  fs-6">E-mail</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-email">felipe.silva@bobdev.com.br</p>
                        </div>
                        <i class="bi-person-vcard text-info fs-5 mt-1"></i>
                        <div class="col-lg-5">
                            <small class="text-info  fs-6">CPF</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-profile">035.488.591</p>
                        </div>
                    </li>

                    <li class="list-group-item d-flex gap-3 mt-3">
                        <i class="bi bi-phone text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Telefone Celular</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-phone">(61) 3333-3333</p>
                        </div>
                        <i class="bi-telephone text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Telefone Fixo</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-phone">(61) 99999-9999</p>
                        </div>
                        <i class="bi bi-whatsapp text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Whatsapp</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-phone">(61) 99999-9999</p>
                        </div>
                    </li>
            {{-- 
                    <li class="list-group-item d-flex gap-3 mt-3">
                        <i class="bi bi-geo-alt text-info fs-4 mt-1"></i>
                        <div class="row w-100">
                            <div class="col-md-6 mb-2">
                                <small class="text-info  fs-6">Logradouro</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-street">Rua Exemplo</p>
                            </div>

                            <div class="col-md-2 mb-2">
                                <small class="text-info  fs-6">Número</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-number">123</p>
                            </div>

                            <div class="col-md-4 mb-2">
                                <small class="text-info  fs-6">Complemento</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-complement">Apto 404</p>
                            </div>

                            <div class="col-md-4 mb-2">
                                <small class="text-info  fs-6">Bairro</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-district">Centro</p>
                            </div>

                            <div class="col-md-4 mb-2">
                                <small class="text-info  fs-6">Cidade</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-city">Brasília</p>
                            </div>

                            <div class="col-md-2 mb-2">
                                <small class="text-info  fs-6">UF</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-uf">DF</p>
                            </div>

                            <div class="col-md-2 mb-2">
                                <small class="text-info  fs-6">CEP</small>
                                <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-cep">70000-000</p>
                            </div>
                        </div>
                    </li> --}}

                    <li class="list-group-item d-flex gap-3 mt-3">
                        <i class="bi bi-calendar-check text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Registrado:</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-name">15/07/2025</p>
                        </div>
                        <i class="bi bi-shield-lock text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Perfil</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-profile">Convidado</p>
                        </div>
                        <i class="bi bi-person-badge text-info fs-5 mt-1"></i>
                        <div class="col-lg-3">
                            <small class="text-info  fs-6">Matrícula</small>
                            <p class="fw-semibold mb-0 text-primary fs-6" id="modal-user-profile">USR0001</p>
                        </div>
                    </li>

                </ul>
            </div>


            <div class="modal-footer border-0 pt-0">
            </div>
        </form>


        </div>
    </div>
</div>



<script>
    const viewUserModal = document.getElementById('viewUserModal');   

    viewUserModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;
        const userId = button.getAttribute('data-user-id');

    });

</script>
