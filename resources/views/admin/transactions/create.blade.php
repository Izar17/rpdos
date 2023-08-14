@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.transactions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row my-3">
                    <div class="col-md-9">
                        <div class="form-group">

                            <label class="required"
                                for="hospital_id">{{ trans('cruds.transaction.fields.hospital') }}</label>
                            <select class="form-control select2 {{ $errors->has('hospital') ? 'is-invalid' : '' }}"
                                name="hospital_id" id="hospital_id" required>
                                @foreach ($hospitals as $id => $hospital)
                                    <option value="{{ $id }}" {{ old('hospital_id') == $id ? 'selected' : '' }}>
                                        {{ $hospital }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('hospital'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hospital') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.hospital_helper') }}</span>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="rx_number">{{ trans('cruds.transaction.fields.rx_number') }}</label>
                            <input class="form-control {{ $errors->has('rx_number') ? 'is-invalid' : '' }}" type="text"
                                name="rx_no" id="rx_no" readonly>

                            @if ($errors->has('rx_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rx_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.rx_number_helper') }}</span>
                        </div>
                    </div> --}}
                </div>
                <div class="row my-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="required" for="asset_id">{{ trans('cruds.transaction.fields.asset') }}</label>

                            <select class="form-control select2 {{ $errors->has('asset') ? 'is-invalid' : '' }}"
                                name="asset_id" id="asset_id" required>
                                <option value="">Select Isotope</option>
                                @foreach ($assets as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('asset'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asset') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.asset_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="required"
                                for="asset_product_id">{{ trans('cruds.transaction.fields.asset_product') }}</label>
                            <select class="form-control select2 {{ $errors->has('asset_product') ? 'is-invalid' : '' }}"
                                name="item" id="asset_product_id" required>
                            </select>
                            @if ($errors->has('asset_product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asset_product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.asset_product_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="required"
                                for="product_activity_id">{{ trans('cruds.transaction.fields.product_activity') }}</label>

                            <select class="form-control select2 {{ $errors->has('product_activity') ? 'is-invalid' : '' }}"
                                name="lead_pot" id="product_activity_id" required>
                            </select>
                            @if ($errors->has('product_activity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product_activity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaction.fields.product_activity_helper') }}</span>
                        </div>
                    </div>
                </div>





                <div id="show1" class="myDiv">

                </div>
                <div id="show2" class="myDiv">
                    <strong>I-131 (RAI)</strong>
                </div>
                <div id="show3" class="myDiv">
                    <strong>Tl-201</strong>
                </div>
                <div id="show4" class="myDiv">
                    <strong>Y-90</strong>
                </div>
                <div id="show5" class="myDiv">
                    <strong>MIBG (I-131)</strong>
                </div>
                <div id="show6" class="myDiv">
                    <strong>Mo99/Tc99m Generator</strong>
                </div>
                <div id="show7" class="myDiv">
                    <strong>RadioImmunoassay (RIA)</strong>
                </div>
                <div id="show8" class="myDiv">
                    <strong>MISC</strong>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-white" id="tableEstimate">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="col-sm-2">ORDER FORM NUMBER</th>
                                        <th class="col-md-2">RX_NO</th>
                                        <th style="width:80px;">mCi</th>
                                        <th style="width:80px;">mBq</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input class="form-control" style="min-width:150px" type="text" id="orderform_no"
                                                name="orderform_no[]"></td>
                                        <td><input class="form-control"style="min-width:150px" type="text"
                                                id="rx_no" name="rx_no[]"></td>
                                        <td><input class="form-control activity_mci" style="width:80px" type="text"
                                                id="activity_mci" name="activity_mci[]"></td>
                                        <td><input class="form-control activity_mbq" style="width:80px" type="text"
                                                id="activity_mbq" name="activity_mbq[]"></td>
                                        <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                                id="addBtn"><i class="fa fa-plus"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Other Information</label>
                                    <textarea class="form-control" rows="3" id="other_information" name="other_information"></textarea>
                                </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("div.myDiv").hide();
            $('#asset_id').on('change', function() {
                var demovalue = $(this).val();
                $("div.myDiv").hide();
                $("#show" + demovalue).show();
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#asset_id').on('change', function() {
                var idAsset = this.value;
                $("#asset_product_id").html('');
                $.ajax({
                    url: "{{ url('api/fetch-product') }}",
                    type: "POST",
                    data: {
                        asset_id: idAsset,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#asset_product_id').html('<option value="">Select Product</option>');
                        $.each(result.asset_products, function(key, value) {
                            $("#asset_product_id").append('<option value="' + value
                                .id + '">' + value.product_name + '</option>');
                        });
                        $('#product_activity_id').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#asset_product_id').on('change', function() {
                var idProduct = this.value;
                $("#product_activity_id").html('');
                $.ajax({
                    url: "{{ url('api/fetch-activities') }}",
                    type: "POST",
                    data: {
                        product_id: idProduct,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#product_activity_id').html(
                            '<option value="">Select Activity</option>');
                        $.each(res.product_activities, function(key, value) {
                            $("#product_activity_id").append('<option value="' + value
                                .id + '">' + value.activity_name + '</option>');
                        });
                    }
                });
            });
        });

        // add multiple row
        var rowIdx = 1;
        $("#addBtn").on("click", function() {
            // Adding a row inside the tbody.
            $("#tableEstimate tbody").append(`
                <tr id="R${++rowIdx}">
                    <td class="row-index text-center"><p> ${rowIdx}</p></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="orderform_no" name="orderform_no[]"></td>
                    <td><input class="form-control" type="text" style="min-width:150px" id="rx_no" name="rx_no[]"></td>
                    <td><input class="form-control activity_mci" style="width:100px" type="text" id="activity_mci" name="activity_mci[]"></td>
                    <td><input class="form-control activity_mbq" style="width:80px" type="text" id="activity_mbq" name="activity_mbq[]"></td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
                </tr>`);
        });
        $("#tableEstimate tbody").on("click", ".remove", function() {
            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest("tr").nextAll();
            // Iterating across all the rows
            // obtained to change the index
            child.each(function() {
                // Getting <tr> id.
                var id = $(this).attr("id");

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children(".row-index").children("p");

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`${dig - 1}`);

                // Modifying row id.
                $(this).attr("id", `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest("tr").remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
        });

        $("#tableEstimate tbody").on("input", ".unit_price", function() {
            var unit_price = parseFloat($(this).val());
            $("#qty").val(37 * unit_price);

            var qty = parseFloat($(this).closest("tr").find(".qty").val());
            var total = $(this).closest("tr").find(".total");

            total.val(unit_price * qty);

            calc_total();
        });

        $("#tableEstimate tbody").on("input", ".qty", function() {
            var qty = parseFloat($(this).val());
            var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
            var total = $(this).closest("tr").find(".total");
            total.val(unit_price * qty);
            calc_total();
        });

        function calc_total() {
            var sum = 0;
            $(".total").each(function() {
                sum += parseFloat($(this).val());
            });
            $(".subtotal").text(sum);

            var amounts = sum;
            var tax = 100;
            $(document).on("change keyup blur", "#qty", function() {
                var qty = $("#qty").val();
                var discount = $(".discount").val();
                $(".total").val(amounts * qty);
                $("#sum_total").val(amounts * qty);
                $("#tax_1").val((amounts * qty) / tax);
                $("#grand_total").val((parseInt(amounts)) - (parseInt(discount)));
            });
        }
    </script>
@endsection
