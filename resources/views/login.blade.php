<x-template>
    <div class="form-container">
        <p class="bold medium-font">Log in</p>
        <form action="/login" method="POST">
            @csrf
            <div>
                <label for="username" class="small-font">Username</label>
                <input type="text" id="username" name="username" value="{{old("username")}}">
                <x-error name="username"/>
            </div>
            <div>
                <label for="password" class="small-font">Password</label>
                <input type="password" id="password" name="password" value="{{old("password")}}">
                <x-error name="password"/>
            </div>
            <button type="submit">Log in</button>
        </form>
        <div class="form-footer small-font">
            <span>No account? <a href="/signup" class="bold">Create one!</a></span>
        </div>
    </div>
</x-template>
