<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Car Document Management') }}</h1>

        <div class="section-header-breadcrumb">

        </div>
    </x-slot>
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
                                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <fieldset>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="car">{{__('Select Car')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-car"></i></span>
                                                            </div>
                                                            <select class="form-control form-control-alternative show-tick 
                                                        {{ $errors->has('car') ? '  is-invalid has-danger' : '' }}" id="car" name="car" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value="" disabled selected>{{__("Select Car")}}</option>
                                                            </select>
                                                            @if ($errors->has('car'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('car') }}</strong>
                                                            </span>
                                                            @endif
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
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ old('technical_exp') }}" name="technical_exp" id="technical_exp" data-toggle="datepicker-date">
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
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ old('register_exp') }}" name="register_exp" id="register_exp" data-toggle="datepicker-date">
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
                                                                <input placeholder="{{__('Select Date')}}" type="text" class="form-control" value="{{ old('yellowbook_exp') }}" name="yellowbook_exp" id="yellowbook_exp" data-toggle="datepicker-date">
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
                                                        <label class="form-control-label" for="driver_id">{{__('Driver Name')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('driver_id') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                                </div>
                                                                <input placeholder="{{__('Select Driver')}}" type="text" class="form-control" value="{{ old('driver_id') }}" name="driver_id" id="driver_id" data-toggle="datepicker-date">
                                                                @if ($errors->has('driver_id'))
                                                                <span class="invalid-feedback" role="alert" style="display: block">
                                                                    <strong>{{ $errors->first('driver_id') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="date_start_usage">{{__('Remark')}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('remark') ? ' has-danger' : '' }}">
                                                            <input type="text" name="remark" id="remark" class="form-control form-control-alternative{{ $errors->has('remark') ? ' is-invalid' : '' }}" placeholder="{{ __('Remark') }}" value="{{ old('remark') }}">

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

</x-app-layout>