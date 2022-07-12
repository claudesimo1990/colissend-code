<!DOCTYPE html>
<html>
<head><title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <style type="text/css"> @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            } @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            } @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            } @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            line-height: 33px !important;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width: 600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>
<body style="background-color: #f5f8fe; margin: 0 !important; padding: 0 !important;">
<table border="0" cellpadding="0" cellspacing="0" width="100%"> <!-- LOGO -->
    <tr>
        <td bgcolor="#d1e7dd" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#d1e7dd" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top"
                        style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 35px; font-weight: 400; margin: 2px; text-align: center">Reservation de {{ $kilos }} kilos!</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f5f8fe" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td bgcolor="#ffffff" align="left"
                        style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                        <p style="margin: 0;">
                            {{ getSalution() }}  {{ $notifiable->name }},<br>
                            Une resevation de {{ $kilos }} kilos à été faite, Sur votre post de {{ $p->from }} pour {{ $p->to }} du {{ formatDate($p->dateFrom) }} au {{ formatDate($p->dateTo) }}.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top"
                        style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">
                        <h3 style="font-size: 20px; font-weight: 400; margin-bottom: 20px; text-align: center">Details de la reservation</h3>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 14px; text-align: center;">
                            <tr style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Element</th>
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Qté</th>
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Prix</th>
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Total</th>
                            </tr>
                            @foreach ($r as $key => $value)
                                <tr style="border: 1px solid black" bgcolor="#ffffff" align="center" valign="top">
                                    <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $value['name'] }}</td>
                                    <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $value['number'] }}</td>
                                    <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $value['name'] != 'Total'? $value['price'] : '' }}</td>
                                    <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $value['number'] * $value['price'] }}&euro;</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top"
                        style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h3 style="font-size: 20px; font-weight: 400; margin-bottom: 20px; text-align: center">Informations du destinataire</h3>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 14px; text-align: center;">
                            <tr style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Nom</th>
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">N° CNI</th>
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Telephone</th>
                                <th style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">Lieux</th>
                            </tr>
                            <tr style="border: 1px solid black">
                                <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $recipient->name }}</td>
                                <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $recipient->cni }}</td>
                                <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $recipient->phone }}</td>
                                <td style="padding: 0 0 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; letter-spacing: 4px; line-height: 5px;">{{ $recipient->place }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr style="text-align: center">
                                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr style="float: left!important; width: 50%!important;">
                                            <td align="center" style="border-radius: 3px;" bgcolor="#d1e7dd">
                                                <a href="{{ route('booking-validate', ['reservation' => $id]) }}" target="_blank"
                                                   style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; background-color: darkgreen; padding: 10px 20px; border-radius: 2px; border: 1px solid #d1e7dd; display: inline-block;">
                                                    Valider
                                                </a>
                                            </td>
                                        </tr>
                                        <tr style="float: left!important; width: 50%!important;">
                                            <td align="center" style="border-radius: 3px;" bgcolor="#ff4040">
                                                <a href="{{ route('booking-validate', ['reservation' => $id]) }}" target="_blank"
                                                   style="font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; background-color: darkred; padding: 10px 20px; border-radius: 2px; border: 1px solid #d1e7dd; display: inline-block;">
                                                    Refuser
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" align="left"
                        style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 25px;">
                        <p style="margin: 0;">Merci de nous faire confiance!<br>Colissend Team</p></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
