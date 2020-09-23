@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Produtos</h3>
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
              @if(session()->has('valoresalteradosprodutos'))
              <div class="alert alert-success" id="successdiv" style="display:none">
              {!! session('valoresalteradosprodutos') !!}
              </div>
              @endif
              @if(session()->has('valoresalteradosprodutoserro'))
              <div class="alert alert-danger" id="dangerdiv" style="display:none">
              {!! session('valoresalteradosprodutoserro') !!}
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
                          <img class="img-responsive avatar-view" src="{{ asset('storage/'.$produtos->foto)}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                    <h3>{{$produtos->referencia}}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa  fa-list user-profile-icon"></i> {{$produtos->descricao}}
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
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Simulador</a>
                          </li>
                          </li>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <div class="card-box table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Preço Venda</th>
                                  <th>Preço Custo</th>
                                  <th>Desconto</th>
                                  <th>Iva</th>
                                  <th>Lote</th>
                                  <th>Validade Início</th>
                                  <th>Validade Fim</th>
                                </tr>
                              </thead>
                              <tbody>                             
                                <tr>
                                <td>{{$produtos->idproduto}}</td>
                                <td>{{$produtos->precovenda}} €</td>
                                <td>{{$produtos->precocusto}} €</td>
                                <td>{{$produtos->desconto *100}} %</td>
                                <td>{{$produtos->iva * 100}} %</td>
                                <td>{{$produtos->lote}}</td>
                                <td>{{$produtos->validadeinicio}}</td>
                                <td>{{$produtos->validadefim}}</td>                           
                                </tr>
                              </tbody>
                            </table>

                          </div>
                            <!-- end recent activity -->
                          </div>
                           <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Preço Venda</th>
                                  <th>Preço Custo</th>
                                  <th>Desconto</th>
                                  <th>Iva</th>
                                  <th>Margem</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                <tr>
                                  <td><input type="text" id="idproduto"  name="idproduto" class="form-control " value="{{$produtos->idproduto}}" readonly="true"></td>
                                <td><input type="number" id="precovenda" name="precovenda" class="form-control " value="{{$produtos->precovenda}}" step="0.01"></td>
                                <td><input type="number" id="precocusto"  name="precocusto" class="form-control " value="{{$produtos->precocusto}}"></td>
                                <td><input type="number" id="desconto" name="desconto" class="form-control " value="{{$produtos->desconto}}"></td>
                                <td><input type="number" id="iva" name="iva" class="form-control " value="{{$produtos->iva}}" step="0.01" readonly="true"></td>
                                <td><input type="number" id="margem" name="margem" class="form-control " readonly="true"></td>
                                <td><a  class="btn btn-info refreshspin"  id="refreshspin" style="background-color:transparent;border-color:#ffc107; cursor:pointer;display:none"  role="button" data-id="{{ $produtos->idproduto}}"><i class="fa fa-refresh fa-spin" style="color:#ffc107"></i></a></td>                              
                                </tr>
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