<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow,  WithValidation
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     //
    // }
    protected $duplicatedEmails = [];

    public function __construct(&$duplicatedEmails)
    {
        $this->duplicatedEmails = &$duplicatedEmails;
    }

    public function model(array $row)
    {
        if (auth()->user()->user_type == 'company') {

            $data = [
                'name' =>  $row['name'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
                'password' => bcrypt($row['password']),
                'user_type' => 'user',
                'added_by' => auth()->user()->id
            ];

        }


        // $save = User::create($data);

        if(!User::where('email', $row['email'])->exists()){
            User::create($data);
            }else{
                $this->duplicatedEmails[] = $row['email'];
            }

        // return $save;

    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|max:100',
            'image' => 'nullable|url'
        ];
    }
}
