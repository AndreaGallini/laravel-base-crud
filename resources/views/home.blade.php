<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SantaZon</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Chakra+Petch&family=Roboto&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .holler {
            width: 100%;
            height: 100vh;
            background: rgb(255, 255, 255);
            background: linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(121, 9, 9, 0.5872724089635855) 35%, rgba(255, 0, 0, 0.7049194677871149) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            padding: 0 1rem;
        }

        #demo {
            text-align: center;
            font-size: 8rem;
            /* text-transform: uppercase; */
            margin-top: 0px;
            color: white;
            text-shadow: 1px 5px 8px rgba(256, 256, 256, 0.3);
            color: rgb(255, 255, 255);
            transition: all 250ms;
            /* font-family: 'Great Vibes', cursive; */
            /* font-family: 'Roboto', sans-serif; */
            font-family: 'Chakra Petch', sans-serif;

        }

        input {
            border-radius: 1rem;
            padding: 0 .5rem;
            height: 25px;
        }

        .butto {
            display: flex;
            gap: 1rem;
            text-transform: uppercase;
        }

        .send {
            border-radius: 2rem;
            height: 25px;
            width: 25px;
            background-color: white;
        }

        .btn {
            text-decoration: none;
            padding: .5rem 2rem;
            border-radius: 1.3rem;
            transition: all 250ms;

        }

        .btn-primary {
            background-color: rgb(96, 196, 76);
            border: 1px solid rgb(85, 172, 68);

        }

        .btn:hover {
            transform: scale(1.1);

            a {
                color: white;
            }
        }

        .btn-primary:hover {
            background-color: rgb(70, 143, 56);
        }

        a {
            text-decoration: none;
            color: white;
        }


        button {
            a {
                text-decoration: none;
                color: white;
            }
        }

        .text_center {
            text-align: center;
            color: white;
        }
    </style>
    </head>

    <body>

        <div class="holler">
            <div id="demo">

            </div>

            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("Dec 25, 2022 12:00:00").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById("demo").innerHTML = days + "Days - " + hours + "h - " +
                        minutes + "m - " + seconds + "s ";

                    // If the count down is over, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = '';
                        window.location.replace("http://127.0.0.1:8000/gift?psw=XxBabboNatalexX");
                    }
                }, 1000);
            </script>
            <div class="text_center">
                <h1>Se sei Babbo Natale accedi qui</h1>
                <form action="{{ route('gift.index') }}">
                    <label for="psw">Inserisci la tua password</label><br>
                    <input type="password" name="psw" id="psw">
                    <button class="send" type="submit" class=" btn btn-primary">&#8594;</button>
                </form>
            </div>

        </div>

    </body>

</html>
