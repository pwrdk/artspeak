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
        <link rel="stylesheet" href="/assets/vendor/font-awesome-4.5.0/css/font-awesome.min.css">

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

                padding:20px;
            }

            .content {
                
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
                <div class="title">INPUT</div>
                <br />
                <div class="col-md-6">
                <h4>Verbs</h4>
                <ul class="list-group">
                    <li class="list-group-item" v-for="verb in verbs">
                    @{{ verb.word }}
                    <span class="pull-right">
                        <button type="button" class="btn btn-danger btn-xs" @click="remove(verb.id)"><i class="fa fa-trash"></i></button>
                    </span>
                    </li>
                    <li class="list-group-item">
                        <input type="text" class="form-control" v-model="newVerb" @keyup.enter="add(1)" />
                    </li>
                </ul>
                </div>
                <div class="col-md-6">
                <h4>Nouns</h4>
                <ul class="list-group">
                    <li 
                        class="list-group-item" v-for="noun in nouns">
                        @{{ noun.word }}
                        <span class="pull-right">
                            <button type="button" class="btn btn-danger btn-xs" @click="remove(noun.id)"><i class="fa fa-trash"></i></button>
                        </span>
                    </li>
                    <li class="list-group-item">
                        <input type="text" class="form-control" v-model="newNoun" @keyup.enter="add(2)" />
                    </li>
                </ul>
                </div>
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="/assets/js/input.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>
