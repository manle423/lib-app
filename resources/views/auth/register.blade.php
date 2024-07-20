<x-layout>
    <h1>Register an account</h1>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        {{-- Full name --}}
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}"/>
                            <label class="form-label" for="name">Full name</label>
                            @error('name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" class="form-control form-control-lg" name="email" />
                            <label class="form-label" for="email">Email address</label>
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" class="form-control form-control-lg" name="password" />
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" />
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            @error('password')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-lg btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
