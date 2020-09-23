  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home')}}" class="site_title"><i class="fa fa-tree"></i> <span style="font-size: medium;"> Tree Digital Solutions </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('storage/'.Session::get('foto',"erro"))}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem-vindo</span>
                <h2>{{Session::get('nome',"erro") }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />