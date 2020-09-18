<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url({{public_path('img/background.jpg')}});
            text-align: center;
        }
        .title {
            margin-top: 100px;
        }
        .footer {
            position: absolute;
            bottom: 100px;
            width: 100%;
            text-align: center;
        }
    </style>
  </head>
    <body>
        <h1 class="title">Certificado de conclusão</h1>
        <p>Certificamos que {{ $data['student']->name }} concluiu o curso de {{ $data['course']->name }},</p> 
        <p>com carga horária de {{ $data['course']->workload }} horas.</p>

        <div class="footer">
            Piracicaba, {{ Date('d/m/Y', strtotime(now())) }}
        </div>
  </body>
</html>