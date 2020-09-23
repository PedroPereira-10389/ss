@extends('layouts.header')
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      @if(!empty($errors->first()))
      <div class="row col-lg-12">
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
      </div>
            @endif
            @if(session()->has('message'))
              <div class="alert alert-success">
                {!! session('message') !!}
              </div>
            @endif
          @if(session()->has('messageerror'))
            <div class="alert alert-danger">
              {!! session('message') !!}
          </div>
          @endif
        @if(session()->has('messagereset'))
        <div class="alert alert-success">
          {!! session('messagereset') !!}
        </div>
          @endif
           
      <div class="login_wrapper">
       <div class="animate form login_form">
          <section class="login_content">
            <form  id="loginform" action="{{route('passadados')}}" method="POST">
              {{ csrf_field() }}
              <h1>BACKOFFICE</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Utilizador"  required=""/>
              </div>
              <div>
                <input type="password" class="form-control" name="password"  placeholder="Password"  required=""/>
              </div>
              <div>
                <a class="btn btn-default submit" style="cursor: pointer" onclick="document.getElementById('loginform').submit()">Iniciar Sessão</a>
                <a class="reset_pass" href="#">Esqueceu-se da Password?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">É um novo utilizador?
                  <a href="#signup" class="to_register"> Cria Conta</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-tree"></i> TreeDigitalSolutions</h1>
                  <p>©2020 Todos os Direitos Reservados. TreeDigitalSolutions  Termos de Privacidade</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form  id="loginregister" action="{{route('passadosregister')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <h1>Criar Conta</h1>
              <div>
                <input type="text" class="form-control" name="name" placeholder="Nome" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="usernameregister" placeholder="Utilizador" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name = "email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="passwordregister" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="passwordconfirm" placeholder="Confirme Password" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="pais" placeholder="País" required="" />
              </div>
              <div>
                <input type="date" class="form-control" name="datanascimento"  required="" />
              </div>
              <div>
                <div class="custom-file" style="margin-top:23px;">
                  <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon01" accept="image/jpeg">
                  <label class="custom-file-label" for="inputGroupFile01">Selecione a foto</label>
                </div>
              </div>
              
              <div style="float: left; margin-top: 20px">
								
								<input type="checkbox"name ="terms" class="flat" > Li os Termos e Condições
											
              </div>
            
              <div  style="margin-top: 40px">
                <a class="btn btn-default submit" style="cursor: pointer" onclick="document.getElementById('loginregister').submit()">Registar</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Já tem conta?
                  <a href="#signin" class="to_register"> Iniciar Sessão </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-tree"></i> TreeDigitalSolutions</h1>
                  <p>©2020 Todos os Direitos Reservados. TreeDigitalSolutions Termos de Privacidade</p>
                </div>
              </div>
            </form>
          
          </section>
        </div>
      </div>
    </div>
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
<script>
  $(".alert").fadeTo(10000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
  });
  </script>
  </body>
</html>
