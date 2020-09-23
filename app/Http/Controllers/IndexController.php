<?php

namespace App\Http\Controllers;
use Crypt;
use Illuminate\Http\Request;
use App\User;
use App\Competencias;
use App\Clientes;
use App\ClientesProfissoes;
use App\UtilizadoresCompetencias;
use App\Habilitacoes;
use App\UtilizadorHabilitacao;
use App\Reunioes;
use App\OutrosClientes;
use App\OutroClientesProfissao;
use App\Profissoes;
use App\UtilizadoresProfissoes;
use App\Funcionarios;
use App\Departamentos;
use App\FuncionarioDepartamento;
use App\FuncionariosHorarios;
use App\Encomendas;
use App\EncomendasProdutos;
use App\Produtos;
use App\Despesas;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Validator;
use View;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use DateTime;

class IndexController extends Controller

{
   




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     
    public function index()
    {
        return view('index'); 
    }



    public function home()
    
    {
        
        return view('dashboard1'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this ->validate($request,[
            'name' => 'required|string',
            'usernameregister' => 'required|string',
            'email' => 'required|string',
            'passwordregister' => 'required|max:15',
            'passwordconfirm' => 'required|max:15',
            'datanascimento' => 'required|date',
            'pais' => 'required|string',
            'terms' =>'accepted'

        ]);




       if($file = $request->file('photo')!="")
        {
            $file = $request->file('photo');
            $ext=$file->extension();

        }else{

            $ext= '.jpg';

        }
        $now = Carbon::now();
        $utilizadores = new User();
        $utilizadores->nome=$request->input('name');
        $utilizadores->nomeutilizador=$request->input('usernameregister');
        $utilizadores->email = $request->input('email');
        $utilizadores->password = Hash::make($request->input('passwordregister')); 
        $utilizadores->datanascimento = $request->input('datanascimento'); 
        $utilizadores->pais = $request->input('pais');
        $utilizadores->tipo = 1; 
        $utilizadores->created_at=$now;
        $termo = $request->input('terms');
      
       
 if($termo)
        {

        if (Hash::check($request->input('passwordregister'), $utilizadores->password))
        {
                       

         if($file = $request->file('photo') == "")
            {
            $utilizadores->foto = 'DefaultImage'. $ext;
            $request->session()->flash('message', 'Utilizador criado!');
            $utilizadores->save();
            return redirect('/');
            }

            if($file = $request->file('photo') != "")
            {
            $file= trim('Imagem'.$utilizadores->nomeutilizador.'.'.$ext);
            $utilizadores->foto = $file;
            $path = base_path()."/public/storage/"; 
            $image = $request->file('photo'); 
            $image = Image::make($image->path());
            $image->resize(220, 220, function ($constraint) {
            $constraint->aspectRatio();
            })->save($path.'/'.$file);

            $request->session()->flash('message', 'Utilizador criado!');
            $utilizadores->save();
            return redirect('/');
    
         
        }
        
        }else{

            $request->session()->flash('messagerror', 'Verifique novamente!');

        }

    }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        



    }



    public function login(Request $request)
    {
       $this ->validate($request,[

            'username' => 'required|string',
            'password' => 'required|max:15'
        ]);
       

    $user_data = array(

            'nomeutilizador' => trim($request -> get('username')),
            'password' => trim($request -> get('password')),
            
            );
            


 $user = User::where('nomeutilizador',$user_data['nomeutilizador'])-> first();

 


if(!empty($user)) {

if(!Hash::check($user_data['password'], $user->password))
 {  
  
     return redirect()->back()->withInput()->withErrors('Utilizador ou Password incorretos');
    

 }else{


    if(Auth::attempt($user_data))
    {
   
      Session::put('nome', $user->nome);
      Session::put('email', $user->email);
      Session::put('idutilizador', $user->idutilizador);
      Session::put('foto', $user->foto);
   


   

      return redirect()->route('dashboard1');

    }
   

 }


}else{

    return redirect()->back()->withInput()->withErrors('Utilizador ou Password incorretos');
    
}
 

 
}



public function logout(Request $request) {
    Auth::logout();
    return redirect('/');
  }


public function perfil(Request $request)
{
    $value = Session::get('idutilizador');
    
    $user = DB::table('utilizadores')
    ->leftjoin('utilizadorescompetencias', 'utilizadorescompetencias.idutilizador', '=', 'utilizadores.idutilizador')
    ->leftjoin('competencias', 'competencias.idcompetencia', '=', 'utilizadorescompetencias.idcompetencia')
    ->leftjoin('utilizadoreshabilitacoes', 'utilizadoreshabilitacoes.idutilizador', '=', 'utilizadores.idutilizador')
    ->leftjoin('habilitacoes', 'habilitacoes.idhabilitacao', '=', 'utilizadoreshabilitacoes.idhabilitacao')
    ->leftjoin('utilizadorprofissoes', 'utilizadorprofissoes.idutilizador', '=', 'utilizadores.idutilizador')
    ->leftjoin('profissoes', 'utilizadorprofissoes.idprofissao', '=', 'profissoes.idprofissao')
    ->select('utilizadores.password as password','utilizadores.nome as nomeproprio', 'utilizadores.email as email','utilizadores.datanascimento as datanascimento','utilizadores.pais as pais','competencias.nomecompetencia as competencia','utilizadorescompetencias.idcompetencia as idcompetencia','utilizadores.datanascimento as datanascimento','utilizadores.foto as foto','habilitacoes.nomehabilitacao as habilitacoes', 'habilitacoes.grau as grau','profissoes.nomeprofissao as nomeprofissao')
    ->where('utilizadores.idutilizador',$value)-> first();

    $habilitacoes = Habilitacoes::all();


    $habilitacoesid = DB::table('utilizadores')
    ->leftjoin('utilizadoreshabilitacoes', 'utilizadoreshabilitacoes.idutilizador', '=', 'utilizadores.idutilizador')
    ->leftjoin('habilitacoes', 'habilitacoes.idhabilitacao', '=', 'utilizadoreshabilitacoes.idhabilitacao')
    ->select('habilitacoes.nomehabilitacao as habilitacoes', 'habilitacoes.grau as grau','utilizadoreshabilitacoes.comprovativo as comprovativo')
    ->where('utilizadores.idutilizador',$value)
    ->orderBy('habilitacoes.grau', 'DESC')
    -> get();

    $competencias = Competencias::all();


    $competenciasid = DB::table('utilizadores')
    ->leftjoin('utilizadorescompetencias', 'utilizadorescompetencias.idutilizador', '=', 'utilizadores.idutilizador')
    ->leftjoin('competencias', 'competencias.idcompetencia', '=', 'utilizadorescompetencias.idcompetencia')
    ->select('competencias.nomecompetencia as competencia', 'competencias.tipo as tipo','utilizadorescompetencias.nivel as nivel','utilizadorescompetencias.comprovativo as comprovativo')
    ->where('utilizadores.idutilizador',$value)
    -> get();




    return view("profile",compact('user','habilitacoes','habilitacoesid','competencias','competenciasid'));

}




public function resetpassword(Request $request)
{
    $this ->validate($request,[

        'email' => 'required|email',
        
    ]);
   
$user_data = array(

'email' => $request -> get('email'),

);


$user = User::where('email',$user_data['email'])-> first();


if(count($user)>0)
{
    $userupdate = User::where('idutilizador', $user['idutilizador'])
       ->update([
           'password' => Hash::make('resetpassword')
        ]);


       return view('newpassword', ['user'=> $user]); 

}

    
}




public function resetpasswordsteep(Request $request)
{
    $this ->validate($request,[

        'password' => 'required|max:15',
        
    ]);
   
$user_data = array(

'password' => $request -> get('password'),
'passwordconfirm' => $request -> get('passwordconfirm'),
'email' => $request -> get('email')
);


if($user_data['password'] == $user_data['passwordconfirm'])
{
        
    User::where('email', $user_data['email'])
    ->update([
        'password' => Hash::make($user_data['passwordconfirm'])
     ]);

     $request->session()->flash('messagereset', 'Password alterada!');

     return view('index');


}


    
}



public function alteraprofile(Request $request)
{
  

$idutilizador=  Session::get('idutilizador');
   
$user_data = array(
'nome' => $request -> get('nome'),
'pais' => $request -> get('pais'),
'datanascimento' => $request -> get('datanascimento'),
'checkboxconfirm' => $request -> get('checkboxconfirm'),
);




if($user_data['checkboxconfirm']== true)
{
   $affected= User::where('idutilizador', $idutilizador)
    ->update([
        'nome' => $user_data['nome'],
        'pais' => $user_data['pais'],
        'datanascimento' => $user_data['datanascimento'],

     ]);


    if($affected>0)
    {
        $request->session()->flash('alteraprofile', 'Informações alteradas!');
        return back();
    }


}else{
    return "erro";
}

}



public function alteraperfildados(Request $request)
{
  

$idutilizador=  Session::get('idutilizador');
   
$user_data = array(
'idprofissao' => $request -> get('idprofissao'),
'pais' => $request -> get('pais'),
'datanascimento' => $request -> get('datanascimento'),
);


  $affected= User::where('idutilizador', $idutilizador)
    ->update([
        'pais' => $user_data['pais'],
        'datanascimento' => $user_data['datanascimento'],
     ]);


    if($affected>0)
    {

        $affected2= UtilizadoresProfissoes::where('idutilizador', $idutilizador)
        ->update([
            'idprofissao' => $user_data['idprofissao'],
         ]);

         if($affected2>0)
         {

            $request->session()->flash('alteraperfildados', 'Informações alteradas!');
            return redirect()->route('perfiluser', $idutilizador);
            
         }

         $request->session()->flash('alteraperfildados', 'Informações alteradas!');
         return redirect()->route('perfiluser', $idutilizador);

       
    }else{

        $request->session()->flash('alteraperfildadoserro', 'Verifique novamente!');
        return redirect()->route('perfiluser', $idutilizador);
    }


}


public function editarutilizadorform(Request $request)
{
  
   $idutilizador = Session::get('idutilizador');


   $user = UtilizadoresProfissoes::join('utilizadores', 'utilizadorprofissoes.idutilizador', '=', 'utilizadores.idutilizador')
   ->join('profissoes', 'utilizadorprofissoes.idprofissao', '=', 'profissoes.idprofissao')
   ->where('utilizadorprofissoes.idutilizador',$idutilizador)
   ->select('utilizadorprofissoes.idprofissao as idprofissao','utilizadores.foto as foto','utilizadores.datanascimento as datanascimento as datanascimento','utilizadores.pais as pais','profissoes.nomeprofissao as nomeprofissao')
   ->first();




   $profissoes = Profissoes::all();


  return view("editarperfil",compact('idutilizador','user','profissoes'));



}

public function alteraprofilepassword(Request $request)
{
  

  $idutilizador=  Session::get('idutilizador');

$user_data = array(
'oldpassword' => $request -> get('oldpassword'),
'newpassword' => $request -> get('newpassword'),
'newpasswordconfirm' => $request -> get('newpasswordconfirm'),
);

if($user_data['newpassword'] == $user_data['newpasswordconfirm'] )
{

  
    $affected= User::where('idutilizador', $idutilizador)
    ->update([
        'password' =>Hash::make($user_data['newpassword']),
     ]);

   

     if($affected>0)
     {
         $request->session()->flash('alteraprofilepassword', 'Password alterada!');
         return back();
     }
 
}else{
    $request->session()->flash('alteraprofilepassworderro', 'Erro na Alteracao!');
    return back();
}


}




public function adicionahabilitacao(Request $request)
{
  

$idutilizador=  Session::get('idutilizador');

$user_data = array( 
'idhabilitacao' => $request -> get('selecthabilitacao'),
'idutilizador' => $idutilizador,

);


$file = $request->file('photo');

$ext=$file->extension();


if($file->getClientOriginalName() != "")
{
    
   $file= trim('Certificado'.$user_data['idhabilitacao'].'Utilizador'.$user_data['idutilizador'].'.'.$ext);
    
    $path = base_path()."/public/storage/"; 
         $image = $request->file('photo'); 
         $image->move($path,$file); 
        
$user_data2 = array( 
        'idhabilitacao' => $request -> get('selecthabilitacao'),
        'idutilizador' => $idutilizador,
        'comprovativo' => $file
        );

$affectrows= UtilizadorHabilitacao::insert($user_data2);

if($affectrows>0)
{
    $request->session()->flash('alteraprofilehabilitacoes', 'Informações alteradas!');
    return back();
}

}

}


public function adicionacompetencia(Request $request)
{
    $this ->validate($request,[

        'photo' => 'dimensions:min_width=250,min_height=500',
        
    ]);

$idutilizador=  Session::get('idutilizador');

$user_data = array( 
'idcompetencia' => $request -> get('selectcompetencia'),
'idutilizador' => $idutilizador,
'nivel'=> $request -> get('nivelcompetencia'),
'idcriador'=> $idutilizador
);

$file = $request->file('photo');

$ext=$file->extension();





if($file->getClientOriginalName() != "")
{
   
   $file= trim('Certificado'.$user_data['idcompetencia'].'Nivel'.$user_data['nivel'].'.'.$ext);
    
    $path = base_path()."/public/storage/"; 
         $image = $request->file('photo'); 
         $image->move($path,$file); 

$user_data2 = array( 
        'idcompetencia' => $request -> get('selectcompetencia'),
        'idutilizador' => $idutilizador,
        'nivel'=> $request -> get('nivelcompetencia'),
        'comprovativo' => $file,
        'idcriador'=> $idutilizador
        );

$affectrows= UtilizadoresCompetencias::insert($user_data2);

if($affectrows>0)
{
    $request->session()->flash('alteraprofilecompetencias', 'Informações alteradas!');
    return back();
}

}


}





public function listarclientes(Request $request)
{
    $month =   Carbon::now()->subDays(30)->toDateString();
    $monthbefore =   Carbon::now()->subDays(30)->firstOfMonth()->toDateString();
    
    $monthatual =   Carbon::now()->toDateString();
    $firstdayofmonth = Carbon::now()->firstOfMonth()->toDateString();  

    $clientes = Clientes::all();

    $totalclientes =  Clientes::count();

    $novosclientesmesatual =  Clientes::where('dataentrada','>=',$firstdayofmonth)
                                ->where('dataentrada','<=',$monthatual)->count();


    $novosclientesmesanterior =  Clientes::where('dataentrada','>=',$monthbefore)
                                ->where('dataentrada','<=',$month)->count();
    
    $diferenca1 =  $novosclientesmesatual - $novosclientesmesanterior;
    








    return view("gerirclientes",compact('clientes','totalclientes'));



}



public function listarclientesid($id)
{
    $clientes = Clientes::where('idcliente',$id)-> first();

    return view("editarcliente",compact('clientes'));
}





public function editarcliente(Request $request)
{

    $user_data = array(
    'idcliente' => $request -> get('idcliente'),    
    'email' => $request -> get('email'),
    'contacto' => $request -> get('contacto'),
    'morada' => $request -> get('morada'),
    'pais' => $request -> get('pais'),
    'cidade' => $request -> get('cidade'),
    );


        
      $affected= Clientes::where('idcliente', $user_data['idcliente'])
        ->update([
            'email' =>$user_data['email'],
            'contacto' =>$user_data['contacto'],
            'morada' =>$user_data['morada'],
            'pais' =>$user_data['pais'],
            'cidade' =>$user_data['cidade'],
         ]);
   
         if($affected>0)
         {
             $request->session()->flash('alteracliente', 'Informações Alteradas!');
             return redirect()->guest('listarclientes'); ;
         }
     
        else{
        $request->session()->flash('alteraclienteerro', 'Erro na Alteracao!');
        return back();
    }  
    

}



public function eliminarclienteid(Request $request)
{
    
    

    $id = $request->get('id');

    $affected= Clientes::where('idcliente',$id)->delete($id);


    if($affected>0)
    {
        $request->session()->flash('eliminacliente', 'Informações Eliminadas!');
        return response()->json(['url'=>url('listarclientes')]);
    }

   else{
   $request->session()->flash('eliminaclienteerro', 'Erro ao Eliminar!');
   return back();
}  

    
  
}


public function detalhesclienteid($id)
{


    
   $clientes = Clientes::leftjoin('clientesprofissoes', 'clientes.idcliente', '=', 'clientesprofissoes.idcliente')
    ->leftjoin('profissoes', 'profissoes.idprofissao', '=', 'clientesprofissoes.idprofissao')
    ->where('clientes.idcliente',$id)
    ->select('clientes.idcliente as idcliente','clientes.nif as nif','clientes.nome as nome','clientes.cidade as cidade','clientes.morada as morada','clientes.pais as pais','clientes.contacto as telefone','clientes.telemovel as telemovel','clientes.email as email','clientes.foto as foto','profissoes.nomeprofissao as cargo','clientes.vendedor as representante')
    -> first();


    $outrosclientes = OutrosClientes::join('outrosclientesprofissoes', 'outrosclientes.idoutros', '=', 'outrosclientesprofissoes.idoutros')
    ->join('profissoes', 'profissoes.idprofissao', '=', 'outrosclientesprofissoes.idprofissao')
    ->join('clientes', 'clientes.idcliente', '=', 'outrosclientes.idcliente')
    ->where('outrosclientes.idcliente',$id)
    ->select('clientes.idcliente as idcliente','outrosclientes.nome as nome','outrosclientes.email as email','outrosclientes.contacto as contacto','outrosclientes.telemovel as telemovel', 'profissoes.nomeprofissao as cargo')
    ->get();




    $profissoes = Profissoes::all();

    
    
    return view("detalhescliente",compact('clientes','outrosclientes','profissoes'));

  
}



public function adicionarcliente()
{
    $profissoes = Profissoes::all();    
    return view("adicionarcliente",compact('profissoes'));
}


public function storecliente(Request $request)
    {

      $this ->validate($request,[
            'nome' => 'required|string',
            'email' => 'required|string',
            'nif' => 'required|string',
            'contacto' => 'required|string',
            'morada' => 'required|string',
            'pais' => 'required|string',
            'cidade' => 'required|string',
        ]);


        if($file = $request->file('photo')!="")
        {
            $file = $request->file('photo');
            $ext=$file->extension();

        }else{


            $ext= '.jpg';

        }

    


       $now = Carbon::now()->toDateString();
       
        $clientes = new Clientes();
        $clientes->nome=$request->input('nome');
        $clientes->nif = $request->input('nif');
        $clientes->email = $request->input('email');
        $clientes->contacto =  str_replace('-', '', $request->input('contacto')); 
        $clientes->telemovel =  str_replace('-', '', $request->input('telemovel')); 
        $clientes->morada = $request->input('morada');
        $clientes->pais = $request->input('pais');
        $clientes->cidade = $request->input('cidade');
        $clientes->dataentrada = $now;
        $clientes->vendedor = Session::get('nome'); 
        $clientes->estado = 0 ;

    
      
       if ($clientes->nome != "")
        {
           
          
             if($file = $request->file('photo') == "")
            {

       
         $clientes->foto = 'DefaultImage'. $ext;
         $clientes->save();
         
         $clientesprofissoes = new ClientesProfissoes();
         $clientesprofissoes->idprofissao=$request->input('idprofissao');
         $clientesprofissoes->idcliente=$clientes->id;
         $clientesprofissoes->save();     
         
         $request->session()->flash('messagecliente', 'Cliente criado!');
         return redirect('listarclientes');
        }

        
        if($file = $request->file('photo') != "")
            $file= trim('Imagem'.$clientes->nif.'.'.$ext);
            $clientes->foto = $file;
            $path = base_path()."/public/storage/"; 
            $image = $request->file('photo'); 
            $image = Image::make($image->path());
            $image->resize(220, 220, function ($constraint) {
            $constraint->aspectRatio();
            })->save($path.'/'.$file);
            $clientes->save();
            
            $clientesprofissoes = new ClientesProfissoes();
            $clientesprofissoes->idprofissao=$request->input('idprofissao');
            $clientesprofissoes->idcliente=$clientes->id;
            $clientesprofissoes->save();     
            
            $request->session()->flash('messagecliente', 'Cliente criado!');
            return redirect('listarclientes');
        }
    
    }
 
    
    public function listarreunioes(Request $request)
    {
      
     
        $reunioes = DB::table('reunioes')
        ->join('utilizadores', 'reunioes.idutilizador', '=', 'utilizadores.idutilizador')
        ->join('clientes', 'clientes.idcliente', '=', 'reunioes.idcliente')
        ->select('utilizadores.nome as nomeutilizador','clientes.idcliente' ,'clientes.nome as nomecliente', 'reunioes.datainicio as datainicio', 'reunioes.nome as objetivo', 'reunioes.idreuniao as idreuniao')
        ->get();


        return view("gerirreunioes",compact('reunioes'));
    
    
    }



    public function detalhesreuniaoid($id,$idcliente)
{
    

    $reunioesid = DB::table('reunioes')
    ->join('utilizadores', 'reunioes.idutilizador', '=', 'utilizadores.idutilizador')
    ->join('clientes', 'clientes.idcliente', '=', 'reunioes.idcliente')
    ->where('idreuniao',$id)
    ->select('clientes.foto as foto','utilizadores.nome as nomeutilizador', 'clientes.nome as nomecliente','clientes.pais as pais', 'reunioes.datainicio as datainicio','reunioes.datafim as datafim ','reunioes.horainicio as horainicio','reunioes.horafim as horafim', 'reunioes.nome as objetivo', 'reunioes.idreuniao as idreuniao','reunioes.sala as sala','reunioes.descricao as descricao')
    ->first();


      
    $reunioesidtodas = DB::table('reunioes')
    ->join('utilizadores', 'reunioes.idutilizador', '=', 'utilizadores.idutilizador')
    ->join('clientes', 'clientes.idcliente', '=', 'reunioes.idcliente')
    ->where('reunioes.idcliente',$idcliente)
    ->select('utilizadores.nome as nomeutilizador', 'clientes.nome as nomecliente','clientes.pais as pais', 'reunioes.datainicio as datainicio','reunioes.datafim as datafim ','reunioes.horainicio as horainicio','reunioes.horafim as horafim', 'reunioes.nome as objetivo', 'reunioes.idreuniao as idreuniao','reunioes.sala as sala','reunioes.descricao as descricao')
    ->get();


   


 
    return view("verreuniao",compact('reunioesid','reunioesidtodas'));

  
}




public function editarreuniao($id)
    {
        $reunioesid = DB::table('reunioes')
        ->join('utilizadores', 'reunioes.idutilizador', '=', 'utilizadores.idutilizador')
        ->join('clientes', 'clientes.idcliente', '=', 'reunioes.idcliente')
        ->where('idreuniao',$id)
        ->select('utilizadores.nome as nomeutilizador','clientes.idcliente as idcliente' ,'clientes.nome as nomecliente','clientes.pais as pais', 'reunioes.datainicio as datainicio','reunioes.datafim as datafim','reunioes.horainicio as horainicio','reunioes.horafim as horafim', 'reunioes.nome as objetivo', 'reunioes.idreuniao as idreuniao','reunioes.sala as sala')
        ->first();

        $clientes = Clientes::all();

    
    
        return view("editarreuniao",compact('reunioesid','clientes'));
    }


    public function editarreuniaoid(Request $request)
{

    $user_data = array(
    'idreuniao' => $request -> get('idreuniao'),
    'idutilizador' => Session::get('idutilizador'),
    'idcliente' => $request -> get('idcliente'),
    'nome' => $request -> get('nome'),
    'datainicio' => $request -> get('datainicio'),
    'datafim' => $request -> get('datafim'),
    'horainicio' => $request -> get('horainicio'),
    'horafim' => $request -> get('horafim'),
    'sala' => $request -> get('sala'),
    );

    


        
      $affected= Reunioes::where('idreuniao', $user_data['idreuniao'])
        ->update([
            'idutilizador' =>$user_data['idutilizador'],
            'idcliente' =>$user_data['idcliente'],
            'nome' =>$user_data['nome'],
            'datainicio' =>$user_data['datainicio'],
            'datafim' =>$user_data['datafim'],
            'horainicio' =>$user_data['horainicio'],
            'horafim' =>$user_data['horafim'],
            'sala' =>$user_data['sala'],
         ]);
   
         if($affected>0)
         {
             $request->session()->flash('alterareuniao', 'Informações Alteradas!');
             return redirect()->guest('listarreunioes'); 
         }
     
        else{
        $request->session()->flash('alterareuniaoerro', 'Erro na Alteracao!');
        return back();
    } 
    

}


public function eliminarreuniaoid(Request $request)
{
    
    

    $id = $request->get('id');

   

    $affected= Reunioes::where('idreuniao',$id)->delete($id);


    if($affected>0)
    {
        $request->session()->flash('eliminarreuniao', 'Informações Eliminadas!');
        return response()->json(['url'=>url('listarreunioes')]);
    }

   else{
   $request->session()->flash('eliminarreuniaoerro', 'Erro ao Eliminar!');
   return back();
} 

}


public function adicionarreuniao(Request $request)
{
    
    $clientes= Clientes::all();
    return view("adicionarreuniao",compact('clientes'));

}

public function adicionardescricaoreuniao($id,Request $request)
{

    $this ->validate($request,[
        'descricao' => 'required|string',
    ]);


    $user_data = array(
        'descricao' => $request -> get('descricao'),
    );
    
    
    $affected= Reunioes::where('idreuniao', $id)
    ->update([
        'descricao' =>$user_data['descricao'],
     ]);

     if($affected>0)
     {
         $request->session()->flash('alterareuniaodescricao', 'Informações Alteradas!');
         return redirect()->guest('listarreunioes'); 
     }
 
    else{
    $request->session()->flash('alterareuniaodescricaoerro', 'Erro na Alteracao!');
    return back();
} 


}



public function storereuniao(Request $request)
{
    
    $this ->validate($request,[
        'nome' => 'required|string',
        'datainicio' => 'required|date',
        'datafim' => 'required|date',
        'horainicio' => 'required|date_format:H:i',
        'horafim' => 'required|date_format:H:i',
        'sala' => 'required|string',
    ]);

    
    
    
    $idcliente=$request->input('idcliente');


    $reunioes = new Reunioes();
    $reunioes->idcliente=$request->input('idcliente');
    $reunioes->idutilizador=Session::get('idutilizador') ;
    $reunioes->nome=$request->input('nome');
    $reunioes->datainicio=$request->input('datainicio');
    $reunioes->datafim = $request->input('datafim');
    $reunioes->horainicio = $request->input('horainicio'); 
    $reunioes->horafim = $request->input('horafim'); 
    $reunioes->sala = $request->input('sala');
    $reunioes->descricao = '';
  
   
if($idcliente!= "")
    {
      
        $request->session()->flash('messageadicionareunioes', 'Reunião introduzida!');
        $reunioes->save();
        return redirect()->guest('listarreunioes'); 

    }else{

        $request->session()->flash('messageadicionareunioeserro', 'Verifique novamente!');

    }


}




public function adicionaroutrocontatos($id,Request $request)
{
    
    $this ->validate($request,[
        'nome' => 'required|string',
        'email' => 'required|string',
        'contacto' => 'required|string',
        'telemovel' => 'required|string',
        'idprofissao' => 'required|string',
    ]);

    
    $idcliente= $id;

    $oclientes = new OutrosClientes();
    $oclientes->idcliente= $id;
    $oclientes->nome=$request->input('nome');
    $oclientes->email=$request->input('email');
    $oclientes->contacto=str_replace('-', '', $request->input('contacto')); 
    $oclientes->telemovel=str_replace('-', '', $request->input('telemovel')); 
   
if($idcliente!= "")
    {
        $request->session()->flash('messageadicionarcontatos', 'Outro contacto introduzido!');
        $oclientes->save();

        $oclientesprofissoes = new OutroClientesProfissao();
        $oclientesprofissoes->idprofissao=$request->input('idprofissao');
        $oclientesprofissoes->idoutros=$oclientes->id;
        $oclientesprofissoes->save();
        return redirect()->guest('listarclientes'); 

    }else{

        $request->session()->flash('messageadicionarcontatoserro', 'Verifique novamente!');

    }


}


public function listarfuncionarios(Request $request)
{
  
    $funcionarios = DB::table('funcionariosdepartamentos')
        ->join('funcionarios', 'funcionarios.idfuncionario', '=', 'funcionariosdepartamentos.idfuncionario')
        ->join('departamentos', 'funcionariosdepartamentos.iddepartamento', '=', 'departamentos.iddepartamento')
        ->select('funcionarios.estado as estado' ,'funcionarios.idfuncionario as idfuncionario','funcionarios.nome as nomefuncionario','departamentos.nomedepartamento as departamento' ,'funcionarios.email as email','funcionarios.dataempregoinicio as dataentrada')
        ->orderBy('funcionarios.quantidade', 'desc')
        ->get();
        
     $month =   Carbon::now()->subDays(30)->toDateString();
     $monthbefore =   Carbon::now()->subDays(30)->firstOfMonth()->toDateString();
     
     $monthatual =   Carbon::now()->toDateString();
     $firstdayofmonth = Carbon::now()->firstOfMonth()->toDateString();  

     $funcionariosmesanterior= Funcionarios:: where('dataempregoinicio',$month)->count();
     $funcionarioscount= $funcionarios->count();
     $funcionariosmesatual= Funcionarios:: where('dataempregoinicio',$monthatual)->count();
     $variacao = (($funcionariosmesatual-$funcionariosmesanterior)/$funcionarioscount)*100;

     $funcionariosprecototal= Funcionarios::sum('ultimopreco');
     $funcionariosprecototalatual= Funcionarios::where('dataempregoinicio',$monthatual)->sum('ultimopreco');
     $funcionariosprecototalanterior= Funcionarios::where('dataempregoinicio',$month)->sum('ultimopreco');
     $variacao2= (($funcionariosprecototalatual-$funcionariosprecototalanterior)/$funcionariosprecototal)*100;

   


     $funcionariosmediaprecoacordadoatual= Funcionarios::where('dataempregoinicio',$monthatual)->avg('precoacordado');
     $funcionariosprecototalanterioranterior= Funcionarios::where('dataempregoinicio',$month)->avg('precoacordado');
     $funcionariosmediaprecoacordado = Funcionarios:: avg('precoacordado');
     $variacao3= (($funcionariosmediaprecoacordadoatual-$funcionariosprecototalanterioranterior)/$funcionariosmediaprecoacordado)*100;




     $funcionariosmediaprecoacordadoatual= Funcionarios::where('dataempregoinicio',$monthatual)->avg('precoacordado');
     $funcionariosprecototalanterioranterior= Funcionarios::where('dataempregoinicio',$month)->avg('precoacordado');
     $funcionariosmediaprecoacordado = Funcionarios:: avg('precoacordado');
     $variacao4= (($funcionariosmediaprecoacordadoatual-$funcionariosprecototalanterioranterior)/$funcionariosmediaprecoacordado)*100;



     $funcionariototalhoras= FuncionariosHorarios::where('datainicio','>=',$firstdayofmonth)
     ->where('datainicio','<=',$monthatual)
     ->sum(DB::raw('TIMESTAMPDIFF(HOUR, horainicio, horafim)'));
     $totalfuncionarios = Funcionarios:: count();
     $media= $funcionariototalhoras/$totalfuncionarios;


     $funcionariototalhorasmesanterior= FuncionariosHorarios::where('datainicio','>=',$monthbefore)
     ->where('datainicio','<=',$month)
     ->sum(DB::raw('TIMESTAMPDIFF(HOUR, horainicio, horafim)'));

     $variacao6 = $funcionariototalhorasmesanterior-$funcionariototalhoras;

    
    return view("gerirfuncionarios",compact('funcionarios','funcionarioscount','variacao','funcionariosprecototal','funcionariosmediaprecoacordado','variacao2','variacao3','funcionariototalhoras','media','variacao6'));



}


public function detalhesfuncionarioid($id)
{

    
    $funcionariosid = DB::table('funcionariosdepartamentos')
        ->join('funcionarios', 'funcionarios.idfuncionario', '=', 'funcionariosdepartamentos.idfuncionario')
        ->join('departamentos', 'funcionariosdepartamentos.iddepartamento', '=', 'departamentos.iddepartamento')
        ->where('funcionariosdepartamentos.idfuncionario',$id)
        ->select('funcionarios.contacto as contacto','funcionarios.idfuncionario as idfuncionario','funcionarios.nome as nomefuncionario','departamentos.nomedepartamento as departamento' ,'funcionarios.email as email','funcionarios.dataempregoinicio as dataentrada','funcionarios.dataempregofim as datasaida','funcionarios.primeiropreco as precoinicio','funcionarios.ultimopreco as precofim','funcionarios.quantidade as quantidade','funcionarios.idade as idade','funcionarios.foto as foto','funcionarios.pais as pais','funcionarios.cidade as cidade','funcionarios.morada as morada')
        ->first();





        return view("detalhesfuncionario",compact('funcionariosid'));

  
}


public function listarfuncionarioid($id)
{
    $funcionario = DB::table('funcionarios')
    ->join('funcionariosdepartamentos', 'funcionarios.idfuncionario', '=', 'funcionariosdepartamentos.idfuncionario')
    ->join('departamentos', 'funcionariosdepartamentos.iddepartamento', '=', 'departamentos.iddepartamento')
    ->where('funcionarios.idfuncionario',$id)
    ->select('funcionarios.contacto as contacto','funcionarios.idfuncionario as idfuncionario','funcionarios.nome as nomefuncionario','departamentos.iddepartamento as iddepartamento','departamentos.nomedepartamento as departamento' ,'funcionarios.email as email','funcionarios.dataempregofim as datasaida','funcionarios.primeiropreco as precoinicio','funcionarios.ultimopreco as precofim','funcionarios.quantidade as quantidade','funcionarios.idade as idade','funcionarios.foto as foto','funcionarios.pais as pais','funcionarios.cidade as cidade','funcionarios.morada as morada','funcionarios.estado as estado')
    -> first();

    $departamentos = Departamentos::all();

    //$profissoes = Profissoes::all();


    return view("editarfuncionario",compact('funcionario','departamentos'));
}

public function editarfuncionario(Request $request)
{

    $user_data = array(
    'idfuncionario' => $request -> get('idfuncionario'), 
    'email' => $request -> get('email'),
    'contacto' => $request -> get('contacto'),
    'morada' => $request -> get('morada'),
    'cidade' => $request -> get('cidade'),
    'pais' => $request -> get('pais'),
    'dataempregofim' => $request -> get('dataempregofim'),
    'iddepartamento' => $request -> get('iddepartamento'),
    'estado' => $request -> get('estado'),
    );





     $affected= Funcionarios::where('idfuncionario', $user_data['idfuncionario'])
        ->update([
            'email' =>$user_data['email'],
            'contacto' =>$user_data['contacto'],
            'morada' =>$user_data['morada'],
            'cidade' =>$user_data['cidade'],
            'pais' =>$user_data['pais'],
            'dataempregofim' =>$user_data['dataempregofim'],
            'estado' => $user_data['estado']
         ]);
   
         if($affected>0)
         {

            $affected2= FuncionarioDepartamento::where('idfuncionario', $user_data['idfuncionario'])
            ->update([
                'iddepartamento' =>$user_data['iddepartamento'],
             ]);

            if($affected2>0)
            {

             $request->session()->flash('alterafuncionario', 'Informações Alteradas!');
             return redirect()->guest('listarfuncionarios');
             
            }else{

                $request->session()->flash('alterafuncionarioerrodepartamento', 'Erro na Alteracao do Departamento!');
                return redirect()->guest('listarfuncionarios');
            }


         }
     
        else{
        $request->session()->flash('alterafuncionarioerro', 'Erro na Alteracao!');
        return back();
    } 
    

}


public function eliminarfuncionarioid(Request $request)
{
    
    

    $id = $request->get('id');

   

    $affected= Funcionarios::where('idfuncionario',$id)->delete($id);


    if($affected>0)
    {
        $request->session()->flash('eliminarfuncionario', 'Informações Eliminadas!');
        return response()->json(['url'=>url('listarfuncionarios')]);
    }

   else{
   $request->session()->flash('eliminarfuncionarioerro', 'Erro ao Eliminar!');
   return back();
} 

}

public function adicionarfuncionario()
{
    $departamentos = Departamentos::all();

    $profissoes = Profissoes::all();
    return view("adicionarfuncionario",compact('departamentos','profissoes'));
}


public function storefuncionario(Request $request)
{
    
    $this ->validate($request,[
        'nome' => 'required|string',
        'email' => 'required|string',
        'idade' => 'required|integer',
        'morada' => 'required|string',
        'cidade' => 'required|string',
        'pais' => 'required|string',
        'dataempregoinicio' => 'required|date',
        'primeiropreco' => 'required|integer',
    ]);


  

    $nome = $request->input('nome');

    $funcionarios = new Funcionarios();
    $funcionarios->idutilizador= Session::get('idutilizador');
    $funcionarios->nome=$request->input('nome');
    $funcionarios->email=$request->input('email');
    $funcionarios->idade=$request->input('idade');
    $funcionarios->morada=$request->input('morada');
    $funcionarios->cidade = $request->input('cidade');
    $funcionarios->pais = $request->input('pais'); 
    $funcionarios->dataempregoinicio = $request->input('dataempregoinicio'); 
    $funcionarios->dataempregofim = $request->input('dataempregofim'); 
    $funcionarios->primeiropreco = $request->input('primeiropreco');
    $funcionarios->estado = 0;



if($nome!= "")
    {
        $request->session()->flash('messageadicionarfuncionario', 'Funcionário registado!');

        $funcionarios->save();  
         
        $funcionariodepartamento = new FuncionarioDepartamento();
        $funcionariodepartamento->idfuncionario=$funcionarios->id;
        $funcionariodepartamento->iddepartamento=$request->input('iddepartamento');
        $funcionariodepartamento->save(); 


        return redirect()->guest('listarfuncionarios'); 

    }else{

        $request->session()->flash('messageadicionarfuncionarioerro', 'Verifique novamente!');

    }

}


public function listarprecosid($id)
{
    $funcionario = Funcionarios::where('funcionarios.idfuncionario',$id)-> first();


    return view("gerirprecos",compact('funcionario'));
}


public function editarvaloresfuncionario(Request $request)
{

    $id = $request->id;
    
    $precoacordado = $request->precoacordado;
    
 
        $affected= Funcionarios::where('idfuncionario', $id)
        ->update([
            'quantidade' =>$request->quantidade,
            'precoacordado' =>$request->precoacordado,
            'ultimopreco' =>$request->ultimopreco,

         ]);


 

  if($affected>0)
    {
        $request->session()->flash('valoresalterados', 'Informações Alteradas!');
        return ''.$id;
    }

   else{
   $request->session()->flash('valoresalteradoserro', 'Erro ao alterar!');
   return back();
} 
  

}



public function listarencomendas(Request $request)
{

    $encomendas = DB::table('encomentdaartigos')
    ->join('encomendas', 'encomentdaartigos.idencomenda', '=', 'encomendas.idencomenda')
    ->join('clientes', 'encomendas.idcliente', '=', 'clientes.idcliente')
    ->join('produtos', 'encomentdaartigos.idproduto', '=', 'produtos.idproduto')
    ->select('encomendas.idencomenda as idencomenda', 'clientes.nome as cliente','encomendas.dataentrada as dataentrada','encomendas.localcarga as localcarga','encomendas.total as total','encomendas.estado as estado')
    ->get();

        
    $month =   Carbon::now()->subDays(30)->toDateString();
    $monthbefore =   Carbon::now()->subDays(30)->firstOfMonth()->toDateString();
   
    $monthdaybefore =   Carbon::now()->subDays(1)->toDateString();
    
    $monthatual =   Carbon::now()->toDateString();
    $firstdayofmonth = Carbon::now()->firstOfMonth()->toDateString();  

    $encomendascount= Encomendas::where('dataentrada',$monthatual)->count(); 

  


    $encomendascountdiaant= Encomendas::where('dataentrada',$monthdaybefore)->count();
    $diferenca =  $encomendascount-$encomendascountdiaant;
   
    $encomendascountmestodo= Encomendas::where('dataentrada',$firstdayofmonth)
    ->where('dataentrada',$monthatual)
    ->count(); 
    $encomendascountmestodoanterior= Encomendas::where('dataentrada',$monthbefore)
    ->where('dataentrada',$month)
    ->count(); 
    $diferenca2 = $encomendascountmestodo - $encomendascountmestodoanterior;

    $encomendassummestodo= Encomendas::where('dataentrada',$firstdayofmonth)
    ->where('dataentrada',$monthatual)
    ->sum('total');

    $encomendascountmestodoanterior= Encomendas::where('dataentrada',$monthbefore)
    ->where('dataentrada',$month)
    ->sum('total');

    $diferenca3 = $encomendassummestodo - $encomendascountmestodoanterior;


   return view("gerirencomendas",compact('encomendas','encomendascount','diferenca','encomendascountmestodo','diferenca2','encomendassummestodo','diferenca3'));
  

}


public function listarencomendasid($id)
{

 
    
    $encomendasdetalhe = DB::table('encomentdaartigos')
    ->join('encomendas', 'encomentdaartigos.idencomenda', '=', 'encomendas.idencomenda')
    ->join('clientes', 'encomendas.idcliente', '=', 'clientes.idcliente')
    ->where('encomentdaartigos.idencomenda',$id)
    ->select('encomendas.idencomenda as idencomenda','clientes.morada as morada','clientes.pais as pais','clientes.cidade as cidade','clientes.nome as cliente','clientes.foto as foto','encomendas.dataentrada as dataentrada','encomendas.horacarga as horacarga','encomendas.localcarga as localcarga','encomendas.total as total','encomendas.estado as estado','encomentdaartigos.localdescarga as localdescarga','encomentdaartigos.horadescarga as horadescarga','encomendas.desconto as desconto')
    ->first();


    
    $encomendasdetalhes = DB::table('encomentdaartigos')
    ->join('encomendas', 'encomentdaartigos.idencomenda', '=', 'encomendas.idencomenda')
    ->join('clientes', 'encomendas.idcliente', '=', 'clientes.idcliente')
    ->join('produtos', 'encomentdaartigos.idproduto', '=', 'produtos.idproduto')
    ->where('encomentdaartigos.idencomenda',$id)
    ->select('encomendas.idencomenda as idencomenda','produtos.referencia as referencia','produtos.descricao as descricao','produtos.precovenda as precovenda','produtos.precocusto as precocusto','produtos.desconto as desconto','produtos.iva as iva','produtos.validadeinicio as validadeinicio','produtos.validadefim as validadefim','produtos.lote as lote','encomentdaartigos.localdescarga as localdescarga','encomentdaartigos.horadescarga as horadescarga')
    ->get();


    return view("detalheencomendas",compact('encomendasdetalhe','encomendasdetalhes'));
}


public function listarencomendaseditarid($id)
{


    
    
    $encomendasdetalhe = DB::table('encomentdaartigos')
    ->join('encomendas', 'encomentdaartigos.idencomenda', '=', 'encomendas.idencomenda')
    ->join('clientes', 'encomendas.idcliente', '=', 'clientes.idcliente')
    ->where('encomentdaartigos.idencomenda',$id)
    ->select('encomendas.idencomenda as idencomenda','clientes.morada as morada','clientes.pais as pais','clientes.cidade as cidade','clientes.nome as cliente','clientes.foto as foto','encomendas.dataentrada as dataentrada','encomendas.horacarga as horacarga','encomendas.localcarga as localcarga','encomendas.total as total','encomendas.estado as estado','encomentdaartigos.localdescarga as localdescarga','encomentdaartigos.horadescarga as horadescarga','encomendas.desconto as desconto','encomentdaartigos.datasaida as datasaida')
    ->first();





    return view("editarencomenda",compact('encomendasdetalhe'));
}


public function editarencomendas(Request $request)
{
    
    $user_data = array(
        'idencomenda' => $request -> get('idencomenda'), 
        'estado' => $request -> get('estado'),
        'localdescarga' => $request -> get('localdescarga'),
        'datasaida' => $request -> get('datasaida'),
        'horadescarga' => $request -> get('horadescarga')
        );
    

 
        $affected= Encomendas::where('idencomenda', $user_data['idencomenda'])
        ->update([
            'estado' =>$request->estado,
         ]);


 

  if($affected>0)
    {
        
        $affected2= EncomendasProdutos::where('idencomenda', $user_data['idencomenda'])
        ->update([
            'localdescarga' =>$request->localdescarga,
            'datasaida' =>$request->datasaida,
            'horadescarga' =>$request->horadescarga

         ]);

         if($affected2 >0)
         {
            $request->session()->flash('encomendaalterada', 'Informações Alteradas!');
            return redirect()->guest('listarencomendas');
         }

       
    }

   else{
   $request->session()->flash('encomendaalteradaerro', 'Erro ao alterar!');
   return back();
} 
  

}

public function eliminarencomendaid(Request $request)
{
    
    


    $id = $request->get('id');


    $data = Encomendas::where('idencomenda',$id)
    ->select('encomendas.dataentrada as dataentrada')
    ->first();


    $now = Carbon::now()->toDateString();

 
    if($data['dataentrada'] == $now)
    {
        $affected= Encomendas::where('idencomenda',$id)->delete($id);
        if($affected>0)
        {
        $request->session()->flash('eliminarencomenda', 'Informações Eliminadas!');
        return response()->json(['url'=>url('listarencomendas')]);
        }
        else{
            $request->session()->flash('eliminarfuncionarioerro', 'Erro ao Eliminar!');
            return back();
        }

    }else{

        $request->session()->flash('eliminarfuncionarioerrodata', 'Não pode eliminar encomendas com data anterior a '.$now.' !');
        return response()->json(['url'=>url('listarencomendas')]);
       
    }


}

public function listarartigos(Request $request)
{

    $produtos = Produtos::all();
 
    return view("gerirartigos",compact('produtos'));

}


public function listarprodutosid($id)
{
    $produtos = Produtos::where('idproduto',$id)-> first();


    return view("detalhesprodutos",compact('produtos'));
}


public function adicionarproduto()
{
    
    return view("adicionarartigo");
}


public function storeproduto(Request $request)
{
    
    /*$this ->validate($request,[
        'referencia' => 'required|string',
        'designacao' => 'required|numeric',
        'precovenda' => 'required|numeric',
        'precocusto' => 'required|numeric',
        'desconto' => 'required|numeric',
        'iva' => 'required|numeric',
        'validadeinicio' => 'required|date',
        'validadefim' => 'required|date',
        'lote' => 'required|string',
    ]);*/


    if($file = $request->file('photo')!="")
    {
        $file = $request->file('photo');
        $ext=$file->extension();

    }else{


        $ext= '.jpg';

    }

  

    $referencia = $request->input('referencia');

    $produtos = new Produtos();
    $produtos->referencia=$request->input('referencia');
    $produtos->descricao=$request->input('descricao');
    $produtos->precovenda=$request->input('precovenda');
    $produtos->precocusto=$request->input('precocusto');
    $produtos->desconto = $request->input('desconto');
    $produtos->iva = $request->input('iva'); 
    $produtos->validadeinicio = $request->input('validadeinicio'); 
    $produtos->validadefim = $request->input('validadefim'); 
    $produtos->lote = $request->input('lote');
        


if($referencia!= "")
    {
        if($file = $request->file('photo') == "")
        {
            $produtos->foto = 'DefaultImage'. $ext;
            $request->session()->flash('messageadicionarproduto', 'Produto registado!');
            $produtos->save();  
            return redirect()->guest('listarartigos'); 
        }

        if($file = $request->file('photo') != "")
        {
        $file= trim('Imagem'.$produtos->referencia.'.'.$ext);
        $produtos->foto = $file;
        $path = base_path()."/public/storage/"; 
        $image = $request->file('photo'); 
        $image = Image::make($image->path());
        $image->resize(220, 220, function ($constraint) {
        $constraint->aspectRatio();
        })->save($path.'/'.$file);

        $request->session()->flash('messageadicionarproduto', 'Produto registado!');
        $produtos->save();
        return redirect()->guest('listarartigos'); 

    }

  

    }else{

        $request->session()->flash('messageadicionarprodutoerro', 'Verifique novamente!');

    }

}


public function editarvaloresprodutos(Request $request)
{

        $id = $request->id;

        $affected= Produtos::where('idproduto', $id)
        ->update([
            'precovenda' =>$request->precovenda,
            'precocusto' =>$request->precocusto,
            'desconto' =>$request->desconto,
            'iva' =>$request->iva,
         ]);


 

  if($affected>0)
    {
        $request->session()->flash('valoresalteradosprodutos', 'Informações Alteradas!');
        return ''.$id;
    }

   else{
   $request->session()->flash('valoresalteradosprodutoserro', 'Erro ao alterar!');
   return back();
} 
  

}


public function verprodutosid($id)
{
    $produtos = Produtos::where('idproduto',$id)-> first();


    return view("editarartigo",compact('produtos'));
}


public function editarproduto(Request $request)
{
    
    $user_data = array(
        'idproduto' => $request -> get('idproduto'),
        'referencia' => $request -> get('referencia'), 
        'descricao' => $request -> get('descricao'),
        'validadeinicio' => $request -> get('validadeinicio'),
        'validadefim' => $request -> get('validadefim'),
        'lote' => $request -> get('lote'),
        );
    

        $affected= produtos::where('idproduto', $user_data['idproduto'])
        ->update([
            'referencia' =>$request->referencia,
            'descricao' =>$request->descricao,
            'validadeinicio' =>$request->validadeinicio,
            'validadefim' =>$request->validadefim,
            'lote' =>$request->lote,
         ]);


 

  if($affected>0)
    {

        $request->session()->flash('produtosalterados', 'Informações Alteradas!');
        return redirect()->guest('listarartigos');
    
    } else{
   $request->session()->flash('produtosalteradoserro', 'Erro ao alterar!');
   return back();
} 
  

}


public function eliminarprodutoid(Request $request)
{
    
    

    $id = $request->get('id');

   

    $affected= Produtos::where('idproduto',$id)->delete($id);


    if($affected>0)
    {
        $request->session()->flash('eliminarproduto', 'Informações Eliminadas!');
        return response()->json(['url'=>url('listarartigos')]);
    }

   else{
   $request->session()->flash('eliminarprodutoerro', 'Erro ao Eliminar!');
   return back();
} 

}


public function listardespesas(Request $request)
{

    $despesas = Despesas::all();



    $month =   Carbon::now()->subDays(30)->toDateString();
    $monthbefore =   Carbon::now()->subDays(30)->firstOfMonth()->toDateString();
   
    $monthdaybefore =   Carbon::now()->subDays(1)->toDateString();
    
    $monthatual =   Carbon::now()->toDateString();
    $firstdayofmonth = Carbon::now()->firstOfMonth()->toDateString();  

    $despesastotalmes1 = Despesas::where('datadespesa','=',
    $monthatual)->sum('valor');

    $despesastotalhoje = Despesas::where('datadespesa','=',
    $monthbefore)->sum('valor');

    $total1 = $despesastotalmes1 -$despesastotalhoje;



    $despesastotalmes = Despesas::where('datadespesa','>=',
    $firstdayofmonth)
    ->where('datadespesa','<=',$monthatual)
    ->sum('valor');

    $despesastotalmesanterior = Despesas::where('datadespesa','>=',
    $monthbefore)
    ->where('datadespesa','<=',$month)
    ->sum('valor');


    $total2= $despesastotalmes-$despesastotalmesanterior;
    
    $despesasmediatotalmes = Despesas::where('datadespesa','>=',
    $firstdayofmonth)
    ->where('datadespesa','<=',$monthatual)
    ->avg('valor');


    $despesastotalmesanterior = Despesas::where('datadespesa','>=',
    $monthbefore)
    ->where('datadespesa','<=',$month)
    ->avg('valor');

    $total3 = $despesasmediatotalmes-$despesastotalmesanterior ;

    return view("gerirdespesas",compact('despesas','despesastotalmes1','total1','despesastotalmes','total2','despesasmediatotalmes','total3'));

}

public function listardespesasdetaalhe($id)
{

    $despesas = DB::table('despesas')
    ->join('utilizadores', 'despesas.idutilizador', '=', 'utilizadores.idutilizador')
    ->where('iddespesa',$id)
    ->select('utilizadores.nome as utilizador','despesas.iddespesa as iddespesa','despesas.descricao as descricao','despesas.valor as valor','despesas.datadespesa as data','despesas.comprovativo as comprovativo','despesas.formapagamento as formapagamento')
    ->first();

    return view("detalhesdespesa",compact('despesas'));

}


public function adicionardespesa()
{
    
    return view("adicionardespesa");
}

public function adicionardespesaform(Request $request)
    {

     /* $this ->validate($request,[
            'descricao' => 'required|string',
            'valor' => 'required|between:0,99.99',
            'datadespesa' => 'required|date',
            'formapagamento' => 'required|string',
        ]);*/


      

        if($file = $request->file('photo')!="")
        {
            $file = $request->file('photo');
            $ext=$file->extension();

        }else{


            $ext= '.pdf';

        }

    


       $now = Carbon::now()->toDateString();
       
        $despesas = new Despesas();
        $despesas->descricao=$request->input('descricao');
        $despesas->valor = $request->input('valor');
        $despesas->datadespesa = $now;
        $despesas->formapagamento = $request->input('formapagamento');
        $despesas->idutilizador = Session::get('idutilizador'); 
        $despesas->estado = 0 ;


      
       if ($despesas->descricao != "")
        {
           
             if($file = $request->file('photo') == "")
            {

       
         $despesas->comprovativo = 'comprovativo'. $ext;
         $despesas->save();
         

         $request->session()->flash('messagedespesa', 'Despesa inserida!');
         return redirect('listardespesas');
        }

        
        if($file = $request->file('photo') != "")
            $file= trim('ComprovativoDespesa'.$despesas->iddespesa.'.'.$ext);
             $despesas->comprovativo =  $file;
            $path = base_path()."/public/storage/"; 
                 $image = $request->file('photo'); 
                 $image->move($path,$file); 

            $despesas->save();

            $request->session()->flash('messagedespesa', 'Despesa inserida!');
            return redirect('listardespesas');
        }
    
    }
 
public function listardespesaid($id)
{
    $despesas = Despesas::where('iddespesa',$id)-> first();
    return view("editardespesa",compact('despesas'));
}



public function editardespesaform(Request $request)
{
    
    $user_data = array(
        'iddespesa' => $request -> get('iddespesa'),
        'valor' => $request -> get('valor'),
        'formapagamento' => $request -> get('formapagamento'),
        'estado' => $request -> get('estado'), 
        );
    

        $affected= Despesas::where('iddespesa', $user_data['iddespesa'])
        ->update([
            'valor' =>$request->valor,
            'formapagamento' =>$request->formapagamento,
            'estado' =>$request->estado,
         ]);

  if($affected>0)
    {

        $request->session()->flash('despesaalterada', 'Informações Alteradas!');
        return redirect()->guest('listardespesas');
    
    } else{
   $request->session()->flash('despesaalteradaerro', 'Erro ao alterar!');
   return back();
} 
  

}


public function eliminardespesaid(Request $request)
{
    
    

    $id = $request->get('id');

   

    $affected= Despesas::where('iddespesa',$id)->delete($id);


    if($affected>0)
    {
        $request->session()->flash('eliminardespesa', 'Despesa Eliminada!');
        return response()->json(['url'=>url('listardespesas')]);
    }

   else{
   $request->session()->flash('eliminardespesaerro', 'Erro ao Eliminar!');
   return back();
} 

}


public function dashboard1()
{


    

    $month =   Carbon::now()->subDays(30)->toDateString();
    $monthbefore =   Carbon::now()->subDays(30)->firstOfMonth()->toDateString();
   
    $monthdaybefore =   Carbon::now()->subDays(1)->toDateString();
    
    $monthatual =   Carbon::now()->toDateString();
    $firstdayofmonth = Carbon::now()->firstOfMonth()->toDateString();  

    $actualyear =  Carbon::now()->year;

    $date = Carbon::createFromDate($monthatual);
    $startOfYear = $date->copy()->startOfYear()->toDateString();
    $endOfYear   = $date->copy()->endOfYear()->toDateString();;

    $clientes = Clientes:: where('dataentrada', '>=', $startOfYear)
    ->where('dataentrada', '<=', $endOfYear)
    ->where('estado', '=', 0)
    ->count('idcliente');


    $rendimentos = EncomendasProdutos::leftjoin('encomendas','encomendas.idencomenda','=','encomentdaartigos.idencomenda') 
    ->where('datasaida', '>=', $startOfYear)
    ->where('datasaida', '<=', $endOfYear)
    ->where('estado', '=', 1)
    ->sum('encomendas.total');

    $despesas = Despesas:: where('datadespesa', '>=', $startOfYear)
    ->where('datadespesa', '<=', $endOfYear)
    ->where('estado', '=', 1)
    ->sum('valor');

    $lucro = $rendimentos - $despesas;

    $encomendas = Encomendas:: where('dataentrada', '>=', $startOfYear)
    ->where('dataentrada', '<=', $endOfYear)
    ->count('idencomenda');


    $data = array();
    $res     = array();

    $data['rendimentos'] = DB::select('select sum(total) as total from encomendas inner join encomentdaartigos on encomendas.idencomenda = encomentdaartigos.idencomenda group by year(datasaida), month(datasaida)');
    $data['rendimentosmax'] = DB::select('select max(total)+ 10 as maximo from encomendas inner join encomentdaartigos on encomendas.idencomenda = encomentdaartigos.idencomenda');
    $data['despesas'] = DB::select('select sum(valor) as despesa from despesas group by year(datadespesa), month(datadespesa)');
    $data['despesasmax'] = DB::select('select max(valor) +10 as maximo from despesas');







   return view("dashboard1",compact('clientes','lucro','encomendas','rendimentos','despesas'));

}

public function dashboard1mensal()
{
    

    $data = array();

    $data['rendimentos'] = DB::select('select sum(total) as total from encomendas inner join encomentdaartigos on encomendas.idencomenda = encomentdaartigos.idencomenda group by year(datasaida), month(datasaida)');
    $data['rendimentosmax'] = DB::select('select max(total)+ 10 as maximo from encomendas inner join encomentdaartigos on encomendas.idencomenda = encomentdaartigos.idencomenda');
    $data['despesas'] = DB::select('select sum(valor) as despesa from despesas group by year(datadespesa), month(datadespesa)');
    $data['despesasmax'] = DB::select('select max(valor) +10 as maximo from despesas');
   

   

  



    return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);

}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
