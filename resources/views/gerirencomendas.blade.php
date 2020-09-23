@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


<div class="right_col" role="main">
  <div class="row" style="display: inline-block;" >
    <div class="tile_count">
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-cube"></i> Encomendas Hoje</span>
      <div class="count">{{$encomendascount}}</div>
      <span class="count_bottom"><i class="green">{{$diferenca}}Encomendas </i> Last Day</span>
      </div>
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-cube"></i> Encomendas Mês</span>
      <div class="count">{{$encomendascountmestodo}}</div>
      <span class="count_bottom"><i class="green">{{$diferenca2}}Encomendas </i> Last Month</span>
      </div>
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-eur"></i> Total Valor Mês</span>
      <div class="count green">{{$encomendassummestodo}}</div>
      <span class="count_bottom"><i class="green">{{$diferenca3}}€ </i> Last Month</span>
      </div>
    </div>
  </div>
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Lista de Encomendas</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
        @if(session()->has('encomendaalterada'))
        <div class="alert alert-success">
        {!! session('encomendaalterada') !!}
        </div>
        @endif
        @if(session()->has('encomendaalteradaerro'))
        <div class="alert alert-danger">
        {!! session('encomendaalteradaerro') !!}
        </div>
        @endif
        @if(session()->has('eliminarencomenda'))
        <div class="alert alert-success">
        {!! session('eliminarencomenda') !!}
        </div>
        @endif
        @if(session()->has('eliminarfuncionarioerro'))
        <div class="alert alert-danger">
        {!! session('eliminarfuncionarioerro') !!}
        </div>
        @endif
        @if(session()->has('eliminarfuncionarioerrodata'))
        <div class="alert alert-warning">
        {!! session('eliminarfuncionarioerrodata') !!}
        </div>
        @endif
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Encomendas</h2>
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
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Nº</th>
                    <th>Cliente</th>
                    <th>Morada</th>
                    <th>Total (€)</th>
                    <th>Data Encomenda</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($encomendas as $encomenda)                       
                  <tr>
                    <td>{{$encomenda->idencomenda}}</td>
                    <td>{{$encomenda->cliente}}</td>
                    <td>{{$encomenda->localcarga}}</td>
                    <td>{{$encomenda->total}}</td>
                    <td>{{$encomenda->dataentrada}}</td>
                    @if($encomenda->estado == 0)
                    <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-exclamation" style="color:white"> Pendente</i></button></td>
                    @endif
                    @if($encomenda->estado == 1)
                    <td><button type="button" class="btn btn-success btn-xs"><i class="fa fa-check" style="color:white"> Enviado</i></button></td>
                    @endif
                    @if($encomenda->estado == 2)
                    <td><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close" style="color:white"> Cancelada</i></button></td>
                    @endif
                  <td>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#155BFE" href="{{url('listarencomendasid/'.$encomenda->idencomenda)}}" role="button"><i class="fa  fa-list-ul" style="color:#155BFE"></i></a>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#ffc107" href="{{url('listarencomendaseditarid/'.$encomenda->idencomenda)}}" role="button"><i class="fa fa-pencil-square-o" style="color:#ffc107"></i></a>
                    <a  class="btn btn-info deletebtnencomenda" style="background-color:transparent;border-color:#dc3545"  role="button" data-id="{{ $encomenda->idencomenda}}" ><i class="fa fa-trash-o" style="color:#dc3545"></i></a>
                    </td>
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
  </div>
  @include('layouts.footer')

</body>
</html>