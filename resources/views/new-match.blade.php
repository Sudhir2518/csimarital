


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
                  <h1 class="heading ">You posted a new Match</h1>
                </div>

                <div style="padding:10px border-bottom: solid thin gray;">
                  <p>
                    Hellow, {{ $user->first_name}} <br><br>
                    It looks like you just posted a new match as below</br>
                    <span style="font:bold; margin-top:40px; margin-botton:40px; padding:10px; font-family:'Times New Roman', Times, serif; color:Maroon; font-size:30px">{{ $newmatch->first_name}}&nbsp; {{ $newmatch->last_name }}</span></br>

                  kindly wait for the review and approval by the Admin.</br>

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
