<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $data = $this->settingService->index();
        // return $data;
        return view('backend.setting.index', compact('data'));
    }

    public function update(Request $request)
    {
        $input['APP_NAME']               = $request->name;
        $input['APP_DESC']               = $request->desc;
        $input['FLIP_API_SECRET_KEY']    = $request->api_secret_key;
        $input['FLIP_VALIDATION_TOKEN']  = $request->validation_token;
        $input['FLIP_ENVIRONMENT']       = $request->environment;
        $input['FLIP_GLOBAL_FEE']        = $request->global_fee;
        $input['FLIP_PUBLIC_KEY']        = $request->public_key;
        $input['FLIP_PRIVATE_KEY']        = $request->private_key;

        $this->settingService->update($input);
        return redirect()->route('dashboard.admin.setting.index')->with('success', 'App setting berhasil diubah');;
    }
}
