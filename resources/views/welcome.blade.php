<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>ArtSpeak</title>

        <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'PT Sans';
            }

            .container {
                text-align: center;
                padding:20px;
            }

            .content {
                display: inline-block;
            }

            .title {
                font-size: 46px;
            }
            h3 {
                margin-top: 200px;
                font-size: 96px;
                text-transform: uppercase;
            }
            .range {
                display: table;
                position: relative;
                height: 25px;
                margin-top: 20px;
                background-color: rgb(245, 245, 245);
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                cursor: pointer;
            }

            .range input[type="range"] {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                -ms-appearance: none !important;
                -o-appearance: none !important;
                appearance: none !important;

                display: table-cell;
                width: 100%;
                background-color: transparent;
                height: 25px;
                cursor: pointer;
            }
            .range input[type="range"]::-webkit-slider-thumb {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                -ms-appearance: none !important;
                -o-appearance: none !important;
                appearance: none !important;

                width: 11px;
                height: 25px;
                color: rgb(255, 255, 255);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0px;
                background-color: rgb(153, 153, 153);
            }

            .range input[type="range"]::-moz-slider-thumb {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                -ms-appearance: none !important;
                -o-appearance: none !important;
                appearance: none !important;
                
                width: 11px;
                height: 25px;
                color: rgb(255, 255, 255);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0px;
                background-color: rgb(153, 153, 153);
            }

            .range output {
                display: table-cell;
                padding: 3px 5px 2px;
                min-width: 40px;
                color: rgb(255, 255, 255);
                background-color: rgb(153, 153, 153);
                text-align: center;
                text-decoration: none;
                border-radius: 4px;
                border-bottom-left-radius: 0;
                border-top-left-radius: 0;
                width: 1%;
                white-space: nowrap;
                vertical-align: middle;

                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                -ms-transition: all 0.5s ease;
                transition: all 0.5s ease;

                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: -moz-none;
                -o-user-select: none;
                user-select: none;
            }
            .range input[type="range"] {
                outline: none;
            }

            .range.range-primary input[type="range"]::-webkit-slider-thumb {
                background-color: rgb(66, 139, 202);
            }
            .range.range-primary input[type="range"]::-moz-slider-thumb {
                background-color: rgb(66, 139, 202);
            }
            .range.range-primary output {
                background-color: rgb(66, 139, 202);
            }
            .range.range-primary input[type="range"] {
                outline-color: rgb(66, 139, 202);
            }
        </style>
    </head>
    <body id="body">
        <div class="container">
            <div class="content">
                <div class="title">ArtSpeak 1.0</div>
                <br />
                <div>
                <button class="btn btn-lg btn-primary" @click="start"><span v-if="!started">Start</span><span v-else>Stop for helvede</span></button>
                <hr />
                <h3 v-if="started">@{{ words[0] }} @{{ words[1] }}</h3>
                </div>
            </div>
            <div v-if="started" style="padding-top: 140px;" class="col-md-6 col-md-offset-3">
            <h4>Pause mellem ord: @{{ intervals.words }} sec</h4>
            <div class="range range-primary">
                <input type="range" name="range" min="1" max="10" value="1" v-model="intervals.words">
                <output id="range">@{{ intervals.words }}</output>
            </div>
            <br />
            <h4>Pause mellem sætninger: @{{ intervals.sections }} sec</h4>
            <div class="range range-primary">
                <input type="range" name="range" min="1" max="10" value="5" v-model="intervals.sections">
                <output id="range">@{{ intervals.sections }}</output>
            </div>
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
        <script src="/assets/js/main.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
