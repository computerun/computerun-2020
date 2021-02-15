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
                <span class="h4 font-700">WEBINAR</span><br>
                <p style="margin-top: .5rem;" class="h1 font-800 gradient-text">Blockchain: The Next Digital Revolution in Every Industry</p>
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
                    <p class="h5">
                    Webinar atau sesi seminar daring COMPUTERUN tahun ini
                    mengangkatkan tema Blockchain: The Next Digital Revolution in
                    Every Industry untuk menambah pengetahuan dan berbagi pengalaman
                    baru tentang Technology in Business kepada peserta.
                    </p>
                    <p class="h5">
                    Webinar akan diselenggarakan pada saat Closing Ceremony
                COMPUTERUN 2020.
                    </p>
                </div>
            </div>
            <div class="with-computerun-background">
                <h1>speakers</h1>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <div class="icons-container items-2 after-container-clip">
                <div>
                    <img src="/img/icons/Speaker 1 unnamed.png"><br>
                    <span class="h3">Speaker 1 Name</span><br>
                    <span class="h5">Speaker 1 Title</span><br><br>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque blanditiis, fugiat similique quibusdam quaerat hic dignissimos magnam velit accusantium corporis deserunt, aperiam temporibus provident veritatis earum! Quod laboriosam ratione magnam?</span>

                </div>
                <div>
                    <img src="/img/icons/Speaker 2 unnamed.png"><br>
                    <span class="h3">Speaker 2 Name</span><br>
                    <span class="h5">Speaker 2 Title</span><br><br>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque blanditiis, fugiat similique quibusdam quaerat hic dignissimos magnam velit accusantium corporis deserunt, aperiam temporibus provident veritatis earum! Quod laboriosam ratione magnam?</span>
                </div>

            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
