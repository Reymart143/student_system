<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'name'            => ['required', 'string', 'max:255'],
            // 'student_id'      => ['required'],
            'gender'          => ['required'],
            'birthday'        => ['required'],
            'location'        => ['required'],
            'phone'           => ['required'],
            'grade_level'     => ['required'],
            'name_guardian'   => ['required'],
            'contact_guardian'=> ['required'],
            'username'        => ['required','unique:users'],
            'password'        => $this->passwordRules(),
            'terms'           => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
            
        $birthdate = Carbon::parse($input['birthday']);
   
        $age = $birthdate->age;

        return User::create([
            'name'            => $input['name'],
            'student_id'      => $this->getStudentNum(),
            'gender'          => $input['gender'],
            'birthday'        => $input['birthday'],
            'age'             => $age,
            'email'           => $input['email'],
            'location'        => $input['location'],
            'phone'           => $input['phone'],
            'grade_level'     => $input['grade_level'],
            'name_guardian'   => $input['name_guardian'],
            'contact_guardian'=> $input['contact_guardian'],
            'username'        => $input['username'],
            'password'        => Hash::make($input['password']),
        ]);
    }
   
    //generated id of student
    private function getStudentNum()
    {
        do {
          
            $lastAccountId      = User::pluck('student_id')->last();  
            $lastYearPart       = substr($lastAccountId, 0, 4);
            $lastIncrementPart  = (int)substr($lastAccountId, -2);
            $currentYear        = date('Y');
            $newIncrementPart   = ($currentYear == $lastYearPart) ? $lastIncrementPart + 1 : 1;
            $newAccountId       = $currentYear . str_pad($newIncrementPart, 2, 0, STR_PAD_LEFT);
            $exists             = User::where('student_id', $newAccountId)->exists();
        } while ($exists);
    
        return $newAccountId;
    }
}
