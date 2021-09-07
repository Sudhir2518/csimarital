<?php

namespace App\Http\Livewire;

use App\Mail\NewMatch;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Designation;
use App\Models\Diocese;
use App\Models\Edufield;
use App\Models\Eduqual;
use App\Models\Matche;
use App\Models\Occupation;
use App\Models\Organization;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;


class AddMatch extends Modal
{
    use WithFileUploads;



    public  $category_id, $first_name, $last_name, $surname, $bust_image, $full_image, $user_id,

    $date_of_birth, $place_of_birth, $height, $academic, $field_of_edu, $diocese, $church, $about,
    $eduqual_id, $edufield_id, $fname, $mname, $foccu, $moccu, $sisters, $brothers, $about_family,
    $occupation, $designation, $organization, $country_id, $state, $city, $occupation_id, $designation_id,
    $organization_id, $city_id, $state_id , $diocese_id, $membership;

    public $currentPage = 1;
    public $success;
    public $modalFormVisible = false;
    public $viewMatchModal = false;
    public $rbust;
    public $rfull;
    public $editShowModal = false;
    public $editMatch;
    public $err;

    protected $dateFormat = 'd-m-Y';


    public $fileExtention;
    public $fileExtention1;
    public $progress = null;

    public $pages = [
        1 => [
            'heading' => 'Personal information of the prospect',
            'subheading' => '',
        ],
        2 => [
            'heading' => 'Family information',
            'subheading' => '',
        ],

        3 => [
            'heading' => 'Professional Information',
            'subheading' => '',
        ],
    ];

    private $validationRules = [
        1 => [
            'bust_image' => ['required', 'mimes:png,jpg,svg,jpeg','max:2048'],
            'full_image' => ['required', 'mimes:png,jpg,svg,jpeg','max:2048'],
            'category_id'       => ['required'],
            'first_name' => ['required', 'max:200' ],
            'last_name' => ['required', 'max:200' ],
            'surname' => ['required', 'max:200' ],
             'date_of_birth' => ['required'],
             'place_of_birth' => ['required'],
             'height' => ['required','numeric','min:140','max:180'],
             'eduqual_id' => ['required'],
             'edufield_id' => ['required'],
             'about' => ['sometimes','max:2000'],




        ],
        2 => [
            'fname' => ['required'],
             'mname' => ['required'],
             'foccu' => ['required'],
             'moccu' => ['required'],
             'sisters' => ['required'],
             'brothers' => ['required'],
             'diocese_id' => ['required'],
             'church' => ['required'],
             'about_family' => ['sometimes'],
        ],

        3=>[

            'occupation_id' => ['required'],
            'designation_id' => ['required'],
            'organization_id' => ['required'],
            'country_id' => ['required','max:100'],
            'city_id' => ['required','max:100'],
            'state_id' => ['required','max:100'],
            'membership' => ['required','mimes:png,jpg,svg,jpeg,pdf','max:2048']

        ]
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
    }

    public function goToNextPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }

    public function resetSuccess()
    {
        $this->reset('success');
    }


    public function submit()
    {
          $this->progress = "please wait ....";

        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        if(!empty($this->bust_image)){

            $image = $this->bust_image;
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/prop_bust/' . $fileExtention);

            $img = Image::make($image)->fit(636,650);
            $img->save($location,80);


        }

        if(!empty($this->full_image)){

            $image1 = $this->full_image;
            $imageName1 = $image1->getClientOriginalName();
            $imageNewName1 = explode('.', $imageName1)[0];
            $fileExtention1  = time() . '.' . $imageNewName1 . '.' . $image1->getClientOriginalExtension();
            $location       = storage_path('app/public/prop_full/' . $fileExtention1);
            $img1 = Image::make($image1)->fit(736,960);
            $img1->save($location,80);



        }

        if(!empty($this->membership)){

            $image2 = $this->membership;
            $imageName2 = $image2->getClientOriginalName();
            $imageNewName2 = explode('.', $imageName2)[0];
            $fileExtention2  = time() . '.' . $imageNewName2 . '.' . $image1->getClientOriginalExtension();
            $location       = storage_path('app/public/member_card/' . $fileExtention2);
            Image::make($image2)->resize(600,800)->save($location, 80);



        }

        if($this->country_id == 1){
             $stname = State::find($this->state_id);
           
        }

        $match = Matche::create([
            'category_id'       => $this->category_id,
            'bust_image'        => $fileExtention,
            'full_image'        => $fileExtention1 ,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'surname'           => $this->surname,
            'user_id'           => Auth::user()->id,
            'date_of_birth'     => $this->date_of_birth,
            'place_of_birth'    => $this->place_of_birth,
            'height'            => $this->height,
            'eduqual_id'        => $this->eduqual_id,
            'edufield_id'       => $this->edufield_id,
            'diocese_id'           => $this->diocese_id,
            'church'            => $this->church,
            'about'             => $this->about,
            'fname'             => $this->fname,
            'mname'             => $this->mname,
            'foccu'             => $this->foccu,
            'moccu'             => $this->moccu,
            'sisters'           => $this->sisters,
            'brothers'          => $this->brothers,
            'about_family'      => $this->about_family,
            'occupation_id'     => $this->occupation_id,
            'designation_id'    => $this->designation_id,
            'organization_id'   => $this->organization_id,
            'country_id'         => $this->country_id,
            'state_id'             => $stname->state,
            'city_id'              => $this->city_id,
            'membership'          => $fileExtention2,
        ]);



        $this->reset();
        $this->resetValidation();
        $user = Auth::user();

      $this->success="New match is uploaded successfully, kindly wait for sometime while the same is reviewed and approved by the Admin";

       Mail::to(Auth::user()->email)->send(new NewMatch($match,$user));
        $this->progress = "";
        return redirect()->to('matches');

         $this->progress = "";
    }





    public function render()
    {



        return view('livewire.add-match',[
            'matches' => Matche::all()->where('user_id', Auth::user()->id),
            'eduquals' => Eduqual::all(),
            'edufields' => Edufield::all(),
            'occupations' => Occupation::all(),
            'organizations' => Organization::all(),
            'designations' => Designation::all(),
            'res_states'  => Country::all(),
            'typeofmatches' => Category::all(),
            'states' => State::all(),
            'cities'  => City::all()->where('state_id', $this->state_id),
            'cities1' => City::all(),
            'dioceses' => Diocese::all(),
            'countries' => Country::all(),
            'progress' => $this->progress,

        ]);
    }
}
