<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - login</title>
  <meta charset="utf-8" />
  <meta name="csrf-token" id="metaCsrf" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="fast2sms" content="POjJzK5FGubZ5kncalMmRAO9Zdl0skU1">
  @include('include')
  <style>
    body {
      font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .frame {
      width: 90vw;
      max-width: 600px;
      height: fit-content;
      max-height: 90vh;
      overflow: auto;
    }

    .frame button {
      max-width: 200px;
      background: var(--blue-1);
    }

    .frame div {
      width: 90%;
    }

    #attendanebtn {
      float: right !important;
      margin-left: 40px !important;
    }

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

    .error {
      color: #FF0000;
    }
  </style>

</head>

<body class="bg-light-subtle ">

  <main>
    <button type="submit" id="attendanebtn" onclick="attendance()" class="btn text-white bg-blue-1-hover">Mark
      Attendance</button>
    <section class="frame position-fixed top-50 start-50 translate-middle rounded-4 px-3 py-5 shadow-lg ">
      <h2 class="text-center">Admin Login</h2>
      <form action="{{ route('user.authenticate') }}" method="post" id="loginForm"
        class="mt-3 d-flex flex-column gap-4 align-items-center">
        @csrf
        <div>
          <label for="email">Enter Email</label>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{old('email')}}">
        </div>
        <input type="hidden" name="admin" value="admin">
        @error('email')
      <div>
        <p style="color:red">{{$message}}</p>
      </div>
    @enderror

        <div>
          <label for="password">Enter Password</label>
          <input type="password" name="password" id="password"
            class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
        </div>
        @error('password')
      <div>
        <p style="color:red">{{$message}}</p>
      </div>
    @enderror


        @if(session('error'))
      <div class="alert alert-danger" id="errorText">
        {{ session('error') }}
      </div>
    @endif


        <div>
          @if(session('message'))
        <div class="alert alert-danger">
        {{ session('message') }}
        </div>
      @endif


          <button type="submit" id="submitBtn" class="btn text-white bg-blue-1-hover"><span id="buttonText">Login</span>
            <span span aria-hidden="true" id="spinner"></span>
            <span role="status" id="loader"></span>
          </button>

          <button type="submit" id="forgotBtn" data-onredirect="{{ route('password.request') }}"
            class="btn text-white bg-blue-1-hover"><span id="buttonText1">Forgot Password?</span>
            <span aria-hidden="true" id="spinner1"></span>
            <span role="status" id="loader1"></span>
          </button>
        </div>

        <div class="row justify-content-center mt-3">
          <a href="#" class="btn btn-outline-dark d-flex align-items-center justify-content-center gap-2"
            style="width: 250px;">
            <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" width="20"
              height="20">
            <span>Login with Google</span>
          </a>
        </div>
      </form>

    </section>

  </main>
  <div id="dashboard_page" style="display: none;">
    {{ route('admin.dashboard') }}

  </div>
</body>


<!-- include all js files here -->
@include('include_js')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault(); // Prevent form default submission

      const token = document.getElementById('metaCsrf').getAttribute('content');
      const formData = new FormData(this);
      const api = window.location.origin + '/api/authenticate';

      fetch(api, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json'
        },
        body: formData
      })
        .then(response => response.json())
        
        .then(data => {
          if (data.success) {
            const dashboardPage = document.getElementById('dashboard_page').innerText;
            toastr.success(data.message);
            window.location.href = dashboardPage;
          }
          else if (data.error) {
            toastr.error(data.message);
            return;
          }
        })
        .catch(error => {
          // console.error(response.message);
          alert('Something went wrong.');
        });
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('#forgotBtn').click(function (e) {
      e.preventDefault();

      // show loader or spinner here
      $('#loader1').text('Please Wait...');
      $('#spinner1').addClass('spinner-border spinner-border-sm').show();
      $('#buttonText1').text('');
      const redirectPage = $('#forgotBtn').attr('data-onredirect');
      window.location = redirectPage;


      // hide loader after 2 seconds 
      setTimeout(() => {
        $('#loader1').text('');
        $('#spinner1').removeClass('spinner-border spinner-border-sm');
        $('#buttonText1').text('Forgot Password?');
      }, 7000);
    })

  });
</script>

</body>

</html>