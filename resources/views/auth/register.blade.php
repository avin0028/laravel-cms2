<x-scaffold>
    @section('title', 'Sign up')
    
    <div class="d-flex justify-content-center align-items-center vh-100 bg-dark text-light">
        <main class="form-signin w-100 m-auto" style="max-width: 400px;">
            <form method="post" action="{{route('register.store')}}">
                @csrf 
                <h1 class="h3 mb-3 fw-normal text-center">Sign Up</h1>

                <div class="form-floating mb-3">
                    <input type="text" name="name" :value="old('name')" class="form-control bg-dark text-light" id="name">
                    <label for="name">Name</label>
                    <x-input-error name="name"/>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="email" name="email" :value="old('email')" class="form-control bg-dark text-light" id="emailaddress" >
                    <label for="emailaddress">Email address</label>
                    <x-input-error name="email"/>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password"  class="form-control bg-dark text-light" id="password">
                    <label for="password">Password</label>
                    <x-input-error name="password"/>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control bg-dark text-light" id="password_confirmation">
                    <label for="password_confirmation">Password Confirmation</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            </form>
        </main>
    </div>
</x-scaffold>
