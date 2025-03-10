<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    /*public function getTransactionData(){
        $easy = DB::select('SELECT t.*, u.name AS username, p.product_name, s.service_name
                            FROM transaction AS t
                            INNER JOIN users AS u ON u.id = t.user_id
                            LEFT JOIN products AS p ON p.user_id = t.user_id
                            LEFT JOIN service AS s ON s.user_id = t.user_id');

        return response()->json(["success" => true, 'easy' => $easy],200);
    }*/

    /*public function getTransactionData()
    {
        $moderate = DB::table('transaction AS t')
            ->select('t.*', 'u.name AS user_name', 'p.product_name', 's.service_name')
            ->join('users AS u', 'u.id', '=', 't.user_id')
            ->leftJoin('products AS p', 'p.user_id', '=', 't.user_id')
            ->leftJoin('service AS s', 's.user_id', '=', 't.user_id')
            ->get();

        return response()->json(['success' => true, 'moderate' => $moderate], 200);
    }*/

    public function getTransactionData()
    {
        $challenging = Transaction::with('User', 'Products', 'Services')->get();

        return response()->json(['success' => true, 'challenging' => $challenging], 200);
    }

    /*public function getTransactionData()
    {
        $difficult = Transaction::with([
            'User' => function($query){
                $query->select('*');
            }])->with([
            'Products' => function($query){
                $query->select('*');
            }])->with([
            'Services' => function($query){
                $query->select('*');
            }
        ])->get();

        return response()->json(['success' => true, 'difficult' => $difficult], 200);
    }*/
}
