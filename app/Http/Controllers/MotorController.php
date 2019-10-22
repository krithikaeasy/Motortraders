<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Validator;


class MotorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function modelIns()
    {
        return parent::userMotorModelIns();
    }

    public function index()
    {
        $authUser = auth()->user();
        $motors = $authUser->userMotor;
        return view('motor.index')
            ->with('motors', $motors);
    }

    public function create()
    {
        return view('motor.create');
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $input = $request->only([
                'type',
                'manufacture',
                'model_name',
                'reg_number',
                'millage',
                'cc',
                'year',
                'colour',
                'price',
                'description',

                'images', // Motor Images
            ]);

            $validator = Validator::make($input, [
                'type' => ['required', 'max:100'],
                'manufacture' => ['required', 'max:100'],
                'model_name' => ['required', 'max:100'],
                'reg_number' => ['required', 'max:100'],
                'millage' => ['required', 'numeric', 'min:0'],
                'cc' => ['required', 'numeric', 'min:0'],
                'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                'colour' => ['required', 'max:30'],
                'price' => ['required', 'numeric', 'min:0'],
                'description' => ['required', 'max:100'],

                'images' => ['required', 'array', 'min:1', 'max:4'],
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            };

            // Create Motor Data
            // This method inside base controller
            $this->motorCreate($input, $user);

            setSuccessFlashMsg('Motor created successfully');
            return redirect('motor');

        } catch (Exception $e) {
            setErrorFlashMsg($e->getMessage());
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $motor = $this->modelIns()->where('user_id', auth()->id())->find($id);

            if ($motor) {
                return view('motor.edit')
                    ->with('motor', $motor);

            } else {
                setErrorFlashMsg('Data not available. Invalid ID!');
                return redirect('motor');
            }

        } catch (Exception $e) {
            setErrorFlashMsg($e->getMessage());
            return redirect('motor');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $input = $request->only([
                'model_name',
                'reg_number',
            ]);
            $input['id'] = $id;

            $validator = Validator::make(arrayNullAsEmpty($input), [
                'id' => 'required|exists:' . $this->modelIns()->getTable() . ',id',
                'model_name' => ['required', 'max:150'],
                'reg_number' => ['required', 'max:50'],
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            };

            $motor = $this->modelIns()->find($id);
            $motor->model_name = $input['model_name'];
            $motor->reg_number = $input['reg_number'];

            if ($motor->save()) {
                setSuccessFlashMsg('User motor updated successfully');
                return redirect('motor');
            } else {

                setErrorFlashMsg();
                return back();
            }
        } catch (Exception $e) {
            setErrorFlashMsg($e->getMessage());
            return redirect('motor');
        }
    }

    public function destroy($id)
    {
        try {
            $motor = $this->modelIns()->where('user_id', auth()->id())->find($id);

            if ($motor && $motor->forceDelete()) {
                setSuccessFlashMsg('Motor deleted successfully');
            } else {
                setErrorFlashMsg('Data not available. Invalid ID!');
            }
            return redirect('motor');

        } catch (Exception $e) {
            setErrorFlashMsg($e->getMessage());
            return redirect('motor');
        }
    }
}
