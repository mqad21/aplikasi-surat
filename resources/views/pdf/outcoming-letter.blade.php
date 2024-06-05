<!-- resources/views/letters/pdf.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            margin-right: 20px;
        }

        .header .title {
            text-align: center;
        }

        .header .title p {
            margin: 0;
            padding: 0;
        }

        .letter-header {
            width: 100%;
        }

        .letter-header th {
            text-align: left;
        }

        .letter-header td {
            vertical-align: top
        }

        .letter-header,
        .letter-body,
        .letter-footer {
            margin-top: 20px;
        }

        .letter-header p,
        .letter-body p,
        .letter-footer p {
            margin: 0;
            padding: 0;
        }

        .letter-body {
            text-align: justify;
        }

        .letter-body p {
            margin-bottom: 10px;
        }

        .letter-footer {
            margin-top: 40px;
            margin-left: 380px;

        }

        .signer {
            text-align: left;
            margin-top: 60px;
        }

        .footer-note {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <table class="header">
        <tr>
            <td style="width: 20%">
                <img src="{{ public_path('logo.png') }}" alt="Logo LSP Poliban" style="width: 100px;">
            </td>
            <td class="title">
                <p><strong>LSP POLIBAN</strong></p>
                <p>Jalan Brigjend. H. Hasan Basri Komplek Universitas Lambung Mangkurat Banjarmasin</p>
                <p>Kalimantan Selatan 70124, Indonesia</p>
                <p>Telp. 0811 5463 611</p>
                <p>Website: lsp.poliban.ac.id</p>
            </td>
        </tr>
    </table>

    <hr>

    <table class="letter-header">
        <tr>
            <td>
                <table>
                    <tr>
                        <th>Nomor</th>
                        <td>: {{ $letter->letter_number }}</td>
                    </tr>
                    <tr>
                        <th>Lampiran</th>
                        <td>: {{ $letter->attachments ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Perihal</th>
                        <td>: {{ $letter->subject }}</td>
                    </tr>
                </table>
            </td>
            <td>
                <p style="text-align: right;">
                    {{ $letter->letter_location}},
                    {{ \Carbon\Carbon::parse($letter->letter_date)->isoFormat('DD MMMM Y') }}
                </p>
            </td>
        </tr>
    </table>

    <div class="letter-body">
        <p>Kepada Yth.</p>
        <p>{{ $letter->recipient }}</p>
        <p>{{ $letter->recipient_address ?? 'Di tempat' }}</p>

        <p>Dengan hormat,</p>

        <p>{!! ($letter->content) !!}</p>

    </div>

    <div class="letter-footer">
        <div class="signer">
            <p>{{ $letter->signer->name }}</p>
            <p>{{ $letter->publishingUnit->name }}</p>
            <br><br><br>
            <p><strong>{{ $letter->sender  }}</strong></p>
        </div>
    </div>
</body>

</html>
