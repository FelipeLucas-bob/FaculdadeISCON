@php
    // Filtra apenas itens do tipo 'suport' que o usuário pode ver
    $supportItems = collect($sidebarItems)->filter(function ($side) {
        if (!isset($side['type']) || $side['type'] !== 'suport') {
            return false;
        }

        // Se tiver subitens, pelo menos um precisa ser visível
        if (isset($side['subitems']) && count($side['subitems']) > 0) {
            foreach ($side['subitems'] as $submenu) {
                if (empty($submenu['suport']) || Auth::user()->isSuperAdmin()) {
                    return true;
                }
            }
            return false;
        }

        // Se não tiver subitens, mostra apenas se tiver rota
        return Route::has($side['route']);
    });
@endphp

@if ($supportItems->count() > 0)
    <li class="menu menu-heading">
        <div class="heading" style="padding: 1px, 1px">
            <span>PAINEL DE SUPORTE</span>
        </div>
    </li>
@endif

@foreach ($supportItems as $side)
    @php
        $hasSubitems = isset($side['subitems']) && count($side['subitems']) > 0;
        $isActive = $catName === $side['cat'];
    @endphp

    <li class="menu {{ $isActive ? 'active' : '' }}">
        @if ($hasSubitems)
            @php
                // Verifica se algum subitem do menu está ativo
                $subActive = false;
                if (isset($side['subitems'])) {
                    foreach ($side['subitems'] as $submenu) {
                        if (Request::routeIs($submenu['route'])) {
                            $subActive = true;
                            break;
                        }
                    }
                }

                $isActive = $catName === $side['cat'] || $subActive;
            @endphp

            <a href="#submenu-{{ $side['type'] }}-{{ $loop->index }}" data-bs-toggle="collapse"
                aria-expanded="{{ $isActive ? 'true' : 'false' }}"
                class="dropdown-toggle {{ $isActive ? '' : 'collapsed' }}">


                <div>
                    <i class="{{ $side['icon'] }}"></i>
                    <span>{{ $side['name'] }}</span>
                </div>

                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>

            <ul class="collapse submenu list-unstyled {{ $isActive ? 'show' : '' }}"
                id="submenu-{{ $side['type'] }}-{{ $loop->index }}" data-bs-parent="#accordionExample">

                @foreach ($side['subitems'] as $submenu)
                    @if (!empty($submenu['suport']) && !Auth::user()->isSuperAdmin() && $side['type'] !== 'suport')
                        @continue
                    @endif

                    <li class="{{ Request::routeIs($submenu['route']) ? 'active' : '' }}">
                        <a href="{{ Route::has($submenu['route']) ? route($submenu['route']) : '#' }}">
                            {{ $submenu['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <a href="{{ route($side['route']) }}" aria-expanded="false" class="dropdown-toggle">
                <div>
                    <i class="{{ $side['icon'] }}"></i>
                    <span>{{ $side['name'] }}</span>
                </div>
            </a>
        @endif
    </li>
@endforeach
