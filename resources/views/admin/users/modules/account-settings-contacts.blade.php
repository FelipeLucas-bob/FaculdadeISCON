                <div class="tab-pane fade {{ $menu == 'contatos' ? 'show active' : '' }}" id="animated-underline-contact" role="tabpanel"
                    aria-labelledby="animated-underline-contact-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Contatos</h6>
                                    <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert" id="alert-contact">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        Preencha ao menos um dos contatos!
                                    </div>       
     
                                    <div class="simple-tab">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab-icon" data-bs-toggle="tab" data-bs-target="#home-tab-icon-pane2" type="button" role="tab" aria-controls="home-tab-icon-pane" aria-selected="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92V19a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 3 5.18 2 2 0 0 1 5 3h2.09a2 2 0 0 1 2 1.72c.13 1.06.37 2.09.72 3.08a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.99.35 2.02.59 3.08.72a2 2 0 0 1 1.72 2z"></path></svg>
                                                    Atualizar Contatos
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab-icon" data-bs-toggle="tab" data-bs-target="#profile-tab-icon-pane2" type="button" role="tab" aria-controls="profile-tab-icon-pane" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                    Historico de Alterações de Contatos
                                                </button>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active mt-5" id="home-tab-icon-pane2" role="tabpanel" aria-labelledby="home-tab-icon" tabindex="0">
                                                <form class="" action="{{ route('user.edit.contacts', $user->id) }}" method="POST" id="form-contatcs">
                                                    @csrf
                                                    <input type="hidden" class="form-control text-black" name="user_id" id="id_user" value="{{ $user->id }}">
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <label class="form-label text-primary fw-bold">Telefone Fixo</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-telephone-fill text-info fs-5 mt-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control text-black" name="telephone" id="telephone" placeholder="(00) 00000-0000" minlength="14" maxlength="14">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label text-primary fw-bold">Telefone Celular</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-phone-fill text-info fs-5 mt-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control text-black" name="phone" id="phone" placeholder="(00) 00000-0000" minlength="14" maxlength="14">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label text-primary fw-bold">Whatsapp</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-whatsapp text-success fs-5 mt-1"></i>
                                                                </span>
                                                                <input type="text" class="form-control text-black" name="whatsapp" id="whatsapp" placeholder="(00) 00000-0000" minlength="14" maxlength="14">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                                        <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect"
                                                            data-bs-dismiss="modal">Limpar</button>
                                                        <button type="submit" class="btn btn-success mt-3" id="btn-update-contacts">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade  mt-5" id="profile-tab-icon-pane2" role="tabpanel" aria-labelledby="profile-tab-icon" tabindex="0">
                                                <div class="table-responsive mt-3">
                                                    @if($user_contacts && $user_contacts->count() > 0)
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Registro</th>
                                                                    <th>Autor</th>
                                                                    <th>Telefone Fixo</th>
                                                                    <th>Telefone Celular</th>
                                                                    <th>Whatsapp</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($user_contacts as $contacts)
                                                                    <tr>
                                                                        <td>{{ $contacts->created_at->format('d/m/Y H:i:s') }}</td>                
                                                                        <td>{{ $contacts->author_name ?? '-' }}</td>
                                                                        <td>{{ $contacts->telephone ?? '-' }}</td>
                                                                        <td>{{ $contacts->phone ?? '-' }}</td>
                                                                        <td>{{ $contacts->whatsapp ?? '-' }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="alert alert-info d-flex align-items-center fw-bold" role="alert" id="alert-contact">
                                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                                            Nenhum registro de Contato encontrado.
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
    const form = document.getElementById('form-contatcs');
    const btnUpdate = document.getElementById('btn-update-contacts');
    const alertContact = document.getElementById('alert-contact');

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
