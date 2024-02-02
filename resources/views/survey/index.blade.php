<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/screen.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">

    <title>Survey Kepuasan Masyarakat</title>
</head>
<body>
    <div class="demo-wrap">
        <img class="demo-bg" src="{{ url('bg.png') }}" alt="">
        <div class="demo-content">
            <div class="mainbox">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
                <h2>SURVEY KEPUASAN MASYARAKAT</h2>
                <br>
                <br>
                <center>
                    <table style="width:75%">
                        <tr>
                            <td style="text-align: center">
                                <img src="{{ url('baik.gif') }}" width="80%" alt="baik"
                                    style="padding-right:50px">
                            </td>
                            <td style="text-align: center"> <img src="{{ url('cukup.gif') }}" width="70%"
                                    alt="cukup" style="padding-right:50px">

                            </td>
                            <td style="text-align: center"> <img src="{{ url('kurang.gif') }}" width="50%"
                                    alt="kurang">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{ route('kirim') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="baik" name="value">
                                    <button class="tombolsurvey" style="background: green">BAIK</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('kirim') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="cukup" name="value">
                                    <button class="tombolsurvey" style="background: yellow;color:black">CUKUP</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('kirim') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="kurang" name="value">
                                    <button class="tombolsurvey" style="background: red">KURANG</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>

</body>

</html>
