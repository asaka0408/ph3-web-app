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
                        <p class="time_each_hours">{{ $study_day_time->pluck('day_time')[0] }}</p><br>
                        <p class="time_each_unit">hour</p>
                    </li>
                    <li class="time_each">
                        <p class="time_each_title">Month</p><br>
                        <p class="time_each_hours">{{ $study_month_time->pluck('day_time')[0] }}</p><br>
                        <p class="time_each_unit">hour</p>
                    </li>
                    <li class="time_each">
                        <p class="time_each_title">Total</p><br>
                        <p class="time_each_hours">{{ $study_total_time->pluck('total_time')[0] }}</p><br>
                        <p class="time_each_unit">hour</p>
                    </li>
                </ul>
                <div class="bar_graf">
                    <canvas id="myBarChart"></canvas>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
                    <script>
                        let daytime = '{!! json_encode($day_times->pluck('day_time')) !!}';
                        // クオテーションがエスケープ（文字化け的な）されるのを無効化するための｛!!!!｝
                        // そのままだと、エンコードしたものが、jsとして動かない
                        // まずは、jason文字列として渡して、パースでデコードする必要があるからシングルクオで囲む
                        let daytime_study = JSON.parse(daytime);
                        daytime_study = daytime_study.map(function(item) {
                            return item = Number(item)
                        })
                        // console.log(daytime_study);
                        var ctx = document.getElementById("myBarChart");
                        var myBarChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['', 2, '', 4, '', 6, '', 8, '', 10, '', 12, '', 14, '', 16, '', 18, '', 20, '', 26, '', 28,
                                    '', 30
                                ],
                                datasets: [{
                                    label: 'hours',
                                    data: daytime_study,
                                    backgroundColor: "#3f8dcb"
                                }]
                            },
                            options: {
                                // responsive: true,
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                },
                                scales: {
                                    yAxes: [{
                                        stacked: false,
                                        gridLines: {
                                            display: false
                                        },
                                        ticks: {
                                            suggestedMax: 8,
                                            suggestedMin: 0,
                                            stepSize: 2,
                                            callback: function(value, index, values) {
                                                return value + 'h'
                                            }
                                        }
                                    }],
                                    xAxes: [{
                                        stacked: false,
                                        gridLines: {
                                            display: false,
                                        },
                                        ticks: {
                                            stepSize: 2,
                                            suggestedMax: 30,
                                            suggestedMin: 1,
                                            callback: function(value, index, values) {
                                                return value + ''
                                            }
                                        }
                                    }],
                                },
                            }
                        });
                    </script>
                </div>
            </section>
            <section class="sircle_graf_container">
                <li class="sircle_graf_each">
                    <p class="sircle_graf_each_title">学習言語</p>
                    <canvas class="sircle_graf_each_graf" id="sircleGrafLanguages">
                    </canvas>
                    <script>
                        var dataLabelPlugin = {
                            afterDatasetsDraw: function(chart, easing) {
                                // To only draw at the end of animation, check for easing === 1
                                var ctx = chart.ctx;

                                chart.data.datasets.forEach(function(dataset, i) {
                                    var dataSum = 0;
                                    dataset.data.forEach(function(element) {
                                        dataSum += element;
                                    });

                                    var meta = chart.getDatasetMeta(i);
                                    if (!meta.hidden) {
                                        meta.data.forEach(function(element, index) {
                                            // Draw the text in black, with the specified font
                                            ctx.fillStyle = 'rgb(255, 255, 255)';

                                            var fontSize = 12;
                                            var fontStyle = 'normal';
                                            var fontFamily = 'Helvetica Neue';
                                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                                            // Just naively convert to string for now
                                            var labelString = chart.data.labels[index];
                                            var dataString = (Math.round(dataset.data[index] / dataSum * 1000) / 10)
                                                .toString() + "%";

                                            // Make sure alignment settings are correct
                                            ctx.textAlign = 'center';
                                            ctx.textBaseline = 'middle';

                                            var padding = 5;
                                            var position = element.tooltipPosition();
                                            // ctx.fillText(labelString, position.x, position.y - (fontSize / 2) - padding);
                                            ctx.fillText(dataString, position.x, position.y + (fontSize / 2) -
                                                padding);
                                        });
                                    }
                                });
                            }
                        };

                        let language_time = [0, 0, 0, 0, 0, 0, 0, 0];
                        let languages_time = '{!! json_encode($languages_time) !!}';
                        let languages_study_time = JSON.parse(languages_time);
                        languages_study_time.forEach(language_study_time => {
                            const language_index = language_study_time['language_name']-1
                            language_time[language_index] = Number(language_study_time['language_time'])
                        }) 
                        console.log(language_time);

                        var ctx = document.getElementById("sircleGrafLanguages");
                        var sircleGrafLanguages = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ["HTML", "CSS", "JavaScript", "PHP", "Laravel", "SQL", "SHELL", "その他"], //データ項目のラベル
                                datasets: [{
                                    backgroundColor: [
                                        "#65ccf9",
                                        "#2d72b8",
                                        "#204be3",
                                        "#55bbda",
                                        "#aea1ee",
                                        "#654fe4",
                                        "#412ce5",
                                        "#291db9"
                                    ],
                                    data: language_time //グラフのデータ
                                }]
                            },
                            options: {
                                legend: {
                                    position: 'bottom'
                                },
                                maintainAspectRatio: false,
                                responsive: true,
                                layout: { //レイアウトの設定
                                    padding: {
                                        left: 30,
                                        right: 30,
                                        top: 0,
                                        bottom: 50
                                    }
                                }
                            },
                            plugins: [dataLabelPlugin],
                        });
                    </script>
                </li>
                <li class="sircle_graf_each">
                    <p class="sircle_graf_each_title">学習コンテンツ</p>
                    <canvas class="sircle_graf_each_graf" id="sircleGrafContents">
                    </canvas>
                    <script>
                        let content_time = [0, 0, 0];
                        let content_study_time = '{!! json_encode($content_time) !!}';
                        let contents_time_study = JSON.parse(content_study_time);
                        contents_time_study.forEach(content_time_study => {
                            const content_index = content_time_study['content_name']-1
                            content_time[content_index] = Number(content_time_study['content_time'])
                        }) 
                        // console.log(content_time);

                        var ctx = document.getElementById("sircleGrafContents");
                        var sircleGrafContents = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ["N予備校", "ドットインストール", "POSSE課題", ], //データ項目のラベル
                                datasets: [{
                                    backgroundColor: [
                                        "#2d72b8",
                                        "#204be3",
                                        "#55bbda",
                                    ],
                                    data: content_time//グラフのデータ
                                }]
                            },
                            options: {
                                // responsive: true,
                                legend: {
                                    position: 'bottom',
                                    layout: {
                                        padding: {
                                            top: 100,
                                        },
                                    }
                                },
                                maintainAspectRatio: false,
                                title: {
                                    display: true,
                                },
                                layout: { //レイアウトの設定
                                    padding: {
                                        left: 30,
                                        right: 30,
                                        top: 0,
                                        bottom: 120
                                    }
                                }
                            },
                            plugins: [dataLabelPlugin],
                        });
                    </script>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/webapp.js"></script>
</body>

</html>
