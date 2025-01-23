@props(['name'])
@error($name)
    <p class="small-font error">{{$message}}</p>
@enderror
