<?php

namespace App\Http\Controllers;

use App\Customer;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    //
    public function upload()
    {
        return view('dashboard.customer.avatar.upload');
    }

    public function store(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Customer
            $customer = Customer::findOrFail($id);

            if (!$request->hasFile('avatar') || !$request->file('avatar')->isValid()) {
                DB::rollback();
                return back()->withErrors('Image is not valid');
            } else {
                $avatar = $request->avatar;
                $avatarExtension = $avatar->extension();
                $nameAvatar = time() . '_' . $id . '.' . $avatarExtension;

                $saveAvatar = $avatar->storeAs('files', $nameAvatar);

                $file                = new File();
                $file->name          = $nameAvatar;
                $file->original_name = $avatar->getClientOriginalName();
                $file->type          = $avatarExtension;
                $file->subtype       = $avatarExtension;
                $file->save();

                $customer->avatar_id = $file->id;
                $customerSave = $customer->save();

                if ($customerSave) {
                    DB::commit();
                    \Session::flash('message', ['msg' => 'Avatar customer successfully registered', 'class' => 'success']);
                    return back()->withInput();
                } else {
                    DB::rollback();
                    return back()->withErrors('Oops!')->withInput();
                }
            }
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return back()->withErrors('Oops!');
        }
    }
}
