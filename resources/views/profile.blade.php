@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
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
              @if(session()->has('alteraperfildados'))
              <div class="alert alert-success">
                  {!! session('alteraperfildados') !!}
               </div>
              @endif
              @if(session()->has('alteraperfildadoserro'))
              <div class="alert alert-danger">
                  {!! session('alteraperfildadoserro') !!}
               </div>
              @endif
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
                      <h3>{{$user->nomeproprio}}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$user->pais}}
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> {{$user->nomeprofissao}}
                        </li>

                        <li class="m-top-xs">
                          <i class="fa  fa-birthday-cake user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">{{$user->datanascimento}}</a>
                        </li>


                        <li class="m-top-xs">
                            <i class="fa fa-external-link user-profile-icon"></i>
                            <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                          </li>
                      </ul>

                    <a class="btn btn-success" style="margin-bottom: 20px;" href="{{route('editarutilizadorform')}}"><i class="fa fa-edit m-right-xs"></i>Editar Perfil</a>
                      <br />
                      <!-- start skills -->
                      
                   
                        <h4>Competências <i class="fa  fa-plus-square" style="float: right; cursor:pointer" data-toggle="modal" data-target=".bs-example-modal-lg"></i></h4>
                      
                    
                      <ul class="list-unstyled user_data">
                        @foreach($competenciasid as  $competenciaid)
                        <li>
                          <p>{{$competenciaid->competencia}}</p>
                          <div class="progress progress_sm" style="width:100% !important;margin-bottom: 7px !important;">
                            <div class="progress-bar bg-green" role="progressbar"  data-transitiongoal="{{$competenciaid->nivel}}"></div>
                          </div>
                          <a href="{{asset('storage/'.$competenciaid->comprovativo) }}" target="_blank"><i class="fa  fa-file-pdf-o" style="cursor:pointer"></i></a>
                        </li>
                        @endforeach                
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Projetos Futuros</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <!-- start recent activity -->
                            <ul class="messages">     
                              <table class="data table table-striped no-margin">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Client Company</th>
                                    <th class="hidden-phone">Hours Spent</th>
                                    <th>Contribution</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">18</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>New Partner Contracts Consultanci</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">13</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Partners and Inverstors report</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">30</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">28</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- end user projects -->
                            </ul>
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Acrescentar Nova Competência</h4>
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="{{route('adicionacompetencia')}}" method="POST"  enctype="multipart/form-data">
                  {{ csrf_field() }} 
                <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 " style="font-size:larger; padding-left:10px;margin-top: 10px;">Competência:</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="select2_single form-control" tabindex="-1" name="selectcompetencia">
                                    <option value="AK">---Selecione---</option>
                                    @foreach($competencias as $competencia)
                                    <option value={{$competencia->idcompetencia}}>{{$competencia->nomecompetencia}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 " style="font-size:larger; padding-left:10px;margin-top: 10px;">Nível:</label>
                            <div class="col-md-9 col-sm-9 " style="margin-top:10px">
                                <input type="range" class="custom-range" id="customRange" name="nivelcompetencia">
                                <div id="result" style="float:right"><b></b></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 " style="font-size:larger; padding-left:10px;margin-top: 10px;">Comprovativo:</label>
                            <div class="col-md-9 col-sm-9 " style="margin-top:10px">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon01" accept="application/pdf">
                                    <label class="custom-file-label" for="inputGroupFile01">Selecione o ficheiro</label>
                                  </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
              </form>
              </div>
            </div>
          </div>

        <!-- /page content -->

        @include('layouts.footer')

  </body>
</html>