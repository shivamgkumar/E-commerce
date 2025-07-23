<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Admin - Register</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('include')


    <style>
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
    #attendanebtn{
        float:right !important;
        margin-left:40px!important;
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

  .error{
  color:red;

 }
    </style>
</head>
<body class="bg-light-subtle ">

    <main>
        <section class="frame position-fixed top-50 start-50 translate-middle rounded-4 px-3 py-5 shadow-lg ">
            <h2 class="text-center">Admin Register</h2>
            <form action="#" id="singupForm" method="post" class="mt-3 d-flex flex-column gap-4 align-items-center">
              @csrf

               <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                </div>


                @error('name')
              <div>
                  <p style="color: red;">{{ $message }}</p>
              </div>
                @enderror


                <div>
                    <label for="user_email">Enter Email</label>
                    <input type="email" name="email" id="user_email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                </div>

                  @error('email')
                <div>
                  <p style="color: red;">{{ $message }}</p>
                  
                </div>
                 @enderror
                 
                 <div>
                    <label for="password">Enter Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                </div>

                  @error('password')
                <div>
                  <p style="color: red;">{{ $message }}</p>
                  
                </div>
                 @enderror

                <div class="row">
                  
                <button type="submit" id="submitBtn" class="btn text-white bg-blue-1-hover mx-2 w-auto"><span id="buttonText">Sign Up</span>
                  <span span aria-hidden="true" id="spinner"></span>
                   <span role="status"  id="loader"></span>

                </button>
              
                 <button   class="btn text-white bg-blue-1-hover mx-2 w-auto" id="loginBtn"><span id="buttonText1">Login</span>
                  <span span aria-hidden="true" id="spinner1"></span>
                   <span role="status"  id="loader1"></span>
              </button>
               </div>
            </form>
        </section>

    </main>
    
      <div id="dashboardPage" style="display: none;">
        {{ route('admin.login') }}
    </div>


  </body>

@include('include_js')
 <script>
  $(document).ready(function(){
  // redirect to the login page route
    $('#loginBtn').click(function(e){


        // show loader or spinner here
      $('#loader1').text('Please Wait...');
      $('#spinner1').addClass('spinner-border spinner-border-sm').show();
      $('#buttonText1').text('');

        // hide loader after 2 seconds 
      setTimeout(()=>{
      $('#loader1').text('');
      $('#spinner1').removeClass('spinner-border spinner-border-sm');
      $('#buttonText1').text('Login');
     },5000);
      
      e.preventDefault();
     window.location.replace('{{route("admin.login")}}');

    });

  });
 </script>


 <script>
  document.addEventListener('DOMContentLoaded',function(){
    document.getElementById('singupForm').addEventListener('submit',async function(event){
      event.preventDefault();
      const data=new FormData(this);
      const csrfToken=document.getElementById('token').getAttribute('content');

      try {
        const api =window.location.origin+'/api/registration';
        const response =  await fetch(api, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: data
        });
        
        const result = await response.json();
        const message=result.errors;
        console.log(message);
        if (!response.ok) {
          toastr.error(message);
          return;
        }

        document.getElementById('singupForm').reset();
        toastr.success(result.message);
        setTimeout(() => {
            const dashboardPage=document.getElementById('dashboardPage').innerText;
            window.location.href = dashboardPage;
        }, 1500);
    } catch (error) {
        console.error('login Error:', error);
    }
      

    })
  })
 </script>

</body>
</html>

