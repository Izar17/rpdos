@extends('layouts.admin')
@section('content')
@can('order_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12 mt-2">
       <a class="btn btn-success" href="{{ route("admin.transactions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.transaction.order_title_singular') }}
        </a>
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaction.order_title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Transaction">
                <thead>
                    <tr>
                        <th>
                            ID | Created Date
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.hospital') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.ofm') }}
                        </th>
                        <th style="width:70px;">
                            {{ trans('cruds.transaction.fields.rx_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.asset') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.asset_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.activity_mci') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.particular') }}
                        </th>
                        <th style="width:60px;">
                            {{ trans('cruds.transaction.fields.calibration_date') }}
                        </th>
                        <th style="width:60px;">
                            {{ trans('cruds.transaction.fields.run_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.transaction.fields.lot_no') }}
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $key => $transaction)
                        <tr data-entry-id="{{ $transaction->id }}">
                            <td>
                                {{ $transaction->id}} | {{ $transaction->created_at}}
                            </td>
                            <td>
                                {{ $transaction->hospital->hospital ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->orderform_no ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->rx_no ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->asset->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->asset_product->product_name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->activity_mci ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->activity_mci ?? '' }} mCi {{ $transaction->asset_product->product_name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->calibration_date ?? '' }}
                                {{ $transaction->calibration_time ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->runNumber->run_name ?? '' }}
                            </td>
                            <td>
                                {{ $transaction->lot_no ?? '' }}
                            </td>
                            <td>
                                @can('order_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transactions.show', $transaction->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('order_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transactions.edit', $transaction->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('team_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 0, 'desc' ]],
    pageLength: 100,
      columnDefs: [{
          orderable: true,
          className: '',
          targets: 0
      }]
  });
  $('.datatable-Transaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
