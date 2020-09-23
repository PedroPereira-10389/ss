@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Funcionário</h3>
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
              @if(session()->has('valoresalterados'))
              <div class="alert alert-success" id="successdiv" style="display:none">
              {!! session('valoresalterados') !!}
              </div>
              @endif
              @if(session()->has('valoresalteradoserro'))
              <div class="alert alert-danger" id="dangerdiv" style="display:none">
              {!! session('valoresalteradoserro') !!}
              </div>
              @endif
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
                          <img class="img-responsive avatar-view" src="{{ asset('storage/'.$funcionario->foto)}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                    <h3>{{$funcionario->nome}}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa  fa-globe user-profile-icon"></i> {{$funcionario->pais}}
                        </li>
                        <li><i class="fa  fa-building user-profile-icon"></i> {{$funcionario->cidade}}
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$funcionario->morada}}
                        </li>
                       
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
                         
                          </li>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <!-- start recent activity -->
                            <table class="data table table-responsive table-striped no-margin ">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Quantidade (kg)</th>
                                  <th>Preco/kg</th>
                                  <th>Preço Inicial (€)</th>
                                  <th>Preço Atual (€)</th>                                
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>                             
                                <tr>
                                <td><input type="text" id="idfuncionario"  name="idfuncionario" required="required" class="form-control " value="{{$funcionario->idfuncionario}}" readonly="true"></td>
                                <td><input type="number" id="quantidade" name="quantidade" required="required" class="form-control " value="{{$funcionario->quantidade}}" step="0.01"></td>
                                <td><input type="number" id="precoacordado" required="required" class="form-control " value="{{$funcionario->precoacordado}}"></td>
                                <td><input type="number" id="primeiropreco" required="required" class="form-control " value="{{$funcionario->primeiropreco}}" readonly></td>
                                <td><input type="number" id="ultimopreco" name="ultimopreco" required="required" class="form-control " value="{{$funcionario->ultimopreco}}" step="0.01"></td>
                                <td><a  class="btn btn-info editvalue" id ="btneditvalue" style="background-color:transparent;border-color:#ffc107;cursor: pointer;display:none"  role="button" data-id="{{ $funcionario->idfuncionario}}" ><i class="fa  fa-refresh fa-spin" style="color:#ffc107"></i></a></td>                              
                                </tr>
                              </tbody>
                            </table>
                            <!-- end recent activity -->
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

    @include('layouts.footer')

  </body>
</html>