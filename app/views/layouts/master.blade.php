<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ stylesheet_link_tag() }}
        <title>Blog</title>
    </head>
    <body>

        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ link_to('/', 'Blog Application', array('class' => 'navbar-brand')) }}
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li><a>Hi {{ Auth::user()->first_name }}</a></li>
                            <li>{{ link_to('logout', 'Logout') }}</li>
                        @else
                            <li>{{ link_to('login', 'Login') }}</li>
                            <li>{{ link_to('signup', 'Sign up') }}</li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </div>
        
        <div class="container">
        	@yield('content')
        </div>

        {{ javascript_include_tag() }}
    </body>
</html>