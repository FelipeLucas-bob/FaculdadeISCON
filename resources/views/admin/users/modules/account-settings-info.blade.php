                <div class="tab-pane fade {{ $menu == 'usuario' ? 'show active' : '' }}" id="animated-underline-home" role="tabpanel"
                    aria-labelledby="animated-underline-home-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Usuário</h6>
                                    <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert" id="alert-info">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        Preencha ao menos um dos contatos!
                                    </div>       
     
                                    <div class="simple-tab">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab-icon" data-bs-toggle="tab" data-bs-target="#home-tab-icon-pane" type="button" role="tab" aria-controls="home-tab-icon-pane" aria-selected="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-3-3.87"></path><path d="M4 21v-2a4 4 0 0 1 3-3.87"></path><circle cx="12" cy="7" r="4"></circle></svg> Atualizar Usuário
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab-icon" data-bs-toggle="tab" data-bs-target="#profile-tab-icon-pane" type="button" role="tab" aria-controls="profile-tab-icon-pane" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                    Historico de Alterações do Usuário
                                                </button>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active mt-5" id="home-tab-icon-pane" role="tabpanel" aria-labelledby="home-tab-icon" tabindex="0">
                                                <form class="" action="{{ route('user.update', $user->id) }}" method="POST" id="form-info">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" class="form-control text-black" name="user_id" id="id_user" value="{{ $user->id }}">
                                                        <div class="row mt-4">
                                                            <div class="col-md-7">
                                                                <label class="form-label text-primary fw-bold">Nome</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-person-fill text-info fs-5 mt-1"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control text-black" name="name" id="name" placeholder="Nome Completo..." value="{{ $user->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label text-primary fw-bold">Matrícula</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-person-badge-fill text-info"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control text-black fw-bold" id="registration" value="{{ $user->registration->registration  ?? '-'}}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">      
                                                            <div class="col-md-7">
                                                                <label class="form-label text-primary fw-bold">Email</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-envelope-fill text-info fs-5 mt-1"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control text-black" name="email" id="email" placeholder="usuario@email.com" value="{{ $user->email }}">
                                                                </div>
                                                            </div>   
                                                            <div class="col-md-3">
                                                                <label class="form-label text-primary fw-bold">CPF</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-person-vcard-fill text-info"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control text-black" name="cpf" id="cpf" placeholder="000.000.000-00" value="{{ $user->cpf }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                                            <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect"
                                                                data-bs-dismiss="modal">Limpar</button>
                                                            <button type="submit" class="btn btn-success mt-3">Salvar</button>
                                                        </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade  mt-5" id="profile-tab-icon-pane" role="tabpanel" aria-labelledby="profile-tab-icon" tabindex="0">
                                                <div class="table-responsive mt-3">
                                                    @if($user_info && $user_info->count() > 0)
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Registro</th>
                                                                    <th>Autor</th>
                                                                    <th>Nome</th>
                                                                    <th>Email</th>
                                                                    <th>CPF</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($user_info as $info)
                                                                    <tr>
                                                                        <td>{{ $info->created_at->format('d/m/Y H:i:s') }}</td>                
                                                                        <td>{{ $info->author_name ?? '-' }}</td>
                                                                        <td>{{ $info->name ?? '-' }}</td>
                                                                        <td>{{ $info->email ?? '-' }}</td>
                                                                        <td>{{ $info->cpf ?? '-' }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="alert alert-info d-flex align-items-center fw-bold" role="alert" id="alert-contact">
                                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                                            Nenhum registro de alteração do Usuário encontrado.
                                                        </div> 
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form-info');
    const btnUpdate = document.getElementById('btn-update-info');
    const alertContact = document.getElementById('alert-info');

    btnUpdate.addEventListener('click', function(e) {
        const telephone = document.getElementById('telephone').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const whatsapp = document.getElementById('whatsapp').value.trim();

        if (!telephone && !phone && !whatsapp) {
            e.preventDefault();
            alertContact.classList.remove('d-none');
            setTimeout(function() {
                alertContact.classList.add('d-none');
            }, 5000);
        } else {
            alertContact.classList.add('d-none');
        }
    });
});
</script>
