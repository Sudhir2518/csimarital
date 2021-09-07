<nav id="header" class="fixed bg-blue-900 w-full sm:px-6 lg:px-8 z-autotop-0 text-white
 ">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center space-x-2">
        <div class="flex-auto text-left max-w-sm pl-1 pr-5">
            @if(Request::is('/') Or Request::is('welcomeuser'))
            {{ __('')}}
            @else
            <a href="javascript:history.back()"><img src="{{ asset('images/back.png')}}" class=" w-10" /></a>
            @endif
        </div>
        <div class="flex-auto items-center">
            <a href="{{route('welcomeuser')}}" class="h-12 flex">
                <img src="{{ asset('images/logo_csimf.png')}}" class="w-12" />
                <x-logo class="block h-2 w-auto" />
            </a>
              
        </div>
        <div class="flex-end block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-gray-100 hover:text-greem-100 focus:outline-none focus:shadow-outline transform transition hover:scale-900 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
      </div>
     
      <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-blue-600 lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
           <ul class="list-reset lg:flex justify-end flex-1 items-center">
            @auth

            <li class="mr-3">


                <div >

                    @if(Auth::user()->profile_photo)
                    <button class="bg-gray-300  text-gray-700 font-semibold rounded inline-flex items-center">
                        <span class="mr-1"><img src="{{ Storage::url('profile_photo/'. Auth::user()->profile_photo)}}" class=" w-8 h-8 rounded-full" /></span>

                    </button>
                    @else
                    <button class="bg-gray-300  text-gray-700 font-semibold rounded inline-flex items-center">
                        <span class="mr-1"><img src="{{ Storage::url('profile_photo/dummy.jpeg')}}" class=" w-8 h-8 rounded-full" /></span>

                    </button>
                    @endif

                </div>

            </li>
            <li class="mr-3 ">
                
                  
                    <div class="dropdown w-full inline-block relative ">
                      <button class="bg-blue-600 md:bg-blue-900 text-white-700 font-semibold py-2 px-4 rounded inline-flex items-center text-green-100 no-underline hover:text-yellow-100 hover:text-underline font-fira">
                        <span class="mr-1">{{ Auth::user()->first_name}}&nbsp;{{ Auth::user()->last_name}}</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                      </button>
                      <ul class="dropdown-menu  absolute hidden text-gray-700 pt-1  ">
                          @auth
                          @if(Auth::user()->isAdmin)
                          <li class=""><a class="rounded-t bg-blue-300  hover:bg-blue-500 py-2 px-4 block whitespace-no-wrap font-fira text-sm font-bold " href="{{ route('admin')}}">Admin Panel</a></li>
                          @endif
                          @endauth
                        <li class=""><a class="rounded-t bg-blue-200 hover:bg-blue-500 py-2 px-2 block whitespace-no-wrap font-fira text-sm font-bold" href="{{ route('profiler')}}">Manage Profile</a></li>
                        @if(!Auth::user()->isAdmin)
                        <li class=""><a class="rounded-b bg-blue-200 hover:bg-blue-500 py-2 px-2 block whitespace-no-wrap font-fira text-sm font-bold" href="{{ route('matches')}}">View your matches</a></li>
                        @endif
                        <li class="rounded-b bg-red-400 hover:bg-blue-400 text-blue-900 font-bold py-2 px-4 block whitespace-no-wrap" >
                            <form action="{{ route('logout') }}" method="post" class="p-3 inline no-underline hover:text-Red-100 hover:text-underline font-fira">
                                @csrf
                                <button class="bg-red-400 hover:bg-blue-400 w-full text-sm font-bold font-fira" type="submit">Logout</button>
                            </form>
                          </li>
                      
                    </ul>
                    </div>



            </li>

              <li class="mr-3">
                @if(!Auth::user()->isAdmin)
                 <a href="{{ route('viewallmatch')}}"><button class="bg-yellow-300 text-yellow-700 text-lg font-sans rounded-md px-2 ml-2 mt-4 lg:mt-0">
                       Browse Matches
                 </button></a>
                 @endif
              </li>
                @else
                <li class="mr-3">
                    <a class="inline-block text-green-100 no-underline hover:text-yellow-100 hover:text-underline py-2 px-4" href="{{ route('login' )}}">login</a>
                  </li>
                  <li class="mr-3">
                    <a class="inline-block text-green-100 no-underline hover:text-yellow-100 hover:text-underline py-2 px-4" href="{{ route('register') }}">Register</a>
                  </li>

                  <li class="mr-3">

                  </li>
            @endauth


        </ul>

      </div>
    </div>
    <hr class="border-b border-green-500 opacity-25 my-0 py-0" />
  </nav>

