<?php

namespace App\Logic;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SapService
{
    // const BASE_url = "https://192.168.1.100:50000/b1s/v1/";

    const BASE_url = "https://10.0.2.21:50000/b1s/v1/";

    // const BASE_url = "https://172.16.16.9:50000/b1s/v1/";

    const MAKE_PAYMENT_URL = "/IncomingPayments";

    const MAKE_ACCOUNTS_RECEIVABLE_INVOICE_URL = "/Invoices";

    // const MAKE_INVENTORY_TRANSFER_URL = "/CreateIncomingPayment";

    // const BASE_url = "https://192.168.1.104:50000/b1s/v1/";

    // const MAKE_PAYMENT_URL = "/IncomingPayments";

    // const MAKE_ACCOUNTS_RECEIVABLE_INVOICE_URL = "/Invoices";

    // const MAKE_INVENTORY_TRANSFER_URL = "/StockTransfers";
    private $sessionId;

    // const MAKE_INVENTORY_TRANSFER_REQUEST_URL = "/PurchaseInvoices";

    // const GET_ITEMS_URL = "/Items?\$filter =U_ItemGroup ne 'None' and U_Active eq 'Yes'";

    public function __construct()
    {
        $this->authenticate();
    }

    public function createSapInvoice($data = [])
    {
        $response = Http::withHeaders(
            [
                "Content-Type" => "application/json",
                "Cookie" => "B1SESSION=" . $this->sessionId
            ]
        )->post(self::BASE_url . self::MAKE_ACCOUNTS_RECEIVABLE_INVOICE_URL, $data);

        return $response->json();
    }

    // public function createSapInventoryTranfer($data = [])
    // {
    //     $response = Http::withHeaders(
    //         [
    //             "Content-Type" => "application/json",
    //             "Cookie" => "B1SESSION=".Auth::user()->sap_token
    //         ]
    //     )->post(self::BASE_url . self::MAKE_INVENTORY_TRANSFER_URL, $data);

    //     return $response;
    // }

    // public function createSapInventoryTranferRequest($data = [])
    // {
    //     $response = Http::withHeaders(
    //         [
    //             "Content-Type" => "application/json",
    //             "Cookie" => "B1SESSION=". Auth::user()->sap_token
    //         ]
    //     )->post(self::BASE_url . self::MAKE_INVENTORY_TRANSFER_REQUEST_URL, $data);

    //     return $response->json();
    // }

    public function createSapIncomingPayment($data = [])
    {
        $response = Http::withHeaders(
            [
                "Content-Type" => "application/json",
                "Cookie" => "B1SESSION=" . $this->sessionId
            ]
        )->post(self::BASE_url . self::MAKE_PAYMENT_URL, $data);

        return $response;
    }

    // public function getWarehouseProducts()
    // {
    //     $response = Http::withHeaders(
    //         [
    //             "Content-Type" => "application/json",
    //             "Cookie" => "B1SESSION=". Auth::user()->sap_token
    //         ]
    //     )->get(self::BASE_url . self::GET_ITEMS_URL);

    //     return $response->json()['value'];
    // }

    public function authenticate()
    {
        $response = Http::post(self::BASE_url . "/Login", [
            "CompanyDB" => "QG",
            "UserName" => "manager",
            "Password" => "P@ss2020!"
        ]);

        // dd($response->json());
        // dd($response->json()['SessionId']);
        $sessionId = $response->json()['SessionId'];

        $this->sessionId = $sessionId;

        return $sessionId;
    }
}
