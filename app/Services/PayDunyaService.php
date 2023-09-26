<?php

namespace App\Services;

use Paydunya\Setup;
use Paydunya\DirectPay;
use Paydunya\Checkout\Store;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Paydunya\Checkout\CheckoutInvoice;

class PayDunyaService
{

    protected function initService()
    {
        Setup::setMasterKey(config('services.paydunya.master_key'));
        Setup::setPublicKey(config('services.paydunya.public_key'));
        Setup::setPrivateKey(config('services.paydunya.private_key'));
        Setup::setToken(config('services.paydunya.token'));
        Setup::setMode(config('services.paydunya.mode'));
    }

    protected function initShopInfo()
    {
        Store::setName(config('app.name', 'PayDunya Lotto')); // Seul le nom est requis
        Store::setTagline('La Chance au Bout des Doigts : Jouez, Gagnez, Réalisez vos Rêves !');
        Store::setPhoneNumber('95952777');
        Store::setPostalAddress('Cotonou Bénin');
        Store::setWebsiteUrl(URL::to('/'));
        Store::setLogoUrl('http://www.chez-sandra.sn/logo.png');
        Store::setCallbackUrl(route('status-payment'));
        Store::setCancelUrl(route('status-payment'));
        Store::setReturnUrl(route('status-payment'));
    }

    public function processPayement(array $data)
    {
        try {
            // Créer une demande de paiement Paydunya
            $this->initService();
            $this->initShopInfo();
            $invoice = new CheckoutInvoice();
            $invoice->addItem(
                $data['product'],
                $data['quantity'],
                $data['price'],
                $totalAmount = $data['quantity'] * $data['price']
            );
            $invoice->addCustomData('code_ticket', $data['code_ticket']);
            $invoice->addCustomData('numbers', $data['numbers']);

            $invoice->setTotalAmount($totalAmount);
            $invoice->setDescription('Achat de ticket PayDunya Lotto');
            if ($invoice->create()) {
                return $invoice->getInvoiceUrl();
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function isValidPayement(array $data)
    {
        try {
            $this->initService();
            $this->initShopInfo();
            $token = $data['token'];
            $invoice = new CheckoutInvoice();
            if ($invoice->confirm($token) && ($invoice->getStatus() == 'completed')) {
                return [
                    'code_ticket' => $invoice->getCustomData('code_ticket'),
                    'numbers' => $invoice->getCustomData('numbers'),
                    'invoice_url' => $invoice->getReceiptUrl(),
                ];
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }


    public function initWithdrawal(array $data)
    {
        try {
            $url = 'https://app.paydunya.com/api/v1/disburse/get-invoice';
            $requestParams = [
                'account_alias' => $data['account_alias'],
                'amount' => $data['amount'],
            ];

            $response = Http::withHeaders([
                "PAYDUNYA-MASTER-KEY" => config('services.paydunya.master_key'),
                "PAYDUNYA-PRIVATE-KEY" => config('services.paydunya.private_key'),
                "PAYDUNYA-TOKEN" => config('services.paydunya.token')
            ])->post($url, $requestParams);

            if ($response->successful()) {
                $disturbe = $response->json();
                if ($disturbe['response_code'] == "00") {
                    return $disturbe;
                }

                return false;
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function disturbeSubmit($disturbe)
    {
        try {
            $url = 'https://app.paydunya.com/api/v1/disburse/submit-invoice';
            $response = Http::withHeaders([
                "PAYDUNYA-MASTER-KEY" => config('services.paydunya.master_key'),
                "PAYDUNYA-PRIVATE-KEY" => config('services.paydunya.private_key'),
                "PAYDUNYA-TOKEN" => config('services.paydunya.token')
            ])->post($url, ['disburse_invoice' => $disturbe['disburse_token']]);

            if ($response->successful()) {
                $disturbeSubmit = $response->json();
                if ($disturbeSubmit['response_code'] == "00") {
                    return $disturbeSubmit;
                }

                return false;
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }
}
