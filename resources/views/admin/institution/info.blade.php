@extends('layouts.app')

@section('styles')
    @vite(['resources/scss/light/assets/elements/alert.scss'])
    @vite(['resources/scss/dark/assets/elements/alert.scss'])
    @vite(['resources/scss/light/assets/components/accordions.scss'])
    @vite(['resources/scss/dark/assets/components/accordions.scss'])
    <style>
        .info-label {
            font-weight: bold;
            color: var(--bs-primary);
            display: block;
        }
        .info-value {
            font-weight: normal;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }
    </style>
@endsection

@section('content')
<div class="row layout-top-spacing">

    <!-- INFORMAÇÕES DA INSTITUIÇÃO -->
    <div class="col-12 mt-5">
        <div class="alert alert-arrow-right alert-icon-right alert-light-primary alert-dismissible fade show d-flex align-items-start"
            role="alert">
            <i class="bi bi-bank me-2 fs-4"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
            <div>
                <strong class="text-primary">Informações da Instituição de Ensino</strong><br>
                Confira os dados institucionais da <b>Faculdade ISCON</b>.
            </div>
        </div>
    </div>

    <div id="accordionInstituicao" class="accordion-icons accordion">

        <!-- MANTENEDORA -->
        <div class="card">
            <div class="card-header" id="headingMantenedora">
                <section class="mb-0 mt-0">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        data-bs-target="#collapseMantenedora" aria-expanded="true" aria-controls="collapseMantenedora">
                        <div class="accordion-icon"><i class="bi bi-building me-2"></i> Mantenedora</div>
                        <div class="icons"><i class="bi bi-chevron-down"></i></div>
                    </div>
                </section>
            </div>
            <div id="collapseMantenedora" class="collapse show" aria-labelledby="headingMantenedora"
                data-bs-parent="#accordionInstituicao">
                <div class="card-body">
                    <span class="info-label">Mantenedora:</span>
                    <span class="info-value">CONVENÇÃO NAC ASS DE DEUS NO BRASIL MINIST MADUREIRA</span>

                    <span class="info-label">CNPJ:</span>
                    <span class="info-value">42.549.220/0001-19</span>

                    <span class="info-label">Natureza Jurídica:</span>
                    <span class="info-value">Associação Privada</span>

                    <span class="info-label">Representante Legal:</span>
                    <span class="info-value">MANOEL FERREIRA (Presidente)</span>
                </div>
            </div>
        </div>

        <!-- IES -->
        <div class="card">
            <div class="card-header" id="headingIES">
                <section class="mb-0 mt-0">
                    <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        data-bs-target="#collapseIES" aria-expanded="false" aria-controls="collapseIES">
                        <div class="accordion-icon"><i class="bi bi-mortarboard-fill me-2"></i> Instituição de Ensino</div>
                        <div class="icons"><i class="bi bi-chevron-down"></i></div>
                    </div>
                </section>
            </div>
            <div id="collapseIES" class="collapse" aria-labelledby="headingIES" data-bs-parent="#accordionInstituicao">
                <div class="card-body">
                    <span class="info-label">Nome da IES - Sigla:</span>
                    <span class="info-value">Instituto Superior da Convenção Nac. das Assembleias de Deus - ISCON</span>

                    <span class="info-label">Situação:</span>
                    <span class="info-value">Ativa</span>

                    <span class="info-label">Endereço:</span>
                    <span class="info-value">Quadra SEPS 710/910, Lt 33,34, Bloco B - Asa Sul, Brasília - DF, CEP 70390-108</span>

                    <span class="info-label">Telefone:</span>
                    <span class="info-value">61 9808-4531 / 61 9229-5001</span>

                    <span class="info-label">Organização Acadêmica:</span>
                    <span class="info-value">Faculdade</span>

                    <span class="info-label">Site:</span>
                    <span class="info-value">iscon.edu.br</span>

                    <span class="info-label">E-mail:</span>
                    <span class="info-value">aabastar13@gmail.com</span>

                    <span class="info-label">Categoria Administrativa:</span>
                    <span class="info-value">Privada sem fins lucrativos</span>

                    <span class="info-label">Comunitária:</span>
                    <span class="info-value">Não</span>

                    <span class="info-label">Confessional:</span>
                    <span class="info-value">Não</span>

                    <span class="info-label">Reitor/Dirigente Principal:</span>
                    <span class="info-value">João Adair Ferreira</span>

                    <span class="info-label">Tipo de Credenciamento:</span>
                    <span class="info-value">Presencial</span>
                </div>
            </div>
        </div>

        <!-- CURSOS -->
        <div class="card">
            <div class="card-header" id="headingCursos">
                <section class="mb-0 mt-0">
                    <div class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        data-bs-target="#collapseCursos" aria-expanded="true" aria-controls="collapseCursos">
                        <div class="accordion-icon"><i class="bi bi-journal-bookmark me-2"></i> Relação de Cursos</div>
                        <div class="icons"><i class="bi bi-chevron-down"></i></div>
                    </div>
                </section>
            </div>
            <div id="collapseCursos" class="collapse" aria-labelledby="headingCursos"
                data-bs-parent="#accordionInstituicao">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0" id="tableCursos">
                            <thead class="table-primary">
                                <tr>
                                    <th>Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cursos = [
                                        ['nome'=>'BIOMEDICINA','codigo'=>'1337909','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'DIREITO','codigo'=>'1441639','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'EDUCAÇÃO FÍSICA','codigo'=>'1571384','modalidade'=>'Presencial','grau'=>'Licenciatura','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'ENFERMAGEM','codigo'=>'1442048','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'5','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'ESTÉTICA E COSMÉTICA','codigo'=>'1475318','modalidade'=>'Presencial','grau'=>'Tecnológo','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'-','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'FISIOTERAPIA','codigo'=>'1454973','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'FONOAUDIOLOGIA','codigo'=>'1682192','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'GESTÃO DE RECURSOS HUMANOS','codigo'=>'1475319','modalidade'=>'Presencial','grau'=>'Tecnológo','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'GESTÃO HOSPITALAR','codigo'=>'1337910','modalidade'=>'Presencial','grau'=>'Tecnológo','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'4','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'PSICOLOGIA','codigo'=>'1441640','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'5','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'PSICOPEDAGOGIA','codigo'=>'1441641','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'-','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'RADIOLOGIA','codigo'=>'1337908','modalidade'=>'Presencial','grau'=>'Tecnológo','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'5','idd'=>'-','situacao'=>'Ativo'],
                                        ['nome'=>'TEOLOGIA','codigo'=>'1337911','modalidade'=>'Presencial','grau'=>'Bacharelado','uf'=>'DF','municipio'=>'Brasília','enade'=>'-','cpc'=>'-','cc'=>'3','idd'=>'-','situacao'=>'Ativo'],
                                    ];
                                @endphp

                                @foreach($cursos as $index => $curso)
                                    <tr class="curso-row" data-target="#detalhesCurso{{ $index }}" style="cursor: pointer;">
                                        <td class="text-primary fw-bold">{{ $curso['nome'] }}</td>
                                    </tr>

                                    <tr class="collapse" id="detalhesCurso{{ $index }}">
                                        <td colspan="1">
                                            <div class="card card-body p-2">
                                                <table class="table table-sm table-bordered mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Código</th>
                                                            <th>Modalidade</th>
                                                            <th>Grau</th>
                                                            <th>UF</th>
                                                            <th>Município</th>
                                                            <th>ENADE</th>
                                                            <th>CPC</th>
                                                            <th>CC</th>
                                                            <th>IDD</th>
                                                            <th>Situação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $curso['codigo'] }}</td>
                                                            <td>{{ $curso['modalidade'] }}</td>
                                                            <td>{{ $curso['grau'] }}</td>
                                                            <td>{{ $curso['uf'] }}</td>
                                                            <td>{{ $curso['municipio'] }}</td>
                                                            <td>{{ $curso['enade'] }}</td>
                                                            <td>{{ $curso['cpc'] }}</td>
                                                            <td>{{ $curso['cc'] }}</td>
                                                            <td>{{ $curso['idd'] }}</td>
                                                            <td>{{ $curso['situacao'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

{{-- Script para abrir o collapse ao clicar na linha inteira --}}
<script>
    document.querySelectorAll('.curso-row').forEach(row => {
        row.addEventListener('click', () => {
            const targetId = row.getAttribute('data-target');
            const collapseEl = document.querySelector(targetId);
            const bsCollapse = new bootstrap.Collapse(collapseEl, {
                toggle: true
            });
        });
    });
</script>


    </div>

</div>
@endsection
