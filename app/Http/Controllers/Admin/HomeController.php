<?php

namespace App\Http\Controllers\Admin;

// HomeController Admin

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\User;
use App\Visitor;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $visitsCount = 0;
        $onlineCount = 0;
        $pageCount = 0;
        $userCount = 0;

        // Variar período
        $data = $request->only(['periodo']);
        if ($request->missing('periodo')) {
            $days = $request->input('periodo', 30);
        } else {
            $days = filter_var($data['periodo'], FILTER_VALIDATE_INT);
        }
        
        if ($days > 120) { $days = 120; }

        // Contagem de acessos
        $visitsCount = Visitor::count();


        // Contagem de visitantes online
        $dateLimit = date('Y-m-d H:i:m', strtotime('-5 minutes'));
        $onlineList = Visitor::select('ip')->where('date_acess', '>=', $dateLimit)->groupBy('ip')->get();
        $onlineCount = count($onlineList);



        // Contagem de páginas
         $pageCount = Page::count();
      
         // Contagem de usuários
        $userCount = User::count();

        // COntagem para o pagePie
        $pagePie = [];
        // $visitsAll = Visitor::selectRaw('page, count(page) AS c')->groupBy('page')->get();
        $visitsAll = Visitor::selectRaw('page, count(page) as c')->where('date_acess', '>=', date('Y-m-d H:i:s', strtotime("-{$days} days")))->groupBy('page')->get();

        foreach ($visitsAll AS $visit) {
            $pagePie[$visit['page']] = intval($visit['c']);
        }

        $visitsCount = count($pagePie);



        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));


        return view('Admin.home', [
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'ultimosDias' => $days
        ]);
    }

}
