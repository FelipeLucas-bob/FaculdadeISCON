
                <div class="tab-pane fade {{ $menu == 'administrador' ? 'show active' : '' }}" id="animated-underline-admin" role="tabpanel" aria-labelledby="animated-underline-admin-tab">
                    <div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle me-2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12" y2="16"></line>
                            </svg>
                            <strong>Atenção!</strong> Por favor, prossiga com cuidado. Para qualquer assistência, <a href="#">contate-nos</a>.
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Alterar Perfil do Usuário</h6>                                    
                                    <p class="text-info">Usuário possui o perfil <strong>PERFIL</strong>.</p>
                                    <div class="modal-footer form-group mt-4">
                                        <button class="btn btn-info btn-delete-account"
                                            data-user-ativo="{{ $user->active }}"
                                            data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}"
                                            data-bs-toggle="modal"
                                            {{-- data-bs-target="#updateProfileUserModal" --}}
                                            onclick="updateProfileUser({{ $user->id }})">
                                            Alterar Perfil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Resetar Senha do Usuário</h6>
                                    <p class="text-info">Usuário está com senha <strong>Desbloqueada</strong>.</p>
                                    <div class="modal-footer form-group mt-4">
                                        <button class="btn btn-info btn-delete-account"
                                            data-user-ativo="{{ $user->active }}"
                                            data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#resetPasswordUserModal">
                                            Resetar Senha
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info">
                                <div class="info">
                                    <h6 class="">Status da Conta do Usuário</h6>
                                    @if ($user->active)
                                        <p class="text-success">Usuário está <strong>ativo</strong> e possui acesso ao sistema.</p>
                                    @else
                                        <p class="text-danger">Usuário está <strong>inativo</strong> e <strong>não terá acesso</strong> até ser reativado.</p>
                                    @endif
                                    <div class="modal-footer form-group mt-4">
                                        @if($user->active)
                                            <button class="btn btn-danger btn-delete-account"
                                                data-user-ativo="{{ $user->active }}"
                                                data-user-id="{{ $user->id }}"
                                                data-user-name="{{ $user->name }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#inactivateUserModal">
                                                Inativar Conta
                                            </button>
                                        @else
                                            <button class="btn btn-success btn-delete-account"
                                                data-user-ativo="{{ $user->active }}"
                                                data-user-id="{{ $user->id }}"
                                                data-user-name="{{ $user->name }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#inactivateUserModal">
                                                Ativar Conta
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script>
    function updateProfileUser(userId) {
        $.ajax({
            url: "{{ route('user.profile.select', ':id') }}".replace(':id', userId),
            method: 'GET',
            dataType: 'json',
            headers: {
                'Accept': 'application/json'
            },
            success: function(response) {
                let select = $('#updateProfileUserModal').find('#profileSelect');
                select.empty();
                select.append('<option value="" selected disabled>Selecione...</option>');
                $("#modal-user-id").val(userId);
                response.forEach(function(profile) {
                    select.append('<option value="' + profile.id + '">' + profile.name + '</option>');
                });

                // Abre o modal após preencher
                $('#updateProfileUserModal').modal('show');
            },
            error: function(xhr) {
                console.error('Erro ao buscar os perfis:', xhr.responseText);
            }
        });
    }
</script>
