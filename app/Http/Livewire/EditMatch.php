<?php

namespace App\Http\Livewire;

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
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class EditMatch extends Modal
{

    use WithFileUploads;



    public $selected_id, $category_id, $first_name,  $last_name, $surname, $bust_image, $full_image, $user_id,

    $date_of_birth, $place_of_birth, $height, $academic, $field_of_edu, $diocese_id, $church, $about,
    $eduqual_id, $edufield_id, $fname, $mname, $foccu, $moccu, $sisters, $brothers, $about_family,
    $occupation, $designation, $organization, $country_id, $state_id, $city_id, $occupation_id, $designation_id,
    $organization_id ;


    public $editmatch;

    public $currentPage = 1;
    public $success;










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

    public function mount($id)
    {

        $this->editmatch = Matche::find($id);

        $this->selected_id      = $id;
        $this->first_name       = $this->editmatch->first_name;
        $this->last_name        = $this->editmatch->last_name;
        $this->surname          = $this->editmatch->surname;
        $this->user_id          = $this->editmatch->user_id;
        $this->date_of_birth    = $this->editmatch->date_of_birth;
        $this->place_of_birth   = $this->editmatch->place_of_birth;
        $this->height           = $this->editmatch->height;
        $this->diocese_id       = $this->editmatch->diocese_id;
        $this->church           = $this->editmatch->church;
        $this->about            = $this->editmatch->about;
        $this->eduqual_id       = $this->editmatch->eduqual_id;
        $this->edufield_id      = $this->editmatch->edufield_id;
        $this->fname            = $this->editmatch->fname;
        $this->mname            = $this->editmatch->mname;
        $this->foccu            = $this->editmatch->foccu;
        $this->moccu            = $this->editmatch->moccu;
        $this->sisters          = $this->editmatch->sisters;
        $this->brothers         = $this->editmatch->brothers;
        $this->about_family     = $this->editmatch->about_family;
        $this->state_id         = $this->editmatch->state_id;
        $this->city_id          = $this->editmatch->city_id;
        $this->occupation_id    = $this->editmatch->occupation_id;
        $this->designation_id   = $this->editmatch->designation_id;
        $this->organization_id  = $this->editmatch->organization_id;
        $this->category_id      = $this->editmatch->category_id;
        $this->country_id       = $this->editmatch->country_id;
    }

    public function render(EditMatch $editmatch)
    {

        if($this->editmatch->user_id === Auth::user()->id){
            return view('livewire.edit-match', compact('editmatch'),[
                'typeofmatches' => Category::all(),
                'edufields'     => Edufield::all(),
                'eduquals'      => Eduqual::all(),
                'occupations'   => Occupation::all(),
                'organizations' => Organization::all(),
                'designations'  => Designation::all(),
                'countries'    => Country::all(),
                'dioceses'     => Diocese::all(),
                'states'      => State::all(),
                'cities'  => City::all()->where('state_id', $this->state_id),
            ]);



        }else{
           dd("YOU ARE NOT AUTHORIZED TO VISIT THIS PAGE");
        }


    }

    public function update()
    {


        $record = Matche::find($this->selected_id);

         if(!empty($this->bust_image)){

            $image = $this->bust_image;
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/prop_bust/' . $fileExtention);
            $img = Image::make($image)->fit(636,650);
            $img->save($location,80);
            File::delete(storage_path('app/public/prop_bust/' . $this->editmatch->bust_image));


        }else{

            $fileExtention = $this->editmatch->bust_image;
        }

        if(!empty($this->full_image)){

            $oldImage1 = storage_path('app/public/prop_bust/'.$this->editmatch->bust_image);
            $image1 = $this->full_image;
            $imageName1 = $image1->getClientOriginalName();
            $imageNewName1 = explode('.', $imageName1)[0];
            $fileExtention1  = time() . '.' . $imageNewName1 . '.' . $image1->getClientOriginalExtension();
            $location       = storage_path('app/public/prop_full/' . $fileExtention1);
            $img = Image::make($image1)->fit(636,650);
            $img->save($location,80);
            File::delete(storage_path('app/public/prop_full/' . $this->editmatch->full_image));



        }else{
            $fileExtention1 = $this->editmatch->full_image;
        }

         $record->update([
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
            'state_id'             => $this->state_id,
            'city_id'              => $this->city_id,
            'diocese_id'        => $this->diocese_id,
         ]);


        $this->reset();
        $this->resetValidation();

        $this->success = 'Match updated successfully!';

        return redirect()->to('matches');



    }
}
