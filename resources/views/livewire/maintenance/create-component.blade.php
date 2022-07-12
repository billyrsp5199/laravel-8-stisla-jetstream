<div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <legend>{{__("Maintenances Information")}}</legend>
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
                                                        <!--  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                                            <fieldset>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="vehicle">{{__("Car")}}
                                                        </label>
                                                        <div class="form-group{{ $errors->has('vehicle') ? ' has-danger' : '' }}">
                                                            <select wire:model="maintenance.car" class="form-control form-control-alternative show-tick 
                                                            selectpicker{{ $errors->has('car') ? '  is-invalid has-danger' : '' }}" id="car" name="car" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value="" selected disabled>{{__("Select Car")}}</option>
                                                                @foreach($car as $row)
                                                                <option value="{{$row->id}}">
                                                                    {{$row->model}} {{__('Vehicle')}}: {{$row->vehicle}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('car'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('car') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="odo_meter">{{__("ODO Meter")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('odo_meter') ? ' has-danger' : '' }}">
                                                            <input wire:model="maintenance.odo_meter" type="text" name="odo_meter" id="odo_meter" maxlength="10" class="form-control form-control-alternative{{ $errors->has('odo_meter') ? ' is-invalid' : '' }}" placeholder="{{ __('ODO Meter') }}" value="{{ old('odo_meter') }}" required autofocus>
                                                            @if ($errors->has('odo_meter'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('odo_meter') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="odo_meter_at">{{__("ODO Meter at")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('odo_meter_at') ? ' has-danger' : '' }}">
                                                            <select wire:model="maintenance.odo_meter_at" class="form-control form-control-alternative show-tick 
                                                                    {{ $errors->has('odo_meter_at') ? '  is-invalid has-danger' : '' }}" id="odo_meter_at" name="odo_meter_at" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value="" selected disabled>{{__("Select ODO Meter")}}</option>

                                                                <option value="5000">5,000 KM</option>
                                                                <option value="10000">10,000 KM</option>
                                                                <option value="15000">15,000 KM</option>

                                                            </select>
                                                            @if ($errors->has('odo_meter_at'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('odo_meter_at') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="report_by">{{__("Report By")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('driver_id') ? ' is-invalid has-danger' : '' }}">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                                </div>
                                                                <select wire:model="maintenance.driver_id" class="form-control form-control-alternative show-tick 
                                                                selectpicker{{ $errors->has('driver_id') ? '  is-invalid has-danger' : '' }}" id="driver_id" name="driver_id" required data-style="btn-outline-secondary" data-live-search="false">
                                                                    <option value="" selected disabled>{{__("Select Driver")}}</option>
                                                                    @foreach($driver as $row)
                                                                    <option value="{{$row->id}}">
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
                                                </div>

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="maintenance_date">{{__("Maintenance Date")}}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <input wire:model.lazy="maintenance.maintenance_date" type="text" name="maintenance_date" id="maintenance_date" data-toggle="datepicker-maintenance" class="form-control form-control-alternative{{ $errors->has('maintenance_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Maintenance Date') }}" value="{{ old('maintenance_date') }}" required autofocus>
                                                            @if ($errors->has('maintenance_date'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('maintenance_date') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="problem_detail">{{__("Problem Details")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="form-group{{ $errors->has('problem_detail') ? ' has-danger' : '' }}">
                                                            <input wire:model="maintenance.problem_detail" type="text" name="problem_detail" id="problem_detail" class="form-control form-control-alternative{{ $errors->has('problem_detail') ? ' is-invalid' : '' }}" placeholder="{{ __('Problem Detail') }}" value="{{ old('problem_detail') }}" required autofocus>
                                                            @if ($errors->has('problem_detail'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('problem_detail') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="item">{{__("Cost")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <input wire:model="maintenance.cost" type="text" name="cost" id="cost" class="form-control form-control-alternative{{ $errors->has('cost') ? ' is-invalid' : '' }}" placeholder="{{ __('Cost') }}" value="{{ old('cost') }}" required autofocus>
                                                            @if ($errors->has('cost'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('cost') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="maintenance_type">{{__("Maintenance Type")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <select wire:model="maintenance.maintenance_type" class="form-control form-control-alternative show-tick 
                                                            select2{{ $errors->has('maintenance_type') ? '  is-invalid has-danger' : '' }}" id="maintenance_type" name="maintenance_type" required data-style="btn-outline-secondary" data-live-search="false">
                                                                <option value="" selected disabled>{{__("Select Maintenance Type")}}</option>

                                                                <option value="Corrective Maintenance (CM)">{{__('Corrective Maintenance (CM)')}}</option>
                                                                <option value="Accident Related Maintenance (ARM)">{{__('Accident Related Maintenance (ARM)')}}</option>
                                                                <option value="Preventive Maintenance (PM)">{{__('Preventive Maintenance (PM)')}}</option>

                                                            </select>
                                                            @if ($errors->has('maintenance_type'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('maintenance_type') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="row">




                                                    <div class="col-md-6">
                                                        <label class="form-control-label" for="attached">{{__("Attached")}} ({{__("Accept Only PDF")}})
                                                        </label>
                                                        <div class="form-group{{ $errors->has('attached') ? ' has-danger' : '' }}">
                                                            <div class="custom-file">
                                                                <input wire:model="maintenance.attached" type="file" name="attached" class="custom-file-input" id="avatar" accept="application/pdf">
                                                                <label class="custom-file-label" for="attached">@lang('Select File')</label>
                                                                <span wire:model="nameFileAttached" class="text-danger" id="nameFileAttached"></span>
                                                            </div>
                                                            @if ($errors->has('attached'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('attached') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-control-label" for="item">{{__("Items")}}<span class="text-danger">*</span>
                                                        </label>
                                                        <div wire:ignore class="input-group input-group-alternative mb-3">

                                                            <select wire:model="categories_item" class="form-control form-control-alternative show-tick 
                                                            select2{{ $errors->has('categories') ? '  is-invalid has-danger' : '' }}" multiple data-placeholder='{{__("Select Items")}}' id="categories" name="categories" required data-style="btn-outline-secondary" data-live-search="false">

                                                                @foreach($main_item as $row)
                                                                <option value="{{ $row->id }}">
                                                                    @if(session('locale') === 'en')
                                                                    {{$row->items_en}}
                                                                    @elseif(session('locale') === 'la')
                                                                    {{$row->items_la}}
                                                                    @endif
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('item'))
                                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                                <strong>{{ $errors->first('item') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="form-control-label" for="item"><span class="text-white">*</span>
                                                        </label>
                                                        <div class="input-group input-group-alternative mb-3">
                                                            <a wire:click="$emit('openModal')" class="btn btn-primary">{{__('Add New Items')}}</a>
                                                        </div>
                                                    </div>

                                                </div>


                                            </fieldset>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="form-group">
                                                        <button wire:click="submitForm" type="submit" class="btn btn-primary"> {{__("Save")}}</button>
                                                        <a href="{{route('driver.index')}}" class="btn btn-danger">{{__("Back")}}</a>
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
            </div>

        </div>

    </div>
</div>

@livewire('modal.additem-component')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    let el = $('#categories');
    document.addEventListener("livewire:load", () => {

        initSelect()

        Livewire.hook('message.processed', (message, component) => {
            initSelect()
        })

        // Only needed if doing save without redirect
        /* Livewire.on('setCategoriesSelect', values => {
            el.val(values).trigger('change.select2')
        })*/

        function initSelect() {
            el.select2({
                placeholder: "{{__('Select Items')}}",
                allowClear: !el.attr('required'),
            })
        }
    })

    $(function() {
        el.select2().on('change', function(e) {
            @this.set('categories_item', $(this).select2("val"));
            // alert('here')
        })

        $('#maintenance_date').on('change', function(e) {
            @this.set('maintenance.maintenance_date', e.target.value);
        });
    });
</script>

<script>
    $(document).ready(function() {

        var today = new Date();
        var sdate = today.getDate() + '/' + today.getMonth() + '/' + (today.getFullYear() - 5);
        var edate = today.getDate() + '/' + today.getMonth() + '/' + (today.getFullYear() + 10);
        $('[ data-toggle="datepicker-maintenance"]').datepicker({
            format: 'dd/mm/yyyy',
            startDate: sdate,
            endDate: edate
        });

       

        // $('[data-toggle="datepicker-maintenance"]').datepicker("refresh");


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // getitem('#item', '{{old("item")}}');

        $("#avatar").change(function() {
            let avatar = document.getElementById("avatar");
            if (typeof(avatar.files) !== "undefined") {
                let size = parseFloat(avatar.files[0].size / (1024 * 1024)).toFixed(2);
                if (size > 2) {
                    $("#nameFileAttached").text("ຂະໜາດຮູບໂປຣໄຟລ໌ໃຫ່ຍເກີນ 2 MB (ກະລຸນາເລືອກໃຫ່ມ...!!)");
                    document.getElementById("submit").disabled = true;
                } else {
                    $("#nameFileAttached").text("");
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

    // function getitem(id, old_id) {
    //     $.ajax({
    //         type: 'POST',
    //         url: "{{route('item.get')}}",
    //         data: {},
    //         success: function(data) {
    //             let options = `<option selected disabled>{{__("Select Items")}}</option>`;

    //             $.each(data, function(index, value) {
    //                 let html = "";

    //                 let lang = "{{session('locale')}}";
    //                 if (parseInt(old_id) === parseInt(value.id)) {
    //                     html = "selected";
    //                 }
    //                 options += `<option value="${value.id}" ${html}>${value.items_la}</option>`;
    //             });
    //             $(id).html(options)
    //             $(id).select2('refresh')

    //         }

    //     });
    // }

    function additem(item_list, item_la, item_en) {

        $.ajax({
            type: 'POST',
            url: "",
            data: {
                item_la: item_la,
                item_en: item_en
            },
            success: function(data) {
                $(item_list).selectpicker('refresh')
            }
        })
    }
</script>
@endpush