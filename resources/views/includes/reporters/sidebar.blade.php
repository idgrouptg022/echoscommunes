<aside>
    <div class="sidebar-top">
        <a href="#" class="logo__wrapper">
            <img src="{{ asset('assets/images/o logo.png') }}" alt="Logo" class="logo">
            <h1 class="hide">Echos Des Communes</h1>
        </a>
    </div>
    <div class="sidebar-links">
        <ul>
            <li>
                <a href="{{ route('guests:reporters:actualites:create') }}" title="Nouvelle actualité" class="tooltip">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"></path>
                    </svg>
                    <span class="link hide">Nouvelle actualité</span>
                    <span class="tooltip__content">Nouvelle actualité</span>
                </a>
            </li>
            <li>
                <a href="#actualites" title="actualites" class="tooltip flex dropdown-menu">
                    <span>
                        <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"></path>
                          </svg>
                        <span class="link hide">Actualités</span>
                        <span class="tooltip__content">Actualités</span>
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="sidebar-submenu">
                    @foreach ($newsCategories as $category)
                        <li><a href="{{ route('guests:reporters:actualites:index', $category) }}"><i class="fas fa-chevron-right"></i> {{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('guests:reporters:actualites:in-pending') }}" title="Actualites en cours" class="tooltip">
                    <svg style="width:24px; height:24px; fill:#fff;" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"></path>
                    </svg>
                    <span class="link hide">Actualites en cours</span>
                    <span class="tooltip__content">Actualites en cours</span>
                </a>
            </li>
            <li>
                <a href="{{ route('guests:reporters:actualites:reject') }}" title="Actualites rejetées" class="tooltip">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"></path>
                    </svg>
                    <span class="link hide">Actualites rejetées</span>
                    <span class="tooltip__content">Actualites rejetées</span>
                </a>
            </li>
            <li>
                <a href="#" title="Mon profil" class="tooltip">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                    </svg>
                    <span class="link hide">Mon profil</span>
                    <span class="tooltip__content">Mon profil</span>
                </a>
            </li>
            <li>
                <a href="#!" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" title="Se déconnecter" class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="link hide">Se déconnecter</span>
                    <span class="tooltip__content">Se déconnecter</span>
                </a>
                <form action="{{ route('guests:reporters:logout') }}" method="post" id="logoutForm" hidden>
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="sidebar-bottom">
        <div class="sidebar__profile">
            <div class="avatar__wrapper">
            <img class="avatar" src="{{ session()->get("profile")
            ? asset('storage/app/public' . session()->get("profile"))
            : asset('assets/images/reporter.svg') }}" alt="Profile">
            <div class="online__status"></div>
        </div>
        <div class="avatar__name hide">
            <div class="user-name">{{ session()->get("name") }}</div>
            <div class="email">{{ session()->get("email") }}</div>
        </div>
    </div>
</aside>
