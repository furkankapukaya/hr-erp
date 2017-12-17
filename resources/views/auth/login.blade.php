<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Human Resources ERP</title>

    <!-- Bootstrap -->
    <script type="text/javascript">
//<![CDATA[
window.__cfRocketOptions = {byc:0,p:1512201853,petok:"5399c6a003a2cba0ad361df7f9f36fbca74ad83e-1512228061-1800"};
//]]>
</script>
<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/ddc5a536/cloudflare-static/rocket.min.js"></script>
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form" id="login-container">
          <section class="login_content">
            <form method="POST" action="{{action('LoginController@login')}}">
                {{ csrf_field() }}
              <h1>Login HR-ERP</h1>
              <div>
                <input type="text" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-success">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              
            </form>
            @include('errors')
            @if (Session::has('message'))
                <div class="alert alert-info" id="alert-info">{{ Session::get('message') }}</div>
            @endif
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
