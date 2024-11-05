<style>
    .table thead th {
        text-align: center;
    }
    .table tbody td {
        text-align: center;
        vertical-align: middle;
    }
</style>

@extends('layouts.main')
@section('content')
       <!-- row -->
<div class="container py-5">
  <div class="row" style="margin-left: 29px;margin-right: 56px;">
   <div class="col-md-12" style="margin-left:153px;margin-top:0px;">
    <div class="card mt-3">
      <div class="card-header">
    <!-- SEARCH BY TASK START -->
       <nav class="navbar navbar-light bg-light">
       <h4 style="margin: 11px;margin-left:26px;">User Management</h4>
      </div>
    <!--table start-->
     <div class="card-body">
       <table id="expmale" class="table table-bordered">
        <thead class="thead-dark">
             <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Role</th>
                <th scope="col-3">Action</th>
             </tr>
          </thead>
          <tbody>
            @if(!empty($users))
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                  <button type="button"  value="{{$user->id}}" class="btn btn-primary editbtn btn-sm">Edit</button> |
                  <button type="button"  value="{{$user->id}}" class="btn btn-danger deletedepartmentBtn btn-sm">Delete</button>
                 </tr>
                </tr>
             @endforeach
             @endif
           </tbody>
          </table>
         </div>
        </div>
      </div>
      <!--------Card close-->
    </div>
  </div>

    <div id="EditModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <Form    action="{{ route('account.update') }}" method="POST"  id="editForm"  enctype="multipart/form-data"/>
         @method('PUT')  
                   @csrf  
                   <input type="hidden" id="user_id" name="user_id"/>
                  <div class="modal-header">						
                    <h4 class="modal-title"  id="EditModalLabel">User Management</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
        
          <div class="modal-body">			
             <div class="form-group">
                    <div class="row g-3">             
                      <div class="col-12">                            
                          <label for="text" class="form-label">User Name <span style="color: red">*</span></label></br>
                          <input type="text" class="name form-control" name="name" id="name1" required> 
                          </div>
                            <span class="text-danger">
                              @error('name')
                              {{$message}}
                              @enderror
                       </span>
                    </div>
                    <div class="row g-3">             
                      <div class="col-12">                            
                          <label for="text" class="form-label">User Moible <span style="color: red">*</span></label></br>
                          <input type="text" class="mobile form-control" name="mobile" id="mobile1" required> 
                          </div>
                            <span class="text-danger">
                              @error('mobile')
                              {{$message}}
                              @enderror
                       </span>
                    </div>
                    <div class="row g-3">             
                      <div class="col-12">                            
                          <label for="text" class="form-label">User Email <span style="color: red">*</span></label></br>
                          <input type="text" class="email form-control" name="email" id="eamil1" required> 
                          </div>
                            <span class="text-danger">
                              @error('email')
                              {{$message}}
                              @enderror
                       </span>
                    </div>

                    <div class="row g-3">             
                      <div class="col-12">                            
                          <label for="dob" class="form-label">User DOB <span style="color: red">*</span></label></br>
                          <input type="date" class="dob form-control" name="dob" id="dob1" required> 
                          </div>
                            <span class="text-danger">
                              @error('dob')
                              {{$message}}
                              @enderror
                       </span>
                    </div>
                </div>
             </div>
              <div class="modal-footer">
                   <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Close">
                   <input type="submit" class="btn btn-info" id="update" value="Update">
          </div>
        </form>
        </div>
        </div>
        </div>

        <div id="deleteModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
             <form  action="{{ route('account.destroy') }}"  method="POST">
                  @csrf
                   <div class="modal-header">						
                      <h4 class="modal-title"  id="deleteModalLabel">Delete User</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                       <div class="modal-body">
                      <div class="form-group">					
                         <p>Are you sure you want to delete these Records?</p>
                         <input type="hidden" name="name" id="name">
                       <p class="text-warning"><small>This action cannot be undone.</small></p>
                   </div>
                </div>
                   <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                      <input type="submit" class="btn btn-danger" value="Delete">
                   </div>
                </form>
             </div>
          </div>
       </div>
@endsection




