@if(session('success'))
    <div class=" d-flex justify-content-center align-items-center mt-2">
        <div class="alert alert-success  text-center w-50" id="successMessage">
            {{ session('success')}}
        </div>
    </div>
@endif

@if(session('error') || $errors->any())
    
    <div class=" d-flex justify-content-center align-items-center mt-2">
        <div class="alert alert-danger  text-center w-50" id="errorMessage">
            {{ session('error') }}
        </div>
    </div>
@endif


<script>
    // Hide success message after 3 seconds
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 3000);

    // Hide error message after 3 seconds
    setTimeout(function() {
        document.getElementById('errorMessage').style.display = 'none';
    }, 3000);
    </script>