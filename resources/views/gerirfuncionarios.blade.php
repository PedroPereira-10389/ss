@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


<div class="right_col" role="main">
  <div class="row" style="display: inline-block;" >
    <div class="tile_count">
      <div class="col-md-3 col-sm-3  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Funcionários</span>
      <div class="count">{{$funcionarioscount}}</div>
      <span class="count_bottom"><i class="green">{{$variacao}}% </i> From last Week</span>
      </div>
      <div class="col-md-3 col-sm-3  tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i>Tempo Total Mês</span>
      <div class="count">{{$media}}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$variacao6}}horas </i> From last Week</span>
      </div>
      <div class="col-md-3 col-sm-3  tile_stats_count">
        <span class="count_top"><i class="fa fa-eur"></i> Total Pagamentos</span>
      <div class="count green">{{$funcionariosprecototal}}</div>
      <span class="count_bottom"><i class="green">{{$variacao2}}% </i> From last Week</span>
      </div>
      <div class="col-md-3 col-sm-3  tile_stats_count">
        <span class="count_top"><i class="fa fa-eur"></i> Média Preço</span>
      <div class="count green">{{$funcionariosmediaprecoacordado}}</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$variacao3}}% </i> From last Week</span>
      </div>
    </div>
  </div>
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Lista de Funcionários</h3>
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
        @if(session()->has('alterafuncionario'))
        <div class="alert alert-success">
        {!! session('alterafuncionario') !!}
        </div>
        @endif
        @if(session()->has('alterafuncionarioerro'))
        <div class="alert alert-danger">
        {!! session('alterafuncionarioerro') !!}
        </div>
        @endif
        @if(session()->has('alterafuncionarioerrodepartamento'))
        <div class="alert alert-danger">
        {!! session('alterafuncionarioerrodepartamento') !!}
        </div>
        @endif
        @if(session()->has('eliminarfuncionario'))
        <div class="alert alert-success">
        {!! session('eliminarfuncionario') !!}
        </div>
        @endif
        @if(session()->has('eliminarfuncionarioerro'))
        <div class="alert alert-danger">
        {!! session('eliminarfuncionarioerro') !!}
        </div>
        @endif
        @if(session()->has('messageadicionarfuncionario'))
        <div class="alert alert-success">
        {!! session('messageadicionarfuncionario') !!}
        </div>
        @endif
        @if(session()->has('messageadicionarfuncionarioerro'))
        <div class="alert alert-danger">
        {!! session('messageadicionarfuncionarioerro') !!}
        </div>
        @endif
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Funcionários</h2>
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
                    <th>#</th>
                    <th>Nome</th>
                    <th>Departamento</th>
                    <th>Entrada</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $funcionario)                       
                  <tr>
                    <td>{{$funcionario->idfuncionario}}</td>
                    <td>{{$funcionario->nomefuncionario}}</td>
                    <td>{{$funcionario->departamento}}</td>
                    <td>{{$funcionario->dataentrada}}</td>
                    @if($funcionario->estado == 0)
                    <td>
                      <button type="button" class="btn btn-success btn-xs"><i class="fa fa-check" style="color:white"> Activo</i></button>   
                    </td>
                    @else
                    <td>   
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-close" style="color:white"> Inactivo</i></button>
                    </td>
                    @endif
                  <td>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#155BFE" href="{{url('detalhesfuncionarioid/'.$funcionario->idfuncionario)}}" role="button"><i class="fa  fa-eye" style="color:#155BFE"></i></a>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#ffc107" href="{{url('listarfuncionarioid/'.$funcionario->idfuncionario)}}" role="button"><i class="fa fa-pencil-square-o" style="color:#ffc107"></i></a>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#eb7134" href="{{url('listarprecosid/'.$funcionario->idfuncionario)}}" role="button"><i class="fa  fa-eur" style="color:#eb7134"></i></a>
                    <a  class="btn btn-info deletebtnfuncionario" style="background-color:transparent;border-color:#dc3545"  role="button" data-id="{{$funcionario->idfuncionario}}" ><i class="fa fa-trash-o" style="color:#dc3545"></i></a>
                    
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