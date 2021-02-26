<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OpenSSL extends Command
{
    /**
     * @param string $key
     * @param string $value
     */
    private function setEnv($key, $value)
    {
        file_put_contents(
            app()->environmentFilePath(),
            str_replace($key . '=' . env($key), $key . '=' . $value,file_get_contents(app()->environmentFilePath())
        ));
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:openssl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make openssl public and private key in .env';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Make keypair
        $key_pair = openssl_pkey_new(array(
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        ));
        $details = openssl_pkey_get_details($key_pair);
        $public_key = $details['key'];
        $private_key = '';
        openssl_pkey_export($key_pair, $private_key);

        $public_key = str_replace("-----BEGIN PUBLIC KEY-----", "", $public_key);
        $public_key = str_replace("-----END PUBLIC KEY-----", "", $public_key);
        $public_key = str_replace("\n", "", $public_key);

        $private_key = str_replace("-----BEGIN PRIVATE KEY-----", "", $private_key);
        $private_key = str_replace("-----END PRIVATE KEY-----", "", $private_key);
        $private_key = str_replace("\n", "", $private_key);

        // set private key
        $this->setEnv('FLIP_PRIVATE_KEY', $private_key);
        $this->setEnv('FLIP_PUBLIC_KEY', $public_key);
    }
}
