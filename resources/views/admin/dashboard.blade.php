<x-app-layout title="AdminPanel">
    <div class="bg-gradient-to-r from-green-300 to-blue-400 font-sans text-gray-900 antialiased">
        <div class="max-w-2xl mx-auto pt-16 rounded-lg ">
              <div class="p-8 bg-gray-100 items-center">

               <div class="font-sans font-bold py-5 rounded-xl bg-gray-400 border-2 border-blue-900 text-center text-xl ">ADMIN PANEL OPTIONS</div>
               <a href="{{ route('members' )}}"><div href="" class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-indigo-400 text-center tex-bold">USERS</div></a>
               <a href="{{ route('adminmatch' )}}"><div href="" class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-pink-400 text-center tex-bold">MACHES</div></a>
               <a href="{{ route('designations.index')}}"><div class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-yellow-500 text-center tex-bold">DESIGNATIONS</div></a>
               <a href="{{ route('occupations.index')}}"><div class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-red-300 text-center tex-bold">OCCUPATIONS</div></a>
               <a href="{{ route('eduquals.index')}}"><div class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-green-300 text-center tex-bold">EDUCATION QUALIFICATIONS</div></a>
               <a href="{{ route('edufields.index')}}"><div class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-indigo-300 text-center tex-bold">EDUCATION FIELDS</div></a>
               <a href="{{ route('organizations.index')}}"><div href="" class="font-sans mt-8 font-bold py-5 px-12 rounded-xl bg-pink-300 text-center tex-bold">ORGANIZATIONS</div></a>

            </div>
        </div>
    </div>
</x-app-layout>
