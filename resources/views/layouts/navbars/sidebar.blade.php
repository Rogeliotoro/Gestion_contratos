<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a class="simple-text logo-normal">
            {{ __('Gestion de Contratos') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @can('post-list')
                <li class="nav-item{{ $activePage == 'posts' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('posts.index') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{ __('Solicitudes') }}</p>
                    </a>
                </li>
            @endcan
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <p>{{ __('Maestros') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EX </span>
                                <span class="sidebar-normal">{{ __('Expendientes') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> CC </span>
                                <span class="sidebar-normal"> {{ __('Cecos') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('societies.index') }}">
                              <span class="sidebar-mini"> SC </span>
                              <span class="sidebar-normal"> {{ __('Sociedades') }} </span>
                          </a>
                      </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
