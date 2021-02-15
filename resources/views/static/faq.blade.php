<!DOCTYPE html>
<html>
    <head>
        @component("components.meta", ["title" => "Contact"])
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['template' => 'faq'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                {{-- <span class="h4 font-700">Frequently Asked Questions</span><br> --}}
                <p class="h1 font-800 gradient-text">Frequently Asked Questions</p>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="content-top"/>
            <h1 class="full-underline content-divider-short">general FAQ</h1>
            <div class="margin-2 h5" style="text-align: center">
                <p>Q: Bagaimana cara untuk mengikuti kompetisi yang diadakan?<br>
                    <b>A: Setelah mengunjungi web <i><a href="/">www.computerun.id</a></i>, kamu dapat memilih menu "Register" yang terdapat di setiap laman cabang kompetisi yang ingin kamu ikuti.</b>
                </p>
                <p>Q: Apakah saya bisa mendaftar untuk 2-3 kompetisi sekaligus?<br>
                    <b>A: Ya, tentu saja. Asalkan kamu tetap memenuhi persyaratan yang ada.</b>
                </p>
                <p>Q: Apa saja persyaratan yang dibutuhkan untuk mengikuti kompetisi Computerun?<br>
                    <b>A: Silahkan unduh panduan syarat dan ketentuan kompetisi Computerun <a href="https://drive.computerun.id/files">di sini</a>.</b>
                </p>
                <p>Q: Keuntungan apa yang akan saya dapatkan apabila mengikuti kompetisi Computerun?<br>
                    <b>A: Partisipan akan mendapatkan e-sertifikat dan menambah pengalaman dalam berkompetisi Business-IT Case ataupun Mobile Apps.</b>
                </p>
                <p>Q: Setelah mendaftar bagaimana saya mendapatkan informasi lebih lanjut untuk kompetisi?<br>
                    <b>A: Setelah mendaftar, kamu akan menerima e-mail resmi dari Computerun dan akan mendapat seluruh informasi mengenai kompetisi melalui e-mail atau melalui sosial media kami.</b>
                </p>
            </div>
            <h1 class="full-underline content-divider">How to Register</h1>
            <div class="margin-2 h6" style="text-align: center">
                <p>
                    1. Create an account or Login<br>
                    2. Click register button in profile page<br>
                    3. Choose the competition<br>
                    4. Fill in the email of the members who will participate (each member is required to register as a user on the website <a href="https://computerun.id/">computerun.id</a>).<br>
                    5. Click submit button<br>
                    6. Check the team leader email’s inbox and follow the procedures contained,
                    <b>
                    <li>Transfer to the listed bank account</li>
                    <li>Prepare KTM (kartu tanda mahasiswa) for each member</li>
                    <li>Upload twibbon computerun</li>
                    <li>Screenshot all evidence then ZIP it</li>
                    <li>Upload all evidence to the link provided in the email</li>
                    </b>
                </p>
            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
