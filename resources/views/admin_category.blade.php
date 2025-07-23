<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Category</title>
  <meta name="csrf-token" id="metaCsrf" content="{{ csrf_token() }}">

 <!-- include all css files here -->
 @include('include')

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
        <h2>Categories</h2>
        <header class="d-flex justify-content-end mt-3">
            <button class="add_btn bg-blue-1-hover text-white btn rounded" data-bs-toggle="modal"
                data-bs-target="#category-modal" title="Add New Client">+ Add Category</button>`
        </header>
        
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
                        <th>Category</th>
                        <th>Image</th>
                        <th  class="no-filter">Actions</th>
                    </tr>
                 </thead>
                <tbody class="table-group-divider">
                    <!-- Add Table data here -->
                     @php
                         $i=1;
                     @endphp
                     @forelse ($data as $categories)     
                    <tr class="tr_ container-fluid">
                        <td>{{ $i++ }}</td>
                        <td id="category">{{ $categories['category'] }}</td>
                        <td id="category_image"><img id="category_image_from_db" src="{{ asset('images').'/'.$categories['category_image'] }}" alt="category_image" height="70px" width="70px"></td>
                    <td>
                
                <div class="d-flex justify-content-center gap-1 editdeleteDiv">
               <button class="editBtn btn p-2" data-category-for-edit="{{ $categories }}" data-cat_id_for_edit="{{ $categories->id }}" id="edtBtn" data-bs-toggle="modal" data-bs-target="#category-modal" title="Edit client Info">
            <i class="fa-solid fa-pen"></i>
        </button>
                                <button class="btn p-2 deleteBtn" data-id="{{ $categories['id'] }}">
                                    <i class="fas fa-trash"></i>
                                     <!-- <img src="{{asset('images/delete-image.png')}}" height="30" width="30" alt="delete_img" class="img-fluid"> -->
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    {{ ' ' }}
                    @endforelse  
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    <div id="snackbar"></div>

    <div class="modal fade" id="category-modal" tabIndex="-1" data-bs-backdrop="static">
        <div class=" modal-dialog  modal-dialog-scrollable ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
               
            <form method="POST" id="categoryForm" class="d-flex flex-column gap-3" enctype="multipart/form-data">
            @csrf

            <!-- Hidden field to differentiate add vs update -->
            <input type="hidden" name="category_id" id="category_id" value="">


            <div>
                <label for="name">Name: </label>
                <input type="text" name="category" class="form-control" id="catgory_name" placeholder="Name" maxlength="50" required />
            </div>

            <div>
                <label for="image">Image: </label>
                <img id="cat_img" src="#" height="50px" width="50px" alt="category_image" class="mb-2" style="display: none;">
                <input type="file" class="form-control" name="category_image" id="catgory_img" />
            </div>

            <button type="submit" id="saveBtn" class="btn text-white bg-blue-1-hover">
                <span id="buttonText">Save</span>
                <span aria-hidden="true" id="spinner"></span>
                <span role="status" id="loader"></span>
            </button>
         </form>


                </div>
            </div>
        </div>
    </div>

<!-- include all js files here -->
@include('include_js')

<!-- add  the data  -->
<script>
    // script to add user
    $(document).ready(function () {
    let table = new DataTable('.table');

    // Reset form on modal open
    $('.add_btn').click(function () {
        $('#cat_img').css('display','none');
        $('#buttonText').text('Save');
        $('#categoryForm')[0].reset();  
    });

    // Form submission
    $('#categoryForm').off('submit').on('submit', function (e) {
        e.preventDefault();

       $('#saveBtn').prop('disabled', true); // disable button to avoid clicks
       $('#saveBtn').data('submitting', true);

        let formData = new FormData(this);
        let url = window.location.origin+'/admin/addCategory';
        let method = $(this).attr('method');

        $('#spinner').addClass('spinner-border spinner-border-sm').show();
        $('#buttonText').text('Please wait...');

        // CSRF setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });

        $.ajax({
            url: url,
            method: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
        if (response.validation_error) {
            toastr.error(response.message);
            $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
            $('#buttonText').text('Save');
            $('#saveBtn').prop('disabled', true); // disable button to avoid clicks
            $('#saveBtn').data('submitting', true);
            console.log(response);
            return;
        }

        if (response.success) {
            $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
            $('#buttonText').text('Save');
            $('#category-modal').modal('hide');
            $('#categoryForm')[0].reset();
            $('#saveBtn').prop('disabled', false);
            $('#saveBtn').data('submitting', false);
            toastr.success(response.message);

            setTimeout(() => {
           location.reload();
        }, 2000);
        }
    },
    error: function (xhr) {
        // Only handle server-side error (like 500, 404, etc.)
        $('#saveBtn').prop('disabled', false);
        $('#saveBtn').data('submitting', false);
        console.log(xhr.status);
        console.log(xhr.responseText);
        $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
        $('#buttonText').text('Save');
        $('#saveBtn').data('submitting', false);
    },
});

    });
});
</script>
<!-- update the data  -->
<script>
  $(document).ready(function () {

    // Show form data in edit mode
    $('.editBtn').on('click', function () {
        $('#cat_img').show();

        var rowData = $(this).closest('tr');
        var category = rowData.find('#category').text().trim();
        var image_from_db = rowData.find('#category_image img').attr('src');
        var id = $(this).attr('data-cat_id_for_edit');

        $('#catgory_name').val(category);
        $('#cat_img').attr('src', image_from_db);
        $('#category_id').val(id); // Set hidden input for update
    });

    // Submit form (Add or Update)
    $('#categoryForm').off('submit').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var token = $('#metaCsrf').attr('content');
        var categoryId = $('#category_id').val();

        var url = categoryId
            ? window.location.origin+'/admin/updateCategory'
            : window.location.origin+'/admin/addCategory';
      
        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    toastr.success('Successfully saved.');
                    console.log(data.success);
                
                    location.reload();    //  clear form or reload
                }
            },
            error: function (xhr) {
            const errorMsg = JSON.parse(xhr.responseText);
            console.log(errorMsg.errors);
            toastr.error(errorMsg.errors);
            }
        });
    });

});

</script>

<!-- delete the data  -->
<script>
    $(document).ready(function() {
    // Delete button functionality
    $('.deleteBtn').click(function() {
        var delete_id = $(this).attr('data-id');
        var tr = $(this).closest('tr'); // Get the row to blur

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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                });
                $.ajax({
                    url: '/admin/delete/'+delete_id,
                    method: 'get',
                    success: function(response) {
                        if (response.success) {
                            // Add blur to the content cells only
                            tr.remove();

                            // Create and append the restore button in the actions column
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        }

                        if (response.error) {
                            toastr.error(response.message);
                        }
                    }
                })
            }
        });
    });
});

</script>
</body>
</html>
