<!-- resources/views/emails/contact-form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Új kapcsolatfelvételi űrlap érkezett</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
        }
        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }
        h1 {
            color: #0066cc;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .message-box {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin: 15px 0;
        }
        .field {
            margin-bottom: 10px;
        }
        .field-name {
            font-weight: bold;
            color: #555;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Új kapcsolatfelvételi űrlap érkezett</h1>

        <p>Tisztelt Admin!</p>
        <p>Új üzenet érkezett a KalDo weboldal kapcsolatfelvételi űrlapján keresztül:</p>

        <div class="message-box">
            <div class="field">
                <div class="field-name">Név:</div>
                {{ $data['name'] }}
            </div>

            <div class="field">
                <div class="field-name">E-mail cím:</div>
                {{ $data['email'] }}
            </div>

            @if(isset($data['phone']) && $data['phone'])
            <div class="field">
                <div class="field-name">Telefonszám:</div>
                {{ $data['phone'] }}
            </div>
            @endif

            <div class="field">
                <div class="field-name">Tárgy:</div>
                {{ $data['subject'] }}
            </div>

            <div class="field">
                <div class="field-name">Üzenet:</div>
                {{ $data['message'] }}
            </div>
        </div>

        <p>Az üzenet időpontja: {{ now()->format('Y. m. d. H:i') }}</p>

        <div class="footer">
            <p>Ez az e-mail a KalDo rendszer által automatikusan lett kiküldve. Kérjük, ne válaszoljon rá.</p>
        </div>
    </div>
</body>
</html>
