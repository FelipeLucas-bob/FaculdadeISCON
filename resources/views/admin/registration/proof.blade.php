@extends('layouts.app')

@section('styles')
    {{-- Style Here --}}
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('plugins/src/table/datatable/datatables.css') }}">
    @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
    @vite(['resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss'])
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Erro!</strong>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary mb-0">Prova </h3>
            </div>
        </div>
        <div class="row layout-spacing">
            <div class="col-lg-12">
                {{-- Visão da Prova com a Primeira Questão --}}
                <div class="card border-primary mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <div><i class="bi bi-info-circle me-2"></i> Informações da Prova</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled ps-2 mb-0">
                            <li class="mb-2" style="font-size: 1rem;">
                                <i class="bi bi-clock-history text-primary me-2"></i>
                                <strong class="text-primary">Duração:</strong> A prova terá 60 minutos. O tempo começou assim que você clicou em "Iniciar Prova".
                            </li>
                            <li class="mb-2" style="font-size: 1rem;">
                                <i class="bi bi-list-ol text-primary me-2"></i>
                                <strong class="text-primary">Quantidade de questões:</strong> Serão 10 questões de múltipla
                                escolha.
                            </li>
                            <li class="mb-2" style="font-size: 1rem;">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                <strong class="text-primary">Respostas:</strong> Leia cada questão com atenção antes de
                                marcar sua resposta. Você só poderá enviar a prova uma vez.
                            </li>
                            <li class="mb-2" style="font-size: 1rem;">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                <strong class="text-primary">Envio automático:</strong> Ao final dos 60 minutos, a prova
                                será enviada automaticamente, mesmo que você não tenha terminado.
                            </li>
                            <li style="font-size: 1rem;">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                <strong class="text-primary">Confirmação:</strong> Após enviar, você verá uma tela de
                                confirmação indicando que sua prova foi registrada com sucesso.
                            </li>
                            <li class="mt-4 text-center h4">
                                <i class="bi bi-clock-history me-1"></i>
                                <strong class="text-primary">TEMPO RESTANTE:</strong>
                                <span id="countdown-timer" style="color: red; font-weight: bold;">60:00</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Processo Seletivo 2026.1 </h5>
                    </div>


                    <div class="card-body">
                        @foreach ($questions->sortBy('id') as $question)
                            <div class="mb-4 question-block" data-question="{{ $question->id }}">
                                <label class="form-label fw-bold">
                                    {{ $question->id }} - {{ $question->statement }}
                                </label>

                                <input type="hidden" class="question-id" value="{{ $question->id }}">
                                <input type="hidden" class="proof-id" value="{{ $proof->id }}">

                                @foreach (['a', 'b', 'c', 'd', 'e'] as $opt)
                                    <div class="form-check">
                                        <input class="form-check-input answer-radio" type="radio"
                                            name="answer_{{ $question->id }}" value="{{ $opt }}"
                                            {{ $question->user_answer === $opt ? 'checked' : '' }}>

                                        <label class="form-check-label">
                                            {{ $question->{'option_' . $opt} }}
                                        </label>
                                    </div>
                                @endforeach

                                <div class="ajax-response mt-2"></div>




                            </div>
                        @endforeach
                        <form action="{{ route('proof.finish', $proof->id) }}" method="POST" style="display: none;"
                            id="finish-proof-form">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-3" id="finish-proof-btn">
                                <i class="bi bi-check2-circle"></i> Finalizar Prova
                            </button>
                        </form>

                        <script>
                            document.getElementById('finish-proof-btn').addEventListener('click', function() {
                                const proofId = '{{ $proof->id }}';

                                fetch("{{ url('/painel/prova') }}/" + proofId + "/finalizar", {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'X-Requested-With': 'XMLHttpRequest'
                                        }
                                    })
                                    .then(res => res.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Prova finalizada com sucesso!');
                                            window.location.reload(); // ou redireciona para resultados
                                        } else {
                                            alert('Erro ao finalizar a prova.');
                                        }
                                    })
                                    .catch(() => alert('Erro ao finalizar a prova.'));
                            });
                        </script>

                    </div>


                    {{-- <div class="card-body">
                            <form method="POST" action="{{ route('registrations.answers') }}" class="ajax-answer-form">
                                @foreach ($questions as $question)
                                @csrf
                                <div class="mb-3 mt-4">
                                    <label class="form-label fw-bold">{{ $question->id }} - {{ $question->statement }}</label>
                                    <div class="mt-3">
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option1-{{ $question->id }}" value="a">
                                            <label class="form-check-label" for="option1-{{ $question->id }}">
                                                {{ $question->option_a }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option2-{{ $question->id }}" value="b">
                                            <label class="form-check-label" for="option2-{{ $question->id }}">
                                                {{ $question->option_b }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option3-{{ $question->id }}" value="c">
                                            <label class="form-check-label" for="option3-{{ $question->id }}">
                                                {{ $question->option_c }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option4-{{ $question->id }}" value="d">
                                            <label class="form-check-label" for="option4-{{ $question->id }}">
                                                {{ $question->option_d }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer" id="option5-{{ $question->id }}" value="e">
                                            <label class="form-check-label" for="option5-{{ $question->id }}">
                                                {{ $question->option_e }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary">Responder</button>
                                <div class="ajax-response mt-2"></div>
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    document.querySelectorAll('.ajax-answer-form').forEach(function(form) {
                                        form.addEventListener('submit', function(e) {
                                            e.preventDefault();
                                            const formData = new FormData(form);
                                            fetch("{{ route('registrations.answers') }}", {
                                                method: 'POST',
                                                headers: {
                                                    'X-Requested-With': 'XMLHttpRequest',
                                                    'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value
                                                },
                                                body: formData
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                let responseDiv = form.querySelector('.ajax-response');
                                                if (data.success) {
                                                    responseDiv.innerHTML = '<div class="alert alert-success">'+data.message+'</div>';
                                                } else {
                                                    responseDiv.innerHTML = '<div class="alert alert-danger">'+(data.message || 'Erro ao enviar resposta')+'</div>';
                                                }
                                            })
                                            .catch(() => {
                                                let responseDiv = form.querySelector('.ajax-response');
                                                responseDiv.innerHTML = '<div class="alert alert-danger">Erro ao enviar resposta</div>';
                                            });
                                        });
                                    });
                                });
                            </script>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
    {{-- <span id="countdown-timer">--:--</span> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Hora de início da prova do backend
            var startTime = new Date("{{ $startTime }}").getTime(); // timestamp de início
            var durationMinutes = {{ $durationMinutes }};
            var endTime = startTime + durationMinutes * 60 * 1000; // timestamp final

            var countdownElement = document.getElementById('countdown-timer');

            var countdownInterval = setInterval(function() {
                var now = new Date().getTime();
                var remaining = endTime - now;

                if (remaining <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.textContent = "00:00";
                    alert("O tempo da prova acabou! A prova será enviada automaticamente.");

                    // aqui você pode chamar o envio via Ajax
                    // submitProva();
                    return;
                }

                var minutes = Math.floor((remaining / 1000) / 60);
                var seconds = Math.floor((remaining / 1000) % 60);

                countdownElement.textContent =
                    String(minutes).padStart(2, '0') + ':' +
                    String(seconds).padStart(2, '0');

            }, 1000);

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const finishForm = document.getElementById('finish-proof-form');

            // Função para verificar se todas as questões estão respondidas
            function checkAllAnswered() {
                const allQuestions = document.querySelectorAll('.question-block');
                for (let block of allQuestions) {
                    if (!block.querySelector('.answer-radio:checked')) return false;
                }
                return true;
            }

            document.querySelectorAll('.answer-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    const block = this.closest('.question-block');

                    const data = {
                        proof_id: block.querySelector('.proof-id').value,
                        question_id: block.querySelector('.question-id').value,
                        answer: this.value
                    };

                    // AJAX para salvar a resposta
                    fetch("{{ route('registrations.answers') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(res => res.json())
                        .then(res => {
                            const responseDiv = block.querySelector('.ajax-response');

                            if (res.success) {
                                responseDiv.innerHTML =
                                    '<div class="text-success small">Resposta salva</div>';
                            } else {
                                responseDiv.innerHTML = '<div class="text-danger small">' + (res
                                    .message || 'Erro') + '</div>';
                            }

                            // Mostra botão Finalizar se todas respostas estiverem preenchidas
                            if (checkAllAnswered()) {
                                finishForm.style.display = 'block';
                            } else {
                                finishForm.style.display = 'none';
                            }
                        })
                        .catch(() => {
                            block.querySelector('.ajax-response').innerHTML =
                                '<div class="text-danger small">Erro ao salvar</div>';
                        });
                });
            });

        });
    </script>




    {{-- Scripts Here --}}
    <script type="module" src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script type="module" src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

    <script type="module">
        function multiCheck(tb_var) {
            tb_var.on("change", ".chk-parent", function() {
                    var e = $(this).closest("table").find("td:first-child .child-chk"),
                        a = $(this).is(":checked");
                    $(e).each(function() {
                        a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this)
                            .prop("checked", !1), $(this).closest("tr").removeClass("active"))
                    })
                }),
                tb_var.on("change", "tbody tr .new-control", function() {
                    $(this).parents("tr").toggleClass("active")
                })
        }

        // var e;
        let c1 = $('#user-list').DataTable({

            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
                "sLengthMenu": "Resultado :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c1);
    </script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function aplicarInputMaskCPF() {
            const cpfField = document.getElementById('cpfCreateUser');
            if (cpfField) {
                Inputmask("999.999.999-99").mask(cpfField);
            }
        }

        aplicarInputMaskCPF(); // Aplica ao carregar

        // Aplica novamente ao abrir o modal (útil se o input for recriado)
        const modal = document.getElementById('createUserModal');
        if (modal) {
            modal.addEventListener('shown.bs.modal', function() {
                aplicarInputMaskCPF();
            });
        }
    });
</script>
