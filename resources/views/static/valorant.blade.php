<!DOCTYPE html>
<html>
    <head>
        @component("components.meta", ["title" => "Mini E-Sports: VALORANT"])
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['event' => ['register' => 'https://form.computerun.id/valorant'], 'template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center">
                <h3>ONLINE GAME TOURNAMENT</h3>
                <h1 class="gradient-text display-2 font-800">Valorant</h1>
                <a class="button button-gradient" href="https://form.computerun.id/valorant">REGISTER</a>
                <a class="button button-white" href="#rules">RULES</a><br>
                <p class="text-center h5">
                    Registration Fee:<br>
                    <b class="teal-text">IDR 35K</b>/slot<br>
                    <b class="teal-text">IDR 10K</b>/player<br>
                    <b>Maximum 2 slots per team</b><br>
                    (total slots: 64)
                </p>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="../img/backgrounds/2.png">
            <div class="about-container margin-2 after-container-clip" style="padding-bottom: 2rem;">
                <div>
                    <h2 class="partial-underline custom">what is<br><span>COMPUTERUN?</span>
                        <div class="guide"><span>COMPUTE</span></div>
                    </h2>
                </div>
                <div>
                    <p class="h5">
                        COMPUTERUN is a brand new joint-venture event organized by HIMSISFO and HIMTI BINUS University.<br><br>
                        In our first edition, we aim to provide a place to think, create, and share ideas through the business IT insights.<br><br>
                        <b>Starts <a href="https://computerun.id">online</a> in October - December 2020</b>
                    </p>
                </div>
                <div>
                    <h2 class="partial-underline custom">tournament<br><span>schedule.</span>
                        <div class="guide"><span>schedule.</span></div>
                    </h2>
                </div>
                <div>
                    <p class="h4">
                        <b class="red-text">REGISTRATION:</b> 18 - 1 Oktober 2020<br>
                        <b class="blue-text">TECHNICAL MEETING:</b> 1 Oktober 2020<br>
                        <b class="teal-text">MATCH DAY:</b> 2 - 4 Oktober 2020
                    </p>
                    <ol class="h5">
                        <li><b>Qualifier:</b> 2-3 Oktober 2020</li>
                        <li><b>Semifinal:</b> 4 Oktober 2020</li>
                        <li><b>Final:</b> 4 Oktober 2020</li>
                    </ol>
                </div>
            </div>
            <div class="with-computerun-background">
                <h1>tournament prizes</h1>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="../img/backgrounds/5.png">
            <div class="icons-container items-3 after-container-clip">
                <div>
                    <img src="../img/icons/1st.png"><br>
                    <span class="h3">1<sup>st</sup> Prize</span><br>
                    <span class="h2">IDR 500K</span>
                </div>
                <div>
                    <img src="../img/icons/2nd.png"><br>
                    <span class="h3">2<sup>nd</sup> Prize</span><br>
                    <span class="h2">IDR 350K</span>
                </div>
                <div>
                    <img src="../img/icons/3rd.png"><br>
                    <span class="h3">3<sup>rd</sup> Prize</span><br>
                    <span class="h2">IDR 200K</span>
                </div>
            </div>
            <div class="h5 text-center after-icons-container">E-certificates will also be given to prize winners.</div>
            <div class="about-container margin-2 content-divider" style="padding-bottom: 2rem;" id="rules">
                <div>
                    <h2 class="partial-underline custom">competition<br>rules.
                        <div class="guide"><span>rules.</span></div>
                    </h2>
                </div>
                <div>
                    <ul class="h5">
                        <li>No Cheat</li>
                        <li>No Joki</li>
                        <li>Map Random</li>
                        <li>No Toxic</li>
                        <li>Fair Play</li>
                    </ul>
                    <p>The full list of these Competition Rules will be detailed on Technical Meeting.</p>
                </div>
            </div>
            <h1 class="full-underline content-divider">for more details</h1>
            <div class="margin-1 content-divider h5 text-center">
                Please contact us via our LINE Official Account: <a class="font-800" href="https://line.me/R/ti/p/@995bowex" target="_blank">@995bowex</a>
            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="../img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
