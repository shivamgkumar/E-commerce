<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Clients</title>
   <link rel="stylesheet" type="text/css" href="{{asset('include.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>

      :root {
    --blue-1: rgb(42, 74, 118);
    --blue-2: rgb(0, 123, 255);
    --orange-1: rgb(255, 133, 27);
    --orange-2: rgb(229, 119, 24);
    --green-1: rgb(0, 166, 90);
    --green-2: rgb(0, 149, 81);
    --yellow-1: rgb(243, 156, 18);
    --yellow-2: rgb(218, 140, 16);
    --red-1: rgb(221, 75, 57);
    --red-2: rgb(198, 67, 51);
  }

  *,
  *::before,
  *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    display: flex;
    justify-content: space-between;
  }
  body aside {
    width: 250px;
    min-height: 100vh;
    /* height: 100vh; */
    background: var(--blue-1);
    overflow: auto;
  }
  body aside::-webkit-scrollbar {
    display: none;
  }
  body main {
    width: calc(100vw - 250px);
    padding: 20px;
  }
  th {
    white-space: nowrap;
  }
  td {
    white-space: nowrap;
  }

  .md-profile-pic {
    width: 40px;
    height: 40px;
    /* border: 1px solid; */
  }
  .bg-blue-1 {
    background: var(--blue-1);
    color: #fff;
  }
  .bg-blue-1-hover {
    background: var(--blue-1);
    color: #fff;
  }
  .navbar-toggler {
    width: 40px;
    height: 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .navbar-toggler div {
    width: 100%;
    height: 6px;
    background: #fff;
    border-radius: 5px;
    position: relative;
    transition: all 0.3s ease-in-out;
  }
  .navOpened div {
    scale: 0;
  }
  .navOpened div:first-child {
    transform: translate(1px, 12px) rotate(-225deg);
    scale: 1;
  }
  .navOpened div:last-child {
    transform: translate(1px, -12px) rotate(225deg);
    scale: 1;
  }
  .mobile-nav-group-1 {
    height: 60px;
  }
  .modal {
    z-index: 1050;
  }

  .modal-backdrop {
    z-index: 1040;
  }

  .dt-buttons {
    margin-bottom: 5px;
    margin-top: 20px;
  }
  .dt-buttons button {
    padding: 5px;
    background: var(--blue-1);
    color: #fff;
    border-radius: 5px;
    border: none;
  }
  .dt-button-collection {
    position: relative;
  }
  .dt-button-collection div {
    min-width: 100px;
    display: flex;
    gap: 1px;
    position: absolute;
    bottom: 35px;
  }
  .dt-button-collection div button {
    /* position: absolute; */
    width: 100%;
    max-width: 150px;
    height: 40px;
    /* z-index: 10;
    top: 0; */
  }
  .dt-button-collection div button:last-child {
    top: 45px;
  }

  @media (pointer: fine) {
    .bg-blue-1-hover:hover {
      background: var(--blue-2);
      color: #fff;
    }
  }

  @media screen and (max-width: 768px) {
    body {
      flex-direction: column;
    }
    body aside {
      width: 100%;
      min-height: unset;
      height: unset;
      align-items: center;
      justify-content: center;
      padding-inline: 20px;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 100;
    }
    body main {
      width: 100%;
      padding: 10px;
      position: relative;
      top: 60px;
      z-index: 99;
    }
    .navlinks {
      display: block;
    }
  }
    iframe {
        width: 50px;
        height: 50px;
    }

    .up {
        text-transform: capitalize;
    }

    /* Snackbar start */
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    /* Snackbar End */


    .activeNav {
    /* background: var(--blue-2); */
    position: relative;
}

.activeNav::before {
    content: '';
    /* width: 10px; */
    height: 100%;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-left: 15px solid var(--blue-2);
    position: absolute;
    top: 0;
    left: 0;
    /* background: var(--blue-2); */
}

.activeNav:hover::before {
    border-left: 15px solid var(--blue-1);
}

.navlink {
    width: 100%;
    height: 50px;
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease-in-out;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 10px;
}

.navlink p,
.navlinkdropdown {
    margin-bottom: 0;
    display: flex;
    gap: 10px;
    align-items: center;
    padding-left: 20px;
}

.navlink .fa-solid {
    transition: all .3s ease-in-out;
}

.navlink:hover {
    background: var(--blue-2);
}

.error
{
    color: #FF0000;
}

    </style>

</head>
<body>

<!-- include sideNav here -->
@include('sideNav')
    <main class="main">
        <h2>Clients</h2>
        <header class="d-flex justify-content-end mt-3">
            <button class="add_btn bg-blue-1-hover text-white btn rounded" data-bs-toggle="modal"
                data-bs-target="#client-modal" title="Add New Client">+ Add Client</button>
        </header>

         @if($table)
         <div class="table_name" id="db_tbl_name" data-table="{{$table}}" style="display: none;"></div>
         @endif
        <div class="table-responsive py-4">
            <table border="0" cellspacing="5" cellpadding="5">
                <tbody><tr>
                    <td>From date:</td>
                    <td><input type="date" class="form-control" id="dateFrom" name="dateFrom"></td>
                    <td>&nbsp; &nbsp; &nbsp; </td>
                    <td>To date:</td>
                    <td><input type="date" class="form-control"  id="dateTo" name="dateTo"></td>
                </tr>
                <tr>
                    <td>&nbsp; &nbsp; &nbsp; </td>
                    <td>&nbsp; &nbsp; &nbsp; </td>
                </tr>
                </tbody></table>

            <table class="table table-bordered table-striped table-hover">
                <thead>


                    <tr>
                        <th class="no-filter">S.No.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>GSTIN</th>
                        @if(session('admin_login_success'))
                        <th  class="no-filter">Actions</th>
                        @endif
                    </tr>

                </thead>
                <tbody class="table-group-divider">
                    <!-- Add Table data here -->
                    @php
                    $i=1
                    @endphp

                      @foreach($all_clients as $clients)
                        <tr class="tr_ container-fluid">
                        <td>{{$i++}}</td>
                        <td id="client_name">{{$clients->name}}</td>
                        <td id="client_phone">{{$clients->phone}}</td>
                        <td id="client_email">{{$clients->email}}</td>
                        <td id="client_address">{{$clients->address}}</td>
                        <td id="client_gstin">{{$clients->gstin}}</td>
                       @if(session('admin_login_success'))
                     <td>
                            <div class="d-flex justify-content-center gap-1">
                               <button class="editBtn btn p-2"  data-cid="{{$clients->id}}" data-user="{{$all_clients}}" data-bs-toggle="modal" data-bs-target="#client-modal" title="Edit client Info">
            <i class="fa-solid fa-pen"></i>
        </button>
                                <button class="btn p-2 deleteBtn" data-id="{{$clients->id}}">
                                    <i class="fas fa-trash"></i>
                                     <!-- <img src="{{asset('images/delete-image.png')}}" height="30" width="30" alt="delete_img" class="img-fluid"> -->
                                </button>
                            </div>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        @if(session('admin_login_success'))
                        <th></th>
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    <div id="snackbar"></div>

    <div class="modal fade" id="client-modal" tabIndex="-1" data-bs-backdrop="static">
        <div class=" modal-dialog  modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Client Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form  id="clientForm" class="d-flex flex-column gap-3">

                        @csrf
                        <div>
                            <label for="name">Client: </label>
                            <input type="text" name="name"  minlength="3"class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required maxlength="100" />
                        </div>
                           @error('name'))
                        <div class="alert-danger">
                            <p style="color: red;">{{$message}}</p>

                        </div>
                         @enderror



                        <div>
                            <label for="phone">Phone: </label>
                            <input type="text" minlength="7"  maxlength="10" class="form-control  @error('phone') is-invalid  @enderror" name="phone"  placeholder="Phone" id="phone"
                                required />
                        </div>

                        <div id="error_message" style="color:red"></div>
                           @error('phone'))
                        <div class="alert-danger">
                            <p style="color: red;">{{$message}}</p>

                        </div>
                         @enderror
                        <div>
                            <label for="email">Email: </label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" id="email"
                                required />
                        </div>
                           @error('email')
                        <div class="alert-danger">
                            <p style="color: red;">{{$message}}</p>

                        </div>
                        @enderror
                        <div>
                            <label for="address">Address: </label>
                            <input type="text" class="form-control  @error('location') is-invalid @enderror" name="location" placeholder="Address" id="address"
                                required />
                        </div>
                           @error('location')
                        <div class="alert-danger">
                            <p style="color: red;">{{$message}}</p>

                        </div>
                        @enderror
                        <div>
                            <label for="gstin">GSTIN: </label>
                            <input type="text" class="form-control  @error('gstin') is-invalid @enderror" minlength="16" maxlength="16" name="gst" placeholder="GSTIN" id="gstin"
                                required />
                        </div>
                        @error('gstin')
                        <div class="alert-danger">
                            <p style="color: red;">{{$message}}</p>

                        </div>
                         @enderror

                <button type="submit" id="saveBtn" class="btn text-white bg-blue-1-hover"><span id="buttonText">Save</span>
                   <span  aria-hidden="true" id="spinner"></span>
                   <span role="status"  id="loader"></span>

                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- include all js files here -->
@include('include')
@include('toast')


<script>
    // script to inlcude client side validation to the form
$(document).ready(function(){
 $('#clientForm').validate({
    rules:{
        phone:{
            digits:true

    }
}
 });
  let table = new DataTable('.table');
});
</script>


@if(session('login_success'))
<script>
    // script to show popup message when user successfully login
Swal.fire({
  position: "top-center",
  icon: "success",
  title: "Login successfully",
  showConfirmButton: false,
  timer: 1500
});
</script>
@endif

   <script>
 // to add tthe form data into db some dom changes
    $(document).ready(function(){
    $('.add_btn').click(function(){
    $('#clientForm').attr('action','{{route("add.client")}}');
    $('#buttonText').text('Save');
    $('#clientForm').find('input[type="text"], input[type="number"], input[type="email"]').val('');


    $('#clientForm').submit(function(e){
    e.preventDefault();

        let data=new FormData(this);

     // Set up AJAX headers for CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('add.client')}}",
            method:'POST',
            data:data,
            contentType: false,
            processData: false,
            success: function (response) {
        if (response.success === true) {
            toastr.success(response.message);
            const clientData=response.data;
            $('#client-modal').modal('hide');
            location.reload();

        }
    },
    error: function (xhr) {
        if (xhr.status === 422) { // Laravel validation error
            const response = xhr.responseJSON;
            toastr.error(response.message); // Show the first error message
            console.log('Validation errors:', response.message);
        } else {
            toastr.error('An unexpected error occurred.');
            console.log('Unexpected error:', xhr.responseText);
        }
    }

        });

    // showing spinner and loader here
    $('#loader').text('Please Wait...');
    $('#spinner').addClass('spinner-border spinner-border-sm').show();
    $('#buttonText').text('');
     //end of showing loader and spinner

    // hide loader after 3 seconds
    setTimeout(()=>{
    $('#loader').text('');
    $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
    $('#buttonText').text('Save');
  },3000);
  });
 });
});
</script>

<script>
// to edit the user data in form
$(document).ready(function () {
    $('#clientForm').validate();
    var clientId;
    var tbl_name;

    // Handle the edit button click
    $('.editBtn').click(function () {
        clientId = $(this).attr('data-cid');
        var closestTr = $(this).closest('tr');
        tbl_name = $('#db_tbl_name').attr('data-table'); // Getting table name from the hidden field
        $('#buttonText').text('Update');

        // Set up AJAX headers for CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('edit.data') }}",
            method: "POST",
            data: {
                id: clientId,
                tbl_name: tbl_name,
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    // Populate the form with client data
                    $('#name').val(response.data.name);
                    $('#phone').val(response.data.phone);
                    $('#email').val(response.data.email);
                    $('#address').val(response.data.address);
                    $('#gstin').val(response.data.gstin);

                    // Set hidden client ID for update
                    $('#client_id_for_update').remove(); // Remove existing element if it exists
                    const createElement = $('<div></div>');
                    createElement.attr('id', 'client_id_for_update');
                    createElement.attr('class', 'client_class_for_update');
                    $('#saveBtn').append(createElement);
                    $('#client_id_for_update').text(response.data.id);
                    $('#client_id_for_update').hide();

                    // Handle Save button click
                    $('#saveBtn').off('click').on('click', function (e) {
                        e.preventDefault();

                        const cid = $('#client_id_for_update').text();
                        const tbl_namess = $('#db_tbl_name').attr('data-table');

                        const name = $('#name').val();
                        const phone = $('#phone').val();
                        const email = $('#email').val();
                        const address = $('#address').val();
                        const gstin = $('#gstin').val();

                        // Show spinner and loader
                        $('#loader').text('Please Wait...');
                        $('#spinner').addClass('spinner-border spinner-border-sm').show();
                        $('#buttonText').text('');

                        // Send AJAX request to update data
                        $.ajax({
                            url: "{{ route('update.data') }}",
                            method: "POST",
                            data: {
                                ids: cid,
                                tbl_name: tbl_namess,
                                name: name,
                                phone: phone,
                                email: email,
                                address: address,
                                gst: gstin
                            },
                            dataType: "json",
                            success: function (response) {
                                if (response.success) {
                                    const client_updated_data= response.data;
                                    // update the tbl row
                                    closestTr.find('#client_name').text(client_updated_data.name);
                                    closestTr.find('#client_phone').text(client_updated_data.phone);
                                    closestTr.find('#client_email').text(client_updated_data.email);
                                    closestTr.find('#client_address').text(client_updated_data.address);
                                    closestTr.find('#client_gstin').text(client_updated_data.gstin);

                                    $('#client-modal').modal('hide');
                                    $('#loader').text('');
                                    $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
                                    $('#buttonText').text('Update');
                                    toastr.success(response.message);

                                    const data = response.data;
                                    // Update table row
                                    closestTr.find('#client_name').text(data.name);
                                    closestTr.find('#client_phone').text(data.phone);
                                    closestTr.find('#client_email').text(data.email);
                                    closestTr.find('#client_address').text(data.address);
                                    closestTr.find('#client_gstin').text(data.gstin);

                                } else {
                                        toastr.error(response.message);
                                        $('#loader').text('');
                                        $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
                                        $('#buttonText').text('Save');
                                }
                            },
                            error: function (jqXHR, textStatus) {
                                console.error("Update request failed:", textStatus);
                                console.log(jqXHR.responseJSON.message);
                            }
                        });
                    });
                } else {
                    console.error('Fetch failed:', response.message);
                }
            },
            error: function (jqXHR, textStatus) {
                console.error("Fetch request failed:", textStatus);
            }
        });
    });
});

</script>

<script>
// script for delte the data and show  success message
$(document).ready(function(){
$('.deleteBtn').click(function(event){
    event.preventDefault();
   var userId = $(this).attr('data-id'); // Use `this` instead of `#deleteBtn`
   var tableName = $('#db_tbl_name').attr('data-table');
   console.log(`the user id is ${userId}`);
Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {

     // send this to delete controller
    window.location.replace(`/delete/${userId}/${tableName}`);
    setTimeout(()=>{
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
},1000);

  }
});
 });
});
</script>

</body>
</html>
