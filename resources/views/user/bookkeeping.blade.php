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
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal hide fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" method="POST">
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
                <input type="number" class="form-control" name="amount">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
  $( document ).ready(function() {
    console.log("jQuery is working");
    // $('#datepicker').datepicker({
    //   format: 'mm/dd/yyyy',
    //   startDate: '-3d'
    // });
  });
</script>
@stop