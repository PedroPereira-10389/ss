@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reuniões</h3>
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
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ asset('storage/'.$reunioesid->foto)}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                    <h3>{{$reunioesid->nomecliente}}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$reunioesid->pais}}
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Administrador
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
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Reunião</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Histórico</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Assunto</th>
                                  <th>Hora Início</th>
                                  <th>Hora Fim</th>
                                  <th>Sala</th>
                                  <th>Participante</th>
                                  <th>Apontamentos</th>
                                  <th>Criador</th>                                  
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>                             
                                <tr>
                                <td>{{$reunioesid->idreuniao}}</td>
                                <td>{{$reunioesid->objetivo}}</td>
                                <td>{{$reunioesid->horainicio}}</td>
                                <td>{{$reunioesid->horafim}}</td>
                                <td>{{$reunioesid->sala}}</td>
                                <td>{{$reunioesid->nomecliente}}</td>
                                <td>{{$reunioesid->descricao}}</td>
                                <td>{{$reunioesid->nomeutilizador}}</td>
            
                                <td><a style="background-color:transparent;border-color:#ffc107; cursor: pointer;"  data-toggle="modal" data-target=".bs-example-modal-lg-{{$reunioesid->idreuniao}}"><i class="fa fa-pencil-square-o fa-lg" style="color:#ffc107"></i></a></td>
                    
                                </tr>
                              </tbody>
                            </table>
                            <!-- end recent activity -->
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Assunto</th>
                                  <th>Hora Início</th>
                                  <th>Hora Fim</th>
                                  <th>Sala</th>
                                  <th>Participante</th>
                                  <th>Apontamentos</th>
                                  <th>Criador</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($reunioesidtodas as $reunioesidtoda)
                                <tr>
                                  <td>{{$reunioesidtoda->idreuniao}}</td>
                                  <td>{{$reunioesidtoda->objetivo}}</td>
                                  <td>{{$reunioesidtoda->horainicio}}</td>
                                  <td>{{$reunioesidtoda->horafim}}</td>
                                  <td>{{$reunioesidtoda->sala}}</td>
                                  <td>{{$reunioesidtoda->nomecliente}}</td>
                                  <td>{{$reunioesidtoda->descricao}}</td>
                                  <td>{{$reunioesidtoda->nomeutilizador}}</td>
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
        <div class="modal fade bs-example-modal-lg-{{$reunioesid->idreuniao}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form  action="{{route('adicionardescricaoreuniao',$reunioesid->idreuniao) }}" method="POST">
              {{ csrf_field() }}
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Descrição</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                  <textarea type="text" class="form-control has-feedback" rows="10" id="inputSuccess2" name="descricao" placeholder="Apontamentos"></textarea>
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