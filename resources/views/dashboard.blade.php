
<x-app-layout title="HOME">


    <div class="w-full lg: py-16 sm:py-12  ">
        <div class="w-full mx-auto ">
            <div class="bg-local border-b-8 border-yellow-900  overflow-hidden bg-auto shadow-xl z-40 sm:rounded-lg opacity-0.1" style="background-image:url('{{ asset('images/csimarital_banner4.jpg')}}');background-repeat: no-repeat;background-size:cover;opacity:1.0;height:400px ">
                <div class="container px-18 mx-auto flex flex-wrap flex-col place-items-start ">
                    <!--Left Col-->
                   <div class="ml-2 lg:ml-0 pb-8 pt-16 text-3xl text-white font-bold font-sans">
                       WELCOME to CSIMarital
                   </div>
               <div class="w-full pl-8 text-5xl text-left text-white font-bold font-dancing">
                    Have a great day
                </div>

                    <livewire:bible-verse />


            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-gray-light rounded-md md:rounded-lg p-8 shadow-md">
                <i class="text-right text-blue-darkest leading-normal">
                   Thanks for signing up for CSIMarital, follow the steps below to start using
                   this site.
                </i>
                <p class="text-center pt-8 text-grey-darker">

                </p>
              </div>


            <div class="bg-gray-50 ">
                   <div class="grid md:grid-cols-2 sm:grid-cols-1">
                       <div class="p-3">
                           <div class="bg-yellow-50  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify ">
                                            <h1 class="w-full text-center text-2xl text-blue-900 font-serif mb-2">Step-1 </br>Register for the site</h1>
                              Registration is only to Parents/Guardians, the wards are not allowed to register. Give all the details
                              on the registration form , be assured that your details will be viewed by only those you allow. Profile photo
                              is optional, but it is recommended to upload your photo. After registration you have to verify you email by clicking
                              the link sent to your registered email, then only you can login.


                           </div>

                        </div>
                        <div class="p-3">
                            <div class="bg-yellow-50  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify ">
                                             <h1 class="w-full text-center text-2xl text-blue-900 font-serif mb-2">Step-2 </br>Login & posting details of the match</h1>

                                Login to your account and you will find your name on top right. On hovering your name, dropdown
                                options will display. Select <b>'view your matches'</b> option to go to view your matches page. There click on
                                <b>'Addmatch'</b> button to procced to post your first match. Provide the details as required and submit
                                your match. Immediately after submitting, you won't see your match display on the page, as the Admin has
                                to review and approve the match. Meanwhile an indication will appear about how may unapproved matches are
                                under your account.
                            </div>

                         </div>

                         <div class="p-3">
                            <div class="bg-yellow-50  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify ">
                                             <h1 class="w-full text-center text-2xl text-blue-900 font-serif mb-2">Step-3 </br>View and Edit your match</h1>

                               After approval by the Admin, you will be able to see your match on the <b>view your matches</b> page. Click on the image to
                               view full details of your match or click on <b>EDIT</b> button to edit your match. If you don't want all others but only those
                               whose match you are interested in, to see the images of your ward, you can toggle off/on the same on view your matches
                               page .
                            </div>

                         </div>
                         <div class="p-3">
                            <div class="bg-yellow-50  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify ">
                                             <h1 class="w-full text-center text-2xl text-blue-900 font-serif mb-2">Step-4 </br>Browse matches of others</h1>
                                On the extreme right of the navigation, you can see the <b>Browse Maches</b> button. You can view the matches posted by all
                                others by clicking the said button. For viewing the matches of others, you should have at least one approved
                                match under your account. Click on the image to view further details and after viewing all the details, if you are interested
                                in the match, you can send your like by clicking <b>Send Message</b> button at the end. Once you send the message, you will be giving
                                access to the said user, to view your profile and contact details.

                            </div>


                         </div>

                         <div class="p-3">
                            <div class="bg-yellow-50  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify ">
                                             <h1 class="w-full text-center text-2xl text-blue-900 font-serif mb-2">Step-5 </br>Communicating </h1>
                                Once someone likes your match, you will receive an email with the details. On the detailed view page of your matches
                                you can find the list of those who liked your matach. On clicking the name, you will be taken to the page where you can
                                view the details of the parent/guardian and the match posted by him. You can use the contact details to initiate
                                communication and proceed further.

                            </div>


                         </div>



                   </div>
            </div>


            <div class="bg-gray-100 p-5 ">
                <x-carousel />
            </div>
        </div>


        </div>
    </div>

    </x-app-layout>
