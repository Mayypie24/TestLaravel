 
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonateService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('fonate.api_url');
        $this->apiKey = config('fonate.api_key');
    }

    public function sendMessage($phone, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post($this->apiUrl, [
            'phone' => $phone,
            'message' => $message,
        ]);

        if ($response->failed()) {
            throw new \Exception('Gagal mengirim pesan: ' . $response->body());
        }

        return $response->json();
    }
}
