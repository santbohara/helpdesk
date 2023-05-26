<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Helpdesk') }}</title>
    <style>
        p {
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
</head>

<body
    style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; -webkit-text-size-adjust: none; height: 100%; margin: 0; padding: 15px; width: 100% !important;">
    <p>Dear {{ $data['name'] }},</p>
    <br>
    <p>Thank you for your concern and below is the summary of your query. Our support team will contact you via email or call as soon as possible.</p>
    <div style="background:#EEE; padding: 10px; margin: 15px 0;">
        <div style="margin-bottom: 15px; font-weight: bold;">Ticket Details:</div>
        <div style="margin: 10px 0;">
            <span>Ticket Topic:</span>
            <p style="padding: 0; margin:0;">{{ $data['topic'] }}</p>
        </div>
        <div style="margin: 10px 0;">
            <span>Ticket Subject:</span>
            <p style="padding: 0; margin:0;">{{ $data['subject'] }}</p>
        </div>
        <div style="margin: 10px 0;">
            <span>Ticket Query:</span>
            <p style="padding: 0; margin:0;">{{ $data['query'] }}</p>
        </div>
        <div style="margin: 10px 0;">
            <span>Ticket Raised Date:</span>
            <p style="padding: 0; margin:0;">{{ $data['date'] }}</p>
        </div>
    </div>
    <p>With Regards,</p>
    <p>{{ config('app.name') }}</p>
</body>

</html>
