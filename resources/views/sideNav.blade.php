<head>
<style>
  
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

  body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
</style>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">


</head>
<aside class="text-white">
    <div class="flex-column gap-2 justify-content-center align-items-center container-fluid d-none d-md-flex mt-3">
        <div class="profile-pic w-50">
            <img src="{{asset('images/profile.png')}}" loading="lazy" alt="Profile" class="img-fluid">
        </div>
        <h3>{{ Auth::user()->name ?? 'Admin' }}</h3>
    </div>
    <div
        class="mobile-nav-group-1 d-block d-md-none d-flex w-100 justify-content-between align-items-center flex-row-reverse">
        <div class="md-profile-pic d-block d-md-none">
            <img src="../admin/assets/images/profile.png" alt="Profile" class="img-fluid">
        </div>
        <div class="container-fluid d-block d-md-none">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navlinks" aria-expanded="false"
                aria-controls="navlinks" onclick="handleNavToggleClick()">
                <div></div>
                <div></div>
                <div></div>
            </button>
        </div>
    </div>
    
    <div class="navlinks" id="navlinks">
        <a href="{{route('admin.dashboard')}}" class="navlink link-dashboard">
            <p><i class="fa-solid fa-gauge"></i> Dashboard</p>
        </a>

       


        <button class="navlinkdropdown navlink btn mt-0 rounded-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navlinkgroup1" aria-expanded="false" aria-controls="navlinkgroup1">
            <i class="fa-solid fa-list"></i> List
            <i class="fa-solid fa-angle-right"></i>
        </button>

        <div class="collapse w-100" id="navlinkgroup1">
            <a href="{{ route('admin.category') }}" class="navlink link-clients ps-5">
                <p><i class="fa-solid fa-user"></i> category</p>
            </a><a href="{{ route('admin.product.page') }}" class="navlink link-project ps-5">
                <p><i class="fa-solid fa-diagram-project"></i> Product</p>
            </a>
        </div>


        <div class="navlinks" id="navlinks">
        <a href="{{ route('admin.users') }}" class="navlink link-clients">
        <p><i class="fa-solid fa-users"></i>Users</p>
        </a>
      </div>
        
        <a href="" class="navlink link-log-out pb-2 logoutClass">
            <p><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</p>
        </a>
    </div>
</aside>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {

    const url = window.location.href
    $('.navlink').filter(function() {
        return this.href === url
    }).addClass('activeNav')
    $('#navlinkgroup1 .navlink').each(function() {
        if (this.href === url) $('button.navlink').addClass('activeNav')
    })
    
    
      const url = window.location.href
    $('.navlink').filter(function() {
        return this.href === url
    }).addClass('activeNav')
    $('#navlinkgroup2 .navlink').each(function() {
        if (this.href === url) $('button.navlink').addClass('activeNav')
    })


    function handleNavToggleClick() {
        if ($('.navbar-toggler').hasClass('navOpened')) {
            $('.navbar-toggler').removeClass('navOpened')
        } else {
            $('.navbar-toggler').addClass('navOpened')
        }
    }

    function changeNav() {
        if (window.outerWidth < 768) {
            $('#navlinks').addClass('collapse')
        } else {
            $('#navlinks').removeClass('collapse')
        }
    }
    changeNav()
    window.addEventListener('resize', changeNav)
})
</script>
<script>
$(document).ready(function() {
    $('.logoutClass').on('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You are willing to logout!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!"
        }).then((result) => {
            if (result.isConfirmed) {
                const name = "admin"; 
                
                Swal.fire({
                    title: "Logout successfully!",
                    text: "You have successfully logged out.",
                    icon: "success"
                
                }).then(() => {
                   // Redirect to logout_page after showing success message
                     window.location.href = `/logout/${name}`;
                });


            }
        });
    });
});
</script>

