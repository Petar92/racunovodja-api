<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
      <title>Create Product | Product Store</title>
      <!-- styling etc. -->
    </head>
    <body>
        <div>
            <h1>Detalji korisnika</h1>
            <table>
                    <thead>
                        <td>id</td>
                        <td>created at</td>
                        <td>updated at</td>
                        <td>PID</td>
                        <td>maticni broj</td>
                        <td>id korisnika</td>
                        <td>id opstine</td>
                        <td>email</td>
                        <td>email passwd</td>
                        <td>bankovni racun</td>
                        <td>tip skole</td>
                        <td>sifra skole</td>
                        <td>naziv skole</td>
                        <td>mesto</td>
                        <td>ulica i broj</td>
                        <td>telefon</td>
                    </thead>
                    <tbody>
                        @foreach ($detalji as $detalji)
                            <tr>
                                <td>{{ $detalji->id }}</td>
                                <td class="inner-table">{{ $detalji->created_at }}</td>
                                <td class="inner-table">{{ $detalji->updated_at }}</td>
                                <td class="inner-table">{{ $detalji->poreski_identifikacioni_broj }}</td>
                                <td class="inner-table">{{ $detalji->maticni_broj }}</td>
                                <td class="inner-table">{{ $detalji->id_korisnika }}</td>
                                <td class="inner-table">{{ $detalji->id_opstine }}</td>
                                <td class="inner-table">{{ $detalji->email_za_slanje }}</td>
                                <td class="inner-table">{{ $detalji->password_email_za_slanje }}</td>
                                <td class="inner-table">{{ $detalji->bankovni_racun }}</td>
                                <td class="inner-table">{{ $detalji->tip_skole }}</td>
                                <td class="inner-table">{{ $detalji->sifra_skole }}</td>
                                <td class="inner-table">{{ $detalji->naziv_skole }}</td>
                                <td class="inner-table">{{ $detalji->mesto }}</td>
                                <td class="inner-table">{{ $detalji->ulica_i_broj }}</td>
                                <td class="inner-table">{{ $detalji->telefon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </body>
    </html>
