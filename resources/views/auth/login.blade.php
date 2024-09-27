<x-scaffold>
    @section('title', 'Sign in')
    
    <div class="d-flex justify-content-center align-items-center vh-100 bg-dark text-light">
        <main class="form-signin w-100 m-auto" style="max-width: 400px;">
            <form method="post" action="{{route('login.store')}}">
                @csrf 
                <h1 class="h3 mb-3 fw-normal text-center">Sign In</h1>

         
                
                <div class="form-floating mb-3">
                    <input type="email" name="email" :value="old('email')" class="form-control bg-dark text-light" id="emailaddress" >
                    <label for="emailaddress">Email address</label>
                    <x-input-error name="email"/>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control bg-dark text-light" id="password">
                    <label for="password">Password</label>
                    <x-input-error name="password"/>
                </div>

    
                <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>
        </main>
    </div>
</x-scaffold>
