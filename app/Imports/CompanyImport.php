<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\User;
use App\Rules\VideoTypesRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;

class CompanyImport implements ToModel, WithHeadingRow,  WithValidation
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

        if (auth()->user()->user_type == 'admin') {


            $data = [

            'name' => $row['name'],
            'email' => $row['email'],
            'location' => $row['location'],
            'bio' => $row['bio'],
            'password' => bcrypt($row['password']),
            'user_type' => 'company',
            'daily_video_types' => $row['daily_video_types'],
            'added_by' => auth()->user()->id
            ];

            $uuid = base64_encode(hex2bin(str_replace('-', '', Str::uuid())));
            $system_id = substr($uuid, 0, 10);
            $data['system_id'] = $system_id;

        }
        if(!User::where('email', $row['email'])->exists()){
        User::create($data);
        }else{
            $this->duplicatedEmails[] = $row['email'];
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'daily_video_types' => ['required', new VideoTypesRule()],
            'email' => 'required|email',
            'location' => 'required|max:255',
            'bio' => 'required|max:255',
            'image' => 'nullable|url'
            // Add rules for other columns...
        ];
    }
}
