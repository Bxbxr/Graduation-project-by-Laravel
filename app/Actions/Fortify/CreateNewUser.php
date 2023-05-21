<?php

namespace App\Actions\Fortify;

use App\Models\Alert;
use App\Models\Team;
use App\Models\User;
use Clockwork\Storage\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'acdamic-no' => ['required_if:type,student', 'numeric', 'nullable'],
            'major_id' => ['required_if:type,student'],
            'level_id' => ['required_if:type,student'],
            'university_id' => ['required_if:type,student'], 
            'student_card_photo' => ['required_if:type,student', 'file', 'mimes:jpeg,png,jpg'], // validate that it's an image file with a MIME type of JPEG or PNG // validate that it's an image file
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'type' => ['required'],
            'gender' => ['required_if:type,student'],
            'majors' => ['array'],
            'majors.*' => ['integer'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            $input['password'] = Hash::make($input['password']);
            if ($input['type'] == 'student') {
                $file_path = $input['student_card_photo']->storePublicly('student_card_photos', 'public');
                $input['student_card_photo'] = $file_path;
                $user = User::create($input);
            } else {
                $user = User::create($input);
                $user->majors()->attach($input['majors']);
            }
            // $user = User::create([
            //     'name' => $input['name'],
            //     'email' => $input['email'],
            //     'academic_number'=>$input['acdamic-no'],
            //     'university_id'=>$input['university_id'],
            //     'major_id' => $input['major_id'],
            //     'level_id' => $input[ 'level_id'],
            //     'student_card_photo' => $file_path ?? null,
            //     'password' => Hash::make($input['password']),
            //     'type' => $input['type'],
            //     'gender' => $input['gender'],
            // ]);

            return tap($user, function (User $user) {
                $this->createTeam($user);
                $alert = Alert::create([
                    'user_id'=>$user->id,
                ]);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
