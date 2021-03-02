<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Validator, Input, Redirect, Session, Storage;

use App\Http\Requests;

class ProcessController extends Controller
{
     /**
     * Criando uma nova instancia do controlador
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Mostrar o formulário de login
    public function indexlogin()
    {
        return redirect('login');
    }

    //Exibir a página inicial
    public function homepage()
    {
        return view('pages.home');
    }

    /**
     * Listar o conteúdo na pagína
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar tudo, select *
        $liststock = Stock::paginate(4); //
        return view('pages.view',array('liststock'=>$liststock));
    }

    /**
     * Exibir o formulário para criar uma nova peça
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Armazenar uma peça recem criada
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validação
        $this->validate($request, [
            'stype' => 'required',
            'sname' => 'required',
            'ssize' => 'required',
            'squantity' => 'required|numeric',
            'fileUpload' => 'mimes:jpeg,jpg|required|max:3000',
        ]);

        //Obter valores de entrada e armazenar nas variaveis
        $stype = $request->stype;
        $sname = $request->sname;
        $ssize = $request->ssize;
        $squantity = $request->squantity;
        $file = $request->fileUpload;

        //criação do objeto peça
        $instock = new Stock;

        //Definição de todas as entradas para inserir no banco
        $instock->STK_TYPE = $stype;
        $instock->STK_NAME = $sname;
        $instock->STK_SIZE = $ssize;
        $instock->STK_QTY = $squantity;

        //salvar no banco
        $instock->save();
        //upload pde fotohoto
        $path = $file->storeAs('images', $instock->id.'.jpg', 'public');

        Session::flash('message', "Peça Inserida com Sucesso!");
        return redirect("/home");

    }

    /**
     * mostrar uma peça especifica na tela de pesquisa
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->has('sname'))
        {
            $STK_NAME =  $request->sname;
            $search = Stock::where('stk_name','LIKE',"%$STK_NAME%")->paginate(5); 

        return view('pages.search',array('search'=>$search));
        }
        else
        {
            return view('pages.search');
        }
    }

    /**
     * exibir o formulário de edição
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mostrar form de atualização
        $editstock = Stock::find($id);
        return view('pages.edit',array('editstock'=>$editstock));
    }

    /**
     * atualizar uma peça
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validação da atuliazação
        $this->validate($request, [
            'sid' => 'required',
            'stype' => 'required',
            'sname' => 'required',
            'ssize' => 'required',
            'squantity' => 'required|numeric',
        ]);

        //atualização dos dados no banco
        $sid = $request->sid;
        $stype = $request->stype;
        $sname = $request->sname;
        $ssize = $request->ssize;
        $squantity = $request->squantity;

        $upstock = Stock::find($sid);
        $upstock->STK_TYPE = $stype;
        $upstock->STK_NAME = $sname;
        $upstock->STK_SIZE = $ssize;
        $upstock->STK_QTY = $squantity;

        $upstock->save();

        Session::flash('message', "Peça Atualizada!");
        return redirect("/edit/$sid");

    }

    /**
     * remover uma peça do armazenamento
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //deletar o dado
        $STK_ID = $request->delstock;

        $delstock = Stock::find($STK_ID);
        $delstock->delete();

        //deletar imagem
        $del = Storage::disk('public')->delete("images/".$STK_ID.".jpg");

        return redirect("/view");
    }
}
