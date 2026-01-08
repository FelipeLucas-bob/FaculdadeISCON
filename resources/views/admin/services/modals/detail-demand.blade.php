                                    <div class="modal fade bd-example-modal-lg" id="demandModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content bg-white">
                                                <div class="modal-header">
                                                    <h5 class="task-heading modal-title mb-0">
                                                        Tarefa: <b class="text-primary">#{{ $demand->id }} </b>         
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="compose-box">
                                                        <div class="compose-content">
                                                            <div class="row">
                                                                <div class="col-lg-8">
                                                                    <p class="task-text h6">
                                                                        Registrada: <b class="text-primary">{{ Date("d/m/Y H:i:s", strtotime($demand->created_at)) }}</b>
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <p class="task-text h6 mb-3">
                                                                        Status: 
                                                                        @if ($demand->status == 0)
                                                                            <span class="badge bg-info">Aberta</span>
                                                                        @elseif ($demand->status == 1)
                                                                            <span class="badge bg-warning text-dark">Pendente</span>
                                                                        @elseif ($demand->status == 2)
                                                                            <span class="badge bg-success">Resolvida</span>
                                                                        @else
                                                                            <span class="badge bg-light text-muted">Desconhecido</span>
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>


                                                            <p class="task-text h6">
                                                                Autor: <b class="text-primary">{{ $demand->author_name }}</b>
                                                            </p>
                                                            <p class="task-text h6">
                                                                Demanda: <b class="text-primary">{{ $demand->type_name }}</b>
                                                            </p>
                                                            <p class="task-text h6">
                                                                Observação: <b class="text-primary">{{ $demand->observation }}</b>
                                                            </p><br/>
                                                            
                                                            <p class="task-text h6">
                                                                Responsável: <b class="text-primary">{{ $demand->user_name }}</b>
                                                            </p>
                                                            <p class="task-text h6">
                                                                Atendida: <b class="text-primary">{{ Date("d/m/Y H:i:s", strtotime($demand->updated_at)) }}</b>
                                                            </p><br/>
                                                            <p class="task-text h6">
                                                                Procedimento Realizado:<br/>
                                                                <textarea class="form-control" rows="5" maxlength="255"></textarea>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-light-none mt-2 mb-2 btn-no-effect"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-success">Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>