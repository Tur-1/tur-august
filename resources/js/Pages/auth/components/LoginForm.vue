<template>

    <div class="auth-form-content tab-pane fade show active" id="login-form" role="tabpanel" aria-labelledby="home-tab">
        <form method="POST" action="{{ route('login') }}">

            <div class="mb-3">
                <div class="form-floating ">
                    <input class="form-control form-control-sm " type="email" id="email" placeholder="Email" required
                        autocomplete="email">
                    <label for="email">Email </label>
                </div>

                <!-- <div class="invalid-feedback">
                    {{ $message }}
                </div> -->

            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control " id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 " name="login">Sign in</button>
        </form>
    </div>
</template>