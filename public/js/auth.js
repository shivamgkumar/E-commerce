document.addEventListener('DOMContentLoaded', function() {
    // Login form functionality
        const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', async  function(e) {
            e.preventDefault();
        
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;
            
            // Validate form
            if (!validateEmail(email)) {
                showNotification('Please enter a valid email address.', 'error');
                return;
            }
            
            if (password.length < 6) {
                showNotification('Password must be at least 6 characters.', 'error');
                return;
            }
            
            // In a real application, this would make an API call to authenticate the user
            // For demo purposes, we'll just simulate a successful login
            
            // Store user data in localStorage (in a real app, you'd use tokens/cookies)
            const userData = {
                email: email,
                password: password
            };

            const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
        const response = await fetch('http://127.0.0.1:8000/api/authenticate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token
            },
            body: JSON.stringify(userData)
        });
        
        const result = await response.json();
       
        if (!response.ok) {
        // Simple toast
        showNotification(result.message,type = 'error');
        if(result.validation_error){

          showNotification(result.message,type = 'error');
            new Toast(result.message);
            return;
        }
          new Toast(result.errors);
          return;
        }

        loginForm.reset();
        showNotification(result.message);
        setTimeout(() => {
            const IndexPage=document.getElementById('indexpage').innerText;
            console.log(IndexPage);
            window.location.href = IndexPage;
        }, 1500);
    } catch (error) {
        console.error('login Error:', error);
    }
    })
    
    // Register form functionality
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', async function(e) {
        e.preventDefault();

    const name = document.getElementById('register-name').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const confirmPassword = document.getElementById('register-confirm-password').value;

    // Validate form
    if (name.length < 2) {
        showNotification('Please enter your full name.', 'error');
        return;
    }

    if (!validateEmail(email)) {
        showNotification('Please enter a valid email address.', 'error');
        return;
    }

    if (password.length < 6) {
        showNotification('Password must be at least 6 characters.', 'error');
        return;
    }

    if (password !== confirmPassword) {
        showNotification('Passwords do not match.', 'error');
        return;
    }

    // Prepare data
    const formData =  new FormData(registerForm);
    const data = Object.fromEntries(formData.entries());

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch('http://127.0.0.1:8000/api/registration', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        });


        const result = await response.json();
       
        if (!response.ok) {
        // Simple toast
        if(result.validation_error){
            new Toast(result.message);
            return;
        }
          new Toast(result.errors);
          return;
        }

        registerForm.reset();
        showNotification(result.message);
        setTimeout(() => {
            const IndexPage=document.getElementById('indexpage').innerText;
            console.log(IndexPage);
            window.location.href = IndexPage;
        }, 1500);
    } catch (error) {
        console.error('Registration Error:', error);
        // console.log(response);
        document.getElementById('responseMsg').textContent = 'Request failed.';
    }
});
    }

    // Profile page functionality
    const profileForm = document.getElementById('profile-form');
    if (profileForm) {
        // Load user data from localStorage
        const userData = JSON.parse(localStorage.getItem('user'));
        
        if (!userData) {
            // If not logged in, redirect to login page
            window.location.href = 'login.html';
            return;
        }
        
        // Populate form fields
        document.getElementById('profile-name').value = userData.name || '';
        document.getElementById('profile-email').value = userData.email || '';
        
        // Handle form submission
        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('profile-name').value;
            const email = document.getElementById('profile-email').value;
            const currentPassword = document.getElementById('profile-current-password').value;
            const newPassword = document.getElementById('profile-new-password').value;
            
            // Validate form
            if (name.length < 2) {
                showNotification('Please enter your full name.', 'error');
                return;
            }
            
            if (!validateEmail(email)) {
                showNotification('Please enter a valid email address.', 'error');
                return;
            }
            
            if (currentPassword && newPassword.length < 6) {
                showNotification('New password must be at least 6 characters.', 'error');
                return;
            }
            
            // Update user data in localStorage
            userData.name = name;
            userData.email = email;
            
            localStorage.setItem('user', JSON.stringify(userData));
            
            showNotification('Profile updated successfully!', 'success');
        });
        
        // Logout button
        const logoutButton = document.getElementById('logout-button');
        if (logoutButton) {
            logoutButton.addEventListener('click', function() {
                localStorage.removeItem('user');
                showNotification('Logged out successfully! Redirecting...', 'success');
                
                // Redirect after a short delay
                setTimeout(() => {
                    window.location.href = '../index.html';
                }, 1500);
            });
        }
    }
    


// Validate email format
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

  
// Update header based on login status
function updateAuthHeader() {
    const userData = JSON.parse(localStorage.getItem('user'));
    const authLinks = document.querySelectorAll('a[href="pages/login.html"]');
    
    if (userData && authLinks) {
        authLinks.forEach(link => {
            link.href = 'pages/profile.html';
            link.innerHTML = '<i class="fas fa-user"></i>';
            link.title = userData.name || userData.email;
        });
    }
}
    }

    const flashElement = document.getElementById('logout_session');
    if (flashElement) {
        const flashMessage = flashElement.getAttribute('data-message');
        if (flashMessage) {
            showNotification(flashMessage);
        }
    } else {
        console.log('No session message');
    }



});   
