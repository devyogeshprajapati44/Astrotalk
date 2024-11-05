@extends('layouts.main')
@section('content')

<div class="container py-5">
  <div class="row" style="margin-left: 29px; margin-right: 56px;">
    <div class="col-md-12" style="margin-left:153px; margin-top:0px;">
      <div class="card mt-3">
        <div class="card-header">
          <nav class="navbar navbar-light bg-light">
            <h4 style="color:red; margin-left: 26px;">Billing Chat</h4>
            <button type="button" style="margin-right: 26px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#billingModal">
                    Add Billing 
                  </button>
          </nav>
        </div>     
        <!-- Modal -->
        <div class="modal fade" id="billingModal" tabindex="-1" aria-labelledby="billingModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="billingModalLabel">Billing Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('billing.billingcreate') }}" method="POST">
                  @csrf
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <div class="row">
                    <div class="col-6">
                      <label for="name">Name:</label>
                      <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your name">
                    </div>
                    <div class="col-6">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6">
                      <label for="user_name">SELECT USER CHAT:</label>
                      <select name="user_name" id="user_name" class="form-control" required>
                        <option value="">Select User</option>
                        <option value="Asharam Babu">Asharam Babu</option>
                        <option value="Ramdev">Ramdev</option>
                        <option value="DevNath">DevNath</option>
                        <option value="Arjun">Arjun</option>
                        <option value="Pankaj Uthash">Pankaj Uthash</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="amount">Amount:</label>
                      <input type="number" id="amount" name="amount" class="form-control" required placeholder="Enter amount">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6">
                      <label for="mobile">Mobile:</label>
                      <input type="text" id="mobile" name="mobile" class="form-control" required placeholder="Enter mobile number">
                    </div>
                    <div class="col-6">
                      <label for="address">Address:</label>
                      <input type="text" id="address" name="address" class="form-control" required placeholder="Enter address">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6">
                      <label for="billing_date">Billing Date:</label>
                      <input type="date" id="billing_date" name="billing_date" class="form-control" required>
                    </div>
                    <div class="col-6">
                      <label for="gender">Select Gender:</label>
                      <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" required placeholder="Enter your message"></textarea>
                  </div>
                  <div class="modal-footer mt-3">
                    <button type="submit" class="btn btn-danger">Submit Billing</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Modal -->

<table class="table" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Chat User Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @php $offset = 1; @endphp
            @if(!empty($billings))
            @foreach($billings as $billing)
                <!-- Sample data row, replace with dynamic data -->
                <tr>
                <th scope="col">{{ $offset + $loop->index }}</th>
                <td scope="col">{{ $billing->name }}</td>
                <td scope="col">{{ $billing->email }}</td>
                <td scope="col">{{ $billing->amount }}</td>
                <td scope="col">{{ $billing->user_name }}</td>
                <td scope="col">{{ $billing->mobile }}</td>
                
                <td>{{ $billing->billing_date }}</td>
                    <td>
                        <button  value="{{$billing->id}}"  class="btn btn-info">Edit</button>
                        <button   value="{{$billing->id}}" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
@endsection
