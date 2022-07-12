<div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <legend>{{__("Car Document")}}</legend>
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

                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <form action="{{route('documentcar.update',$doc->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <fieldset>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="driver_id">{{__('Driver Name')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('driver_id') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                                </div>
                                                                <select class="form-control form-control-alternative show-tick 
                                                                    {{ $errors->has('assign_to') ? '  is-invalid has-danger' : '' }}" id="driver_id" name="driver_id" required data-style="btn-outline-secondary" data-live-search="false">
                                                                    <option value="" selected disabled>{{__("Select Driver")}}</option>
                                                                    @foreach($driver as $row)
                                                                    <option {{($doc->driver_id == $row->id) ? "selected":""}} value="{{$row->id}}">
                                                                        @if(session('locale') === 'en')
                                                                        {{$row->fulllname_eng}}
                                                                        @elseif(session('locale') === 'la')
                                                                        {{$row->fullname_la}}
                                                                        @endif
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="technical_exp">{{__("Technical Inspection Expire")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('technical_exp') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ date('d/m/Y',strtotime($doc->technical_inspection_expire)) }}" name="technical_exp" id="technical_exp" data-toggle="datepicker-date">
                                                                @if ($errors->has('technical_exp'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('technical_exp') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="register_exp">{{__("Register Expire")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('register_exp') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ date('d/m/Y',strtotime($doc->register_expire)) }}" name="register_exp" id="register_exp" data-toggle="datepicker-date">
                                                                @if ($errors->has('register_exp'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('register_exp') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="yellowbook_exp">{{__("Yellow Book Expire")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('yellowbook_exp') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ date('d/m/Y',strtotime($doc->yellowbook_expire)) }}" name="yellowbook_exp" id="yellowbook_exp" data-toggle="datepicker-date">
                                                                @if ($errors->has('yellowbook_exp'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('yellowbook_exp') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="insurance_exp">{{__("Insurance Expire")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('insurance_exp') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-file-medical"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ date('d/m/Y',strtotime($doc->insurance_exp)) }}" name="insurance_exp" id="insurance_exp" data-toggle="datepicker-date">
                                                                @if ($errors->has('insurance_exp'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('insurance_exp') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="tax_road_date">{{__("Tax Road Date")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('tax_road_date') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ date('d/m/Y',strtotime($doc->tax_road_date)) }}" name="tax_road_date" id="tax_road_date" data-toggle="datepicker-date">
                                                                @if ($errors->has('tax_road_date'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('tax_road_date') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="date_start_usage">{{__('Remark')}}

                                                        </label>
                                                        <div class="form-group{{ $errors->has('remark') ? ' has-danger' : '' }}">
                                                            <input type="text" name="remark" id="remark" class="form-control form-control-alternative{{ $errors->has('remark') ? ' is-invalid' : '' }}" placeholder="{{ __('Remark') }}" value="{{$doc->remark}}">

                                                            @if ($errors->has('remark'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('remark') }}</strong>
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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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

        var today = new Date();
        var sdate = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        var edate = (today.getDate() + 30) + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        $('[data-toggle="datepicker"]').datepicker({
            format: 'dd/mm/yyyy',
            startDate: sdate,
            endDate: edate
        });

        $('[data-toggle="datepicker-date"]').datepicker({
            format: 'dd/mm/yyyy'
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