@component('mail::message')
# Bonjour Cher(e) {{ ucfirst($ticket->user->name) }}

Nous avons le plaisir de vous annoncer que vous êtes le gagnant de notre récente loterie.
Vous avez décroché le gros lot ! Vous remportez **[{{ $benefit }} FR CFA]**.

Veuillez accéder à votre compte pour plus de détails sur le tirage.

Félicitations encore pour cette victoire remarquable!

> ***`Ticket N° : {{ $ticket->code }}`***

---

*Si vous n'avez pas fait cette demande, veuillez ignorer cet e-mail.*

*L'équipe DayDunya Lotto*

@endcomponent
