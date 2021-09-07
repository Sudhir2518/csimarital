


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

                <div style="padding:10px; border-bottom: solid thin gray" style="height:40px">
                  <div class="text-red text-sm font-bold">
                    <h1 style="font-family:Arial, Helvetica, sans-serif; font-weight:bold;  font-size:40px; color:green">

                        CSIMarital
                    </h1>

                  </div>
                  <h1 class="heading ">Someone Liked your Match</h1>
                </div>

                <div style="padding:10px border-bottom: solid thin gray;">
                  <p>
                    Hey, Suma<br><br>
                    It looks like &nbsp; <span style="font:bold; font-family:'Times New Roman', Times, serif; color:rgb(53, 31, 4);font-weight:bold; font-size:20px">{{ $likedmatch->first_name }} &nbsp; {{ $likedmatch->last_name }}</span>&nbsp;one of the matches
                    posted by you, is liked by </br>
                    <span style="font:bold; margin-top:40px; margin-botton:40px; padding:10px; font-family:'Times New Roman', Times, serif; color:Maroon; font-size:30px">{{ $likeduser->first_name}}&nbsp; {{ $likeduser->last_name }}</span>
                    <span style="font:bold; margin-top:40px; margin-botton:40px; padding:10px; font-family:'Times New Roman', Times, serif; color:rgb(4, 37, 85); font-size:30px">{{ $likeduser->surname }}</span>
                    <p style="font-weight:bold;color:midnightblue;font-style:italic"><span style="font-style:normal;font-weight:bold:color:Maroon">Email:</span>{{ $likeduser->email }}</p>
                  </p>

                  Kindly  <a href="{{ url('/login')}}" ><button style="background-color: rgb(25, 107, 25) ; color:white; padding:3px; cursor:pointer;padding:5px 8px 5px 8px">
                 LOGIN
                  </button></a> to your account and go to 'view your matches' page for details.

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
