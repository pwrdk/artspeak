<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>ArtSpeak</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        
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
                font-family: 'Lato';
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
            button: {

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
        </div>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src='//vws.responsivevoice.com/v/e?key=3TCvo9FN'></script>
        <script src="/assets/js/words.js"></script>
        <script src="/assets/js/main.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
