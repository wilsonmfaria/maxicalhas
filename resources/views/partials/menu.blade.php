<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href='{{ route("admin.home") }}' class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    Visão Geral
                </a>
            </li>
            <li class="nav-item">
                <a href='/admin/ordemsNav/A' class="nav-link">
                    <i class="nav-icon fas fa-fw fa-concierge-bell">

                    </i>
                    Ordens de Serviço
                </a>
            </li>
            <li class="nav-item">
                <a href='/admin/clientesNav/A' class="nav-link">
                    <i class="nav-icon fas fa-fw fas fa-users">

                    </i>
                    Clientes
                </a>
            </li>
            <!--<li class="nav-item">
                <a href='/admin/funcionariosNav/A' class="nav-link">
                    <i class="nav-icon fas fa-fw fa-user-clock">

                    </i>
                    Funcionários
                </a>
            </li>-->
            <li class="nav-item">
                <a href='{{ route("admin.relatorios.index") }}' class="nav-link">
                    <i class="nav-icon fas fa-fw fa-file-alt">

                    </i>
                    Relatórios
                </a>
            </li>
            @can('users_manage')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-user-cog nav-icon">

                        </i>
                        Administração
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href='{{ route("admin.permissions.index") }}' class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}'>
                                <i class="fa-fw fas fa-unlock-alt nav-icon">

                                </i>
                                Permissões
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='{{ route("admin.roles.index") }}' class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}'>
                                <i class="fa-fw fas fa-briefcase nav-icon">

                                </i>
                                Papéis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='{{ route("admin.users.index") }}' class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}'>
                                <i class="fa-fw fas fa-user nav-icon">

                                </i>
                                Usuários
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href='{{ route('auth.change_password') }}' class="nav-link">
                    <i class="nav-icon fas fa-fw fa-key">

                    </i>
                    Trocar Senha
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Sair
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>