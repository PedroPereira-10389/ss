@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Encomendas</h3>
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
                          <img class="img-responsive avatar-view" src="{{ asset('storage/'.$encomendasdetalhe->foto)}}" alt="Avatar" title="Change the avatar">           
                        </div>
                      </div>
                    <h3>{{$encomendasdetalhe->cliente}}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa  fa-globe user-profile-icon"></i> {{$encomendasdetalhe->pais}}
                        </li>
                        <li><i class="fa  fa-building user-profile-icon"></i> {{$encomendasdetalhe->cidade}}
                        </li>
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$encomendasdetalhe->morada}}
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
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Detalhe Encomenda</a>
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
                                  <th>Local Carga</th>
                                  <th>Hora Carga</th>
                                  <th>Local Descarga</th>
                                  <th>Hora Descarga</th>
                                  <th>Desconto</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>                             
                                <tr>
                                <td>{{$encomendasdetalhe->idencomenda}}</td>
                                <td>{{$encomendasdetalhe->localcarga}}</td>
                                <td>{{$encomendasdetalhe->horacarga}}</td>
                                <td>{{$encomendasdetalhe->localdescarga}}</td>
                                <td>{{$encomendasdetalhe->horadescarga}}</td>
                                <td>{{$encomendasdetalhe->desconto*100}} %</td>
                                <td>{{$encomendasdetalhe->total}}</td>
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
                                  <th>Referência</th>
                                  <th>Designação</th>
                                  <th>Preço Venda</th>
                                  <th>Preço Custo</th>
                                  <th>Desconto</th>
                                  <th>Iva</th>
                                  <th>Lote</th>
                                  <th>Validade Inicio</th>
                                  <th>Validade Fim</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($encomendasdetalhes as $encomendasdetalhess)
                                <tr>
                                  <td>{{$encomendasdetalhess->idencomenda}}</td>
                                  <td>{{$encomendasdetalhess->referencia}}</td>
                                  <td>{{$encomendasdetalhess->descricao}}</td>
                                  <td>{{$encomendasdetalhess->precovenda}} €</td>
                                  <td>{{$encomendasdetalhess->precocusto}} €</td>
                                  <td>{{$encomendasdetalhess->desconto * 100}} %</td>
                                  <td>{{$encomendasdetalhess->iva * 100}} %</td>
                                  <td>{{$encomendasdetalhess->lote}}</td>
                                  <td>{{$encomendasdetalhess->validadeinicio}}</td>
                                  <td>{{$encomendasdetalhess->validadefim}}</td>
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

    
    @include('layouts.footer')

  </body>
</html>