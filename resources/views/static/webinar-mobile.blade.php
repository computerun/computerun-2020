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

                <!-- ini gua kasi style soalnya kalo pake P terlalu ke enter -->
                <p style="margin-top: .5rem;" class="h1 font-800 gradient-text">How mobile apps can meet and even exceed the user's expectation</p>
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
                        Webinar atau sesi seminar daring COMPUTERUN tahun ini mengangkat tema <i>How mobile apps can meet and even exceed the user's expectation</i> untuk menambah pengetahuan dan berbagai pengalaman baru tentang <i>Technology in Business</i> kepada peserta.
                    </p>
                    <p class="h5">
                        Webinar ini akan diselenggarakan pada saat <i>Closing Ceremony</i> COMPUTERUN 2020.
                    </p>
                </div>
            </div>
            <div class="with-computerun-background">
                <h1>speakers</h1>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <div class="icons-container items-3 after-container-clip">
                <div>
                    <img src="/img/icons/Speaker 1 unnamed.png"><br>
                    <span class="h4">Coming Soon</span><br>
                    <span class="h6">CEO of Company Inc.</span><br>
                    <p class="font-400 margin-2">
                        <u>Coming Soon</u>
                    </p>
                </div>
                <div>
                    <img src="/img/icons/Speaker 1 unnamed.png"><br>
                    <span class="h4">Coming Soon</span><br>
                    <span class="h6">CEO of Company Inc.</span><br>
                    <p class="font-400 margin-2">
                        <u>Coming Soon</u>
                    </p>
                </div>
                <div>
                    <img src="/img/icons/Speaker 1 unnamed.png"><br>
                    <span class="h4">Coming Soon</span><br>
                    <span class="h6">CEO of Company Inc.</span><br>
                    <p class="font-400 margin-2">
                        <u>Coming Soon</u>
                    </p>
                </div>

            </div>
            <!-- <h1 class="full-underline after-icons-container">general FAQ</h1>
            <div class="margin-2 h5">
                <p>Q: Bagaimana cara untuk mengikuti kompetisi yang diadakan?<br>
                    <b>A: Setelah mengunjungi web <i><a href="/">www.computerun.id</a></i>, kamu dapat memilih menu "Register" yang terdapat di setiap laman cabang kompetisi yang ingin kamu ikuti.</b>
                </p>
                <p>Q: Apakah saya bisa mendaftar untuk 2-3 kompetisi sekaligus?<br>
                    <b>A: Ya, tentu saja. Asalkan kamu tetap memenuhi persyaratan yang ada.</b>
                </p>
                <p>Q: Apa saja persyaratan yang dibutuhkan untuk mengikuti kompetisi Computerun?<br>
                    <b>A: Silahkan unduh panduan syarat dan ketentuan kompetisi Computerun <a href="#">di sini</a>.</b>
                </p>
                <p>Q: Keuntungan apa yang akan saya dapatkan apabila mengikuti kompetisi Computerun?<br>
                    <b>A: Partisipan akan mendapatkan e-sertifikat dan menambah pengalaman berkompetisi berskala nasional.</b>
                </p>
                <p>Q: Setelah mendaftar bagaimana saya mendapatkan informasi lebih lanjut untuk kompetisi?<br>
                    <b>A: Setelah mendaftar, kamu akan menerima e-mail resmi dari Computerun dan akan mendapat seluruh informasi mengenai kompetisi melalui e-mail.</b>
                </p>
            </div> -->
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
