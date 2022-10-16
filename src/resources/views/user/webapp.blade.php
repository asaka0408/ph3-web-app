<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posse-webapp</title>
    {{-- <link rel="stylesheet" href="../css/reset.css"> --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>

<body>
    <header class="header">
        <div class="header_logo_week">
            <img src="{{ asset('/img/posseLogo.png') }}" alt="POSSEロゴ">
            <p>4th week</p>
        </div>
        <button class="header_record_and_post_btn" onclick="showModal()">記録・投稿</button>
    </header>


    <main class="page_container">
        <div id="pageBackground"></div>
        <div class="main_container">
            <section class="time_bar_graf">
                <ul class="time_container">
                    <li class="time_each">
                        <p class="time_each_title">Today</p><br>
                        <p class="time_each_hours">3</p><br>
                        <p class="time_each_unit">hour</p>
                    </li>
                    <li class="time_each">
                        <p class="time_each_title">Month</p><br>
                        <p class="time_each_hours">120</p><br>
                        <p class="time_each_unit">hour</p>
                    </li>
                    <li class="time_each">
                        <p class="time_each_title">Total</p><br>
                        <p class="time_each_hours">1348</p><br>
                        <p class="time_each_unit">hour</p>
                    </li>
                </ul>
                <div class="bar_graf">
                    <canvas id="myBarChart"></canvas>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
                </div>
            </section>
            <section class="sircle_graf_container">
                <li class="sircle_graf_each">
                    <p class="sircle_graf_each_title">学習言語</p>
                    {{-- <canvas class="sircle_graf_each_graf" id="sircleGrafLanguages">
          </canvas> --}}
                </li>
                <li class="sircle_graf_each">
                    <p class="sircle_graf_each_title">学習コンテンツ</p>
                    {{-- <canvas class="sircle_graf_each_graf" id="sircleGrafContents">
          </canvas> --}}
                </li>
            </section>

        </div>

        <div class="now_time_container">
            <p class="now_time_flame">＜</p>
            <p>2020年10月</p>
            <p class="now_time_flame">＞</p>
        </div>

        <button class="sp_record_and_post_btn" onclick="showModal()">記録・投稿</button>

    </main>

    <section id="modalContainer" class="modal_container">
        <span id="modalBackBtn" class="modal_back_btn" onclick="closeModal()"></span>
        <form action="/" class="modal_form" name="modal_form">

            <div class="modal_form_first">
                <div class="modal_form_date">
                    <label for="date">学習日</label>
                    <input id="date" type="date" name="date">
                </div>
                <div class="modal_form_contents">
                    <label for="contents">学習コンテンツ（複数選択可）</label>
                    <div class="modal_form_contents_selections">
                        <input type="checkbox" name="contents">N予備校
                        <input type="checkbox" name="contents">ドットインストール
                        <br>
                        <input type="checkbox" name="contents">POSSE課題
                    </div>
                </div>
                <div class="modal_form_languages">
                    <label for="languages">学習言語（複数選択可）</label>
                    <div class="modal_form_languages_selections">
                        <input type="checkbox" name="languages">HTML
                        <!-- テーブル（見出しと中身）とかの表で使うやつだからなくてもおけ -->
                        <input type="checkbox" name="languages">CSS
                        <input type="checkbox" name="languages">JavaScript
                        <br>
                        <input type="checkbox" name="languages">PHP
                        <input type="checkbox" name="languages">Laravel
                        <input type="checkbox" name="languages">SQL
                        <input type="checkbox" name="languages">SHELL
                        <br>
                        <input type="checkbox" name="languages">情報システム基礎知識（その他）
                    </div>
                </div>
            </div>

            <div class="modal_form_second">
                <div class="modal_form_hours">
                    <label for="hours">学習時間</label>
                    <input id="hours" type="text" name="hours">
                </div>
                <div class="modal_form_twitter">
                    <label for="twitter">Twitter用コメント</label>
                    <textarea name="twitter" id="twitter" cols="30" rows="10"></textarea>
                    <dd class="modal_form_twitter_btn"><input type="radio" name="tweet"
                            onclick="radioDeselection(this, 1)">Twitterに自動投稿する
                </div>
            </div>
        </form>

        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>

        <button id="modalFormAnchor" class="modal_record_and_post_btn">記録・投稿</button>
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script> --}}


    </section>

    <section id="postedContainer" class="posted_container">
        <span id="postedBackBtn" class="modal_back_btn" onclick="closePosted()"></span>
        <p>記録・投稿 完了しました</p>
    </section>

    <div id="background"></div>

    <div id="postedScrean" class="posted_screen">

    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../js/webapp.js"></script> --}}
</body>

</html>