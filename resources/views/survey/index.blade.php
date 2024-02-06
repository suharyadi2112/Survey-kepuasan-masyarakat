<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/screen.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Survey Kepuasan Masyarakat</title>
</head>
<body>
    
    {{-- <div style="background-color: rgba(0, 0, 0, 0.193);"> --}}
    <div class="demo-wrap">
        <img class="demo-bg" src="{{ url('Banner_new.png') }}"  alt="" style="width: 100%; opacity: 1">
        <div class="demo-content">
            <div class="mainbox">

                {{-- <div id="succesalert">
              
                </div> --}}
                
                <br>
                <br>
                <br>
                <br>
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
                                <form data-route="{{ route('kirim') }}" method="POST" class="InputSurvey">
                                    @csrf
                                    <input type="hidden" id="baik" data-idspin="spinBaik" value="baik" name="value">
                                    <button type="submit" class="tombolsurvey" style="background: green">
                                        <div id="spinBaik" style="display: none;">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>    
                                        BAIK
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form data-route="{{ route('kirim') }}" method="POST" class="InputSurvey">
                                    @csrf
                                    <input type="hidden" id="cukup" data-idspin="spinCukup" value="cukup" name="value">
                                    <button type="submit" class="tombolsurvey" style="background: yellow;color:black">
                                        <div id="spinCukup" style="display: none;">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                        CUKUP
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form data-route="{{ route('kirim') }}" method="POST" class="InputSurvey">
                                    @csrf
                                    <input type="hidden" id="kurang" data-idspin="spinKurang" value="kurang" name="value">
                                    
                                    <button type="submit" class="tombolsurvey" style="background: red">
                                        <div id="spinKurang" style="display: none;">
                                            <div class="d-flex justify-content-center">
                                                <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                        KURANG
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <br><br><br>
                    
                    <h2> <font color="black">SURVEY KEPUASAN MASYARAKAT<br> RSUD RAJA AHMAD TABIB</font></h2>
                </center>
            </div>
        </div>
    </div>
    {{-- </div> --}}

    
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">

    $(document).on('submit', '.InputSurvey', function(e) {
	    e.preventDefault();
	    var route = $('.InputSurvey').data('route');
	    var form_data = $(this);
        var valSpinKurang = $('#kurang').data("idspin");
        var valSpinCukup = $('#cukup').data("idspin");
        var valSpinBaik = $('#baik').data("idspin");
        $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            beforeSend: function() {
                $('#'+valSpinKurang+'').show();
                $('#'+valSpinCukup+'').show();
                $('#'+valSpinBaik+'').show();
            },
            success: function(data) {   
                $('#'+valSpinKurang+'').hide();
                $('#'+valSpinCukup+'').hide();
                $('#'+valSpinBaik+'').hide();
                // $('#succesalert').html('<div class="alert alert-success alert-dismissible">'+
                //         '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                //         ''+data.message+''+
                //         '</div>')
                // setTimeout(myGreeting, 5000);
                console.log(data.message, "cek message")

                let timerInterval;
                Swal.fire({
                    title: "Terima Kasih!",
                    // text: "",
                    html: "Atas dukungan dan partisipasinya dalam survey ini. Kontribusi anda sangat berharga untuk perbaikan dan pengembangan lebih lanjut. <br><b></b>.",
                    imageUrl: "https://rsudtpi.kepriprov.go.id/baru/wp-content/uploads/2021/12/IMG_0366.jpg",
                    imageWidth: 400,
                    imageHeight: 200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    imageAlt: "Custom image",
                    // timer: 10000, 
                    // onClose: () => {
                    //     console.log("Modal closed automatically after 3 seconds");
                    // }
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        // timerInterval = setInterval(() => {
                        // timer.textContent = `${Swal.getTimerLeft()}`;
                        // }, 100);
                        timerInterval = setInterval(() => {
                        const remainingTime = Math.round(Swal.getTimerLeft() / 1000); 
                            timer.textContent = `${remainingTime}`;
                            timer.style.fontSize = '40px';
                            timer.style.color = 'red';
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                });

            },
            complete: function() {
            },
            error: function(data,xhr) {
                alert("Failed response");
                
                location.reload();
            },
        });
	});    

    </script>

</body>
    

</html>
