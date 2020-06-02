@extends('layout.auth.default')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Transactions</h1>
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
@elseif (session('success'))
  <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ session('success') }}</strong>
  </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3 text-right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addTransactionModal"><i class="fas fa-plus"></i> <span>Add</span></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center table-info">
                        <th>#</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $transaction)
                    <tr class="text-center">
                      <td>{{ $transaction->id }}</td>
                      <td>{{ ucfirst($transaction->transaction_type) }}</td>
                      <td>{{ number_format($transaction->amount, 0) }}</td>
                      <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                      <td>{{ $transaction->description }}</td>
                      <td>
                        <button 
                        data-id="{{ $transaction->id }}" 
                        data-amount="{{ $transaction->amount }}" 
                        data-url="{{ url('transaction/update/'.$transaction->id) }}" 
                        data-date="{{ $transaction->transaction_date->format('Y-m-d') }}"
                        data-desc="{{ $transaction->description }}"
                        data-type="{{ $transaction->transaction_type }}"
                        class="btn btn-sm btn-primary update-transaction" 
                        data-toggle="modal" 
                        data-target="#updateTransactionModal"><i class="fas fa-edit"></i></button> 
                        <span><button class="btn btn-sm btn-danger delete-transaction"><i class="far fa-trash-alt"></i></button></span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}
        </div>
    </div>
</div>

<!-- modal create transaction -->
<div class="modal hide fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('transaction/create') }}" method="POST" id="createTransaction">
      @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="transactionType">Transaction Type</label>
                <select name="transaction_type" class="form-control">
                    <option value="credit">Credit</option>
                    <option value="debet">Debet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Transaction Date</label>
                <input type="text" data-provide="datepicker" id="datepicker" class="form-control" name="transaction_date">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control trx-description" id="editor" rows="5" name="description"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save">
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal create transaction -->

<!-- modal update transaction -->
<div class="modal hide fade" id="updateTransactionModal" tabindex="-1" role="dialog" aria-labelledby="updateTransactionModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateTrxTitle">Update Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST" id="updateTransaction">
      @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="transactionType">Transaction Type</label>
                <select name="transaction_type" class="form-control" id="updateTrx">
                    <option value="credit">Credit</option>
                    <option value="debet">Debet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Transaction Date</label>
                <input type="text" data-provide="datepicker" id="datepicker2" class="form-control" name="transaction_date">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" id="updateAmount" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control trx-description" rows="3" name="description"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save">
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal update transaction -->

<script src="{{ asset('trumbowyg/dist/trumbowyg.min.js') }}"></script>
<script src="{{ asset('trumbowyg/dist/plugins/table/trumbowyg.table.min.js') }}"></script>
<script src="{{ asset('trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js') }}"></script>

<script>
  $( document ).ready(function() {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd'
    });

    $('#datepicker2').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd'
    });

    $('#addTransactionModal').on('hidden.bs.modal', function () {
      $('#addTransactionModal form')[0].reset();
    });

    $('#updateTransactionModal').on('hidden.bs.modal', function (e) {
      $('#updateTransactionModal form')[0].reset();
    })

    $('.update-transaction').on('click', function() {
      let url = $(this).data("url");
      let trxId = $(this).data("id");
      let description = $(this).data("desc");
      let amount = parseInt($(this).data("amount"));
      let date = $(this).data("date");
      let trx_type = $(this).data("type");
      
      $("#updateTrx").val(trx_type);
      $("#updateAmount").val(amount);
      $("#datepicker2").val(date);

      $("#updateTransaction").attr("action", url);
      $("#updateTrxTitle").html("Update Transaction #"+trxId);
    });

    $('.trx-description').trumbowyg({
      autogrow: true,
      semantic: false,
      btns: [
          ['viewHTML'],
          ['undo', 'redo'],
          ['formatting'],
          ['strong', 'em', 'del'],
          ['superscript', 'subscript'],
          ['table'],
          ['link'],
          ['base64'],
          ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
          ['unorderedList', 'orderedList'],
      ],
      plugins: {
        table: {
          styler: "table table-bordered"
        }
      }
    });
  });
</script>
@stop