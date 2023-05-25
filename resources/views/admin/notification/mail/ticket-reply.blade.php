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
    <div>
        {!! $content['reply'] !!}
    </div>
    <div style="background:#EEE; padding: 10px; margin: 15px 0;">
        <div style="margin-bottom: 15px; font-weight: bold;">Original Ticket Details:</div>
        <div style="margin: 10px 0;">
            <span>Ticket Topic:</span>
            <p style="padding: 0; margin:0;">{{ $content['original_topic'] }}</p>
        </div>
        <div style="margin: 10px 0;">
            <span>Ticket Subject:</span>
            <p style="padding: 0; margin:0;">{{ $content['original_subject'] }}</p>
        </div>
        <div style="margin: 10px 0;">
            <span>Ticket Query:</span>
            <p style="padding: 0; margin:0;">{{ $content['original_query'] }}</p>
        </div>
        <div style="margin: 10px 0;">
            <span>Ticket Raised Date:</span>
            <p style="padding: 0; margin:0;">{{ $content['ticket_raised_date'] }}</p>
        </div>
    </div>
</body>

</html>
