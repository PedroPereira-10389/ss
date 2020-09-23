@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


<div class="right_col" role="main">
    <div class="row" style="display: inline-block;" >
        <div class="tile_count">
          <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-eur"></i>Total Despesa</span>
          <div class="count">{{$despesastotalmes1}}</div>
          <span class="count_bottom"><i class="green">{{$total1}}€ </i> From last Week</span>
          </div>
          <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-eur"></i>Total Mês</span>
          <div class="count">{{$despesastotalmes}}</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$total2}}€ </i> From last Week</span>
          </div>
          <div class="col-md-3 col-sm-3  tile_stats_count">
            <span class="count_top"><i class="fa fa-eur"></i>Média Despesa</span>
          <div class="count green">{{$despesasmediatotalmes}}</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{$total3}}€ </i> From last Week</span>
          </div>
        </div>
      </div>
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Lista de Despesas</h3>
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
        @if(session()->has('messagedespesa'))
        <div class="alert alert-success">
        {!! session('messagedespesa') !!}
        </div>
        @endif
        @if(session()->has('despesaalterada'))
        <div class="alert alert-success">
        {!! session('despesaalterada') !!}
        </div>
        @endif
        @if(session()->has('eliminardespesa'))
        <div class="alert alert-success">
        {!! session('eliminardespesa') !!}
        </div>
        @endif
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Despesas</h2>
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
                    <th>Descrição</th>
                    <th>Forma Pagamento</th>
                    <th>Data Movimento</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($despesas as $despesa)                       
                  <tr>
                    <td>{{$despesa->iddespesa}}</td>
                    <td>{{$despesa->descricao}}</td>
                    <td>{{$despesa->formapagamento}}</td>
                    <td>{{$despesa->datadespesa}}</td>   
                    @if($despesa->estado == 0)
                    <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-exclamation" style="color:white"> Pendente</i></button></td>
                    @endif
                    @if($despesa->estado == 1)
                    <td><button type="button" class="btn btn-success btn-xs"><i class="fa fa-check" style="color:white"> Pago</i></button></td>
                    @endif
                                  
                  <td>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#155BFE" href="{{url('listardespesasdetaalhe/'.$despesa->iddespesa)}}" role="button"><i class="fa  fa-list-ul" style="color:#155BFE"></i></a>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#ffc107" href="{{url('listardespesaid/'.$despesa->iddespesa)}}" role="button"><i class="fa fa-pencil-square-o" style="color:#ffc107"></i></a>
                    <a  class="btn btn-info deletedespesa" style="background-color:transparent;border-color:#dc3545"  role="button" data-id="{{ $despesa->iddespesa}}" ><i class="fa fa-trash-o" style="color:#dc3545"></i></a>
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