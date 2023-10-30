        <footer>
            <p>&copy; 2023 - FlorentinToupet</p>
            @if (auth()->check())
                <p>{{ __('auth.logged_in_as', ['name' => auth()->user()->name]) }}</p>
            @endif
        </footer>

        <style>
            footer {
                background-color: #111;
                text-align: center;
                padding: 20px 0;
            }

            footer p {
                font-size: 20px;
                font-weight: bold;
            }
        </style>
