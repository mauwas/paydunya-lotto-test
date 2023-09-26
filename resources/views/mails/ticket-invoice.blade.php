@component('mail::message')
# Bonjour Cher(e) {{ ucfirst($ticket->user->name) }}

Nous vous informons que votre paiement de ticket a été traité avec succès.
Vous pouvez maintenant accéder à votre reçu en suivant le lien ci-dessous :

[Télécharger votre facture]({{ $invoiceUrl }})

Merci de votre achat, et nous vous souhaitons une bonne chance pour le prochain tirage !

> ***`Ticket N° : {{ $ticket->code }}`***

---

*Si vous n'avez pas fait cette demande, veuillez ignorer cet e-mail.*

*L'équipe DayDunya Lotto*

@endcomponent
