<div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <legend>{{__("Driver Information")}}</legend>
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
                                                            <img src="" class="picture-src" id="wizardPicturePreview" title="">
                                                        </div>
                                                        <h4 class="mt-2">{{__("Profile Photo")}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <form action="{{route('driver.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <fieldset>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="avatar">{{__("Profile Photo")}}
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
                                                    <div class="col-md-6">
                                                       <label class="form-control-label" for="phone">{{__("Phone Number")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                            <input type="text" name="phone" id="phone" maxlength="10" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('20xxxxxxxx') }}" value="{{ old('phone') }}" required autofocus>
                                                            @if ($errors->has('phone'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="driver_name_la">{{__("Driver Name")}} ({{__('Lao')}})
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('driver_name_la') ? ' has-danger' : '' }}">
                                                            <input type="text" name="driver_name_la" id="driver_name_la" class="form-control form-control-alternative{{ $errors->has('driver_name_la') ? ' is-invalid' : '' }}" placeholder="{{ __('Driver Name') }} ({{__('Lao')}})" value="{{ old('driver_name_la') }}" required autofocus>
                                                            @if ($errors->has('driver_name_la'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('driver_name_la') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="driver_name_en">{{__("Driver Name")}} ({{__('English')}})
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('driver_name_en') ? ' has-danger' : '' }}">
                                                            <input type="text" name="driver_name_en" id="driver_name_en" class="form-control form-control-alternative{{ $errors->has('driver_name_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Driver Name') }} ({{__('English')}})" value="{{ old('driver_name_en') }}" required autofocus>
                                                            @if ($errors->has('driver_name_en'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('driver_name_en') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="license_issue_date">{{__("License Issue Date")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <input type="text" name="license_issue_date" id="license_issue_date" data-toggle="datepicker-license-issue" class="form-control form-control-alternative{{ $errors->has('license_issue_date') ? ' is-invalid' : '' }}" placeholder="{{ __('License Issue Date') }}" value="{{ old('license_issue_date') }}" required autofocus>
                                                            @if ($errors->has('license_issue_date'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('license_issue_date') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="license_exp_date">{{__("license Expire Date")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <input type="text" name="license_exp_date" id="license_exp_date"  data-toggle="datepicker-license-exp" class="form-control form-control-alternative{{ $errors->has('license_exp_date') ? ' is-invalid' : '' }}" placeholder="{{ __('License Expire Date') }}" value="{{ old('license_exp_date') }}" required autofocus>
                                                            @if ($errors->has('license_exp_date'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('license_exp_date') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="attached">{{__("Attached")}} ({{__("Accept Only PDF")}})
                                                        </label>
                                                        <div class="form-group{{ $errors->has('attached') ? ' has-danger' : '' }}">
                                                            <div class="custom-file">
                                                                <input type="file" name="attached" class="custom-file-input" id="avatar" accept="application/pdf">
                                                                <label class="custom-file-label" for="attached">@lang('Select File')</label>
                                                                <span class="text-danger" id="nameFileAttached"></span>
                                                            </div>
                                                            @if ($errors->has('attached'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('attached') }}</strong>
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
                                                                <option value="" disabled selected>{{__("Select Division")}}</option>
                                                                @foreach($division as $row)
                                                                <option value="{{$row->id}}">
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
                                                </div>

                                            </fieldset>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary"> {{__("Save")}}</button>
                                                        <a href="{{route('driver.index')}}" class="btn btn-danger">{{__("Back")}}</a>
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
        var sdate = today.getDate() + '/' + today.getMonth() + '/' + (today.getFullYear() - 5);
        var edate = today.getDate() + '/' + today.getMonth() + '/' + (today.getFullYear() + 10);
        $('[ data-toggle="datepicker-license-issue"]').datepicker({
            format: 'dd/mm/yyyy',
            startDate: sdate,
            endDate: edate
        });
        $('[ data-toggle="datepicker-license-exp"]').datepicker({
            format: 'dd/mm/yyyy',
            startDate: sdate,
            endDate: edate
        });
        $('[data-toggle="datepicker-license-issue"]').datepicker("refresh");
        $('[data-toggle="datepicker-license-exp"]').datepicker("refresh");

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