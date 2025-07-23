<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - Product</title>
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

        .error {
            color: #FF0000;
        }


        div.vscomp-toggle-button {
            display: block;
            width: 100%;
            padding: -1rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--bs-body-color);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
            border-radius: var(--bs-border-radius);
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        div#productCategory {
            max-width: 100%;
        }

        div#vscomp-ele-wrapper-5988 {
            height: 37px;
        }
    </style>

</head>

<body>
    <!-- include sideNav here -->
    @include('sideNav')
    <main class="main">
        <h2>Products</h2>
        <header class="d-flex justify-content-end mt-3">
            <button class="add_btn bg-blue-1-hover text-white btn rounded" data-bs-toggle="modal"
                data-bs-target="#product-modal" title="Add New Client">+ Add Product</button>
        </header>

        <div class="table-responsive py-4">
            <table border="0" cellspacing="5" cellpadding="5">
                <tbody>
                    <tr>
                        <td>From date:</td>
                        <td><input type="date" class="form-control" id="dateFrom" name="dateFrom"></td>
                        <td>&nbsp; &nbsp; &nbsp; </td>
                        <td>To date:</td>
                        <td><input type="date" class="form-control" id="dateTo" name="dateTo"></td>
                    </tr>
                    <tr>
                        <td>&nbsp; &nbsp; &nbsp; </td>
                        <td>&nbsp; &nbsp; &nbsp; </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped table-hover">
                <thead>


                    <tr>
                        <th class="no-filter">S.No.</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>features</th>
                        <th>Image</th>
                        <th class="no-filter">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <!-- Add Table data here -->
                    @php
                        $i = 1;
                     @endphp
                    @forelse ($data as $products)
                        <tr class="tr_ container-fluid">
                            <td>{{ $i++ }}</td>
                            <td id="">{{ $products['name'] }}</td>
                            <td id="">{{ $products['price'] }}</td>
                            <td id="">{{ $products->category->category ?? 'N/A' }}</td>
                            <td class="text-wrap" style="width: 6rem;">{{ $products['description'] }}</td>
                            <td class="text-wrap" style="width: 6rem;">{{ $products['features'] }}</td>
                            <td id="category_image"><img id="category_image_from_db"
                                    src="{{ asset('images/' . ($products['product_img'] ?? 'profile.png')) }}"
                                    alt="product image" height="70px" width="70px"></td>
                            <td>

                                <div class="d-flex justify-content-center gap-1 editdeleteDiv">
                                    <button class="editBtn btn p-2" data-product-for-edit="{{ $products }}" id="edtBtn"
                                        data-bs-toggle="modal" data-bs-target="#product-modal" title="Edit client Info">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn p-2 deleteBtn" data-id="{{ $products['id'] }}">
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
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    <div id="snackbar"></div>

    <div class="modal fade" id="product-modal" tabIndex="-1" data-bs-backdrop="static">
        <div class=" modal-dialog  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" id="productForm" class="d-flex flex-column gap-3 productFormClass" enctype="multipart/form-data">
                        @csrf

                        <!-- Hidden field to differentiate add vs update -->
                        <input type="hidden" name="product_id_for_update" id="product_id_for_update">


                        <div>
                            <label for="name">Product: </label>
                            <input type="text" name="name" class="form-control" id="product_name" placeholder="Name"
                                minlength="3" maxlength="50" required />
                        </div>

                        <div>
                            <label for="name">Price: </label>
                            <input type="number" name="price" class="form-control" id="product_price"
                                placeholder="Price" maxlength="50" required />
                        </div>

                        <div id="addDataDiv">
                            <label for="name" class="mt-1">Select Category: </label>
                            <br>
                            <select id="productCategory" name="category_id">
                                @foreach ($all_data_category as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label for="name">Description: </label>
                            <textarea name="description" class="form-control" placeholder="Category"
                                id="product_Description">Description</textarea>
                        </div>


                        <div>
                            <label for="name">Features: </label>
                            <textarea name="features" class="form-control" placeholder="Features"
                                id="product_features">Features</textarea>
                        </div>

                        <div>
                            <label for="image">Image: </label>
                            <img id="product_img" src="#" height="50px" width="50px" alt="product_image" class="mb-2"
                                style="display: none;" >
                            <input type="file" class="form-control" name="product_img" id="product_img_input" />
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

    $(document).ready(function () {
    let table = new DataTable('.table');

    VirtualSelect.init({
        ele: '#productCategory',
        search: true
    });

    // Reset form on modal open
    $('.add_btn').click(function () {
        $('#product_img').css('display', 'none');
        $('#buttonText').text('Save');
        $('#productForm')[0].reset();
        $('#productForm').attr('action', '/admin/addProduct'); // set action if needed
    });

    // Form submission — outside of `.add_btn` click
    $('#productForm').on('submit', function (e) {
        e.preventDefault();

        $('#productForm').validate();
        let formData = new FormData(this);
        formData.append('formType', 'add');
        let selectedCategoryId = $('input[name="category_id"]').val();
        formData.append('category_id', selectedCategoryId);
        let url = window.location.origin + '/admin/addProduct';
        let method = $(this).attr('method');

        $('#spinner').addClass('spinner-border spinner-border-sm').show();
        $('#buttonText').text('Please wait...');

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
                if (response.success) {
                    $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
                    $('#buttonText').text('Save');
                    $('#product-modal').modal('hide');
                    $('#productForm')[0].reset();
                    $('#saveBtn').prop('disabled', false);
                    $('#saveBtn').data('submitting', false);
                    toastr.success(response.message);
                    setTimeout(() => location.reload(), 2000);
                }
            },
            error: function (xhr) {
                $('#saveBtn').prop('disabled', false);
                $('#saveBtn').data('submitting', false);
                const errorMessage = JSON.parse(xhr.responseText);
                toastr.error(errorMessage.message);
                $('#spinner').removeClass('spinner-border spinner-border-sm').hide();
                $('#buttonText').text('Save');
            },
        });
    });
});

    </script>

    <!-- update the data  -->
    <script>
        $(document).ready(function () {

            // Show form data in edit mode
            let JsonData = {};
            $('.editBtn').on('click', function () {
                // set all values in modal when user click edit button
                $('#product_img').show();
                var rowData = $(this).closest('tr');
                const productData = $(this).attr('data-product-for-edit');
                JsonData = (JSON.parse(productData));
                $('#product_name').val(JsonData.name);
                $('#product_price').val(JsonData.price);
                $('#product_Description').val(JsonData.description);
                $('#product_features').val(JsonData.features);
                $('.vscomp-value').text(JsonData.category.category);
                $('.vscomp-value').css('color', '#000000');
                $('.vscomp-hidden-input').val(JsonData.category.id);

                var image_from_db = rowData.find('#category_image img').attr('src');
                $('#product_img').attr('src', image_from_db);
                $('#product_id_for_update').val(JsonData.id);

        

            // Submit form (Add or Update)
            $('#productForm').off('submit').on('submit', function (e) {
                e.preventDefault();
                $('#productForm').validate();

                var formData = new FormData(this);
                let selectedCategoryId = $('input[name="category_id"]').val();
                formData.append('formType', 'update');
                formData.append('category_id', selectedCategoryId);
                var token = $('#metaCsrf').attr('content');
                const url = window.location.origin+'/admin/updateProduct';


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
                            toastr.success('product successfully updated');
                            console.log(data.success);

                            location.reload();    //  clear form or reload
                        }
                    },
                    error: function (xhr) {
                        try {
                            const errorMsg = JSON.parse(xhr.responseText);
                            console.log(" Laravel Validation Errors:", errorMsg.errors);
                            for (const key in errorMsg.errors) {
                                toastr.error(errorMsg.errors[key][0]);
                            }
                        } catch (e) {
                            console.error(" Server error, not JSON:", xhr.responseText); // show full HTML error
                            toastr.error("Something went wrong on the server.");
                        }
                    }

                });
            });

        });
    });    
</script>

    <!-- delete the data  -->
    <script>
        $(document).ready(function () {
            // Delete button functionality
            $('.deleteBtn').click(function () {
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
                            url: '/admin/product/delete/' + delete_id,
                            method: 'get',
                            success: function (response) {
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