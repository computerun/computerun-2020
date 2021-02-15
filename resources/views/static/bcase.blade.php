<!DOCTYPE html>
<html>
    <head>
        @component("components.meta", ["title" => "Business-IT Case"])
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['event' => ['register' => '/register/1'], 'template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                <h3>COMPETITION</h3>
                <h1 class="gradient-text display-2 font-800">Business-IT Case</h1>
                <a class="button button-gradient" href="/register/1">REGISTER</a>
                <a class="button button-white" href="#rules">RULES</a>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="about-container margin-2 after-container-clip">
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - Business-IT Case.png" class="about-image"><br>
                        about this<br><span>competition.</span>
                        <div class="guide"><span>competition</span></div>
                    </h2>
                </div>
                <div>
                    {{-- <p class="h5">
                        Competition COMPUTERUN merupakan ajang kompetisi Business Case berskala nasional yang diselenggarakan untuk seluruh mahasiswa S1 dari seluruh perguruan tinggi di Indonesia.
                    </p> --}}
                    <p class="h5">
                        Lomba Business-IT Case ini dapat mengasah kemampuan mahasiswa untuk berkerja dan bersinergi dalam satu tim dan menyelesaikan sebuah kasus nyata yang terjadi dalam sebuah perusahaan, dan juga untuk mengembangkan sikap solutif agar para mahasiswa terlatih untuk menghadapi masalah dalam dunia bisnis dan TI di masa mendatang serta dapat menciptakan solusi kreatif yang efektif secara bersama-sama sehingga masalah dapat terselesaikan dengan baik.
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
                    <span class="h3">IDR 5.000.000</span>
                </div>
                <div>
                    <img src="/img/icons/2nd.png"><br>
                    <span class="h5">First Runner Up</span><br>
                    <span class="h3">IDR 3.000.000</span>
                </div>
                <div>
                    <img src="/img/icons/3rd.png"><br>
                    <span class="h5">Second Runner Up</span><br>
                    <span class="h3">IDR 1.500.000</span>
                </div>
            </div>
            <div class="about-container margin-2 after-icons-container">
                <div id="rules">
                    <h2 class="partial-underline custom">Competition<br>Rules
                        <div class="guide">Rules</div>
                    </h2>
                </div>
                <div>
                    <ol class="h6">
                        <li>
                            Peserta adalah pihak yang telah mengikuti mekanisme pendaftaran pada website resmi Computerun 2020 <b><a href="https://computerun.id/">computerun.id</a></b>.
                        </li>
                        <li>
                            Setiap peserta harus merupakan <b>mahasiswa S1 atau D3</b>, <b>jurusan apapun diperbolehkan</b>.
                        </li>
                        <li>
                            Setiap tim wajib terdiri dari <b>dua anggota dan satu ketua dalam satu grup</b>. Setiap anggota tim wajib berasal dari <b>satu universitas atau lembaga yang sama</b>.
                        </li>
                        <li>
                            Setiap tim tidak diperkenankan menunjukkan <b>latar belakang institusi pendidikan</b> selama perlombaan dalam bentuk apapun.
                        </li>
                        <li>
                            Setiap tim yang telah terdaftar <b>tidak dapat mengubah nama tim ataupun anggota kelompok</b> dengan alasan apapun.
                        </li>
                        <li>
                            Setiap anggota tim wajib menggunakan <b>twibbon</b> yang telah disediakan <b><a href="https://drive.computerun.id/files">di sini</a></b>.<br>
                        </li>
                    </ol>
                </div>
                <div>
                    <h2 class="partial-underline custom">General<br>Rules
                        <div class="guide">Rules</div>
                    </h2>
                </div>
                <div>
                    <ol class="h6">
                        <li>
                            Peserta akan membuat <b>proposal</b> untuk menjawab tantangan business case.
                        </li>
                        <li>
                            Segala bentuk referensi wajib dicantumkan didalam <b>proposal</b>.
                            {{-- Segala bentuk referensi harus di cantumkan di dalam sebuah note kemudian dikirimkan kepada panitia dan untuk referensi kodingan dapat di cantumkan di dalam kodingan. --}}
                        </li>
                        <li>
                            Segala bentuk <b>pelanggaran hak cipta</b> atau <b>tindakan plagiarisme</b> akan membuat peserta secara <b>otomatis <span class="red-text">terdiskualifikasi.</span></b>
                            {{-- Pelanggaran hak cipta atau plagiarisme akan membuat peserta secara otomatis didiskualifikasi --}}
                        </li>
                        <li>
                            File yang telah dikumpulkan adalah <b>bersifat final</b> dan <b>tidak dapat diganti dengan alasan apapun</b>.
                        </li>
                        <li>
                            Segala keputusan dari dewan juri dan panitia adalah <b>mutlak dan tidak dapat diganggu gugat</b>.
                        </li>
                        <li>
                            Peserta akan <b>mempresentasikan proposal yang telah dibuat</b> kepada juri pada hari final lomba.
                        </li>
                    </ol>
                    <a class="button button-white" href="https://drive.computerun.id/files">PDF</a>
                    {{-- --<span class="red-text"> Not available until regist is close.</span>  --}}
                </div>
                {{-- <div>
                    <h2 class="partial-underline custom">Files<br>Rules
                        <div class="guide">Rules</div>
                    </h2>
                </div>
                <div>
                    <h3><u>Proposal Rules</u></h3>
                    <ol class="h6">
                        <li>
                            Halaman yang terdapat didalam proposal <b>tidak boleh lebih dari 15</b>. Bagian-bagian yang wajib terdapat di dalam slide:
                            <ul>
                                <li>
                                    Cover.
                                </li>
                                <li>
                                    Abstract atau summary.
                                </li>
                                <li>
                                    Preface (Optional).
                                </li>
                                <li>
                                    Referensi.
                                </li>
                                <li>
                                    Lampiran.
                                </li>
                            </ul>
                        </li>
                        <li>
                            Peserta dapat membawa ide cemerlang peserta dalam menulis konten (Company Profile, Supporting Data/Statistics, dan Problem and situation analysis).
                        </li>
                        <li>
                            Proposal dibuat dengan <b>mengikuti format dalam menulis makalah ilmiah</b>.
                            <ul>
                                <li>
                                    Title: Times New Roman 16pt <b>Bold</b>.
                                </li>
                                <li>
                                    Body: Times New Roman 12pt.
                                </li>
                                <li>
                                    Layout: Justify.
                                </li>
                                <li>
                                    Line Spacing: 1.5 Lines
                                </li>
                                <li>
                                    Margin: Normal (top&bottom: 2.5cm, left: 2cm, right: 1.5cm).
                                </li>
                                <li>
                                    File Name: [TEAM NAME]_[3 FIRST WORD OF PAPER TITLE]
                                </li>
                                <li>
                                    Header: [PAPER TITLE]---COMPUTERUN2020
                                </li>
                                <li>
                                    Footer: [Page Number] (halaman satu dimulai setelah cover)
                                </li>
                            </ul>
                        <li>
                            Proposal dibuat dalam <b>Bahasa Indonesia</b>.
                        </li>
                        <li>
                            File dari proposal yang telah dikerjakan wajib menggunakan <b>format <code>.pdf</code></b>
                        </li>
                        <li>
                            Rules lengkapnya akan disampaikan <b>pada saat <i>technical meeting</i></b>.
                        </li>
                    </ol>
                </div> --}}
            </div>
            <h2 class="full-underline content-divider">Timeline</h2>
            <div class="margin-3 h5">
                <img src="img/icons/bcase-timeline.png">
            </div>
            {{-- <h1 class="full-underline content-divider">general FAQ</h1>
            <div class="margin-2 h5">
                <p>Q: Bagaimana cara untuk mengikuti kompetisi yang diadakan?<br>
                    <b>A: Setelah mengunjungi web <i><a href="/">www.computerun.id</a></i>, kamu dapat memilih menu "Register" yang terdapat di setiap laman cabang kompetisi yang ingin kamu ikuti.</b>
                </p>
                <p>Q: Apakah saya bisa mendaftar untuk 2-3 kompetisi sekaligus?<br>
                    <b>A: Ya, tentu saja. Asalkan kamu tetap memenuhi persyaratan yang ada.</b>
                </p>
                <p>Q: Apa saja persyaratan yang dibutuhkan untuk mengikuti kompetisi Computerun?<br>
                    <b>A: Silahkan unduh panduan syarat dan ketentuan kompetisi Computerun <a href="#rules">di sini</a>.</b>
                </p>
                <p>Q: Keuntungan apa yang akan saya dapatkan apabila mengikuti kompetisi Computerun?<br>
                    <b>A: Partisipan akan mendapatkan e-sertifikat dan menambah pengalaman berkompetisi berskala nasional.</b>
                </p>
                <p>Q: Setelah mendaftar bagaimana saya mendapatkan informasi lebih lanjut untuk kompetisi?<br>
                    <b>A: Setelah mendaftar, kamu akan menerima e-mail resmi dari Computerun dan akan mendapat seluruh informasi mengenai kompetisi melalui e-mail.</b>
                </p>
            </div> --}}
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
