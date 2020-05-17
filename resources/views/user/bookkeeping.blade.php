@extends('layout.auth.default')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Transactions</h1>

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
                      <td><button class="btn btn-sm btn-primary update-transaction" data-toggle="modal" data-target="#updateTransactionModal"><i class="fas fa-edit"></i></button> <span><button class="btn btn-sm btn-danger delete-transaction"><i class="far fa-trash-alt"></i></button></span></td>
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
      <form action="{{ url('transaction/create') }}" method="POST">
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
                <textarea class="form-control" rows="3" name="description"></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('transaction/update') }}" method="POST">
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
                <textarea class="form-control" rows="3" name="description"></textarea>
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

<script>
  $( document ).ready(function() {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd'
    });

    $('#addTransactionModal').on('hidden.bs.modal', function () {
      $('#addTransactionModal form')[0].reset();
    });
  });
</script>
@stop