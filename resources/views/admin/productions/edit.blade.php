@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">

            {{ trans('global.edit') }} {{ trans('cruds.transaction.order_title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.productions.update', [$production->id]) }}"
                enctype="multipart/form-data" autocomplete="off">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <div class="row my-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="asset_id">{{ trans('cruds.transaction.fields.asset') }}</label>
                            <select class="form-control asset_id {{ $errors->has('asset') ? 'is-invalid' : '' }}"
                                id="asset_id" disabled>
                                @foreach ($assets as $id => $asset)
                                    <option value="{{ $id }}"
                                        {{ ($production->asset ? $production->asset->id : old('asset_id')) == $id ? 'selected' : '' }}>
                                        {{ $asset }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('asset'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asset') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.asset_helper') }}</span>
                            <input type="hidden" value="{{ $production->asset_id }}" name="asset_id" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hospital_id">{{ trans('cruds.transaction.fields.hospital') }}</label>
                            <select class="form-control hospital_id {{ $errors->has('hospital') ? 'is-invalid' : '' }}"
                                id="hospital_id" disabled>
                                @foreach ($hospitals as $id => $hospital)
                                    <option value="{{ $id }}"
                                        {{ ($production->hospital ? $production->hospital->id : old('hospital_id')) == $id ? 'selected' : '' }}>
                                        {{ $hospital }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('hospital'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hospital') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.hospital_helper') }}</span>
                            <input type="hidden" value="{{ $production->hospital_id }}" name="hospital_id" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user">{{ trans('cruds.transaction.fields.user') }}</label>
                            <input type="text" class="form-control user"
                                value="{{ auth()->user()->name }}" name="performed_by" readonly />
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-white" id="tableOrder">
                                <thead>
                                    <tr>
                                        @if ($production->asset_id < 4)
                                            <th class="col-md-1">{{ trans('cruds.transaction.fields.asset_product') }}
                                            </th>
                                            <th>{{ trans('cruds.transaction.fields.activity_mci') }}</th>
                                            @if ($production->asset_id == 1)
                                                <th>{{ trans('cruds.transaction.fields.procedure') }}</th>
                                                <th>{{ trans('cruds.transaction.fields.volume') }}</th>
                                            @endif
                                            <th>{{ trans('cruds.transaction.fields.patient') }}</th>
                                            <th class="col-md-1">{{ trans('cruds.transaction.fields.calibration_date') }}
                                            <th class="col-md-1">{{ trans('cruds.transaction.fields.ofm') }}</th>
                                            <th class="col-md-2">{{ trans('cruds.transaction.fields.run_no') }}</th>

                                            <th class="col-md-2">{{ trans('cruds.transaction.fields.lot_no') }}</th>
                                            <th class="col-md-2">{{ trans('cruds.transaction.fields.leadpot') }} </th>
                                            @if ($production->asset_id < 1)
                                                <th class="col-md-2"> {{ trans('cruds.transaction.fields.kitprep') }}</th>
                                            @endif
                                            <th>{{ trans('cruds.transaction.fields.actual') }}</th>
                                            <th class="col-md-2">{{ trans('cruds.transaction.fields.remarks') }} |
                                                {{ trans('cruds.transaction.fields.status') }}</th>
                                    </tr>
                                @else
                                    <tr>
                                        <th>{{ trans('cruds.transaction.fields.asset_product') }} </th>
                                        <th>
                                            @if ($production->asset_id == 4)
                                                Activity GBq
                                            @else
                                                {{ trans('cruds.transaction.fields.activity_mci') }}
                                            @endif
                                        </th>
                                        @if ($production->asset_id == 7)
                                            <th>{{ trans('cruds.transaction.fields.procedure') }}</th>
                                        @endif
                                        <th>
                                            @if ($production->asset_id == 4)
                                                Patient
                                            @else
                                                Unit of Measurement
                                            @endif
                                        </th>
                                        <th>Calibration Date</th>
                                        @if ($production->asset_id != 4)
                                            <th>Gen #</th>
                                        @endif
                                        <th>{{ trans('cruds.transaction.fields.ofm') }}</th>
                                        <th>{{ trans('cruds.transaction.fields.run_no') }}</th>

                                        <th class="col-md-2">{{ trans('cruds.transaction.fields.remarks') }} |
                                            {{ trans('cruds.transaction.fields.status') }}</th>
                                    </tr>
                                    @endif
                                </thead>
                                @if ($production->asset_id < 4)
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $production->asset_product->product_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $production->activity_mci }}
                                            </td>
                                            @if ($production->asset_id == 1)
                                                <td>
                                                    {{ $production->procedure1 }}
                                                </td>
                                                <td>
                                                    {{ $production->volume }}
                                                </td>
                                            @endif
                                            <td>
                                                {{ $production->patient }}
                                            </td>
                                            <td>
                                                @php
                                                    $calibrationDateTime = $production->calibration_date . ' ' . $production->calibration_time;
                                                    $currentDateTime = now();
                                                @endphp
                                                <div
                                                    style="
                                            display: flex;
                                            align-items: center;">
                                                    {{ $calibrationDateTime }}
                                                    @if ($calibrationDateTime < $currentDateTime && $production->status == 1)
                                                        <img src="{{ asset('img/red-warning.png') }}"
                                                            style="width:30px;height:30px;" alt="Image">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                {{ $production->orderform_no }}
                                            </td>
                                            <td>
                                                <select
                                                    class="form-control run_no {{ $errors->has('run_no') ? 'is-invalid' : '' }}"
                                                    name="run_no" id="run_no_id" required>
                                                    @foreach ($run_nos as $id => $run_no)
                                                        <option value="{{ $id }}" {{-- {{ ($production->$run_no ? $production->$run_no->id : old('run_no')) == $id ? 'selected' : '' }}> --}}
                                                            {{ $production->run_no == $id ? 'selected' : '' }}>
                                                            {{ $run_no }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control lot_no" id="lot_no"
                                                    name="lot_no" value="{{ $production->lot_no }}" required />
                                            </td>
                                            <td>
                                                <select class="form-control lead_pot" name="lead_pot" id="lead_pot"
                                                    required>
                                                    @foreach ($leadpots as $id => $leadpot)
                                                        <option value="{{ $id }}"
                                                            {{ $production->lead_pot == $id ? 'selected' : '' }}>
                                                            {{ $leadpot }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            {{-- @if ($production->asset_id != 2) --}}
                                            @if ($production->asset_id < 1)
                                                <td>
                                                        <input type="text" class="form-control kitprep"
                                                            value="{{ substr($production->asset_product->product_name, 3) }}"
                                                            name="kit_prep" />
                                                </td>
                                            @else
                                                <input class="form-control expiry_date" type="hidden" name="expiry_date" />
                                                <input class="form-control expiry_time" type="hidden" name="expiry_time" />

                                                <input type="hidden" class="form-control kitprep" name="kit_prep" />
                                            @endif
                                            <td>
                                                <input type="text" class="form-control actual_dose" id="actual_dose"
                                                    onkeyup="actualDose()" name="actual_dose"
                                                    value="{{ $production->actual_dose }}" required />
                                                <input type="hidden" class="form-control actual_mbq" id="actual_mbq"
                                                    name="actual_mbq" value="{{ $production->actual_mbq }}" />
                                                <input type="hidden" class="form-control actual_discrepancy"
                                                    id="actual_discrepancy" name="actual_discrepancy"
                                                    value="{{ $production->actual_discrepancy }}" />

                                                <input class="form-control date_dispensed" type="hidden"
                                                    name="date_dispensed" value="{{ now()->format('Y-m-d') }}" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control remarks" id="remarks"
                                                    name="remarks" style="width:180px;"
                                                    value="{{ $production->remarks }}" />
                                                <select class="form-control status" style="width: 100px" name="status"
                                                    id="status">
                                                    @if ($production->status == 1)
                                                        <option value="{{ $production->status }}">SAVE</option>
                                                        <option value="2">DONE</option>
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $production->asset_product->product_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $production->activity_mci }}
                                            </td>
                                            @if ($production->asset_id == 1)
                                                <td>
                                                    {{ $production->procedure1 }}
                                                </td>
                                                <td>
                                                    {{ $production->volume }}
                                                </td>
                                            @endif
                                            <td>
                                                {{ $production->patient }}
                                            </td>
                                            <td>
                                                @php
                                                    $calibrationDateTime = $production->calibration_date . ' ' . $production->calibration_time;
                                                    $currentDateTime = now();
                                                @endphp
                                                <div style="display: flex;align-items: center;">
                                                    {{ $production->calibration_date }}
                                                    @if ($calibrationDateTime < $currentDateTime && $production->status == 1)
                                                        <img src="{{ asset('img/red-warning.png') }}"
                                                            style="width:30px;height:30px;" alt="Image">
                                                    @endif
                                                </div>
                                            </td>
                                            @if ($production->asset_id != 4)
                                            <td>
                                                <input type="text" name="calibration_time"
                                                    value="{{ $production->calibration_time }}" />
                                            </td>
                                            @endif
                                            <td>
                                                {{ $production->orderform_no }}
                                            </td>
                                            <td>{{ $production->run_no }}
                                                <input type="hidden" value="{{ $production->run_no }}"
                                                    name="run_no" />
                                                <input type="hidden" class="form-control lot_no" id="lot_no"
                                                    name="lot_no" value="{{ $production->lot_no }}" />
                                                <input type="hidden" class="form-control lot_no" id="lead_pot"
                                                    name="lead_pot" value="{{ $production->lead_pot }}" />
                                                <input class="form-control expiry_date" type="hidden"
                                                    name="expiry_date" />
                                                <input class="form-control expiry_time" type="hidden"
                                                    name="expiry_time" />
                                                <input type="hidden" class="form-control kitprep" name="kit_prep" />
                                                <input type="hidden" class="form-control actual_dose" id="actual_dose"
                                                    onkeyup="actualDose()" name="actual_dose"
                                                    value="{{ $production->actual_dose }}" required />
                                                <input type="hidden" class="form-control actual_mbq" id="actual_mbq"
                                                    name="actual_mbq" value="{{ $production->actual_mbq }}" />
                                                <input type="hidden" class="form-control actual_discrepancy"
                                                    id="actual_discrepancy" name="actual_discrepancy"
                                                    value="{{ $production->actual_discrepancy }}" />
                                                <input class="form-control date_dispensed" type="hidden"
                                                    name="date_dispensed" value="{{ now()->format('Y-m-d') }}" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control remarks" id="remarks"
                                                    name="remarks" style="width:180px;"
                                                    value="{{ $production->remarks }}" />
                                                <select class="form-control status" style="width: 100px" name="status"
                                                    id="status">
                                                    @if ($production->status == 1)
                                                        <option value="{{ $production->status }}">SAVE</option>
                                                        <option value="2">DONE</option>
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>

                        <div class="form-group"style="text-align:center;">
                            <hr>
                            <div id="show_save" class="myDiv">
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.proceed') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        function actualDose() {
            // Get the value from the first input field
            var actual_dose = document.getElementById('actual_dose').value;

            document.getElementById('actual_mbq').value = actual_dose * 37;
            document.getElementById('actual_discrepancy').value = parseInt(actual_dose) + (parseInt(actual_dose) * .10);
        }
    </script>
@endsection
