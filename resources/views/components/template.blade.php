<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="{{asset("/styles/style.css")}}">
    <script src="{{asset('/js/script.js')}}" defer></script>
</head>
<body>
<header>
    <nav>
        <div class="menuToggle medium-font bold">
            <span>Menu</span>
        </div>
        <ul class="bold medium-font">
            <div>
                <li><a href="/">HOME</a></li>
                <li><a href="">SPORT</a></li>
                <li><a href="">BLOX</a></li>
                <li><a href="">PAGES</a></li>
                <li><a href="">CONTACT</a></li>
            </div>
            @guest
                <li><a href="/login">LOGIN</a></li>
            @endguest
            @auth
                <li><a href="/logout">logout</a></li>
            @endauth
        </ul>
    </nav>
    <div>
        <div class="logo">
            <span>Fast<b>News</b></span>
            <p class="secondary-text small-font"><b>Clean, cool and powerful magazine theme</b></p>
        </div>
        <div class="ad">
            <img src="/images/place-your-here_bigger.jpg" alt="ad">
        </div>
    </div>
</header>
<main>
    {{$slot}}
</main>

<footer class="secondary-text small-font bold">
    <span>Copyright &copy; 2013. All Rights Reserved. Designed by kopatheme.net</span>
    <span>The trade marks and images used in the design are the copyright of their respective owners. They are used only for display purpose</span>
</footer>
</body>
</html>
