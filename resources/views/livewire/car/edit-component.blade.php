@push('styles')

<style>
    .picture-container {
        position: relative;
        /* cursor: pointer; */
        text-align: center;
    }

    .picture {
        width: 106px;
        height: 106px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: 0px auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
    }

    .picture:hover {
        border-color: #2ca8ff;
    }

    .content.ct-wizard-green .picture:hover {
        border-color: #05ae0e;
    }

    .content.ct-wizard-blue .picture:hover {
        border-color: #3472f7;
    }

    .content.ct-wizard-orange .picture:hover {
        border-color: #ff9500;
    }

    .content.ct-wizard-red .picture:hover {
        border-color: #ff3b30;
    }

    .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 100%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .picture-src {
        width: 100%;
    }

    #avatar {
        cursor: pointer;
    }
</style>
@endpush

<div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <legend>{{__("Car Information")}}</legend>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>


                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="form-group">
                                                <div class="form-row mb-2 justify-content-center">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="{{ URL::to('/') }}/{{$car->photo_path}}" class="picture-src" id="wizardPicturePreview" title="">
                                                        </div>
                                                        <h4 class="mt-2">{{__("Car Photo")}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <form action="{{route('car.update',$car->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <fieldset>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-control-label" for="avatar">{{__("Car Photo")}}
                                                        </label>
                                                        <div class="form-group{{ $errors->has('avatar') ? ' has-danger' : '' }}">
                                                            <div class="custom-file">
                                                                <input type="file" name="avatar" class="custom-file-input" id="avatar" accept="image/*">
                                                                <label class="custom-file-label" for="avatar">@lang('Select Photo')</label>
                                                                <span class="text-danger" id="nameFile"></span>
                                                            </div>
                                                            @if ($errors->has('avatar'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('avatar') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="model">{{__("Model")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('model') ? ' has-danger' : '' }}">
                                                            <input type="text" name="model" id="input-model" class="form-control form-control-alternative{{ $errors->has('model') ? ' is-invalid' : '' }}" placeholder="{{ __('Model') }}" value="{{ $car->model }}" required autofocus>
                                                            @if ($errors->has('model'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('model') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="plate_number">{{__("Plate Number")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <input type="text" name="plate_number" id="plate_number" class="form-control form-control-alternative{{ $errors->has('plate_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Plate Number') }}" value="{{ $car->vehicle }}" required autofocus>
                                                            @if ($errors->has('plate_number'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('plate_number') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="serial_number">{{__("Serial Number")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <input type="text" name="serial_number" id="input-serial_number" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number') }}" value="{{ $car->serial_number }}" required autofocus>
                                                            @if ($errors->has('serial_number'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('serial_number') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="engine_number">{{__("Engine Number")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('engine_number') ? ' has-danger' : '' }}">
                                                            <input type="text" name="engine_number" id="engine_number" class="form-control form-control-alternative{{ $errors->has('engine_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Engine Number') }}" value="{{ $car->engine_number }}">

                                                            @if ($errors->has('engine_number'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('engine_number') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="power_cc">{{__('Power CC')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('power_cc') ? ' has-danger' : '' }}">
                                                            <input type="text" name="power_cc" id="power_cc" class="form-control form-control-alternative{{ $errors->has('power_cc') ? ' is-invalid' : '' }}" placeholder="{{ __('Power CC') }}" value="{{ $car->power_cc }}">

                                                            @if ($errors->has('power_cc'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('power_cc') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="date_start_usage">{{__('Date Start Usage')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('date_start_usage') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ date('d/m/Y',strtotime($car->date_start_usage)) }}" name="date_start_usage" id="date_start_usage" data-toggle="datepicker-date">
                                                                @if ($errors->has('date_start_usage'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('date_start_usage') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="driver_id">{{__('Assign To')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                            <div class="input-group input-group-alternative mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                                </div>
                                                                <select class="form-control form-control-alternative show-tick 
                                                                    {{ $errors->has('assign_to') ? '  is-invalid has-danger' : '' }}" id="assign_to" name="assign_to" required data-style="btn-outline-secondary" data-live-search="false">
                                                                    <option value="" selected disabled>{{__("Select Assign")}}</option>
                                                                    @foreach($assign as $row)
                                                                    <option {{($car->assign_id == $row->id) ? "selected":""}} value="{{$row->id}}">
                                                                        @if(session('locale') === 'en')
                                                                        {{$row->fulllname_eng}}
                                                                        @elseif(session('locale') === 'la')
                                                                        {{$row->fullname_la}}
                                                                        @endif
                                                                    </option>
                                                                    @endforeach
                                                                </select>

                                                                @if ($errors->has('assign_to'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('assign_to') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="division_id">{{__('Division')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-alternative show-tick 
                                                        {{ $errors->has('division_id') ? '  is-invalid has-danger' : '' }}" id="division_id" name="division_id" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value selected disabled>{{__("Select Division")}}</option>
                                                                @foreach($division as $row)
                                                                <option {{($car->division_id == $row->id) ? "selected":""}} value="{{$row->id}}">
                                                                    @if(session('locale') === 'en')
                                                                    {{$row->division_eng}}
                                                                    @elseif(session('locale') === 'la')
                                                                    {{$row->division_la}}
                                                                    @endif
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('division_id'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('division_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="condition">{{__('Condition')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('condition') ? ' has-danger' : '' }}">
                                                            <select class="form-control form-control-alternative show-tick 
                                                        {{ $errors->has('condition') ? '  is-invalid has-danger' : '' }}" id="condition" name="condition" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value disabled>{{__("Select Status")}}</option>
                                                                <option {{($car->condition == 1) ? "selected":""}} value="1">{{__('Available')}}</option>
                                                                <option {{($car->condition == 2) ? "selected":""}} value="2">{{__('Not Available')}}</option>
                                                                <option {{($car->condition == 3) ? "selected":""}} value="3">{{__('On Maintainence')}}</option>


                                                            </select>
                                                            @if ($errors->has('condition'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('condition') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="status">{{__('Status')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                                            <select class="form-control form-control-alternative show-tick 
                                                        {{ $errors->has('status') ? '  is-invalid has-danger' : '' }}" id="status" name="status" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value selected disabled>{{__("Select Status")}}</option>
                                                                <option {{($car->status == 1) ? "selected":""}} value="1">{{__('Available')}}</option>
                                                                <option {{($car->status == 2) ? "selected":""}} value="2">{{__('Not Available')}}</option>
                                                                <option {{($car->status == 3) ? "selected":""}} value="3">{{__('On Maintainence')}}</option>


                                                            </select>
                                                            @if ($errors->has('status'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('status') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                            </fieldset>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary"> {{__("Save")}}</button>
                                                        <a href="{{route('car.index')}}" class="btn btn-danger">{{__("Back")}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // getdriver('#driver_id', '{{old("driver_id")}}');
        // getdivision('#division_id', '{{old("division_id")}}');

        var today = new Date();
        var sdate = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        var edate = (today.getDate() + 30) + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        $('[data-toggle="datepicker"]').datepicker({
            format: 'dd/mm/yyyy',
            startDate: sdate,
            endDate: edate
        });

        $('[data-toggle="datepicker-date"]').datepicker({
            format: 'dd/mm/yyyy',
            startDate: sdate,
            endDate: edate
        });
        $('[data-toggle="datepicker"]').datepicker("refresh");
        $('[data-toggle="datepicker-date"]').datepicker("refresh");

        $("#avatar").change(function() {
            let avatar = document.getElementById("avatar");
            if (typeof(avatar.files) !== "undefined") {
                let size = parseFloat(avatar.files[0].size / (1024 * 1024)).toFixed(2);
                if (size > 2) {
                    $("#nameFile").text("ຂະໜາດຮູບໂປຣໄຟລ໌ໃຫ່ຍເກີນ 2 MB (ກະລຸນາເລືອກໃຫ່ມ...!!)");
                    document.getElementById("submit").disabled = true;
                } else {
                    $("#nameFile").text("");
                    // document.getElementById("submit").disabled = false;
                }
            } else {
                $("#nameFile").text("browser ນີ້ບໍ່ຮ້ອງຮັບ");
            }

            readURL(this); //read file URL

            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

    });

    function getdriver(d_id, d_old_id) {
        $.ajax({
            type: 'POST',
            url: "{{route('driver.get')}}",
            data: {},
            success: function(data) {
                let options = `<option value selected disabled>{{__("Select Driver")}}</option>`;

                $.each(data, function(index, value) {
                    let html = "";
                    let fullname_lang = '{{session("locale")}}' === 'en' ? value.fullname_eng : value.fullname_la;
                    if (parseInt(d_old_id) === parseInt(value.id)) {
                        html = "selected";
                    }
                    options += `<option value="${value.id}" ${html}>${fullname_lang}</option>`;
                });
                $(d_id).html(options)
                $(d_id).selectpicker('refresh')

            }

        });
    }

    function getdivision(d_id, d_old_id) {
        $.ajax({
            type: 'POST',
            url: "{{route('division.get')}}",
            data: {},
            success: function(data) {
                let options = `<option value selected disabled>{{__("Select Division")}}</option>`;

                $.each(data, function(index, value) {
                    let html = "";
                    let lang = '{{session("locale")}}' === 'en' ? value.division_eng : value.division_la;
                    console.log(lang);
                    if (parseInt(d_old_id) === parseInt(value.id)) {
                        html = "selected";
                    }
                    options += `<option value="${value.id}" ${html}>${value.division_eng}</option>`;
                });
                $(d_id).html(options)
                $(d_id).selectpicker('refresh')

            }

        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush