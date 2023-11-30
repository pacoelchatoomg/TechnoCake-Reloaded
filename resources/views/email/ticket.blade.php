<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Información del Carrito</h2>
        <ul class="list-group mt-3">
            <table >
                <thead>
                    <th>GRACIAS POR SU COMPRA MI ESTIMAD@</th>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($cartData as $item)
                    @if(isset($item['quantity']))
                    <?php
                    $subtotal = isset($item['price']) && isset($item['quantity']) ? $item['price'] * $item['quantity'] : 0;
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td><strong>{{ isset($item['name']) ? $item['name'] : 'Sin título' }}</strong></td>
                        <td><strong>{{ isset($item['price']) ? $item['price'] : 'Sin precio' }}</strong></td>
                        <td><span class="badge badge-primary badge-pill">{{ $item['quantity'] }}</span></td>
                        <td><strong>{{ $subtotal }}</strong></td>
                    </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>{{ $total }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>

</html>