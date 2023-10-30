<link rel="icon"
    href="https://cdn.discordapp.com/attachments/1080262834484682772/1162839789381357639/FT.png?ex=653d65f2&is=652af0f2&hm=7e16de0971a1cd0d52bfe22955db19abb4a8ffc934ab17658170173391cd2e8c&">
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<title>Florentin Toupet</title>
<header>
    <nav>
        <a href="{{ route('accueil') }}" class="logo-link">
            <img src="https://media.discordapp.net/attachments/1080262834484682772/1167309292039307355/ft_300ppp.png?ex=654da87e&is=653b337e&hm=b12fafeb68f5ee4401d0ef8d13a3391585b1ebf8eebda0933c53bed84cc1dcbc&=&width=351&height=603"
                alt="Votre Logo" class="logo">
        </a>
        {{-- <div class="logo">{{ $appName }}</div> --}}
        <ul class="nav-links">
            <li><a href="/">{{ __('auth.home') }}</a></li>
            <li><a href="/projects">{{ __('auth.my_projects') }}</a></li>
            <li><a href="/about">{{ __('auth.about') }}</a></li>
            @php $locale = session()->get('locale'); @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{-- @switch($locale) --}}
                    {{-- @case('en')
                            <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110218182823956/1200px-Flag_of_the_United_Kingdom_281-229.png?ex=654cef17&is=653a7a17&hm=2b158fafe311d91b094aba0bd7185363c59160d9716c1f72583c57d08b47707e&=&width=1207&height=603') }}"
                                width="25px">
                        @break

                        @case('fr')
                            <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110319395586048/flag-world-france.png?ex=654cef30&is=653a7a30&hm=302fe021e8a5f97edcfe80b19e9bcd0046584f77d3af9c6405229c6a4c766a0c&=&width=625&height=416') }}"
                                width="25px">
                        @break

                        @case('es')
                            <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110400383406090/Bandera_de_EspaC3B1a.png?ex=654cef43&is=653a7a43&hm=13c80d0924d744637d6dacd5f4bd9dc35f656dafb279804f43caec8d43d5d887&=&width=906&height=603') }}"
                                width="25px">
                        @break

                        @default
                            <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110319395586048/flag-world-france.png?ex=654cef30&is=653a7a30&hm=302fe021e8a5f97edcfe80b19e9bcd0046584f77d3af9c6405229c6a4c766a0c&=&width=625&height=416') }}"
                                width="25px">
                    @endswitch --}}
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'en']) }}">
                        <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110218182823956/1200px-Flag_of_the_United_Kingdom_281-229.png?ex=654cef17&is=653a7a17&hm=2b158fafe311d91b094aba0bd7185363c59160d9716c1f72583c57d08b47707e&=&width=1207&height=603') }}"
                            width="25px">
                    </a>
                    <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'fr']) }}">
                        <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110319395586048/flag-world-france.png?ex=654cef30&is=653a7a30&hm=302fe021e8a5f97edcfe80b19e9bcd0046584f77d3af9c6405229c6a4c766a0c&=&width=625&height=416') }}"
                            width="25px">
                    </a>
                    <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'es']) }}">
                        <img src="{{ asset('https://media.discordapp.net/attachments/470953701985615897/1167110400383406090/Bandera_de_EspaC3B1a.png?ex=654cef43&is=653a7a43&hm=13c80d0924d744637d6dacd5f4bd9dc35f656dafb279804f43caec8d43d5d887&=&width=906&height=603') }}"
                            width="25px">
                    </a>
                </div>
            </li>
            {{-- 
            <li class="dropdown">
                <a href="#" class="dropbtn" id="languageBtn">{{ app()->getLocale() }}</a>
                <div class="dropdown-content">
                    <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'fr']) }}">
                        <img src="{{ asset('images/flag/fr.png') }}" width="25px"> Français
                    </a>

                    <a class="dropdown-item" href="{{ route('lang', 'fr') }}">FR</a>
                    <a class="dropdown-item" href="{{ route('lang', 'en') }}">EN</a>
                    <a class="dropdown-item" href="{{ route('lang', 'es') }}">ES</a>
                </div>
            </li> --}}
            @guest
                <li><a href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('auth.register') }}</a></li>
            @else
                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('auth.deconnect') }}</a>
                </li>
                @if (auth()->user()->isAdmin)
                    <li class="dropdown">
                        <a href="#" class="dropbtn">{{ __('auth.admin') }}</a>
                        <div class="dropdown-content">
                            <a href="/ajouter-projet">{{ __('auth.addProject') }}</a>
                            <a href="/ajouter-collaborateur">{{ __('auth.addCollab') }}</a>
                        </div>
                    </li>
                @endif
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </nav>
</header>

<style>
    .dropdown {
        position: relative;
        display: inline-block;
        margin-right: 10px;
    }

    .dropbtn {
        font-size: 20px;
        background-color: transparent;
        color: #fff;
        padding: 0;
        margin: 0;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .dropbtn:hover {
        background-color: white;
        color: #000;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #111;
        min-width: 40px;
        max-width: 150px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: #fff;
        text-decoration: none;
        padding: 12px 16px;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: white;
        color: black;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .logo-link {
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 10px;
        transition: transform 0.2s;
    }

    .logo {
        width: 40px;
    }

    .logo-link:hover {
        transform: scale(1.1);
    }

    body,
    h1,
    h2,
    p {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #121212;
        color: #fff;
    }

    header {
        background-color: #111;
        padding: 20px 0;
        user-select: none;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
    }

    .nav-links {
        list-style: none;
        display: flex;
    }

    .nav-links li {
        margin-right: 20px;
    }

    .nav-links a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }
</style>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
