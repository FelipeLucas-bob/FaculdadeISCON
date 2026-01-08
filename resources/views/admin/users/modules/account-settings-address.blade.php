                <div class="tab-pane fade {{ $menu == 'endereco' ? 'show active' : '' }}" id="animated-underline-address" role="tabpanel"
                    aria-labelledby="animated-underline-address-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="section general-info payment-info">
                                <div class="info">
                                    <h6 class="">Contatos</h6>
                                    <div class="alert alert-warning d-flex align-items-center fw-bold d-none" role="alert" id="alert-address">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        Preencha o CEP!
                                    </div>       
     
                                    <div class="simple-tab">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab-icon" data-bs-toggle="tab" data-bs-target="#home-tab-icon-pane3" type="button" role="tab" aria-controls="home-tab-icon-pane" aria-selected="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7"></path><path d="M9 22V12H15V22"></path></svg> 
                                                    Atualizar Endereço
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab-icon" data-bs-toggle="tab" data-bs-target="#profile-tab-icon-pane3" type="button" role="tab" aria-controls="profile-tab-icon-pane" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                    Historico de Alterações de Endereço
                                                </button>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active mt-5" id="home-tab-icon-pane3" role="tabpanel" aria-labelledby="home-tab-icon" tabindex="1">
                                                <form class="" action="{{ route('user.edit.address', $user->id) }}" method="POST" id="form-address">
                                                    @csrf
                                                        <input type="hidden" class="form-control text-black" name="user_id" id="id_user" value="{{ $user->id }}">
                                                        <div class="row mt-4">
                                                            <!-- CEP -->
                                                            <div class="col-md-3">
                                                                <label class="form-label text-primary fw-bold">CEP</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-mailbox2 text-info fs-5 mt-1"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control text-black" name="cep" id="cep" placeholder="00.000-000">
                                                                </div>
                                                            </div>

                                                            <!-- Logradouro -->
                                                            <div class="col-md-9">
                                                                <div class="mb-3">
                                                                    <label class="form-label text-primary fw-bold">Logradouro</label>
                                                                    <input type="text" name="logradouro" class="form-control  text-black" id="logradouro" disabled>
                                                                    <input type="hidden" name="public_place" class="form-control  text-black" id="public_place">
                                                                </div>
                                                            </div>

                                                            <!-- Cidade -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label text-primary fw-bold">Cidade</label>
                                                                    <input type="text" name="localidade" class="form-control  text-black" id="localidade" disabled>
                                                                    <input type="hidden" name="city" class="form-control  text-black" id="city">
                                                                </div>
                                                            </div>

                                                            <!-- Bairro -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label text-primary fw-bold">Bairro</label>
                                                                    <input type="text" name="bairro" class="form-control  text-black" id="bairro" disabled>
                                                                    <input type="hidden" name="district" class="form-control  text-black" id="district">
                                                                </div>
                                                            </div>
                                                            <!-- Complemento -->
                                                            <div class="col-md-6">
                                                                <label class="form-label text-primary fw-bold">Complemento</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-house-fill text-info fs-5 mt-1"></i>
                                                                    </span>
                                                                    <input type="text" name="complemento" class="form-control text-black" id="complemento" maxlength="45" placeholder="Casa, Apto, Lote ...">
                                                                </div>
                                                            </div>

                                                            <!-- Número -->
                                                            <div class="col-md-3">
                                                                <label class="form-label text-primary fw-bold">Número</label>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text">
                                                                        <i class="bi bi-0-circle-fill text-info fs-5 mt-1"></i>
                                                                    </span>
                                                                    <input type="text" name="numero" class="form-control text-black" id="numero" maxlength="10" placeholder="0000">
                                                                </div>
                                                            </div>

                                                            <!-- Estado -->
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label text-primary fw-bold">Estado (UF)</label>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">
                                                                            <i class="bi bi-geo-alt-fill text-info fs-5 mt-1"></i>
                                                                        </span>
                                                                        <input type="hidden" name="uf" class="form-control  text-black" id="uf2">
                                                                        <select id="uf" class="form-select text-black" disabled>
                                                                            <option value="" selected disabled>Selecione o estado...</option>
                                                                            <option value="AC">Acre</option>
                                                                            <option value="AL">Alagoas</option>
                                                                            <option value="AP">Amapá</option>
                                                                            <option value="AM">Amazonas</option>
                                                                            <option value="BA">Bahia</option>
                                                                            <option value="CE">Ceará</option>
                                                                            <option value="DF">Distrito Federal</option>
                                                                            <option value="ES">Espírito Santo</option>
                                                                            <option value="GO">Goiás</option>
                                                                            <option value="MA">Maranhão</option>
                                                                            <option value="MT">Mato Grosso</option>
                                                                            <option value="MS">Mato Grosso do Sul</option>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top d-flex justify-content-center mt-5">
                                                            <button type="reset" class="btn btn-light-none mt-3 me-2 btn-no-effect"
                                                                data-bs-dismiss="modal">Limpar</button>
                                                            <button type="submit" class="btn btn-success mt-3" id="btn-update-address">Salvar</button>
                                                        </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade  mt-5" id="profile-tab-icon-pane3" role="tabpanel" aria-labelledby="profile-tab-icon" tabindex="1">
                                                <div class="table-responsive mt-3">
                                                    @if($user_address && $user_address->count() > 0)
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Registro</th>
                                                                <th>Autor</th>
                                                                <th>CEP</th>
                                                                <th>Logradouro</th>
                                                                <th>Complemento</th>
                                                                <th>Número</th>
                                                                <th>Cidade</th>
                                                                <th>Bairro</th>
                                                                <th>Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($user_address as $address)
                                                                <tr>
                                                                    <td>{{ $address->created_at->format('d/m/Y H:i:s') }}</td>                
                                                                    <td>{{ $address->author_name ?? '-' }}</td>
                                                                    <td>{{ $address->zip_code ?? '-' }}</td>
                                                                    <td>{{ $address->public_place ?? '-' }}</td>
                                                                    <td>{{ $address->complement ?? '-' }}</td>
                                                                    <td>{{ $address->number ?? '-' }}</td>
                                                                    <td>{{ $address->city ?? '-' }}</td>
                                                                    <td>{{ $address->district ?? '-' }}</td>
                                                                    <td>{{ $address->uf ?? '-' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @else
                                                        <div class="alert alert-info d-flex align-items-center fw-bold" role="alert" id="alert-contact">
                                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                                            Nenhum registro de Endereço encontrado.
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
    const form = document.getElementById('form-address');
    const btnUpdate = document.getElementById('btn-update-address');
    const alertContact = document.getElementById('alert-address');

    btnUpdate.addEventListener('click', function(e) {
        const cep = document.getElementById('cep').value.trim();

        if (!cep) {
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
