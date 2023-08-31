@extends('layout.main')
@section('container')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Perencanaan Agenda Ruang Rapat</h1>
    </div>
    <br>

    <form id="my-form" class="form-label-left input_mask" method="post" enctype="multipart/form-data" action="/create">
        @csrf


        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Pembahasan</label>
            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" name="tittle"
                placeholder="Agenda Pembahasan" value="{{ old('tittle') }}" required>
            @error('tittle')
                <div class="invalit-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 col-sm-6 mb-3">

            <label for="">Ruang</label>
            <select class="form-select" name="room" id="room" required>
                <option selected value="">Open this select menu</option>
                <option value="RR serayu">RR serayu</option>
                <option value="RR Opak">RR Opak</option>
                <option value="RR Wadaslintang">RR Wadaslintang</option>
                <option value="RR Kabalai">RR Kabalai</option>
                <option value="RR Progo">RR Progo</option>
                <option value="RR Bribin">RR Bribin</option>
            </select>
            {{-- <div class="mt-3">
                <img id="previewImage" src="" alt="Preview Image" width="400" height="300"> <br>
            </div> --}}
        </div>
        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Time</label>
            <select class="form-select" name="time" id="time" required>
                <option selected value="">Open this select menu</option>
                <option value="08.00 - 12.00">08.00 - 12.00</option>
                <option value="12.30 - 16.00">12.30 - 16.00</option>
                <option value="16.30 - 19.00">16.30 - 19.00</option>
                <option value="fullday">Full day</option>
            </select>
        </div>
        {{-- <div class="col-md-12 col-sm-6 mb-3">
        <label for="">Time</label>
        <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" name="time"
            placeholder="Agenda Acara ( ect: 09.00 - selesai )" value="{{ old('time') }}" required>
        @error('time')
        <div class="invalit-feedback">
            {{ $message }}
        </div>
        @enderror
    </div> --}}
        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Penyelenggara</label>
            <input type="text" class="form-control @error('by') is-invalid @enderror" id="by" name="by"
                placeholder="Penyelenggara Agenda" value="{{ old('by') }}" required>
            @error('by')
                <div class="invalit-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 col-sm-6 mb-3">
            <label for="">Jadwal Agenda</label>
            {{-- <input class="date-picker form-control" name="days" placeholder="dd-mm-yyyy" type="text"
                value="{{ Request::segment(2) }}" required="required" onfocus="this.type='date'"
                onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"> --}}

            <input class="form-control flatpickr" type="text" name="days" placeholder="Pilih tanggal"
                required>


        </div>


        {{-- Field Button --}}
        <div class="form-group row">
            <div class="d-flex justify-content-center">

                {{-- Field Button Back --}}
                <a class="btn btn-info" href="/dashboard" role="button"
                    style="margin: 10px;   width: 150px;
                        height: 40px; ">Back</a>
                {{-- End Field Button Back --}}

                {{-- Field Button Reset --}}
                <button class="btn btn-primary" style="margin: 10px;   width: 150px;
                    height: 40px;"
                    type="reset">Reset</button>
                {{-- End Field Button Reset --}}

                {{-- Field Button Sumbit --}}
                <button type="submit" class="btn btn-success"
                    style="margin: 10px;   width: 150px;
                    height: 40px;">Submit</button>
                {{-- End Field Button Sumbit --}}

            </div>
        </div>
        {{-- End Field Button --}}

    </form>
    </div>
    {{-- </div> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kode Anda yang menggunakan iziToast
            iziToast.success({
                message: '{{ Session::get('success') }}',
                position: 'topRight',
            });
            iziToast.warning({
                message: '{{ Session::get('fail') }}',
                position: 'topRight',
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
    <script>
        const datePickers = document.querySelectorAll('.flatpickr');
        datePickers.forEach(datePicker => {
            flatpickr(datePicker, {
                enableTime: false, // Aktifkan memilih waktu
                dateFormat: "Y-m-d", // Format tanggal dan waktu
            });
        });
    </script>
@endsection
