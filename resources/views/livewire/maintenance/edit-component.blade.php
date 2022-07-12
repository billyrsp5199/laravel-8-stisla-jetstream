<div>
    <div class="modal" @if ($showModal) style="display:block" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $mainId ? 'Edit' : '' }}</h5>
                        <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{__('Vehicle')}}:
                        <br />
                        <input wire:model="main.carID.vehicle" class="form-control" />
                        @error('main.carID.vehicle')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />
                        {{__('Model')}}:
                        <br />
                        <input wire:model="main.carID.model" class="form-control" />
                        @error('main.carID.model')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />
                        {{__('ODO Meter')}}:
                        <br />
                        <input wire:model="main.odo_meter" class="form-control" />
                        @error('main.odo_meter')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />
                        {{__('ODO Meter at')}}:
                        <br />
                        <input wire:model="main.odo_meter_at" class="form-control" />
                        @error('main.odo_meter_at')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />

                        {{__('Report By')}}:
                        <br />
                        <input wire:model="main.report_by" class="form-control" />
                        @error('main.report_by')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />

                        {{__('Maintenance Date')}}:
                        <br />
                        <input wire:model="main.maintenance_date" class="form-control" />
                        @error('main.maintenance_date')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />

                        {{__('Problem Detail')}}:
                        <br />
                        <input wire:model="main.problem_detail" class="form-control" />
                        @error('main.problem_detail')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />

                        {{__('Cost')}}:
                        <br />
                        <input wire:model="main.cost" class="form-control" />
                        @error('main.cost')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />

                        {{__('Maintenance Type')}}:
                        <br />
                        <input wire:model="main.maintenance_type" class="form-control" />
                        @error('main.maintenance_type')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />

                        {{__('Attached File')}}:
                        <br />
                        <input  class="form-control" />
                        @error('main.maintenance_item')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror

                        <br />
                        {{__('Maintenance Item')}}:
                        <br />
                        <input wire:model="main.maintenance_item" class="form-control" />
                        @error('main.maintenance_item')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ $mainId ? 'Save Changes' : 'Save' }}</button>
                        <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>