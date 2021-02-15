<!DOCTYPE html>
<html>
    <head>
        @component("components.meta", ["title" => "Webinar"])
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                <span class="h1 font-700">WEBINAR</span><br>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="about-container margin-2 after-container-clip">
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - Webinar.png" class="about-image"><br>
                        about this<br><span>event.</span>
                        <div class="guide"><span>event</span></div>
                    </h2>
                </div>
                <div>
                    <p class="h5" style="margin-top: 5rem;">
                        Webinar atau sesi seminar daring COMPUTERUN tahun ini mengangkat tema <i>How business can survive the COVID 19 pandemic</i>, Preparing to be a Professional Workforce in Industry 4.0, and How mobile apps can meet and even exceed user's expectation.
                    </p>
                    <p class="h5">
                        Webinar ini akan diselenggarakan pada saat <i>Closing Ceremony</i> COMPUTERUN 2020.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
{{--            <div class="after-container-clip"></div>--}}
            <h2 class="full-underline">Poster</h2>
            <div class="margin-3 red-text"><b>PENDAFTARAN WEBNINAR DI PERPANJANG HINGGA HARI H</b></div>
            <div class="margin-3">
                <img src="{{ asset('img/icons/poster-webinar.png') }}" style="width: 1200px;">
            </div>
            <h2 class="full-underline content-divider">How to Regist?</h2>
            <div class="margin-3">
                <ol class="text-center">
                    <li>
                        Make an account or log-in on <a href="https://computerun.id/">computerun.id</a>.
                    </li>
                    <li>
                        Click register button.
                    </li>
                    <li>
                        Choose the desired event.
                    </li>
                    <li>
                        Click submit button.
                    </li>
                    <li>
                        Wait for the ticket to be approved.
                    </li>
                </ol>
            </div>
            <div class="content-divider"></div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
