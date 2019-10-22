<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use App\UserMotor;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function userModelIns()
    {
        return new User();
    }

    public function userDetailModelIns()
    {
        return new UserDetail();
    }

    public function userMotorModelIns()
    {
        return new UserMotor();
    }


    protected function motorCreate(array $data, $user)
    {
        $motor = $user->userMotor()->create([
            'type' => $data['type'],
            'manufacture' => $data['manufacture'],
            'model_name' => $data['model_name'],
            'reg_number' => $data['reg_number'],
            'millage' => $data['millage'],
            'cc' => $data['cc'],
            'year' => $data['year'],
            'colour' => $data['colour'],
            'price' => $data['price'],
            'description' => $data['description'],
        ]);

        try {
            foreach ($data['images'] as $image) {
                $relativePath = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public', $relativePath, '');

                $motor->motorImages()->create([
                    'url' => $relativePath
                ]);

            }
        } catch (\Exception $e) {
            \Log::error($e);
        }

        try {
            $userDetail = $user->userDetail;

            // https://myaccount.google.com/lesssecureapps //Should Be enabled
            Mail::send('email.motor-create', ['data' => $user, 'motor' => $motor], function ($mail) use ($user, $userDetail) {
                $mail
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->to($user->email, $userDetail->first_name)
                    ->subject('New Motor Added.');
            });
        } catch (\Exception $exception) {
            \Log::error($exception);
        }

        return $user;
    }
}
