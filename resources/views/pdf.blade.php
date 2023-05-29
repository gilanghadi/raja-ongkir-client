<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <table class="table">
            <tr>
                <th><label for="nama" class="text-white">Service</label></th>
                @foreach ($ongkir as $item)
                    @foreach ($item['costs'] as $cost)
                        <th class="text-secondary">{{ $cost['service'] }}</th>
                    @endforeach
                @endforeach
            </tr>
            <tr>
                <th><label for="nama" class="text-white">Harga</label></th>
                @foreach ($ongkir as $item)
                    @foreach ($item['costs'] as $cost)
                        @foreach ($cost['cost'] as $harga)
                            <th class="text-secondary">Rp. {{ $harga['value'] }}</th>
                        @endforeach
                    @endforeach
                @endforeach
            </tr>
            <tr>
                <th><label for="nama" class="text-white">Estimasi</label></th>
                @foreach ($ongkir as $item)
                    @foreach ($item['costs'] as $cost)
                        @foreach ($cost['cost'] as $etd)
                            <th class="text-secondary">{{ $etd['etd'] }} Hari</th>
                        @endforeach
                    @endforeach
                @endforeach
            </tr>
        </table>
    </div>

</body>

</html>
