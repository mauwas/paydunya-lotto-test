@component('mail::message')
# Bonjour Cher(e) {{ ucfirst($ticket->user->name) }}

Nous tenions à vous remercier chaleureusement pour avoir participé à notre récente loterie.
Malheureusement, votre numéro de ticket de loterie n'a pas été sélectionné comme gagnant cette fois-ci..

N'oubliez pas que la chance peut tourner à tout moment, alors gardez un œil sur nos futurs tirages au
sort et continuez de participer pour une chance de gagner de superbes prix..

Merci encore pour votre participation!

> ***`Ticket N° : {{ $ticket->code }}`***

---

*Si vous n'avez pas fait cette demande, veuillez ignorer cet e-mail.*

*L'équipe DayDunya Lotto*

@endcomponent
