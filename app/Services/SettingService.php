<?php

namespace App\Services;

class SettingService
{
    private function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

    private function setEnv2($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . "=" . "'" . env($key) . "'",
            $key . "=" . "'" . $value . "'",
            file_get_contents(app()->environmentFilePath())
        ));
    }

    public function index()
    {
        $data['FLIP_API_SECRET_KEY']    = config('awanKita')['FLIP_API_SECRET_KEY'];
        $data['FLIP_VALIDATION_TOKEN']  = config('awanKita')['FLIP_VALIDATION_TOKEN'];
        $data['FLIP_ENVIRONMENT']       = config('awanKita')['FLIP_ENVIRONMENT'];
        $data['FLIP_GLOBAL_FEE']        = config('awanKita')['FLIP_GLOBAL_FEE'];
        $data['FLIP_PUBLIC_KEY']        = config('awanKita')['FLIP_PUBLIC_KEY'];
        $data['FLIP_PRIVATE_KEY']        = config('awanKita')['FLIP_PRIVATE_KEY'];

        $data['name']                   = config('app')['name'];
        $data['desc']                   = config('app')['desc'];
        return $data;
    }

    public function update($data)
    {
        $this->setEnv2('APP_NAME', $data['APP_NAME']);
        $this->setEnv2('APP_DESC', $data['APP_DESC']);
        // $this->setEnv2('FLIP_PUBLIC_KEY', $data['FLIP_PUBLIC_KEY']);
        // $this->setEnv2('FLIP_PRIVATE_KEY', $data['FLIP_PRIVATE_KEY']);

        $this->setEnv('FLIP_API_SECRET_KEY', $data['FLIP_API_SECRET_KEY']);
        $this->setEnv('FLIP_VALIDATION_TOKEN', $data['FLIP_VALIDATION_TOKEN']);
        $this->setEnv('FLIP_ENVIRONMENT', $data['FLIP_ENVIRONMENT']);
        $this->setEnv('FLIP_GLOBAL_FEE', $data['FLIP_GLOBAL_FEE']);
        return true;
    }
}
