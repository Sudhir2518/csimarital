@extends('layouts.app')

@section('content')

<x-slot name="header">
    {{ __('WELCOME')}}
</x-slot>

<div class="lg: py-16 sm:py-12  ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-local  overflow-hidden bg-auto shadow-xl z-40 sm:rounded-lg opacity-0.1" style="background-image:url('{{ asset('images/mac.jpg')}}');background-repeat: no-repeat;">
            <div class="container px-18 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-gray-50 px-12 py-12 text-center md:text-center">
                  <p class="uppercase tracking-loose w-full">What business are you?</p>
                  <h1 class="my-4 text-3xl font-bold leading-tight">
                    Main Hero Message to sell yourself!
                  </h1>
                  <p class="leading-normal text-2xl mb-8">
                    Sub-hero message, not too long and not too short. Make it just right!
                  </p>

                </div>

        </div>
        <div class="bg-gray-50 ">
               <div class="grid md:grid-flow-col sm:grid-flow-row">
                   <div class="p-3">
                       <div class="bg-yellow-100  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify ">
                                        <h1 class="w-full text-center">Abut CSIMarital</h1>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                         has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                         took a galley of type and scrambled it to make a type specimen book. It has survived not only
                         five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                          It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                          and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                       </div>

                    </div>
                    <div class="p-3">
                        <div class="bg-yellow-100  my-4 mx-3 rounded-2xl ring-offset-8 p-6 text-justify">
                            <h1 class="w-full text-center">Rules of CSIMarital</h1>

                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                          has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                          took a galley of type and scrambled it to make a type specimen book. It has survived not only
                          five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                           It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                           and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                        </div>

                     </div>


               </div>
        </div>

        <div class="bg-gray-100 ">
            <div class="border-gray-400 rounded-lg p-8 items-center">
                   <div class=" mx-auto bg-grey-light rounded-lg shadow p-8">
                      <h2 class="italic text-right text-blue-darkest text-2xl leading-normal">
                         The Lord said,"it is not good for the man to be alone. I will make him a helper suitable for him"
                      </h2>
                      <p class="text-center pt-8 text-grey-darker">
                         Genesis 2:18
                      </p>
                  </div>
            </div>
        </div>
        <div class="bg-gray-100 p-5 ">
            <x-carousel />
        </div>



    </div>
</div>

@endsection
