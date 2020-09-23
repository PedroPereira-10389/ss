@extends('layouts.header')

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{route('passadados')}}" method="POST">
              {{ csrf_field() }}
              <h1>BACKOFFICE</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="Password"  placeholder="Password" required="" />
              </div>
              <div>
                <button type = "submit" class="btn btn-default submit" >Iniciar Sessão </button>
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-tree"></i> TreeDigitalSolutions</h1>
                  <p>©2020 Todos os Direitos Reservados. TreeDigitalSolutions! Termos de Privacidade</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
