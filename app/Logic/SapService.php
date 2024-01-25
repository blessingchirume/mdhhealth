<?php

namespace App\Logic;

use Illuminate\Support\Facades\Http;

class SapService
{
    const BASE_url = "https://172.16.16.9:50000/b1s/v1/";

    const MAKE_PAYMENT_URL = "/PurchaseInvoices";

    private $data;

    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function createSapInvoice($data = [])
    {
        $response = Http::withHeaders(
            [
                "Content-Type" => "application/json",
                "Cookie" => "B1SESSION=9d55c19c-b626-11ee-8000-000c2918eb7d"
            ]
        )->post(self::BASE_url.$this->url, $data);

        dd($response->json());

        return $response->json()["value"];
    }

    public function getDeliveryNotes($data = [])
    {
        $response = Http::withHeaders(
            [
                "Content-Type" => "application/json",
                "Cookie" => "B1SESSION=9d55c19c-b626-11ee-8000-000c2918eb7d"
            ]
        )->get(self::BASE_url.$this->url);

        return $response->json()["value"];
    }

    public function authenticate()
    {
        $response = Http::post(self::BASE_url . $this->url, [
            "CompanyDB" => "KEFALOS_TEST",
            "UserName" => "manager",
            "Password" => "manager"
        ]);

        return ($response->json()["SessionId"]);
    }
}
