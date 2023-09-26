<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyTicketRequest;
use App\Services\LottoService;
use Illuminate\Http\Request;

class LottoController extends Controller
{
    private $lottoService;

    /**
     * Undocumented function
     */
    public function __construct(LottoService $lottoService)
    {
        $this->middleware('auth');
        $this->lottoService = $lottoService;
    }

    /**
     * Page / formulaire d'achat de ticket
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function buyTicket()
    {
        return view('admin.buy-ticket')->with([
            'ticket' => $this->lottoService->isActiveTicket(),
            'jackpot' => $this->lottoService->jackpot(),
        ]);
    }

    /**
     * Validation des données depuis le formulaire d'achat de ticket
     * et redirection de l'utilisateur sur la page de paiement
     *
     * @return void
     */
    public function processPayment(BuyTicketRequest $request)
    {

        if (! $this->lottoService->isEligibleForPayment()) {
            return redirect('buy-ticket')->withError("Oups ! Vous n'êtes pas éligible pour effectuer ce paiement.
                                            Veuillez revenir après la publication des résultats");
        }

        if ($this->lottoService->isActiveTicket()) {
            return redirect('buy-ticket')
                ->withError('Oups ! Vous avez déjà un ticket en cours pour le prochain tirage.');
        }

        if ($invoiceUrl = $this->lottoService->processPayement($request->validated())) {
            return redirect()->away($invoiceUrl);
        }

        return back()->withInput();
    }

    /**
     * Retour du callback après achat de ticket / verification du status de paiement
     * et enregistrement dans la base de lotto
     *
     * @return void
     */
    public function statusPayment(Request $request)
    {

        if ($this->lottoService->validPayement($request->all())) {
            return redirect('buy-ticket')->withSuccess('Paiement effectué avec succès.');
        }

        return back()->withInput()->withError('Oups ! Le paiement a été annulé ou refusé.');
    }
}
