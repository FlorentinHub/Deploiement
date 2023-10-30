<script>
    async function getGitHubAvatar(username) {
        try {
            console.log($ {
                username
            });
            const response = await fetch(`https://api.github.com/users/${username}`);
            if (response.ok) {
                const data = await response.json();
                if (data.avatar_url) {
                    return data.avatar_url;
                }
            }
        } catch (error) {
            console.error('Erreur lors de la récupération de l\'avatar GitHub :', error);
        }
        return 'URL_de_votre_image_par_defaut.jpg';
    }
</script>
<section class="projets" id="projets">
    @php $counter = 0; @endphp
    @foreach ($projets as $projet)
        @if ($counter % 3 == 0)
            <div class="row">
        @endif
        <div class="col-md-4">
            <div class="portfoliocard">
                <div class="coverphoto">
                    <img class="coverphoto" src="{{ asset('storage/images/' . $projet->image_projet) }}" alt="{{ $projet->nom_projet }}">
                </div>
                <div class="left_col">
                    <div class="followers">
                        <div class="follow_count">{{ $projet->complexite }}</div>
                        {{ __('auth.complexity') }}
                    </div>
                    <div class="following">
                        <div class="follow_count">{{ $projet->pourcentage_complet }}</div>
                        {{ __('auth.final_grade') }}
                    </div><br>
                    <div class="following">
                        <div class="follow_count"></div>
                        <a href="{{ route('projet.details', $projet->id) }}"
                            class="btn">{{ __('auth.details') }}</a><br>
                        @if (auth()->check() && auth()->user()->isAdmin)
                            <a href="{{ route('projet.edit', $projet->id) }}"
                                class="btn">{{ __('auth.edit') }}</a><br>
                            <a href="{{ route('projet.confirmDelete', $projet->id) }}"
                                class="btn btn-danger">{{ __('auth.delete') }}</a>
                        @endif
                    </div>
                </div>
                <div class="right_col">
                    <h2 class="name">{{ $projet->nom_projet }}</h2>
                    <h3 class="location">{{ $projet->type_projet }}</h3>
                    <div style="margin-left: 15px" class="name">{{ __('auth.description') }}</div>
                    <br>
                    <h3 class="location">{{ $projet->description }}</h3>
                </div>
            </div>
        </div>
        </div>
        @if ($counter % 3 == 2 || $loop->last)
            </div>
        @endif
        @php $counter++; @endphp
    @endforeach
</section>
<style>
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

    .hero {
        background-image: url('');
        background-size: cover;
        background-position: center;
        text-align: center;
        padding: 100px 0;
    }

    .hero-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 18px;
        margin-bottom: 40px;
    }

    .btn {
        display: inline-block;
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-bottom: 3px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .projets {
        user-select: none;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        justify-content: center;
        padding: 80px 0;
    }

    .projet-card {
        max-width: 100%;
    }

    footer {
        background-color: #111;
        text-align: center;
        padding: 20px 0;
    }

    footer p {
        font-size: 20px;
        font-weight: bold;
    }

    a.nostyle {
        color: inherit;
        text-decoration: none;
        padding: 0;
        margin: 0;
    }

    div.portfoliocard {
        background: rgba(40, 40, 40, 1);
        border: 1px solid rgba(0, 0, 0, 0.7);
        box-shadow: 0px -1px 3px rgba(0, 0, 0, 0.1),
            0px 2px 6px rgba(0, 0, 0, 0.5);
        border-radius: 6px;
        margin: 30px auto;
        overflow: hidden;
        z-index: 100;
        margin-left: 30px;
        margin-right: 30px;
    }

    div.portfoliocard div.coverphoto {
        width: 100%;
        height: 220px;
        background-position: center center;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: inset 0px 3px 20px rgba(255, 255, 255, 0.3),
            1px 0px 2px rgba(255, 255, 255, 0.7);
        z-index: 99;
    }

    div.portfoliocard div.coverphoto img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    div.portfoliocard div.left_col,
    div.portfoliocard div.right_col {
        float: left;
        height: 340px;
    }

    div.portfoliocard div.left_col {
        width: 40%;
        padding-top: 60px;
        box-sizing: border-box;
    }

    div.portfoliocard div.right_col {
        width: 60%;
        background: rgba(40, 40, 40, 1);
        border-left: 1px solid rgba(230, 230, 230, 1);
        margin-left: -1px;
        border-bottom-right-radius: 5px;
    }

    div.portfoliocard div.profile_picture {
        width: 110px;
        height: 110px;
        background: rgba(255, 255, 255, 1);
        position: absolute;
        top: 65px;
        left: 40px;
        border-radius: 100%;
        background-size: 100% 100%;
        padding: 7px;
        border: 4px solid rgba(255, 255, 255, 1)
    }

    div.portfoliocard div.right_col h2.name {
        font-size: 30px;
        font-weight: 300;
        font-weight: bold;
        color: rgb(255, 255, 255);
        padding: 0;
        margin: 20px 10px 0px 30px;
    }

    div.portfoliocard div.right_col h3.location {
        font-size: 15px;
        font-weight: 300;
        color: rgba(170, 170, 170, 1);
        padding: 0;
        margin: -5px 10px 10px 30px;
    }

    div.portfoliocard ul.contact_information {
        margin-top: 20px;
        padding-left: 30px;
        list-style-type: none;
    }

    div.portfoliocard ul.contact_information li {
        height: 25px;
        width: 180px;
        line-height: 25px;
        font-weight: 300;
        font-size: 15px;
        color: rgba(140, 140, 140, 1);
        text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.8);
        padding: 5px 0px;
        background-repeat: no-repeat;
        background-size: 18px 18px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0px 1px 1px rgba(255, 255, 255, 0.6);
        cursor: default;
    }

    div.portfoliocard ul.contact_information li:before {
        content: "";
        width: 25px;
        height: 25px;
        display: block;
        float: left;
        background-position: center;
        background-size: 18px 18px;
        background-repeat: no-repeat;
        margin-right: 5px;
        opacity: 0.7;
    }

    div.portfoliocard ul.contact_information li.description {
        border-bottom: none;
        padding-left: 0;
        margin-left: 0;
    }

    div.portfoliocard ul.contact_information li:hover:before {
        opacity: 1;
    }

    div.portfoliocard ul.contact_information li.work:before {
        background-image: url('http://schulzmarcel.de/x/icons/case_24.png');
    }

    div.portfoliocard ul.contact_information li.website:before {
        background-image: url('http://schulzmarcel.de/x/icons/globe_24.png');
    }

    div.portfoliocard ul.contact_information li.description:before {
        background-image: url('http://schulzmarcel.de/x/icons/paper_plane_24.png');
    }

    div.portfoliocard ul.contact_information li.resume:before {
        background-image: url('http://schulzmarcel.de/x/icons/inbox_24.png');
    }

    div.portfoliocard div.followers,
    div.portfoliocard div.following {
        margin: 10px 0px 0px 25px;
        font-weight: 300;
        font-size: 16px;
        font-weight: bold;
        color: rgb(255, 255, 255);
    }

    div.portfoliocard div.follow_count {
        font-weight: 400;
        font-size: 25px;
        font-weight: bold;
        color: rgb(205, 205, 205);
    }
</style>
