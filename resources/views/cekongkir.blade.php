<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ongkir Check</title>
    <meta property="og:image" content="{{ asset('assets/img/icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .color-palet {
            background-color: #1B2326 !important;
        }

        .green-light {
            background-color: #0a977d !important;
        }

        .gray-light {
            background-color: #3A4F53 !important;
        }

        .text-white-light {
            color: #1B2326 !important;
        }
    </style>
</head>

<body class="color-palet">
    <main class="mt-5 pt-2">
        <section class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-6">
                            <span class="text-secondary fw-bold">Asal</span>
                            <div class="green-light text-white d-flex fw-bold justify-content-center p-4 rounded-1">
                                @if ($data != '')
                                    {{ $data['origin_details']['city_name'] }}
                                @else
                                    <span>Belum Dipilih</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 ">
                            <span class="text-secondary fw-bold">Tujuan</span>
                            <div class="bg-white text-white-light fw-bold d-flex justify-content-center p-4 rounded-1">
                                @if ($data != '')
                                    {{ $data['destination_details']['city_name'] }}
                                @else
                                    Belum Dipilih
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <p class="text-secondary"><span class="text-danger">PEMBERITAHUAN!</span> harga yang tertera
                                merupakan
                                harga asli sebelum
                                adanya potongan.</p>
                            <div class="gray-light text-secondary p-5 rounded-1">
                                <table class="table">
                                    <tr>
                                        <th><label for="nama" class="fs-5 text-white">Nama Kurir</label></th>
                                        @if ($ongkir != '')
                                            @foreach ($ongkir as $kurir)
                                                <td class="fs-5 text-secondary fw-bold">{{ $kurir['name'] }}</td>
                                            @endforeach
                                        @else
                                            <td><label for="nama" class="fs-5 text-secondary">Belum
                                                    Dipilih</label>
                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th><label for="Weight" class="text-white">Weight</label></th>
                                        @if ($data != '')
                                            <td class="text-secondary">{{ $data['query']['weight'] }} gram</td>
                                        @else
                                            <td><label for="weight" class="text-secondary">Belum Dipilih</label>
                                            </td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                            @if ($ongkir != '')
                                <div class="gray-light p-5 rounded-1 mt-3">
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
                            @endif
                        </div>
                        <div class="col-12 mt-2">
                            <img src="{{ asset('assets/img/jne.png') }}" alt="" width="90">
                            <img src="{{ asset('assets/img/tiki.png') }}" alt="" width="90">
                            <img src="{{ asset('assets/img/pos.png') }}" alt="" width="90">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-12">
                            <span href=""
                                class="green-light text-white d-flex align-items-center p-2 d-flex justify-content-center align-items-center text-decoration-none rounded-2 fw-bold">Ongkir
                                Check</span>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1rem">
                        <div class="col-12 pb-3">
                            <div
                                class="bg-white text-white-light d-flex align-items-center px-5 py-4 d-flex justify-content-center rounded-1">
                                <form method="post" action="{{ route('cek-ongkir') }}" class="w-100">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label d-block">Asal</label>
                                        <select name="origin" id="origin" class="form-select" required>
                                            <option value="" selected disabled>Pilih Asal Kota</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label d-block">Tujuan</label>
                                        <select name="destination" id="destination" class="form-select" required>
                                            <option value="" selected disabled>Pilih Tujuan Kota</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword2" class="form-label d-block">Jasa
                                            Pengiriman</label>
                                        <select name="courier" id="destination" class="form-select" required>
                                            <option selected disabled>Pilih Jasa Pengiriman</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1"
                                            class="form-label d-block">Berat/gram</label>
                                        <input type="number" class="form-control" name="weight" id="exampleCheck1"
                                            id="weight" required>
                                    </div>
                                    <button type="submit" class="btn green-light text-white">Cek</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>
