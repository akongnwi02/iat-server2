<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 5/21/21
 * Time: 6:18 PM
 */

namespace App\Http\Controllers\Backend\Account;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Account\ShowAccountRequest;
use App\Models\Account\Account;
use App\Repositories\Backend\Account\AccountRepository;
use App\Repositories\Backend\Movement\MovementRepository;

class SupplyPointAccountController extends Controller
{
    public function index(AccountRepository $accountRepository)
    {
        return view('backend.accounts.point.index')
            ->withAccounts($accountRepository->getSupplyPointPointAccounts()->paginate());
    }
    
    public function show(ShowAccountRequest $request, Account $account, MovementRepository $movementRepository)
    {
        return view('backend.accounts.point.show')
            ->withAccount($account)
            ->withMovements($movementRepository->getAccountMovements($account)->paginate());
    }
}