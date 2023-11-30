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

        @if(count($cartData) > 0)
            <ul class="list-group mt-3">
                <table>
                    <thead>
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
        <form action="{{ route('confirmacion') }}" method="post">
            @csrf
            <!-- Otros campos de formulario para la confirmación del carrito -->
            <input type="hidden" name="cart" value="{{ json_encode($cartData) }}">
            <input name="email" placeholder="Correo electrónico">
            <button class="btn btn-success" type="submit">Confirmar compra</button>
        </form>
        <div class="mt-3">
            <button class="btn btn-danger" id="cancelButton">Cancelar</button>
        </div>
        @else
        <p>No hay elementos en el carrito.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

   
</body>

</html>