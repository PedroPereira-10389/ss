@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Lista de Clientes</h3>
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
        @if(session()->has('messagecliente'))
        <div class="alert alert-success">
        {!! session('messagecliente') !!}
        </div>
        @endif
        @if(session()->has('messageclienteerror'))
        <div class="alert alert-danger">
        {!! session('messageclienteerror') !!}
        </div>
        @endif
        @if(session()->has('alteracliente'))
        <div class="alert alert-success">
        {!! session('alteracliente') !!}
        </div>
        @endif
        @if(session()->has('alteraclienteerro'))
        <div class="alert alert-danger">
        {!! session('alteraclienteerro') !!}
        </div>
        @endif
        @if(session()->has('eliminacliente'))
        <div class="alert alert-success">
        {!! session('eliminacliente') !!}
        </div>
        @endif
        @if(session()->has('eliminaclienteerro'))
        <div class="alert alert-danger">
        {!! session('eliminaclienteerro') !!}
        </div>
        @endif
        @if(session()->has('messageadicionarcontatos'))
        <div class="alert alert-success">
        {!! session('messageadicionarcontatos') !!}
        </div>
        @endif
        @if(session()->has('messageadicionarcontatoserro'))
        <div class="alert alert-danger">
        {!! session('messageadicionarcontatoserro') !!}
        </div>
        @endif
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Clientes</h2>
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
                    <th>Nif</th>
                    <th>Nome</th>
                    <th>Contacto</th>
                    <th>País</th>
                    <th>Data Criação</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)                       
                  <tr>
                    <td>{{$cliente->idcliente}}</td>
                    <td>{{$cliente->nif}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->contacto}}</td>
                    <td>{{$cliente->pais}}</td>
                    <td>{{$cliente->dataentrada}}</td>
                  <td>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#155BFE" href="{{url('detalhesclienteid/'.$cliente->idcliente)}}" role="button"><i class="fa  fa-list-ul" style="color:#155BFE"></i></a>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#ffc107" href="{{url('listarclientesid/'.$cliente->idcliente)}}" role="button"><i class="fa fa-pencil-square-o" style="color:#ffc107"></i></a>
                    <a  class="btn btn-info deletebtn" style="background-color:transparent;border-color:#dc3545"  role="button" data-id="{{ $cliente->idcliente}}" ><i class="fa fa-trash-o" style="color:#dc3545"></i></a>
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