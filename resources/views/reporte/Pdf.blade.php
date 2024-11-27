<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte General</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f6fa;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px 10px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        header p {
            margin: 5px 0 0;
            font-size: 1rem;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
        }

        .section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #4CAF50;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 5px;
        }

        .section p {
            font-size: 1rem;
            margin: 10px 0;
        }

        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table td {
            color: #555;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Reporte General</h1>
        <p>Resumen de datos principales</p>
    </header>

    <div class="container">
        <div class="section">
            <h2>Resumen de Donaciones y Usuarios</h2>
            <p><strong>Total de donaciones:</strong> ${{ number_format($total_donations, 2) }}</p>
            <p><strong>Total de usuarios registrados:</strong> {{ $total_users }}</p>
            <p><strong>Total de beneficiarios:</strong> {{ $total_beneficiaries }}</p>
            <p><strong>Total de voluntarios:</strong> {{ $total_volunteers }}</p>
        </div>

        <div class="section">
            <h2>Resumen de Programas</h2>
            <p><strong>Total de programas creados:</strong> {{ $total_programs }}</p>
        </div>

        <div class="table-container section">
            <h2>Detalle de Programas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Financiamiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                        <tr>
                            <td>{{ $program->title }}</td>
                            <td>{{ $program->category }}</td>
                            <td>{{ $program->financing }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            
        </div>
    </div>

    <footer>
        <p>Reporte generado automáticamente. © {{ date('Y') }}</p>
    </footer>
</body>
</html>
