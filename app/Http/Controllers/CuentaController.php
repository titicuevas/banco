<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Models\Cliente;
use App\Models\Cuenta;
use App\Models\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'cuentaindex';
        $cuentas = Cuenta::all();

        return view('cuentas.index',['cuentas'=>$cuentas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuenta = new Cuenta();
        return view ('cuentas.create',['cuenta'=>$cuenta]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCuentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuentaRequest $request)
    {
        $cuenta = new Cuenta($request->validated());

        $cuenta ->save();

        return redirect()->route('cuentas.index')->with('success','Cuenta creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        return view ('cuentas.show',['cuenta'=>$cuenta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        return view('cuentas.edit',['cuenta'=>$cuenta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCuentaRequest  $request
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCuentaRequest $request, Cuenta $cuenta)
    {
        $cuenta->fill($request->validated());

        $cuenta->save();

        return redirect()->route('cuentas.index')->with('success','Cuentas editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();

        return redirect()->route('cuentas.index')->with('Success','Cuenta eliminado correctamente');
    }

    public function titulares(Cuenta $cuenta)
    {
        return view('cuentas.titulares', [
            'cuenta' => $cuenta,
        ]);
    }
    public function addtitular(Cuenta $cuenta)
    {
        $clientes = Cliente::all();
        return view('cuentas.addtitular', [
            'cuenta' => $cuenta,
            'clientes' => $clientes,
        ]);
    }
    public function addtitularupdate(Request $request, Cuenta $cuenta)
    {
        $cuenta->clientes()->attach($request->cliente);
        return redirect()->route('cuentas.titulares', $cuenta);
    }
    public function deleteTitular(Cuenta $cuenta, Cliente $cliente)
    {
        $cliente->cuentas()->detach($cuenta);

        return redirect()->route('cuentas.titulares', $cuenta);
    }


    public function movimientos(Cuenta $cuenta)
    {
        $movimientos = $cuenta->withSum('movimientos', 'importe')->get()->where('id', $cuenta->id)->first();

        return view('cuentas.movimientos', [
            'cuenta' => $cuenta,
            'movimientos' => $movimientos,
        ]);
    }

    public function addmovimiento(Cuenta $cuenta, Movimiento $movimiento)
    {
        return view('cuentas.addmovimiento', [
            'movimiento' => $movimiento,
            'cuenta' => $cuenta,
        ]);
    }

    public function addmovimientostore(Request $request, Cuenta $cuenta)
    {
        $movimiento = new Movimiento([
            'cuenta_id' => $cuenta->id,
            'fecha' => Carbon::now(),
            'concepto' => $request->concepto,
            'importe' => $request->importe,
        ]);

        $movimiento->save();

        return redirect()->route('cuentas.movimientos', $cuenta);
    }

    public function deleteMovimiento(Cuenta $cuenta, Movimiento $movimiento)
    {
        $movimiento->delete();

        return redirect()->route('cuentas.movimientos', $cuenta);
    }
}
