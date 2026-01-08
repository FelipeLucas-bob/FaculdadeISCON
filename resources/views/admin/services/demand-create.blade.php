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

    @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
    @vite(['resources/scss/light/assets/apps/todolist.scss'])
    {{-- @vite(['resources/scss/light/assets/components/modal.scss']) --}}

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
            <h3 class="fw-bold text-primary mb-0">Demandas</h3>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="mail-box-container">
                <div class="mail-overlay"></div>

                <div class="tab-title">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                            <h5 class="app-title">Lista de Tarefas</h5>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12 ps-0">
                            <div class="todoList-sidebar-scroll mt-4">
                                <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link list-actions active" id="all-list" data-toggle="pill" href="#pills-inbox" role="tab" aria-selected="true">
                                            <i class="bi bi-list" style="font-size: 24px;"></i> Criadas <span class="todo-badge badge"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions text-warning" id="todo-task-important" data-toggle="pill" href="#pills-important" role="tab" aria-selected="false">
                                            <i class="bi bi-star-fill" style="font-size: 24px;"></i> Importantes <span class="todo-badge badge"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions text-info" id="todo-task-done" data-toggle="pill" href="#pills-sentmail" role="tab" aria-selected="false">
                                            <i class="bi bi-hand-thumbs-up" style="font-size: 24px;"></i> Finalizadas <span class="todo-badge badge"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link list-actions" id="todo-task-trash" data-toggle="pill" href="#pills-trash" role="tab" aria-selected="false">
                                            <i class="bi bi-trash-fill" style="font-size: 24px;"></i> Excluídas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12 text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createDemandModal">   
                                <i class="bi bi-journal-plus"></i> Nova Demanda
                            </button>
                        </div>
                    </div>
                </div>

                <div id="todo-inbox" class="accordion todo-inbox">
                    <div class="search">
                        <input type="text" class="form-control input-search" placeholder="Buscar Tarefa...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </div>
            
                    <div class="todo-box">
                        
                        <div id="ct" class="todo-box-scroll">

                            @foreach($demands as $demand)
                            <div class="todo-item all-list @if($demand->priority == 1) todo-task-important @endif" data-bs-toggle="modal" data-bs-target="#demandModal">
                                <div class="todo-item-inner">
                                    <div class="n-chk text-center">
                                        <div class="form-check form-check-primary form-check-inline mt-1 me-0" data-bs-toggle="collapse" data-bs-target>
                                            <input class="form-check-input inbox-chkbox" type="checkbox">
                                        </div>
                                    </div>

                                    <div class="todo-content">
                                        <h6 class="todo-heading h6">
                                            Tarefa: <b class="text-primary">#{{ $demand->id }} </b> - Registrada : 
                                            <b class="text-primary"> {{ Date("d/m/Y", strtotime($demand->created_at)) }}</b> às 
                                            <b class="text-primary"> {{ Date("H:i:s", strtotime($demand->created_at)) }}</b><br/> <br/>
                                            Responsável: <b class="text-primary">{{ $demand->user_name }}</b> <br/> 
                                            Demanda: <b class="text-primary">{{ $demand->type_name }}</b>
                                        </h6>
                                    </div>

                                    <div class="action-dropdown custom-dropdown-icon">
                                        <div class="dropdown">
                                            @if ($demand->status == 0)
                                                <span class="badge bg-info">Aberta</span>
                                            @elseif ($demand->status == 1)
                                                <span class="badge bg-warning text-dark">Pendente</span>
                                            @elseif ($demand->status == 2)
                                                <span class="badge bg-success">Resolvida</span>
                                            @else
                                                <span class="badge bg-light text-muted">Desconhecido</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                            {{-- <div class="todo-item all-list todo-task-done">
                                <div class="todo-item-inner">
                                    <div class="n-chk text-center">
                                        <div class="form-check form-check-primary form-check-inline mt-1 me-0" data-bs-toggle="collapse" data-bs-target>
                                            <input class="form-check-input inbox-chkbox" type="checkbox" checked>
                                        </div>
                                    </div>

                                    <div class="todo-content">
                                        <h5 class="todo-heading" data-todoHeading="Meet Lisa to discuss project details"> Meet Lisa to discuss project details</h5>
                                        <p class="todo-text" data-todoHtml="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>" data-todoText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                    </div>

                                    <div class="priority-dropdown custom-dropdown-icon">
                                        <div class="dropdown p-dropdown">
                                            <a class="dropdown-toggle danger" href="#" role="button" id="dropdownMenuLink-5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                            </a>
                                            <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-5">
                                                <a class="dropdown-item danger" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> High</a>
                                                <a class="dropdown-item warning" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Middle</a>
                                                <a class="dropdown-item primary" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Low</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="action-dropdown custom-dropdown-icon">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </a>
                                            <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-6">
                                                <a class="edit dropdown-item" href="javascript:void(0);">Edit</a>
                                                <a class="important dropdown-item" href="javascript:void(0);">Important</a>
                                                <a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
                                                <a class="dropdown-item permanent-delete" href="javascript:void(0);">Permanent Delete</a>
                                                <a class="dropdown-item revive" href="javascript:void(0);">Revive Task</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="todo-item all-list todo-task-important">
                                <div class="todo-item-inner">
                                    <div class="n-chk text-center">
                                        <div class="form-check form-check-primary form-check-inline mt-1 me-0" data-bs-toggle="collapse" data-bs-target>
                                            <input class="form-check-input inbox-chkbox" type="checkbox">
                                        </div>
                                    </div>

                                    <div class="todo-content">
                                        <h5 class="todo-heading" data-todoHeading="Conference call with Marketing Manager"> Conference call with Marketing Manager</h5>
                                        <p class="todo-text" data-todoHtml="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>" data-todoText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>

                                    </div>

                                    <div class="priority-dropdown custom-dropdown-icon">
                                        <div class="dropdown p-dropdown">
                                            <a class="dropdown-toggle danger" href="#" role="button" id="dropdownMenuLink-8" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                            </a>

                                            <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-8">
                                                <a class="dropdown-item danger" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> High</a>
                                                <a class="dropdown-item warning" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Middle</a>
                                                <a class="dropdown-item primary" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Low</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="action-dropdown custom-dropdown-icon">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-9" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-9">
                                                <a class="edit dropdown-item" href="javascript:void(0);">Edit</a>
                                                <a class="important dropdown-item" href="javascript:void(0);">Important</a>
                                                <a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
                                                <a class="dropdown-item permanent-delete" href="javascript:void(0);">Permanent Delete</a>
                                                <a class="dropdown-item revive" href="javascript:void(0);">Revive Task</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="todo-item all-list todo-task-trash">
                                <div class="todo-item-inner">
                                    <div class="n-chk text-center">
                                        <div class="form-check form-check-primary form-check-inline mt-1 me-0" data-bs-toggle="collapse" data-bs-target>
                                            <input class="form-check-input inbox-chkbox" type="checkbox">
                                        </div>
                                    </div>

                                    <div class="todo-content">
                                        <h5 class="todo-heading" data-todoHeading="Conference call with Marketing Manager"> Conference call with Marketing Manager</h5>
                                        <p class="todo-text" data-todoHtml="<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>" data-todoText='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>

                                    </div>

                                    <div class="priority-dropdown custom-dropdown-icon">
                                        <div class="dropdown p-dropdown">
                                            <a class="dropdown-toggle danger" href="#" role="button" id="dropdownMenuLink-8" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                            </a>

                                            <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-8">
                                                <a class="dropdown-item danger" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> High</a>
                                                <a class="dropdown-item warning" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Middle</a>
                                                <a class="dropdown-item primary" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> Low</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="action-dropdown custom-dropdown-icon">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-9" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-9">
                                                <a class="edit dropdown-item" href="javascript:void(0);">Edit</a>
                                                <a class="important dropdown-item" href="javascript:void(0);">Important</a>
                                                <a class="dropdown-item delete" href="javascript:void(0);">Delete</a>
                                                <a class="dropdown-item permanent-delete" href="javascript:void(0);">Permanent Delete</a>
                                                <a class="dropdown-item revive" href="javascript:void(0);">Revive Task</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}

                        </div>

                    </div>

                </div>                                    
            </div>
            
        </div>
    </div>
</div>


{{-- Modal Nova Demanda --}}
@include('admin.services.modals.create-demand')

@if ($demands && $demands->isNotEmpty())
    @include('admin.services.modals.detail-demand')
@endif

@endsection

@section('scripts')

    <script src="{{asset('plugins/src/global/vendors.min.js')}}"></script>
    <script src="{{asset('plugins/src/editors/quill/quill.js')}}"></script>
    @vite(['resources/js/apps/todoList.js'])

    {{-- Scripts Here --}}
    <script type="module" src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    @vite(['resources/js/custom.js'])
    <script type="module" src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>

    <script type="module">
        function multiCheck(tb_var) {
            tb_var.on("change", ".chk-parent", function () {
                var e = $(this).closest("table").find("td:first-child .child-chk"),
                    a = $(this).is(":checked");
                $(e).each(function () {
                    a ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this)
                        .prop("checked", !1), $(this).closest("tr").removeClass("active"))
                })
            }),
                tb_var.on("change", "tbody tr .new-control", function () {
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
    document.addEventListener('DOMContentLoaded', function () {

        const modal = document.getElementById('createDemandModal');
        if (modal) {
            modal.addEventListener('shown.bs.modal', function () {
                aplicarInputMaskCPF();
            });
        }
    });
</script>
