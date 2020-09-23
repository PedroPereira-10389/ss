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
                          <img class="img-responsive avatar-view" src="{{ asset('storage/costs.jpg')}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                    <h3>{{$despesas->descricao}}</h3>
                      <ul class="list-unstyled user_data">
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
                            <table class="table table-striped  dt-responsive nowrap ">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Data Movimento</th>
                                  <th>Valor</th>
                                  <th>Pagamento</th>
                                  <th>Comprovativo</th>
                                  <th>Realizado Por</th>
                               </tr>
                              </thead>
                              <tbody>                             
                                <tr>
                                <td>{{$despesas->iddespesa}}</td>
                                <td>{{$despesas->data}}</td>
                                <td>{{$despesas->valor}}</td>
                                <td>{{$despesas->formapagamento}}</td>
                                <td><a href="{{asset('storage/'.$despesas->comprovativo)}}" target="_blank" style="color:blue">{{$despesas->comprovativo}}</a></td>
                                <td>{{$despesas->utilizador}}</td>           
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