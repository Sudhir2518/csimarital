


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Verify Your Email</title>

    </head>
    <body>

        <div class="app ">

            <div style="max-width:400;margin:auto">

              <div style="margin:2px; padding:15px;">

                <div style="padding:10px; border-bottom: solid thin gray">
                  <div class="text-red text-sm font-bold">
                    <h1 style="font-family:Arial, Helvetica, sans-serif; font-weight:bold;  font-size:40px; color:green">

                        CSIMarital
                    </h1>

                  </div>
                  <h1 class="heading ">E-mail Confirmation</h1>
                </div>

                <div style="padding:10px border-bottom: solid thin gray;">
                  <p>
                    Hellow, {{ $user->first_name }}<br><br>It looks like you just signed up for CSIMarital, that’s awesome! Can we ask you for email confirmation? Just click the button bellow.
                  </p>
                  <a style="" href="{{ url('/user/verify/'.$user->Vuser->token) }}"><button style="background-color:green;padding:8px;curser:pointer; text-decoration:none;font-fmaily:sans;color:white">CONFIRM EMAIL ADRESS</button></a>
                  <p class="text-sm">
                    Keep Rockin'!<br> Your CSIMarital team
                  </p>
                </div>

                <div class="content__footer ">
                  <h3 class="text-base ">Thanks for using CSIMarital!</h3>
                  <p>www.csimarital.in</p>
                </div>

              </div>



          </div>
    </body>
    </html>
