<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
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

    <div class="container m-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title" id='attemptMsg'></h5>
                        <p class="card-text" id="loginTime" data-attempt="">5</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title" id='attemptMsg1'></h5>
                        <p class="card-text" id="loginFailedTime" data-attempt1="">10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pending Tasks</h5>
                        <p class="card-text">57</p>
                    </div>
                </div>
            </div>
        </div>

      <div>
        <canvas id="myChart"></canvas>
        </div>
      </div>


<!-- include all js files here -->
@include('include_js')

<script>
  const ctx = document.getElementById('myChart');
  const successAttempt=$('#loginTime').attr('data-attempt');
  const failedAttempt=$('#loginFailedTime').attr('data-attempt1');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Successfull login Attempts','Failed login Attempts'],
      datasets: [{
        label: '# Login Attempts',
        data: [ successAttempt, failedAttempt],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<script>
    $(document).ready(function(){
        const loginAttempt= $('#loginTime').attr('data-attempt');
        if(loginAttempt > 1){
            $('#attemptMsg').text('Successfull login attempts');
        }else{
            $('#attemptMsg').text('Successfull login attempt');
        }

        const loginFailedAttempt= $('#loginFailedTime').attr('data-attempt1');
        if(loginFailedAttempt > 1){
            $('#attemptMsg1').text('failed login attempts');
        }else{
            $('#attemptMsg1').text('failed login attempt');
        }

    });
</script>
</body>
</html>
