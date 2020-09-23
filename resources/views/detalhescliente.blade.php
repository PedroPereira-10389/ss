@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cliente</h3>
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
                    <h2>Detalhes</h2>
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
                          <img class="img-responsive avatar-view" src="{{ asset('storage/'.$clientes->foto)}}" alt="Avatar" title="Change the avatar">           
                        </div>
                      </div>
                    <h3>{{$clientes->nome}}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa  fa-globe user-profile-icon"></i> {{$clientes->pais}}
                        </li>
                        <li><i class="fa  fa-building user-profile-icon"></i> {{$clientes->cidade}}
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$clientes->morada}}
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-9 col-sm-9 ">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Informações</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Outros Membros</a>
                          </li>
                          </li>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <!-- start recent activity -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NIF</th>
                                  <th>Email</th>
                                  <th>Telefone</th>
                                  <th>Telemóvel</th>
                                  <th>Cargo</th>
                                  <th>Representante</th>
                                </tr>
                              </thead>
                              <tbody>                             
                                <tr>
                                <td>{{$clientes->idcliente}}</td>
                                <td>{{$clientes->nif}}</td>
                                <td>{{$clientes->email}}</td>
                                <td>{{$clientes->telefone}}</td>
                                <td>{{$clientes->telemovel}}</td>
                                <td>{{$clientes->cargo}}</td>
                                <td>{{$clientes->representante}}</td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end recent activity -->
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Telefone</th>
                                  <th>Telemóvel</th>
                                  <th>Cargo</th>
                                  <th><a style="background-color:transparent;border-color:#ffc107; cursor: pointer;"  data-toggle="modal" data-target=".bs-example-modal-lg-{{$clientes->idcliente}}"><i class="fa  fa-plus-square fa-lg" style="color: #26B99A"></i></a></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($outrosclientes as $outroscliente)
                                <tr>
                                  <td>{{$outroscliente->idcliente}}</td>
                                  <td>{{$outroscliente->nome}}</td>
                                  <td>{{$outroscliente->email}}</td>
                                  <td>{{$outroscliente->contacto}}</td>
                                  <td>{{$outroscliente->telemovel}}</td>
                                  <td>{{$outroscliente->cargo}}</td>
                                  <td></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
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

        <div class="modal fade bs-example-modal-lg-{{$clientes->idcliente}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form  action="{{route('adicionaroutrocontatos',$clientes->idcliente) }}" method="POST">
              {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Outros Contactos</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left"  name ="nome" placeholder="Nome..." >
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="email" class="form-control has-feedback-left"  name="email" placeholder="Email..." >
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                </div>
                  <div class="col-md-12 col-sm-12  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left"  name="contacto" placeholder="Telefone..." data-inputmask="'mask' : '999-999-999'">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-12 col-sm-12  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left"  name="telemovel" placeholder="Telemóvel..." data-inputmask="'mask' : '999-999-999'">
                      <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-12 col-sm-12  form-group has-feedback">     
                    <select class="form-control has-feedback-left" tabindex="-1" name="idprofissao">
                    <option>--Selecione--</option>
                    @foreach($profissoes as $profissao)
                    <option value="{{$profissao->idprofissao}}">{{$profissao->nomeprofissao}}</option>   
                    @endforeach  
                    </select>
                    <span class="fa  fa-suitcase form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Adicionar</button>
              </div>
            </div>
          </form>
          </div>
        </div>
    @include('layouts.footer')

  </body>
</html>