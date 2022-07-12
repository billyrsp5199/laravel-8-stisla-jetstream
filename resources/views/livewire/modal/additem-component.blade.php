<div class="modal" @if ($showModal) style="display:block" @endif>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="save">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Items')}}</h5>
                    <button wire:click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-label" for="item_la">{{__("Items")}} ({{__("Lao")}})
                                <span class="text-danger">*</span>
                            </label>
                            <div class="form-group{{ $errors->has('item_la') ? ' has-danger' : '' }}">
                                <input type="text" wire:model="item_la" name="item_la" id="item_la" maxlength="10" class="form-control form-control-alternative{{ $errors->has('item_la') ? ' is-invalid' : '' }}" placeholder="{{ __('New Items') }}" value="{{ old('item_la') }}" required autofocus>
                                @if ($errors->has('item_la'))
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $errors->first('item_la') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label" for="item_en">{{__("Items")}} ({{__("English")}})
                                <span class="text-danger">*</span>
                            </label>
                            <div class="form-group{{ $errors->has('item_en') ? ' has-danger' : '' }}">
                                <input type="text" wire:model="item_en" name="item_en" id="item_en" maxlength="10" class="form-control form-control-alternative{{ $errors->has('item_en') ? ' is-invalid' : '' }}" placeholder="{{ __('New Items') }}" value="{{ old('item_en') }}" required autofocus>
                                @if ($errors->has('item_en'))
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $errors->first('item_en') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                    <button wire:click="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>