<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Vue HTML PostCSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/front/build/css/main.css')}}">
</head><body>
<div id="app" class="main-wrapper">

    <bg-slider></bg-slider>
    <section>
        <div class="content">
            <div class="wrapper">
                <t-animation></t-animation>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="content-sub-title__wrapper">
                                <div class="content__sub-title">Vue HTML PostCSS</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <div class="content-sub-title__wrapper">
                                <div class="content__sub-title">Template</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-clocks">
                    <clocks></clocks>
                </div>
                <store></store>
            </div>
        </div>
    </section>

</div>
<script src="{{asset('/front/build/js/app.js')}}"></script>
</body>
</html>
