@extends('layout.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Code Youtube</h1>
    </div>
    <div class="x_content" style="display: block;">
        <br>

        <form id="my-form" class="form-label-left input_mask" method="post" enctype="multipart/form-data"
            action="/dashboard/create">
            @csrf


            <div class="col-md-12 col-sm-6 mb-3">
                <label for="">Code Youtube</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                    name="code" placeholder="Agenda Pembahasan" value="{{ old('code') }}" required>
                @error('code')
                    <div class="invalit-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>

    {{-- Field Button --}}
    <div class="form-group row">
        <div class="d-flex justify-content-center">

            {{-- Field Button Back --}}
            <a class="btn btn-info" href="/events" role="button"
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
@endsection
