@include('layouts.header')
@include('layouts.infouser')
@include('layouts.menufooterbuttons')
@include('layouts.menutopnavigation')


<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Lista de Artigos</h3>
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
        @if(session()->has('messageadicionarproduto'))
        <div class="alert alert-success">
        {!! session('messageadicionarproduto') !!}
        </div>
        @endif
        @if(session()->has('messageadicionarprodutoerro'))
        <div class="alert alert-danger">
        {!! session('messageadicionarprodutoerro') !!}
        </div>
        @endif
        @if(session()->has('produtosalterados'))
        <div class="alert alert-success">
        {!! session('produtosalterados') !!}
        </div>
        @endif
        @if(session()->has('produtosalteradoserro'))
        <div class="alert alert-danger">
        {!! session('produtosalteradoserro') !!}
        </div>
        @endif
        @if(session()->has('eliminarproduto'))
        <div class="alert alert-success">
        {!! session('eliminarproduto') !!}
        </div>
        @endif
        @if(session()->has('eliminarprodutoerro'))
        <div class="alert alert-danger">
        {!! session('eliminarprodutoerro') !!}
        </div>
        @endif
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Produtos</h2>
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
                    <th>Referência</th>
                    <th>Descrição</th>
                    <th>Preço Venda</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)                       
                  <tr>
                    <td>{{$produto->idproduto}}</td>
                    <td>{{$produto->referencia}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->precovenda}} €</td>
                  <td>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#155BFE" href="{{url('listarprodutosid/'.$produto->idproduto)}}" role="button"><i class="fa  fa-list-ul" style="color:#155BFE"></i></a>
                    <a  class="btn btn-info" style="background-color:transparent;border-color:#ffc107" href="{{url('verprodutosid/'.$produto->idproduto)}}" role="button"><i class="fa fa-pencil-square-o" style="color:#ffc107"></i></a>
                    <a  class="btn btn-info deletebtnprodutos" style="background-color:transparent;border-color:#dc3545"  role="button" data-id="{{$produto->idproduto}}" ><i class="fa fa-trash-o" style="color:#dc3545"></i></a>
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