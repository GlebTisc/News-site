<x-template>
    <div class="form-container">
        <p class="bold medium-font">Sign up</p>
        <form action="/signup" method="POST">
            @csrf
            <div>
                <label for="username" class="small-font">Username</label>
                <input type="text" id="username" name="username" value="{{old('username')}}">
                <x-error name="username"/>
            </div>
            <div>
                <label for="password" class="small-font">Password</label>
                <input type="password" id="password" name="password">
                <x-error name="password"/>
            </div>
            <div>
                <label for="email" class="small-font">Email</label>
                <input type="email" id="email" name="email" value="{{old('email')}}">
                <x-error name="email"/>
            </div>
            <button type="submit">Sign up</button>
        </form>
        <div class="form-footer small-font">
            <span>Already have an account? <a href="/login" class="bold">Log in</a></span>
        </div>
    </div>
</x-template>
