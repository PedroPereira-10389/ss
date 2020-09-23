<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Menu</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('dashboard1')}}">Dashboard</a></li>
            <li><a href="index2.html">Dashboard2</a></li>
            <li><a href="index3.html">Dashboard3</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-table"></i> Clientes <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('listarclientes')}}">Gerir Clientes</a></li>
          <li><a href="{{route('adicionarcliente')}}">Adicionar Cliente</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-calendar"></i> Reuniões <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('listarreunioes')}}">Gerir Reunião</a></li>
          <li><a href="{{route('adicionarreuniao')}}">Adicionar Reunião</a></li>
          </ul>
        </li>
        <li><a><i class="fa  fa-users"></i> Funcionários <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('listarfuncionarios')}}">Gerir Funcionários</a></li>
          <li><a href="{{route('adicionarfuncionario')}}">Adicionar Funcionário</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-truck"></i> Encomendas <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('listarencomendas')}}">Gerir Encomendas</a></li>
          <li><a>Artigos<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="sub_menu"><a href="{{route('listarartigos')}}">Gerir Artigos</a>
              </li>
              <li><a href="{{route('adicionarproduto')}}">Adicionar Artigo</a>
              </li>
            </ul>
          </li>
          </ul>
        </li>
        <li><a><i class="fa   fa-eur"></i> Despesas <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
          <li><a href="{{route('listardespesas')}}">Gerir Despesa</a></li>
          <li><a href="{{route('adicionardespesa')}}">Adicionar Despesa</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

