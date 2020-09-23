@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                @if(session()->has('alteraprofile'))
                <div class="alert alert-success">
                    {!! session('alteraprofile') !!}
                 </div>
                @endif
                @if(session()->has('alteraprofilepassword'))
                <div class="alert alert-success">
                    {!! session('alteraprofilepassword') !!}
                 </div>
                @endif
                @if(session()->has('alteraprofilepassworderro'))
                <div class="alert alert-danger">
                    {!! session('alteraprofilepassworderro') !!}
                 </div>
                @endif
                @if(session()->has('alteraprofilecompetencias'))
                  <div class="alert alert-success">
                    {!! session('alteraprofilecompetencias') !!}
                  </div>
                @endif
                <h3>Área Pessoal</h3>
              </div>
              {{ csrf_field() }}
              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Gestão Pessoal <small>Actitivade Diária</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{asset('storage/'.$user->foto)}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{$user->nome}}</h3>
                      <br />

                    </div>

                        <div class="col-md-8 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>{{$user->nomeprofissao}}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-label-left input_mask" id="formprofile" action="{{ route('alteraperfildados')}}" method="POST">
                                        {{ csrf_field() }}
                                    <input type="hidden" name="idutilizador" value="{{$user->idutilizador}}">
                                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                                        <select class="form-control has-feedback-left" tabindex="-1" name="idprofissao">
                                        <option value= {{$user->idprofissao}}>{{$user->nomeprofissao}}</option>
                                        <option></option>
                                       @foreach($profissoes as $profissao)
                                       <option value={{$profissao->idprofissao}}>{{$profissao->nomeprofissao}}</option>
                                       @endforeach
                                        </select>
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="datanascimento" value="{{$user->datanascimento}}" data-inputmask="'mask': '9999/99/99'">
                                            <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" name="pais" value="{{$user->pais}}">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>                              
                           
                                        <div class="col-md-12 col-sm-12  form-group has-feedback">                                      
                                            <button type="submit" id="editcliente"  class="btn btn-warning" onclick="return confirmation6();">Alterar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

        @include('layouts.footer')

  </body>
</html>