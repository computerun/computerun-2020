<!DOCTYPE html>
<html>
    <head>
        @component("components.meta")
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                <span class="h4 font-700">COMPETITION</span><br>
                <p class="h1 font-800 gradient-text">Example Event</p>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="about-container margin-2 after-container-clip">
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - E-Sport.png" class="about-image"><br>
                        about this<br><span>competition.</span>
                        <div class="guide"><span>competition</span></div>
                    </h2>
                </div>
                <div>
                    <p class="h5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam fugit eius corporis ad dolore inventore a, modi vitae obcaecati saepe similique magnam delectus officiis, commodi earum tempora. Quisquam, incidunt eligendi!
                    </p>
                    <p class="h5">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero expedita, pariatur quasi nihil impedit ea, atque dolore possimus amet minima debitis quia eaque a blanditiis fugit veritatis nemo sunt aut!
                    </p>
                </div>
            </div>
            <div class="with-computerun-background">
                <h1>prizes</h1>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <div class="icons-container items-3 after-container-clip">
                <div>
                    <img src="/img/icons/1st.png"><br>
                    <span class="h5">Winner</span><br>
                    <span class="h3">IDR 3.500.000</span>
                </div>
                <div>
                    <img src="/img/icons/2nd.png"><br>
                    <span class="h5">First Runner Up</span><br>
                    <span class="h3">IDR 2.500.000</span>
                </div>
                <div>
                    <img src="/img/icons/3rd.png"><br>
                    <span class="h5">Second Runner Up</span><br>
                    <span class="h3">IDR 1.500.000</span>
                </div>
            </div>
            <h1 class="full-underline after-icons-container">general FAQ</h1>
            <div class="margin-2 h5">
                <p>Q: Lorem ipsum dolor sit amet?<br>
                    <b>A: Libero alias similique cupiditate reiciendis suscipit, labore repellendus nihil ratione quibusdam asperiores ex, et vel voluptates id aspernatur! Cum sit modi molestiae.</b>
                </p>
                <p>Q: Lorem ipsum dolor sit amet?<br>
                    <b>A: Libero alias similique cupiditate reiciendis suscipit, labore repellendus nihil ratione quibusdam asperiores ex, et vel voluptates id aspernatur! Cum sit modi molestiae.</b>
                </p>
            </div>
            <h1 class="full-underline content-divider">for more details</h1>
            <div class="margin-1 content-divider h5 text-center">
                Please contact us via our LINE Official Account: <a class="font-800" href="https://line.me/R/ti/p/@995bowex" target="_blank">@995bowex</a>
            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
